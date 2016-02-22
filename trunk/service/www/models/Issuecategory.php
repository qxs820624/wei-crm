<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "issue_categories".
 *
 * @property integer $id
 * @property integer $project_id
 * @property string $name
 * @property integer $assigned_to_id
 */
class Issuecategory extends \yii\db\ActiveRecord
{
    public function __tostring()
    {
        return "class Issuecategory {"
            ."\n    id = ".$this->id
            ."\n    project_id = ".$this->project_id
            ."\n    name = ".$this->name
            ."\n    assigned_to_id = ".$this->assigned_to_id
            ."\n}";
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'issue_categories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id', 'assigned_to_id'], 'integer'],
            [['name'], 'string', 'max' => 60]
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
            'assigned_to_id' => 'Assigned To ID',
        ];
    }
}
