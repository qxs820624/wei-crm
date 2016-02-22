<?php
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require('/myplace/e-working/e-working-service/project-manager/vendor/autoload.php');
require('/myplace/e-working/e-working-service/project-manager/vendor/yiisoft/yii2/Yii.php');

$config = require('/myplace/e-working/e-working-service/project-manager/config/web.php');

(new yii\web\Application($config))->run();

use Codeception\Util\Stub;
use app\models\Principal;
use app\models\User;
use app\models\Setting;

class UserTest extends \Codeception\TestCase\Test 
{
	protected $log_file;
	
	protected function setUp()
	{
		  parent::setUp();
		  $this->log_file = fopen("log.txt", "a+");
	}
	
	protected function tearDown()
	{
		fclose($this->log_file);
		parent::tearDown();
	}
	
	protected function _before()
	{
		  //$this->log_file = fopen("log.txt", "w");
	}
	
	protected function _after()
	{
		  //fclose($this->log_file);
	}
	
	public function testSave()
	{
        $model = new User();
        
        $model->login = "egaotan";
        $model->hashed_password = "egaotan";
        $model->firstname = "gaoyuan";
        $model->lastname = "tan";
        $model->mail_notification = "1";
        $model->language = "zh";
 
      	//
      	$model->admin = 1;
      	$model->status = 1;
      	$model->last_login_on = time();
      	$model->auth_source_id = 1;
      	$model->created_on = time();
      	$model->updated_on = time();
      	$model->type = "admin";
      	$model->identity_url = "ETL";
      	$model->salt = "ttt";
      	$model->must_change_passwd = 1;
      	$model->passwd_changed_on = time();
      	
        //
        //$model->language = Setting::default_language();
        //$model->mail_notification = Setting::default_notification_option();
        
        $save_ret = $model->save();
        
        $post_str = serialize($model->getErrors());
        fwrite($this->log_file, $post_str."\n");
        
        fwrite($this->log_file, $model->__tostring()."\n"); 
        
        //
        $model->delete();
	}

	public function testMembers()
	{
		$user = Principal::findOne(5);
		$this->assertNotEquals($user, null);
		
		$txt = $user->__tostring()."\n";
		fwrite($this->log_file, $txt);
		

		$members = $user->members;
		foreach($members as $member)
		{
			$txt = $member->__tostring()."\n";
			fwrite($this->log_file, $txt);
		}
	}
	
	public function testMemberships()
	{
		$user = Principal::findOne(5);
		$this->assertNotEquals($user, null);
		
		$txt = $user->__tostring()."\n";
		fwrite($this->log_file, $txt);
		

		$memberships = $user->memberships;
		foreach($memberships as $membership)
		{
			$txt = $membership->__tostring()."\n";
			fwrite($this->log_file, $txt);
		}
	}
	
	public function testProjects()
	{
		$user = Principal::findOne(5);
		$this->assertNotEquals($user, null);
		
		$txt = $user->__tostring()."\n";
		fwrite($this->log_file, $txt);
		

		$projects = $user->projects;
		foreach($projects as $project)
		{
			$txt = $project->__tostring()."\n";
			fwrite($this->log_file, $txt);
		}
	}
	
	public function testIssuecategories()
	{
		$user = Principal::findOne(5);
		$this->assertNotEquals($user, null);
		
		$txt = $user->__tostring()."\n";
		fwrite($this->log_file, $txt);
		

		$issuecategories = $user->issuecategories;
		foreach($issuecategories as $issuecategory)
		{
			$txt = $issuecategory->__tostring()."\n";
			fwrite($this->log_file, $txt);
		}
	}
	
	public function testScopeActive()
	{
		$principals = User::find()->active()->all();
		$active_count = count($principals);

		$this->assertNotEquals($active_count, 0);

		foreach($principals as $principal)
		{
			$txt = $principal->__tostring()."\n";
			fwrite($this->log_file, $txt);
		}
	}
	
	public function testScopeVisible()
	{
		$principals = User::find()->visible()->all();
		$active_count = count($principals);

		$this->assertNotEquals($active_count, 0);
		

		foreach($principals as $principal)
		{
			$txt = $principal->__tostring()."\n";
			fwrite($this->log_file, $txt);
		}
	}
	
	public function testScopeLike()
	{
		$query = User::find()->like("egaotan");
		$principals = $query->all();
		
		fwrite($this->log_file, "scope like".$query->sql);
		
		$active_count = count($principals);

		$this->assertEquals($active_count, 1);
		

		foreach($principals as $principal)
		{
			$txt = $principal->__tostring()."\n";
			fwrite($this->log_file, $txt);
		}
	}
	
	public function testScopeMember_of()
	{
		$principals = User::find()->member_of()->all();
		$active_count = count($principals);

		$this->assertNotEquals($active_count, 0);
		

		foreach($principals as $principal)
		{
			$txt = $principal->__tostring()."\n";
			fwrite($this->log_file, $txt);
		}
	}

	public function testScopeNot_member_of()
	{
		$principals = User::find()->not_member_of()->all();
		$active_count = count($principals);

		$this->assertNotEquals($active_count, 0);
		

		foreach($principals as $principal)
		{
			$txt = $principal->__tostring()."\n";
			fwrite($this->log_file, $txt);
		}
	}
	
	public function testScopeSorted()
	{
		$principals = User::find()->sorted()->all();
		$active_count = count($principals);

		$this->assertNotEquals($active_count, 0);
		

		foreach($principals as $principal)
		{
			$txt = $principal->__tostring()."\n";
			fwrite($this->log_file, $txt);
		}
	}
	
	public function testScopeLogged()
	{
		$principals = User::find()->logged()->all();
		$active_count = count($principals);

		$this->assertEquals($active_count, 5);
		

		foreach($principals as $principal)
		{
			$txt = $principal->__tostring()."\n";
			fwrite($this->log_file, $txt);
		}
	}
	
	public function testScopeStatus()
	{
		$principals = User::find()->status(1)->all();
		$active_count = count($principals);

		$this->assertEquals($active_count, 5);
		

		foreach($principals as $principal)
		{
			$txt = $principal->__tostring()."\n";
			fwrite($this->log_file, $txt);
		}
	}
	
	public function testScopeIngroup()
	{
		$principals = User::find()->in_group(4)->all();
		$active_count = count($principals);

		$this->assertEquals($active_count, 6);
		

		foreach($principals as $principal)
		{
			$txt = $principal->__tostring()."\n";
			fwrite($this->log_file, $txt);
		}
	}
	
	public function testDemo()
	{
	  $query = User::find()->logged()->status(1);
	  $query = $query->like("egaotan");
	  $query = $query->in_group(4);
	  $models = $query->all();
    	  
		$active_count = count($models);

		$this->assertEquals($active_count, 1);
		

		foreach($models as $model)
		{
			$txt = $model->__tostring()."\n";
			fwrite($this->log_file, $txt);
		}
	}
}
?>
