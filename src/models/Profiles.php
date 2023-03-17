<?php

namespace app\models;
use yii\helpers\ArrayHelper;

use Yii;

/**
 * This is the model class for table "profiles".
 *
 * @property int $pfl_id
 * @property string $pfl_name_1
 * @property string $pfl_name_2
 * @property string $pfl_name_3
 * @property string $pfl_name_4
 * @property string $pfl_name_5
 * @property string $pfl_name_6
 * @property string $pfl_invoice_note
 *
 * @property Invoices[] $invoices
 */
class Profiles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'profiles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pfl_name_1'], 'required'],
            [['pfl_name_1', 'pfl_name_2', 'pfl_name_3', 'pfl_name_4', 'pfl_name_5', 'pfl_name_6', 'pfl_invoice_note'], 'string', 'max' => 128],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pfl_id' => 'ID',
            'pfl_name_1' => 'Sprzedawca - nazwa',
            'pfl_name_2' => 'Sprzedawca - linia 2',
            'pfl_name_3' => 'Sprzedawca - linia 3',
            'pfl_name_4' => 'Sprzedawca - linia 4',
            'pfl_name_5' => 'Sprzedawca - linia 5',
            'pfl_name_6' => 'Sprzedawca - linia 6',
            'pfl_invoice_note' => 'Dodatkowa uwaga na fakturach',
       ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvoices()
    {
        return $this->hasMany(Invoices::className(), ['ivc_pfl_id' => 'pfl_id']);
    }

    public static function getNamesAsArray()
    {
        $models = Profiles::find()->select(['pfl_id', "pfl_name_1"])->orderBy('pfl_name_1')->asArray()->all();
        return ArrayHelper::map($models, 'pfl_id', 'pfl_name_1');
    }


}
