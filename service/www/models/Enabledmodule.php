<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "enabled_modules".
 *
 * @property integer $id
 * @property integer $project_id
 * @property string $name
 */
class Enabledmodule extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'enabled_modules';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id'], 'integer'],
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'project_id' => 'Project ID',
            'name' => 'Name',
        ];
    }
}
