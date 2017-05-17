<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SystemNews;

/**
 * SearchNews represents the model behind the search form about `app\models\SystemNews`.
 */
class SearchNews extends SystemNews
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_news'], 'integer'],
            [['name', 'body', 'put_date', 'hide'], 'safe'],
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
        $query = SystemNews::find();

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
            'id_news' => $this->id_news,
            'put_date' => $this->put_date,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'body', $this->body])
            ->andFilterWhere(['like', 'hide', $this->hide]);

        return $dataProvider;
    }
}
