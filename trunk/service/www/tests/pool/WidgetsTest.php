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
use yii\helpers\Html;
use yii\widgets\ActiveForm;

class WidgetsTest extends \Codeception\TestCase\Test 
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
	
	public function testActiveForm()
	{
		$model = Principal::findOne(5);
		$this->assertNotEquals($model, null);
		
		$form = ActiveForm::begin([
			'id' => 'login-form',
			'options' => [
				'class' => 'form-horizontal',
			],
		]);
		
		$txt = $form->field($model, 'login');
		fwrite($this->log_file, $txt."\n");
		
		$txt = $form->field($model, 'firstname');
		fwrite($this->log_file, $txt."\n");
		
		$txt = $form->field($model, 'lastname');
		fwrite($this->log_file, $txt."\n");	
		
		ActiveForm::end();
	}
}
?>
