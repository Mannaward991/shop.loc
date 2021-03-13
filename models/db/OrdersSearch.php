<?php

namespace app\models\db;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\db\Orders;

/**
 * OrdersSearch represents the model behind the search form of `app\models\db\Orders`.
 */
class OrdersSearch extends Orders
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['orders_id', 'orders_date'], 'integer'],
            [['orders_email', 'orders_phone', 'orders_addition', 'orders_status', 'orders_cookies_id', 'orders_confirmation'], 'safe'],
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
        $query = Orders::find();

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
            'orders_id' => $this->orders_id,
            'orders_date' => $this->orders_date,
        ]);

        $query->andFilterWhere(['like', 'orders_email', $this->orders_email])
            ->andFilterWhere(['like', 'orders_phone', $this->orders_phone])
            ->andFilterWhere(['like', 'orders_addition', $this->orders_addition])
            ->andFilterWhere(['like', 'orders_status', $this->orders_status])
            ->andFilterWhere(['like', 'orders_cookies_id', $this->orders_cookies_id])
            ->andFilterWhere(['like', 'orders_confirmation', $this->orders_confirmation]);

        return $dataProvider;
    }
}
