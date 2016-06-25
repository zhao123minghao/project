<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "information".
 *
 * @property integer $infor_id
 * @property integer $user_id
 * @property string $message
 * @property integer $status
 */
class Information extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'information';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'status'], 'integer'],
            [['message'], 'string', 'max' => 1024]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'infor_id' => 'Infor ID',
            'user_id' => 'User ID',
            'message' => 'Message',
            'status' => 'Status',
        ];
    }
}
