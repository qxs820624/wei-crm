<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property integer $id
 * @property string $login
 * @property string $hashed_password
 * @property string $firstname
 * @property string $lastname
 * @property integer $admin
 * @property integer $status
 * @property string $last_login_on
 * @property string $language
 * @property integer $auth_source_id
 * @property string $created_on
 * @property string $updated_on
 * @property string $type
 * @property string $identity_url
 * @property string $mail_notification
 * @property string $salt
 * @property integer $must_change_passwd
 * @property string $passwd_changed_on
 */
class Principal extends \yii\db\ActiveRecord
{

    const STATUS_ANONYMOUS = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_REGISTERED = 2;
    const STATUS_LOCKED = 3;
    
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
    public function getMembers()
    {
    	return $this->hasMany(Member::className(), ['user_id' => 'id']);
    }
    
    public function getMemberships()
    {
    	return $this->hasMany(Member::className(), ['user_id' => 'id'])->leftJoin('projects', 'projects.id = members.project_id')->where('projects.status <> '.Project::STATUS_ARCHIVED);
    }
    
    public function getProjects()
    {
    	return $this->hasMany(Project::className(), ['id' => 'project_id'])->via('memberships');
    }
    
    public function getIssuecategories()
    {
    	return $this->hasMany(Issuecategory::className(), ['assigned_to_id' => 'id']);
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

    public static function find()
    {
    	return new PrincipalQuery(get_called_class());
    } 
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['admin', 'status', 'auth_source_id', 'must_change_passwd'], 'integer'],
            [['last_login_on', 'created_on', 'updated_on', 'passwd_changed_on'], 'safe'],
            [['login', 'lastname', 'type', 'identity_url', 'mail_notification'], 'string', 'max' => 255],
            [['hashed_password'], 'string', 'max' => 40],
            [['firstname'], 'string', 'max' => 30],
            [['language'], 'string', 'max' => 5],
            [['salt'], 'string', 'max' => 64]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Login',
            'hashed_password' => 'Hashed Password',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'admin' => 'Admin',
            'status' => 'Status',
            'last_login_on' => 'Last Login On',
            'language' => 'Language',
            'auth_source_id' => 'Auth Source ID',
            'created_on' => 'Created On',
            'updated_on' => 'Updated On',
            'type' => 'Type',
            'identity_url' => 'Identity Url',
            'mail_notification' => 'Mail Notification',
            'salt' => 'Salt',
            'must_change_passwd' => 'Must Change Passwd',
            'passwd_changed_on' => 'Passwd Changed On',
        ];
    }

    public function set_default_empty_values()
    {
        $this->login = '';
        $this->hashed_password = '';
        $this->firstname = '';
        $this->lastname = '';
    }
    
    public function isVisible($user = null)
    {
    	$r = Principal::find()->visible($user)->andWhere(['id' => $this->id])->one();
    	if($r == null)
    	{
    		return false;
    	}
    	
    	return true;
    }
}

class PrincipalQuery extends \yii\db\ActiveQuery
{
    public function active()
    {
    	  $this->andWhere(['status' => Principal::STATUS_ACTIVE]);
    	  return $this;
    }
    
    public function visible($user = null)
    {
    	    $visible_user = $user;
    	    if($visible_user == null)
    	    {
    	    	$visible_user = User::current();
    	    }
    	    
    	    if($visible_user->admin)
    	    {
    	    	return $this;
    	    }
    	    
    	    $view_all_active = false;

    	    $memberships = $visible_user->memberships;
					foreach($memberships as $membership)
					{
		    	    $roles = $membership->roles;
							foreach($roles as $role)
							{
								  if($role->users_visibility == 'all')
								  {
								  	  $view_all_active = true;
								  	  break;
								  }
							}
							
							if($view_all_active == true)
							{
								  break;
							}
					}
					
					if($view_all_active == false)
					{
						  if($visible_user->builtin_role()->users_visibility == 'all')
						  {
						  	  $view_all_active = true;
						  }
					}
					
					if($view_all_active == true)
					{
						return $this->active();
					}
					
					return $this;
    }
    
    public function  like($q = null)
    {
    	  if($q == null || strlen($q) <= 0)
    	  {
    	  	  return $this;
    	  }
    	  
    	  $sql = "login like '%".$q."%' or firstname like '%".$q."%' or lastname like '%".$q."%'";
    	  $this->andWhere($sql);
    	  
    	  return $this;
    }
    
    public function  member_of($projects = null)
    {
    	  $sql = "";
    	  if(count($projects) <= 0)
    	  {
    	  	  $sql = "1 = 0";
    	  }
    	  else
    	  {
		    	  $ids = array_map("Project::id", $projects);
		    	  $id_str = "";
						foreach($ids as $id)
						{
							 $id_str = $id_str.$id.','; 
						}
						rtrim($id_str, ",");
						
						$sql = Principal::tableName.".id IN (SELECT DISTINCT user_id FROM ".Member::tableName." WHERE project_id IN (".$id_str."))";
			  }
				
        return $this->active()->andWhere($sql);  
    }
    
    public function  not_member_of($projects = null)
    {
    	  $sql = "";
    	  if(count($projects) <= 0)
    	  {
    	  	  $sql = "1 = 0";
    	  }
    	  else
    	  {
		    	  $ids = array_map("Project::id", $projects);
		    	  $id_str = "";
						foreach($ids as $id)
						{
							 $id_str = $id_str.$id.','; 
						}
						rtrim($id_str, ",");
						
						$sql = Principal::tableName.".id NOT IN (SELECT DISTINCT user_id FROM ".Member::tableName." WHERE project_id IN (".$id_str."))";
			  }
				
        return $this->andWhere($sql);  
    }
    
    public function  sorted()
    {
        $this->orderBy(['login' => SORT_DESC, 'firstname' => SORT_DESC, 'lastname' => SORT_DESC]);
        return $this;
    }

    public function set_default_empty_values()
    {
        $this->login = '';
        $this->hashed_password = '';
        $this->firstname = '';
        $this->lastname = '';
    }
}

