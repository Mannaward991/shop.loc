<?php

namespace app\models\db;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\db\Groups;

/**
 * GroupsSearch represents the model behind the search form of `app\models\db\Groups`.
 */
class GroupsSearch extends Groups
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['groups_id'], 'integer'],
            [['groups_name', 'groups_img', 'groups_status'], 'safe'],
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
        $query = Groups::find();

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
            'groups_id' => $this->groups_id,
        ]);

        $query->andFilterWhere(['like', 'groups_name', $this->groups_name])
            ->andFilterWhere(['like', 'groups_img', $this->groups_img])
            ->andFilterWhere(['like', 'groups_status', $this->groups_status]);

        return $dataProvider;
    }
}
