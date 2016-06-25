<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "department".
 *
 * @property integer $depart_id
 * @property string $depart_name
 *
 * @property Course[] $courses
 * @property Professor[] $professors
 */
class Department extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'department';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['depart_id', 'depart_name'], 'required'],
            [['depart_id'], 'integer'],
            [['depart_name'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'depart_id' => 'Depart ID',
            'depart_name' => 'Depart Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourses()
    {
        return $this->hasMany(Course::className(), ['cou_depart' => 'depart_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfessors()
    {
        return $this->hasMany(Professor::className(), ['pro_depart' => 'depart_id']);
    }

    public function getDepartList()
    {
        $Departs_t = Department::find()->all();
        $Departs = array();
        foreach($Departs_t as $value)
        {
            $Departs[$value->depart_id] = $value->depart_name;
        }
        return $Departs;
    }
}
