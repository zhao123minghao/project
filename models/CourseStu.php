<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "course_stu".
 *
 * @property integer $cs_id
 * @property integer $cs_stu
 * @property integer $cs_cp
 * @property integer $cs_gra
 *
 * @property CouPro $csCp
 * @property Student $csStu
 */
class CourseStu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'course_stu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cs_stu', 'cs_cp', 'cs_gra'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cs_id' => 'Cs ID',
            'cs_stu' => 'Student',
            'cs_cp' => 'Course Professor',
            'cs_gra' => 'Grade',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCsCp()
    {
        return $this->hasOne(CouPro::className(), ['cp_id' => 'cs_cp']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCsStu()
    {
        return $this->hasOne(Student::className(), ['user_id' => 'cs_stu']);
    }
}
