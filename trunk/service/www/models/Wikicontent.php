<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "wiki_contents".
 *
 * @property integer $id
 * @property integer $page_id
 * @property integer $author_id
 * @property string $text
 * @property string $comments
 * @property string $updated_on
 * @property integer $version
 */
class Wikicontent extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'wiki_contents';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['page_id', 'updated_on', 'version'], 'required'],
            [['page_id', 'author_id', 'version'], 'integer'],
            [['text'], 'string'],
            [['updated_on'], 'safe'],
            [['comments'], 'string', 'max' => 1024]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'page_id' => 'Page ID',
            'author_id' => 'Author ID',
            'text' => 'Text',
            'comments' => 'Comments',
            'updated_on' => 'Updated On',
            'version' => 'Version',
        ];
    }
}
