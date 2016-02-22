<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "projects".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $homepage
 * @property integer $is_public
 * @property integer $parent_id
 * @property string $created_on
 * @property string $updated_on
 * @property string $identifier
 * @property integer $status
 * @property integer $lft
 * @property integer $rgt
 * @property integer $inherit_members
 * @property integer $default_version_id
 */
class Project extends \yii\db\ActiveRecord
{
	
    const STATUS_ACTIVE = 1;
    const STATUS_CLOSED = 5;
    const STATUS_ARCHIVED = 9;

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
    	
    	return parent::afterFind();
    }
    
    public function beforeValidate()
    {
    	if(!parent::beforeValidate())
    	{
    		return false;
    	}
    	
    	return true;
    }
    
    public function afterValidate()
    {
    	return parent::afterValidate();
    }

    public function beforeSave($insert = false)
    {
    	if(!parent::beforeSave($insert))
    	{
    		return false;
    	}
    	
    	return true;
    }
    
    public function afterSave($insert = false, $changedAttributes = null)
    {
    	return parent::afterSave($insert, $changedAttributes);
    }
    
    public function beforeDelete()
    {
    	if(!parent::beforeDelete())
    	{
    		return false;
    	}
    	
    	return true;
    }
    
    public function afterDelete()
    {
    	
    	return parent::afterDelete();
    	
    }

    /**
    * relations
    */
    public function getMembers()
    {
    	return $this->hasMany(Member::className(), ['project_id' => 'id'])->leftJoin('users', 'users.id = members.user_id')->where('users.status = '.User::STATUS_ACTIVE);
    }
    
    public function getMemberships()
    {
    	return $this->hasMany(Member::className(), ['project_id' => 'id']);
    }
    
    public function getEnabledmodules()
    {
    	return $this->hasMany(Enabledmodule::className(), ['project_id' => 'id']);
    }
    
    public function getIssues()
    {
    	return $this->hasMany(Issue::className(), ['project_id' => 'id']);
    }
    
    //
    public function __tostring()
    {
        return "class Project {"
          ."\n    id = ".$this->id
					."\n    name = ".$this->name
					."\n    description = ".$this->description
					."\n    homepage = ".$this->homepage
					."\n    is_public = ".$this->is_public
					."\n    parent_id = ".$this->parent_id
					."\n    created_on = ".$this->created_on
					."\n    updated_on = ".$this->updated_on
					."\n    identifier = ".$this->identifier
					."\n    status = ".$this->status
					."\n    lft = ".$this->lft
					."\n    rgt = ".$this->rgt
					."\n    inherit_members = ".$this->inherit_members
					."\n    default_version_id = ".$this->default_version_id
        	."\n}";
    }

    public static function find()
    {
    	return new ProjectQuery(get_called_class());
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'projects';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['is_public', 'parent_id', 'status', 'lft', 'rgt', 'inherit_members', 'default_version_id'], 'integer'],
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
            'parent_id' => 'Parent ID',
            'created_on' => 'Created On',
            'updated_on' => 'Updated On',
            'identifier' => 'Identifier',
            'status' => 'Status',
            'lft' => 'Lft',
            'rgt' => 'Rgt',
            'inherit_members' => 'Inherit Members',
            'default_version_id' => 'Default Version ID',
        ];
    }

    public static function id()
    {
    	  return $this->id;
    }
}

class ProjectQuery extends \yii\db\ActiveQuery
{
    public function visible()
    {
    	  return $this;
    }
}
