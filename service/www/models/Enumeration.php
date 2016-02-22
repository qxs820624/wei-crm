<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "enumerations".
 *
 * @property integer $id
 * @property string $name
 * @property integer $position
 * @property integer $is_default
 * @property string $type
 * @property integer $active
 * @property integer $project_id
 * @property integer $parent_id
 * @property string $position_name
 */
class Enumeration extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'enumerations';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['position', 'is_default', 'active', 'project_id', 'parent_id'], 'integer'],
            [['name', 'position_name'], 'string', 'max' => 30],
            [['type'], 'string', 'max' => 255]
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
            'position' => 'Position',
            'is_default' => 'Is Default',
            'type' => 'Type',
            'active' => 'Active',
            'project_id' => 'Project ID',
            'parent_id' => 'Parent ID',
            'position_name' => 'Position Name',
        ];
    }
}
