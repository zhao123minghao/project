<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Professor;

/**
 * ProfessorSearch represents the model behind the search form about `app\models\Professor`.
 */
class ProfessorSearch extends Professor
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'pro_depart'], 'integer'],
            [['pro_name', 'pro_birth', 'pro_status', 'pro_ssn'
            , 'department.depart_name'], 'safe'],
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
        $query = Professor::find()->innerJoinWith('department');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['department.depart_name'] = [
            'asc' => ['department.depart_name' => SORT_ASC],
            'desc' => ['department.depart_name' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'user_id' => $this->user_id,
            'pro_birth' => $this->pro_birth,
            'pro_depart' => $this->pro_depart,
        ]);

        $query->andFilterWhere(['like', 'pro_name', $this->pro_name])
            ->andFilterWhere(['like', 'pro_status', $this->pro_status])
            ->andFilterWhere(['like', 'pro_ssn', $this->pro_ssn])
            ->andFilterWhere(['like', 'department.depart_name', $this->getAttribute('department.depart_name')]);

        return $dataProvider;
    }
}
