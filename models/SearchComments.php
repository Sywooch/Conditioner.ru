<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SystemComments;

/**
 * SearchComments represents the model behind the search form about `app\models\SystemComments`.
 */
class SearchComments extends SystemComments
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_position'], 'integer'],
            [['name', 'phone', 'city', 'comment', 'answer', 'put_date', 'hide'], 'safe'],
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
        $query = SystemComments::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_position' => $this->id_position,
            'put_date' => $this->put_date,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'comment', $this->comment])
            ->andFilterWhere(['like', 'answer', $this->answer])
            ->andFilterWhere(['like', 'hide', $this->hide]);

        return $dataProvider;
    }
}
