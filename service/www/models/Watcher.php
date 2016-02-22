<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "watchers".
 *
 * @property integer $id
 * @property string $watchable_type
 * @property integer $watchable_id
 * @property integer $user_id
 */
class Watcher extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'watchers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['watchable_id', 'user_id'], 'integer'],
            [['watchable_type'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'watchable_type' => 'Watchable Type',
            'watchable_id' => 'Watchable ID',
            'user_id' => 'User ID',
        ];
    }
}
