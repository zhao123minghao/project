<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "course".
 *
 * @property integer $course_id
 * @property string $cou_name
 * @property integer $cou_depart
 *
 * @property CouPro[] $couPros
 * @property Department $couDepart
 */
class Course extends \yii\db\ActiveRecord
{

    public $cou_department = '';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'course';
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
            [['course_id'], 'required'],
            [['course_id', 'cou_depart'], 'integer'],
            [['cou_name','department.depart_name'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'course_id' => 'Course ID',
            'cou_name' => 'Course Name',
            'cou_depart' => 'Department ID',
            'department.depart_name' => 'Department',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCouPros()
    {
        return $this->hasMany(CouPro::className(), ['cp_cou' => 'course_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCouDepart()
    {
        return $this->hasOne(Department::className(), ['depart_id' => 'cou_depart']);
    }

    public function getDepartment()
    {
        return $this->hasOne(Department::className(), ['depart_id' => 'cou_depart']);
    }

    public function getCourseList()
    {
        $list_t = Course::find()->all();
        $list = array();
        foreach($list_t as $value)
        {
            $list[$value->course_id] = $value->course_id .' ' .$value->cou_name;
        }
        return $list;
    }
}
