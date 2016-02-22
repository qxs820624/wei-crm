<?php
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require('/myplace/e-working/e-working-service/project-manager/vendor/autoload.php');
require('/myplace/e-working/e-working-service/project-manager/vendor/yiisoft/yii2/Yii.php');

$config = require('/myplace/e-working/e-working-service/project-manager/config/web.php');

(new yii\web\Application($config))->run();

require('/myplace/e-working/e-working-service/project-manager/models/Principal.php');
use app\models\Principal;
use Codeception\Util\Stub;

class PrincipalTest extends \Codeception\TestCase\Test 
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

	public function testMembers()
	{
		$principal = Principal::findOne(5);
		$this->assertNotEquals($principal, null);
		
		$txt = $principal->__tostring()."\n";
		fwrite($this->log_file, $txt);
		

		$members = $principal->members;
		foreach($members as $member)
		{
			$txt = $member->__tostring()."\n";
			fwrite($this->log_file, $txt);
		}
	}
	
	public function testMemberships()
	{
		$principal = Principal::findOne(5);
		$this->assertNotEquals($principal, null);
		
		$txt = $principal->__tostring()."\n";
		fwrite($this->log_file, $txt);
		

		$memberships = $principal->memberships;
		foreach($memberships as $membership)
		{
			$txt = $membership->__tostring()."\n";
			fwrite($this->log_file, $txt);
		}
	}
	
	public function testProjects()
	{
		$principal = Principal::findOne(5);
		$this->assertNotEquals($principal, null);
		
		$txt = $principal->__tostring()."\n";
		fwrite($this->log_file, $txt);
		

		$projects = $principal->projects;
		foreach($projects as $project)
		{
			$txt = $project->__tostring()."\n";
			fwrite($this->log_file, $txt);
		}
	}
	
	public function testIssuecategories()
	{
		$principal = Principal::findOne(5);
		$this->assertNotEquals($principal, null);
		
		$txt = $principal->__tostring()."\n";
		fwrite($this->log_file, $txt);
		

		$issuecategories = $principal->issuecategories;
		foreach($issuecategories as $issuecategory)
		{
			$txt = $issuecategory->__tostring()."\n";
			fwrite($this->log_file, $txt);
		}
	}
	
	public function testScopeActive()
	{
		$principals = Principal::find()->active()->all();
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
		$principals = Principal::find()->visible()->all();
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
		$principals = Principal::find()->like()->all();
		$active_count = count($principals);

		$this->assertNotEquals($active_count, 0);
		

		foreach($principals as $principal)
		{
			$txt = $principal->__tostring()."\n";
			fwrite($this->log_file, $txt);
		}
	}
	
	public function testScopeMember_of()
	{
		$principals = Principal::find()->member_of()->all();
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
		$principals = Principal::find()->not_member_of()->all();
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
		$principals = Principal::find()->sorted()->all();
		$active_count = count($principals);

		$this->assertNotEquals($active_count, 0);
		

		foreach($principals as $principal)
		{
			$txt = $principal->__tostring()."\n";
			fwrite($this->log_file, $txt);
		}
	}
}
?>
