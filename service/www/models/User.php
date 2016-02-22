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
class User extends Principal
{
	  public $group_id;
	  public $name;

    public function init()
    {
    	if(!parent::init())
    	{
    		return false;
    	}
      
      $this->set_default_empty_values();
      
      //
      return true;
    }

    /**
    * relations
    */
    public function getGroups()
    {
    	return $this->hasMany(Group::className(), ['id' => 'group_id'])->viaTable('group_users', ['user_id' => 'id']);
    }
    
    public function getChangesets()
    {
    	return $this->hasMany(Changeset::className(), ['user_id' => 'id']);
    }
    
    public function getUserpreferences()
    {
    	return $this->hasMany(Userpreference::className(), ['user_id' => 'id']);
    }
    
    public function getEmailaddresses()
    {
    	return $this->hasMany(Emailaddress::className(), ['user_id' => 'id']);
    }
    
    public function getEmailaddress()
    {
			$emailaddresses = $this->emailaddresses;
			$emailaddress = current($emailaddresses);
			$eamiladdress_str = "";
			
			if($emailaddress != null) {
			  $emailaddress_str = $emailaddress->address;
			}
			else {
				$emailaddress_str = "";
			}
			
			return $emailaddress_str;
		}
    
    public static function find()
    {
    	return new UserQuery(get_called_class());
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
    
    public function builtin_role()
    {
    	  return Role::find()->where("builtin = 2");
    }
    
    public function reload()
    {
    	
    }
    
    public function isAdmin()
    {
    	return $this->admin;
    }
    
    public function generatePassword()
    {
    	$password_length = Setting::password_min_length() + 4;
    	$charPool = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789_#";
    	$pass = array();
    	$length = strlen($charPool) - 1;
    	
    	for($i = 0;$i < $password_length;$i ++)
    	{
    		$n = rand(0, $length);
    		$pass[] = $charPool[$n];
    	}
    	
    	return implode($pass);
    }
    
    public static function current()
    {
    	return User::find()->current()->one();
    }
    
    public static function listStatus()
    {
    	return [
    	    0 => "anonymous",
    	    1 => "active",
    	    2 => "registered",
    	    3 => "locked",
    	];
    }
}

class UserQuery extends PrincipalQuery
{
    public function logged()
    {
    	$this->andWhere('status <> '.User::STATUS_ANONYMOUS);
    	return $this;
    }
    
    public function status($s = null)
    {
    	if($s != null)
    	{
    		$this->andWhere(['status' => $s]);
    	}
    	
    	return $this;
    }
    
    public function in_group($group_id = null)
    {
    	if($group_id != null)
    	{
				//$this->via('groups')->where(['groups.id' => $group_id]);
				$this->rightJoin('group_users', 'users.id = group_users.user_id')->andWhere(['group_users.group_id' => $group_id]);
	    }
	    
	    return $this;
    }

    public function not_in_group($group_id = null)
    {
    	if($group_id != null)
    	{
	    	//$this->via('groups')->where('groups.id <> '.$group_id);
	    	$this->innerJoin('group_users', 'users.id = group_users.user_id')->andWhere('group_users.group_id <> '.$group_id);
	    }
	    
	    return $this;
    }
    
    public function sorted()
    {
    	$this->orderBy(['login' => SORT_DESC, 'firstname' => SORT_DESC, 'lastname' => SORT_DESC]);
    	return $this;
    }
    
    public function current()
    {
    	  return $this->anonymous();
    }
    
    public function anonymous()
    {
    	  $this->where(['type' => 'AnonymousUser']);
    	  return $this;
    }
}
