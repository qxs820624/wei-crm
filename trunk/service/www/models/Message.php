<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "messages".
 *
 * @property integer $id
 * @property integer $board_id
 * @property integer $parent_id
 * @property string $subject
 * @property string $content
 * @property integer $author_id
 * @property integer $replies_count
 * @property integer $last_reply_id
 * @property string $created_on
 * @property string $updated_on
 * @property integer $locked
 * @property integer $sticky
 */
class Message extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'messages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['board_id', 'created_on', 'updated_on'], 'required'],
            [['board_id', 'parent_id', 'author_id', 'replies_count', 'last_reply_id', 'locked', 'sticky'], 'integer'],
            [['content'], 'string'],
            [['created_on', 'updated_on'], 'safe'],
            [['subject'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'board_id' => 'Board ID',
            'parent_id' => 'Parent ID',
            'subject' => 'Subject',
            'content' => 'Content',
            'author_id' => 'Author ID',
            'replies_count' => 'Replies Count',
            'last_reply_id' => 'Last Reply ID',
            'created_on' => 'Created On',
            'updated_on' => 'Updated On',
            'locked' => 'Locked',
            'sticky' => 'Sticky',
        ];
    }
}
