<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "course_student".
 *
 * @property integer $cs_id
 * @property string $student_name
 * @property string $course_name
 * @property string $professor_name
 * @property string $semester
 * @property integer $grade
 */
class CourseStudent extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'course_student';
    }

    /**
     * @inheritdoc
     */
    public static function primaryKey()
    {
        return ['cs_id'];
    }

    public function rules()
    {
        return [
            [['cs_id', 'grade'], 'integer'],
            [['student_name', 'professor_name'], 'required'],
            [['semester'], 'safe'],
            [['student_name', 'course_name', 'professor_name'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cs_id' => 'Cs ID',
            'student_name' => 'Student Name',
            'course_name' => 'Course Name',
            'professor_name' => 'Professor Name',
            'semester' => 'Semester',
            'grade' => 'Grade',
        ];
    }
}
