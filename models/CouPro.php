<?php

namespace app\models;

use Yii;
use app\models\CpDate;

/**
 * This is the model class for table "cou_pro".
 *
 * @property integer $cp_id
 * @property integer $cp_pro
 * @property integer $cp_cou
 * @property string $cp_sem
 * @property integer $cp_cost
 * @property integer $cp_num
 *
 * @property Course $cpCou
 * @property Professor $cpPro
 * @property CourseStu[] $courseStus
 * @property CpDate[] $cpDates
 */
class CouPro extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cou_pro';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cp_pro', 'cp_cou', 'cp_cost', 'cp_num'], 'integer'],
            [['cp_sem'], 'date','format'=>'yyyy-MM-dd']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cp_id' => 'Cp ID',
            'cp_pro' => 'Cp Pro',
            'cp_cou' => 'Cp Cou',
            'cp_sem' => 'Cp Sem',
            'cp_cost' => 'Cp Cost',
            'cp_num' => 'Cp Num',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourse()
    {
        return $this->hasOne(Course::className(), ['course_id' => 'cp_cou']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCpPro()
    {
        return $this->hasOne(Professor::className(), ['user_id' => 'cp_pro']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourseStus()
    {
        return $this->hasMany(CourseStu::className(), ['cs_cp' => 'cp_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCpDates()
    {
        return $this->hasMany(CpDate::className(), ['cpd_cp' => 'cp_id']);
    }

    public function getPlaceTime($id)
    {
        $list_t = CpDate::find(['cpd_cp'=>$id])->all();
        $list = array();
    }

    public function getUserCourseList($id)
    {
        $list_t = CouPro::find(['cp_pro'=>$id])->all();
        $list = array();
        foreach($list_t as $value)
        {
            $list[] = $value->cp_cou;
        }
        return $list;
    }

    public static function getUserCourseNameList($id)
    {
        $list_t = CouPro::find()->innerJoinWith('course')->where(['cp_pro'=>$id])->all();
        $list = array();
        foreach($list_t as $value)
        {
            $list[$value->cp_id] = $value->course->course_id .' ' .$value->course->cou_name;
        }
        return $list;
    }
}
