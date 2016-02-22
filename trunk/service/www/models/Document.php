<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "documents".
 *
 * @property integer $id
 * @property integer $project_id
 * @property integer $category_id
 * @property string $title
 * @property string $description
 * @property string $created_on
 */
class Document extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'documents';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id', 'category_id'], 'integer'],
            [['description'], 'string'],
            [['created_on'], 'safe'],
            [['title'], 'string', 'max' => 255]
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
            'category_id' => 'Category ID',
            'title' => 'Title',
            'description' => 'Description',
            'created_on' => 'Created On',
        ];
    }
}
