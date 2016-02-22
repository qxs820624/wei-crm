<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "wikis".
 *
 * @property integer $id
 * @property integer $project_id
 * @property string $start_page
 * @property integer $status
 */
class Wiki extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'wikis';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id', 'start_page'], 'required'],
            [['project_id', 'status'], 'integer'],
            [['start_page'], 'string', 'max' => 255]
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
            'start_page' => 'Start Page',
            'status' => 'Status',
        ];
    }
}
