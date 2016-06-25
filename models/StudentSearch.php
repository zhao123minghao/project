<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Student;

/**
 * StudentSearch represents the model behind the search form about `app\models\Student`.
 */
class StudentSearch extends Student
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'integer'],
            [['stu_name', 'stu_birth', 'stu_ssn', 'stu_status', 'stu_gdata'], 'safe'],
            [['stu_cost'], 'number'],
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
        $query = Student::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'user_id' => $this->user_id,
            'stu_cost' => $this->stu_cost,
        ]);

        $query->andFilterWhere(['like', 'stu_name', $this->stu_name])
            ->andFilterWhere(['like', 'stu_birth', $this->stu_birth])
            ->andFilterWhere(['like', 'stu_ssn', $this->stu_ssn])
            ->andFilterWhere(['like', 'stu_status', $this->stu_status])
            ->andFilterWhere(['like', 'stu_gdata', $this->stu_gdata]);

        return $dataProvider;
    }
}
