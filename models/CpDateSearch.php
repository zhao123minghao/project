<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CpDate;

/**
 * CpDateSearch represents the model behind the search form about `app\models\CpDate`.
 */
class CpDateSearch extends CpDate
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cpd_id', 'cpd_cp'], 'integer'],
            [['cpd_date', 'cpd_time', 'cpd_place'], 'safe'],
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
    public function search($params,$cp_id)
    {
        $query = CpDate::find()->
        where(['cpd_cp'=>$cp_id]);

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
            'cpd_id' => $this->cpd_id,
            'cpd_cp' => $this->cpd_cp,
        ]);

        $query->andFilterWhere(['like', 'cpd_date', $this->cpd_date])
            ->andFilterWhere(['like', 'cpd_time', $this->cpd_time])
            ->andFilterWhere(['like', 'cpd_place', $this->cpd_place]);

        return $dataProvider;
    }
}
