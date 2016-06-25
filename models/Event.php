<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "event".
 *
 * @property integer $e_id
 * @property string $event
 * @property string $e_start
 * @property string $e_end
 */
class Event extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'event';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['e_id'], 'required'],
            [['e_id'], 'integer'],
            [['e_start', 'e_end'], 'safe'],
            [['event'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'e_id' => 'Event ID',
            'event' => 'Event',
            'e_start' => 'Event Start Date',
            'e_end' => 'Event End Date',
        ];
    }
}
