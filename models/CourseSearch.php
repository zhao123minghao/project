<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Course;

/**
 * CourseSearch represents the model behind the search form about `app\models\Course`.
 */
class CourseSearch extends Course
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['course_id', 'cou_depart'], 'integer'],
            [['cou_name','department.depart_name'], 'safe'],
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
        $query = Course::find()->innerJoinWith('department');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        //$query->joinWith(
        //['department' => function($query) { $query->from('department'); }]);

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
            'course_id' => $this->course_id,
            'cou_depart' => $this->cou_depart,
        ]);

        $query->andFilterWhere(['like', 'cou_name', $this->cou_name])
        ->andFilterWhere(['like', 'department.depart_name', $this->getAttribute('department.depart_name')]);
        return $dataProvider;
    }

    public function prosearch($params)
    {
        $query = Course::find()->innerJoinWith('department');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        //$query->joinWith(
        //['department' => function($query) { $query->from('department'); }]);

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
            'course_id' => $this->course_id,
            'cou_depart' => $this->cou_depart,
        ]);

        $query->andFilterWhere(['like', 'cou_name', $this->cou_name])
            ->andFilterWhere(['like', 'department.depart_name', $this->getAttribute('department.depart_name')]);
        return $dataProvider;
    }
}
