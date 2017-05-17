<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
//use app\models\OrdersView;

/**
 * SearchContact represents the model behind the search form about `app\models\Contact`.
 */
class SearchOrder extends OrdersView
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_contact'], 'integer'],
            [['name', 'phone', 'subject', 'message', 'put_date', 'hide'], 'safe'],
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
        $query = OrdersView::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_contact' => $this->id_contact,
            'put_date' => $this->put_date,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'subject', $this->subject])
            ->andFilterWhere(['like', 'message', $this->message])
            ->andFilterWhere(['like', 'hide', $this->hide]);

        return $dataProvider;
    }
}
