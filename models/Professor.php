<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "professor".
 *
 * @property integer $user_id
 * @property string $pro_name
 * @property string $pro_birth
 * @property integer $pro_depart
 * @property string $pro_status
 * @property string $pro_ssn
 *
 * @property CouPro[] $couPros
 * @property Department $proDepart
 * @property User $user
 */
class Professor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'professor';
    }

    public function attributes()
    {
// add related fields to searchable attributes
        return array_merge(parent::attributes(), ['department.depart_name']);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'pro_name'], 'required'],
            [['user_id', 'pro_depart'], 'integer'],
            [['pro_birth'], 'date','format'=>'yyyy-MM-dd'],
            [['pro_name', 'pro_ssn'], 'string', 'max' => 32],
            [['pro_status'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'pro_name' => 'Professor Name',
            'pro_birth' => 'Professor Birth',
            'pro_depart' => 'Professor Depart',
            'pro_status' => 'Professor Status',
            'pro_ssn' => 'Professor Ssn',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCouPros()
    {
        return $this->hasMany(CouPro::className(), ['cp_pro' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartment()
    {
        return $this->hasOne(Department::className(), ['depart_id' => 'pro_depart']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getProfessorList()
    {
        $pros_t = Professor::find()->all();
        $pros = array();
        foreach($pros_t as $value)
        {
            $pros[$value->user_id] = $value->user_id .' ' .$value->pro_name;
        }
        return $pros;
    }
}
