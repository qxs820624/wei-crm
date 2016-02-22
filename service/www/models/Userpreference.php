<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_preferences".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $others
 * @property integer $hide_mail
 * @property string $time_zone
 */
class Userpreference extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_preferences';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'hide_mail'], 'integer'],
            [['others'], 'string'],
            [['time_zone'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'others' => 'Others',
            'hide_mail' => 'Hide Mail',
            'time_zone' => 'Time Zone',
        ];
    }
}
