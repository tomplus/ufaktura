<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "invoices".
 *
 * @property integer $ivc_id
 * @property string $ivc_number
 * @property integer $ivc_pfl_id
 * @property integer $ivc_cln_id
 * @property string $ivc_date_create
 * @property string $ivc_date_sale
 * @property string $ivc_name
 * @property integer $ivc_count
 * @property string $ivc_unit
 * @property string $ivc_price
 * @property string $ivc_name_2
 * @property integer $ivc_count_2
 * @property string $ivc_unit_2
 * @property string $ivc_price_2
 * @property string $ivc_name_3
 * @property integer $ivc_count_3
 * @property string $ivc_unit_3
 * @property string $ivc_price_3
 * @property string $ivc_value
 * @property string $ivc_date_payment
 * @property string $ivc_payment_method
 * @property string $ivc_ts_insert
 * @property string $ivc_ts_update
 *
 * @property Clients $ivcCln
 * @property Profiles $ivcPfl
 */
class Invoices extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'invoices';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ivc_number', 'ivc_cln_id', 'ivc_date_create', 'ivc_date_sale', 'ivc_name', 'ivc_count', 'ivc_unit', 'ivc_price',
              'ivc_value', 'ivc_date_payment', 'ivc_payment_method', 'ivc_ts_insert', 'ivc_ts_update', 'ivc_pfl_id'], 'required'],
            [['ivc_cln_id', 'ivc_pfl_id', 'ivc_count', 'ivc_count_2', 'ivc_count_3'], 'integer'],
            [['ivc_date_create', 'ivc_date_sale', 'ivc_date_payment', 'ivc_ts_insert', 'ivc_ts_update'], 'safe'],
            [['ivc_price', 'ivc_price_2', 'ivc_price_3', 'ivc_value'], 'number'],
            [['ivc_number', 'ivc_name', 'ivc_unit', 'ivc_name_2', 'ivc_unit_2', 'ivc_name_3', 'ivc_unit_3', 'ivc_payment_method'], 'string', 'max' => 128],
            [['ivc_number'], 'unique'],
            [['ivc_cln_id'], 'exist', 'skipOnError' => true, 'targetClass' => Clients::className(), 'targetAttribute' => ['ivc_cln_id' => 'cln_id']],
            [['ivc_pfl_id'], 'exist', 'skipOnError' => true, 'targetClass' => Profiles::className(), 'targetAttribute' => ['ivc_pfl_id' => 'pfl_id']],
        ];
    }

    /**
     * @Ginheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ivc_id' => 'ID',
            'ivc_number' => 'Numer rachunku',
            'ivc_pfl_id' => 'Sprzedawca (profil)',
            'ivc_cln_id' => 'Klient',
            'ivc_date_create' => 'Data wystawienia',
            'ivc_date_sale' => 'Data sprzedaży',
            'ivc_name' => 'Nazwa usługi',
            'ivc_count' => 'Ilość',
            'ivc_unit' => 'Jednostka',
            'ivc_price' => 'Cena jednostkowa',
            'ivc_name_2' => 'Nazwa usługi (2)',
            'ivc_count_2' => 'Ilość (2)',
            'ivc_unit_2' => 'Jednostka (2)',
            'ivc_price_2' => 'Cena jednostkowa (2)',
            'ivc_name_3' => 'Nazwa usługi (3)',
            'ivc_count_3' => 'Ilość (3)',
            'ivc_unit_3' => 'Jednostka (3)',
            'ivc_price_3' => 'Cena jednostkowa (3)',
            'ivc_value' => 'Wartość',
            'ivc_date_payment' => 'Termin płatności',
            'ivc_payment_method' => 'Sposób płatności',
            'ivc_ts_insert' => 'Data dodania',
            'ivc_ts_update' => 'Data zmiany',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIvcCln()
    {
        return $this->hasOne(Clients::className(), ['cln_id' => 'ivc_cln_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIvcPfl()
    {
        return $this->hasOne(Profiles::className(), ['pfl_id' => 'ivc_pfl_id']);
    }


    public function getClientList()
    {
        return Clients::getNamesAsArray();
    }

    public function getProfileList()
    {
        return Profiles::getNamesAsArray();
    }

    public function initValues()
    {
        if ($this->ivc_number !== null) {
            return;
        }

        $last = Invoices::find()->orderBy('ivc_date_create DESC, ivc_id DESC')->limit(1)->one();
        if ($last !== null) {
            $number = (explode('/', $last->ivc_number)[0]) + 1;
            $this->ivc_date_create = $last->ivc_date_create;
        } else {
            $number = 1;
            $this->ivc_date_create = date('Y-m-d');
        }

        $this->ivc_number = $number;

    }

    public function save($runValidation = true, $attributes = null)
    {

        $number = explode('/', $this->ivc_number)[0];
        $this->ivc_number = $number . '/' . substr($this->ivc_date_create, 5, 2)  . '/' . substr($this->ivc_date_create, 0, 4);

        $this->ivc_date_sale = $this->ivc_date_create;

        if ($this->ivc_payment_method == 'przelew') {
            $this->ivc_date_payment = date('Y-m-d', strtotime($this->ivc_date_create. ' + 14 days'));
        } else {
            $this->ivc_date_payment = $this->ivc_date_create;
        }

        $this->ivc_value = ($this->ivc_count * $this->ivc_price)
                         + ($this->ivc_count_2 * $this->ivc_price_2)
                         + ($this->ivc_count_3 * $this->ivc_price_3);
        if ($this->ivc_ts_insert == null) {
            $this->ivc_ts_insert = date('Y-m-d H:i:s');
        }
        $this->ivc_ts_update = date('Y-m-d H:i:s');
        return parent::save($runValidation, $attributes);
    }


}
