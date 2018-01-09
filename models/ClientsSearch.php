<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Clients;

/**
 * ClientsSearch represents the model behind the search form about `\app\models\Clients`.
 */
class ClientsSearch extends Clients
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

    public function formName()
    {
        return '';
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
        $query = Clients::find();

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

        $query->andFilterWhere(['like', 'cln_name_1', $this->search]);
        $query->orderBy('cln_name_1');

        return $dataProvider;
    }
}
