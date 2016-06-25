<?php

namespace app\models;

use Yii;
use app\models\CpDate;
/**
 * This is the model class for table "course_professor".
 *
 * @property integer $cp_id
 * @property string $course_name
 * @property string $professor_name
 * @property string $semester
 */
class CourseProfessor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'course_professor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cp_id'], 'integer'],
            [['professor_name'], 'required'],
            [['semester'], 'safe'],
            [['course_name', 'professor_name'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cp_id' => 'Cp ID',
            'course_name' => 'Course Name',
            'professor_name' => 'Professor Name',
            'semester' => 'Semester',
        ];
    }

    public function getCpList()
    {
        $list_t = CourseProfessor::find()->all();
        $list = array();
        $cpdate = new CpDate();
        foreach($list_t as $value)
        {
            $cpdate_list = $cpdate->getCpdateList($value->cp_id);
            if($cpdate_list == '')
            {
                continue;
            }
            $list[$value->cp_id] = [$value->course_name .' '
                .$value->professor_name . ' ' .$cpdate_list,$value->cost,$value->number];
            $cpdate_list = '';
        }
        return $list;
    }

    public function getCpDropList()
    {
        $list_t = CourseProfessor::find()->all();
        $list = array();
        $cpdate = new CpDate();
        foreach($list_t as $value)
        {
            $cpdate_list = $cpdate->getCpdateList($value->cp_id);
            if($cpdate_list == '')
            {
                continue;
            }
            $list[$value->cp_id] = $value->course_name .' '
                .$value->professor_name . ' ' .$cpdate_list .' left '.$value->number;
            $cpdate_list = '';
        }
        return $list;
    }
}
