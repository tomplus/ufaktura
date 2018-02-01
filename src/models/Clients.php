<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "clients".
 *
 * @property integer $cln_id
 * @property string $cln_name_1
 * @property string $cln_name_2
 * @property string $cln_name_3
 * @property string $cln_name_4
 * @property string $cln_name_5
 * @property string $cln_name_6
 *
 * @property Invoices[] $invoices
 */
class Clients extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'clients';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cln_name_1', 'cln_name_2', 'cln_name_3'], 'required'],
            [['cln_name_1', 'cln_name_2', 'cln_name_3', 'cln_name_4', 'cln_name_5', 'cln_name_6'], 'string', 'max' => 128],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cln_id' => 'ID',
            'cln_name_1' => 'Nazwa firmy / Imie, nazwisko',
            'cln_name_2' => 'Ulica',
            'cln_name_3' => 'Miasto',
            'cln_name_4' => 'NIP',
            'cln_name_5' => 'Dodatkowa linia 1',
            'cln_name_6' => 'Dodatkowa linia 2',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvoices()
    {
        return $this->hasMany(Invoices::className(), ['ivc_cln_id' => 'cln_id']);
    }

    public function getNamesAsArray()
    {
        $models = Clients::find()->select(['cln_id', "cln_name_1"])->orderBy('cln_name_1')->asArray()->all();
        return ArrayHelper::map($models, 'cln_id', 'cln_name_1');
    }


}
