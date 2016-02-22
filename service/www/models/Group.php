<?php

namespace app\models;
use yii\helpers\ArrayHelper;

use Yii;

/**
 * This is the model class for table "groups".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $homepage
 * @property integer $is_public
 * @property string $created_on
 * @property string $updated_on
 * @property string $identifier
 * @property integer $status
 * @property integer $lft
 * @property integer $rgt
 */
class Group extends \yii\db\ActiveRecord
{
    /**
    * call back
    */
    
    public function init()
    {
    	if(!parent::init())
    	{
    		return false;
    	}
      
      //
      return true;
    }
    
    public function afterFind()
    {

    	//
    	return parent::afterFind();
    }
    
    public function beforeValidate()
    {
    	if(!parent::beforeValidate())
    	{
    		return false;
    	}
    	
    	
    	//
    	return true;
    }
    
    public function afterValidate()
    {
    	
    	//
    	return parent::afterValidate();
    }

    public function beforeSave($insert = false)
    {
    	if(!parent::beforeSave($insert))
    	{
    		return false;
    	}
    	
    	//
    	return true;
    }
    
    public function afterSave($insert = false, $changedAttributes = null)
    {
    	
    	//
    	return parent::afterSave($insert, $changedAttributes);
    }
    
    public function beforeDelete()
    {
    	if(!parent::beforeDelete())
    	{
    		return false;
    	}
    	
    	//
    	return true;
    }
    
    public function afterDelete()
    {
    	// delete all members;
    	//
    	
    	//
    	return parent::afterDelete();
    }

    /**
    * relations
    */
    public function getUsers()
    {
    	return $this->hasMany(User::className(), ['id' => 'user_id'])->viaTable('group_users', ['group_id' => 'id']);
    }
    
    //
    public function __tostring()
    {
        return "class Principal {"
          ."\n    id = ".$this->id
					."\n    login = ".$this->login
					."\n    hashed_password = ".$this->hashed_password
					."\n    firstname = ".$this->firstname
					."\n    lastname = ".$this->lastname
					."\n    admin = ".$this->admin
					."\n    status = ".$this->status
					."\n    last_login_on = ".$this->last_login_on
					."\n    language = ".$this->language
					."\n    auth_source_id = ".$this->auth_source_id
					."\n    created_on = ".$this->created_on
					."\n    updated_on = ".$this->updated_on
					."\n    type = ".$this->type
					."\n    identity_url = ".$this->identity_url
					."\n    mail_notification = ".$this->mail_notification
					."\n    salt = ".$this->salt
					."\n    must_change_passwd = ".$this->must_change_passwd
					."\n    passwd_changed_on = ".$this->passwd_changed_on
        	."\n}";
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'groups';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['is_public', 'status', 'lft', 'rgt'], 'integer'],
            [['created_on', 'updated_on'], 'safe'],
            [['name', 'homepage', 'identifier'], 'string', 'max' => 255]
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
            'description' => 'Description',
            'homepage' => 'Homepage',
            'is_public' => 'Is Public',
            'created_on' => 'Created On',
            'updated_on' => 'Updated On',
            'identifier' => 'Identifier',
            'status' => 'Status',
            'lft' => 'Lft',
            'rgt' => 'Rgt',
        ];
    }
    
    public static function  sorted()
    {
        return Group::find()->orderBy(['name' => SORT_DESC]);
    }
    
    public static function  named($n = null)
    {
        return Group::find()->where(['name' => $n]);
    }
    
    public static function listGroup()
    {
    	return Group::find()->all();
    }
    
    public static function listId()
    {
    	$groups = Group::listGroup();
    	$group_ids = ArrayHelper::map($groups, 'id', 'name');
    	
    	return $group_ids;
    }
    	
}
