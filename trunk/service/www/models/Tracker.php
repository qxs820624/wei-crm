<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "trackers".
 *
 * @property integer $id
 * @property string $name
 * @property integer $is_in_chlog
 * @property integer $position
 * @property integer $is_in_roadmap
 * @property integer $fields_bits
 * @property integer $default_status_id
 */
class Tracker extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trackers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['is_in_chlog', 'position', 'is_in_roadmap', 'fields_bits', 'default_status_id'], 'integer'],
            [['name'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'is_in_chlog' => 'Is In Chlog',
            'position' => 'Position',
            'is_in_roadmap' => 'Is In Roadmap',
            'fields_bits' => 'Fields Bits',
            'default_status_id' => 'Default Status ID',
        ];
    }
}
