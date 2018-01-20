<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Invoices;

/**
 * InvoicesSearch represents the model behind the search form about `\app\models\Invoices`.
 */
class InvoicesSearch extends Invoices
{
    public $search;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['search'], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'search' => 'Szukaj wg frazy'
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Invoices::find();
        $query->orderBy('ivc_date_create DESC, ivc_id DESC');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->joinWith(['ivcCln'], true);

        if ($this->search != "") {
            $query->where('cln_name_1 || cln_name_2 || ivc_number || ivc_name || ivc_date_create::text ~* :search', ['search' => $this->search]);   
        }
    
        return $dataProvider;
    }
}
