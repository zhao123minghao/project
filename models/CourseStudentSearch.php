<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CourseStudent;

/**
 * CourseStudentSearch represents the model behind the search form about `app\models\CourseStudent`.
 */
class CourseStudentSearch extends CourseStudent
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cs_id', 'grade'], 'integer'],
            [['student_name', 'course_name', 'professor_name', 'semester'], 'safe'],
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
        $query = CourseStudent::find();

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
            'cs_id' => $this->cs_id,
            'semester' => $this->semester,
            'grade' => $this->grade,
        ]);

        $query->andFilterWhere(['like', 'student_name', $this->student_name])
            ->andFilterWhere(['like', 'course_name', $this->course_name])
            ->andFilterWhere(['like', 'professor_name', $this->professor_name]);

        return $dataProvider;
    }

    public function ssearch($params)
    {
        $session = \yii::$app->session;
        $u_id = $session->get('user');
        $query = CourseStudent::find()->where(['student_id'=>$u_id])->where(['<>','grade','-1']);

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
            'cs_id' => $this->cs_id,
            'semester' => $this->semester,
            'grade' => $this->grade,
        ]);

        $query->andFilterWhere(['like', 'student_name', $this->student_name])
            ->andFilterWhere(['like', 'course_name', $this->course_name])
            ->andFilterWhere(['like', 'professor_name', $this->professor_name]);

        return $dataProvider;
    }
}
