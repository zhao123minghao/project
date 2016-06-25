<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CouPro;

/**
 * CouProSearch represents the model behind the search form about `app\models\CouPro`.
 */
class CouProSearch extends CouPro
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cp_id', 'cp_pro', 'cp_cou', 'cp_num','cp_cost'], 'integer'],
            [['cp_sem', ], 'safe'],
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
        $query = CouPro::find();

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
            'cp_id' => $this->cp_id,
            'cp_pro' => $this->cp_pro,
            'cp_cou' => $this->cp_cou,
            'cp_sem' => $this->cp_sem,
            'cp_cost' => $this->cp_cost,
            'cp_num' => $this->cp_num,
        ]);


        return $dataProvider;
    }
}
