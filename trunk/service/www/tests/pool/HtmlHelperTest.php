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
use yii\helpers\ArrayHelper;

class HtmlHelperTest extends \Codeception\TestCase\Test 
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
	
	public function testForm()
	{
		$model = Principal::findOne(5);
		$this->assertNotEquals($model, null);
		
		$txt = Html::beginForm([
		  '/user/index',
		  'id' => 'login-form'
		],
		'post'
		);
		
		//<form action="codecept.phar?r=user%2Findex&amp;id=login-form" method="post">
		//<input type="hidden" name="_csrf" value="N1l1UjBCbFIBM0c6CANfPA47HxN4GwN/eBYHO3cyL2ACDSU8AxAOBA==">
		fwrite($this->log_file, $txt."\n");
		
		//
		//<label for="Status">Status:</label>
		$txt = Html::label('Status:', 'Status');
		fwrite($this->log_file, $txt."\n");
		
		
		//
		//<select id="status" class="small" name="Status" onchange="this.form.submit(); return false;">
		//<option value="0">all</option>
		//<option value="1"></option>
		//<option value="2">active</option>
		//<option value="4">registered</option>
		//<option value="6" selected>locked</option>
		//</select>

		$list_status = [0 => 'all', 1=> '', 2 => 'active', 4 => 'registered', 6 => 'locked'];
		$list_status = ArrayHelper::merge([null => '            '], $list_status);
		
		$txt = Html::dropDownList('Status', null, $list_status, [
		    'onchange' => "this.form.submit(); return false;",
		    'id' => "status",
		    'class' => "small",
		]);
		fwrite($this->log_file, $txt."\n");
		
		
		//
		//<input type="text" id="name" name="name" size="30">
		$txt = Html::textInput('name', null, [
		    'id' => 'name',
		    'size' => '30',
		]);
		fwrite($this->log_file, $txt."\n");
		
		//
		//<input type="submit" class="small" value="Apply">
		$txt = Html::submitInput('Apply', [
		    'class' => 'small',
		]);
		fwrite($this->log_file, $txt."\n");
		
		//
		//<a class="icon icon-reload" href="codecept.phar?r=user%2Findex">Clear</a>
		$txt = Html::a('Clear', [
		    '/user/index',
		    'group_id' => 1,
		    'name' => 'egaotan',
		    'sort' => 'login desc'
		], [
		    'class' => 'icon icon-reload',
		]);
		fwrite($this->log_file, $txt."\n");
		
		//
		//</form>
		$txt = Html::endForm();
		fwrite($this->log_file, $txt."\n");
	}
	
	public function testDemo()
	{
		$query = ['1', '2', '3'];
		$count = 0;
		
		foreach ($query as $model) {
			$count ++;
			
			if($count / 2 == 0)
			  $tr = "user active odd";
			else
			  $tr = "user active even";
			} 
	}
}
?>
