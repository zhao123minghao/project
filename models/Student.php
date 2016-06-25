<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "student".
 *
 * @property integer $user_id
 * @property string $stu_name
 * @property string $stu_birth
 * @property string $stu_ssn
 * @property string $stu_status
 * @property string $stu_gdata
 * @property string $stu_cost
 *
 * @property CourseStu[] $courseStus
 */
class Student extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'student';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'stu_name', 'stu_ssn', 'stu_status'], 'required'],
            [['user_id'], 'integer'],
            [['stu_birth', 'stu_gdata'], 'date','format'=>'yyyy-MM-dd'],
            [['stu_cost'], 'number'],
            [['stu_name', 'stu_ssn', 'stu_status'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'stu_name' => 'Stu Name',
            'stu_birth' => 'Stu Birth',
            'stu_ssn' => 'Stu Ssn',
            'stu_status' => 'Stu Status',
            'stu_gdata' => 'Stu Gdata',
            'stu_cost' => 'Stu Cost',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourseStus()
    {
        return $this->hasMany(CourseStu::className(), ['cs_stu' => 'user_id']);
    }

    public function getStudentList()
    {
        $list_t = Student::find()->all();
        $list = array();
        foreach($list_t as $value)
        {
            $list[$value->user_id] = $value->user_id .' ' .$value->stu_name;
        }
        return $list;
    }

    public static function getCourseList($id)
    {
        $list_t = CourseStudent::find()->where(['student_id'=>$id])->all();
        $list = array();
        foreach($list_t as $value)
        {
            $course_name = $value->course_name;
            $professor = $value->professor_name;
            $course_id = $value->cp_id;

            $cp_list = CpDate::find()->where(['cpd_cp'=>$course_id])->all();
            foreach($cp_list as $item)
            {
                $list[] = [$item->cpd_date,$item->cpd_time,$course_name,
                $professor,$item->cpd_place];
            }
        }
        return $list;
    }

    public static function getCourseNumList($id)
    {
        $list_t = CourseStu::find()->where(['cs_stu'=>$id])->all();
        $list = array();
        foreach($list_t as $value)
        {
                $list[] = [$value->cs_cp,$value->cs_type,$value->cs_id];
        }
        return $list;
    }

    public static function getCourseColorList($id)
    {
        $list_t = CourseStudent::find()->where(['student_id'=>$id])->all();
        $list = array();
        foreach($list_t as $value)
        {
            $course_id = $value->cp_id;
            $course_type = $value->course_type;

            $cp_list = CpDate::find()->where(['cpd_cp'=>$course_id])->all();
            foreach($cp_list as $item)
            {
                $list[] = [$item->cpd_date,$item->cpd_time,$course_type];
            }
        }
        return $list;
    }
}
