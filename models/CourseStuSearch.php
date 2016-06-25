<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CourseStu;

/**
 * CourseStuSearch represents the model behind the search form about `app\models\CourseStu`.
 */
class CourseStuSearch extends CourseStu
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cs_id', 'cs_stu', 'cs_cp', 'cs_gra'], 'integer'],
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
        $query = CourseStu::find();

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
            'cs_stu' => $this->cs_stu,
            'cs_cp' => $this->cs_cp,
            'cs_gra' => $this->cs_gra,
        ]);

        return $dataProvider;
    }
}
