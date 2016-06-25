<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cp_date".
 *
 * @property integer $cpd_id
 * @property string $cpd_date
 * @property string $cpd_time
 * @property integer $cpd_cp
 * @property string $cpd_place
 *
 * @property CouPro $cpdCp
 */
class CpDate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cp_date';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cpd_cp'], 'integer'],
            [['cpd_date', 'cpd_time', 'cpd_place'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cpd_id' => 'Cpd ID',
            'cpd_date' => 'Date',
            'cpd_time' => 'Time',
            'cpd_cp' => 'course-professor',
            'cpd_place' => 'Place',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCpdCp()
    {
        return $this->hasOne(CouPro::className(), ['cp_id' => 'cpd_cp']);
    }

    public function getCpdateList($id)
    {
        $list_t = CpDate::find()->where(['cpd_cp'=>$id])->all();
        $list = '';

        foreach($list_t as $value)
        {
            $list = $list . $this->calDate($value->cpd_date)
                .' '.$value->cpd_time . ' ' . $value->cpd_place . '';
        }
        return $list;
    }

    public function calDate($day)
    {
        switch($day)
        {
            case 1:
                return 'Monday';
            case 2:
                return 'Tuesday';
            case 3:
                return 'Wednsday';
            case 4:
                return 'Thursday';
            case 5:
                return 'Friday';
            case 6:
                return 'Satuday';
            case 7:
                return 'Sunday';
        }
    }

    public static function getList($cp)
    {
        $list = CpDate::find()->where(['cpd_cp'=>$cp])->all();
        $ret_1 = '[';
        $ret_2 = ',[';
        foreach($list as $value)
        {
            $ret_1 = $ret_1 . $value->cpd_time . ',';
            $ret_2 = $ret_2 . $value->cpd_date . ',';
        }
        $ret_1 = substr($ret_1,0,-1);
        $ret_2 = substr($ret_2,0,-1);
        $ret = $ret_1 . ']' . $ret_2 . ']';
        return $ret;
    }
}
