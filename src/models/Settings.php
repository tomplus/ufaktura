<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "settings".
 *
 * @property string $set_name_1
 * @property string $set_name_2
 * @property string $set_name_3
 * @property string $set_name_4
 * @property integer $set_ivc_last_number
 * @property string $set_payment_methods
 */
class Settings extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'settings';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['set_name_1', 'set_name_2', 'set_name_3', 'set_name_4', 'set_ivc_last_number', 'set_payment_methods'], 'required'],
            [['set_ivc_last_number'], 'integer'],
            [['set_name_1', 'set_name_2', 'set_name_3', 'set_name_4'], 'string', 'max' => 128],
            [['set_payment_methods'], 'string', 'max' => 256],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'set_name_1' => 'Set Name 1',
            'set_name_2' => 'Set Name 2',
            'set_name_3' => 'Set Name 3',
            'set_name_4' => 'Set Name 4',
            'set_ivc_last_number' => 'Set Ivc Last Number',
            'set_payment_methods' => 'Set Payment Methods',
        ];
    }
}
