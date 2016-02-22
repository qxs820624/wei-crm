<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "members".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $project_id
 * @property string $created_on
 * @property integer $mail_notification
 */
class Member extends \yii\db\ActiveRecord
{

    public function __tostring()
    {
        return "class Member {"
            ."\n    id = ".$this->id
            ."\n    user_id = ".$this->user_id
            ."\n    project_id = ".$this->project_id
            ."\n    created_on = ".$this->created_on
            ."\n    mail_notification = ".$this->mail_notification
            ."\n}";
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'members';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'project_id', 'mail_notification'], 'integer'],
            [['created_on'], 'safe'],
            [['user_id', 'project_id'], 'unique', 'targetAttribute' => ['user_id', 'project_id'], 'message' => 'The combination of User ID and Project ID has already been taken.']
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
            'project_id' => 'Project ID',
            'created_on' => 'Created On',
            'mail_notification' => 'Mail Notification',
        ];
    }
}
