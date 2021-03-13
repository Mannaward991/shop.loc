<?php

namespace app\models\db;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\db\Reviews;

/**
 * ReviewsSearch represents the model behind the search form of `app\models\db\Reviews`.
 */
class ReviewsSearch extends Reviews
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['reviews_id'], 'integer'],
            [['reviews_name', 'reviews_email', 'reviews_text', 'reviews_status', 'reviews_confirmation'], 'safe'],
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
        $query = Reviews::find();

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

        // grid filtering conditions
        $query->andFilterWhere([
            'reviews_id' => $this->reviews_id,
        ]);

        $query->andFilterWhere(['like', 'reviews_name', $this->reviews_name])
            ->andFilterWhere(['like', 'reviews_email', $this->reviews_email])
            ->andFilterWhere(['like', 'reviews_text', $this->reviews_text])
            ->andFilterWhere(['like', 'reviews_status', $this->reviews_status])
            ->andFilterWhere(['like', 'reviews_confirmation', $this->reviews_confirmation]);

        return $dataProvider;
    }
}
