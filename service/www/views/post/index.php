<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="contextual">
	
	<?= Html::a('Create User', ['user/create'], ['class' => 'icon icon-add']); ?>
	
</div>

<h2>Users</h2>

<?= Html::beginForm(['user/index', 'id' => "new_user"], 'get'); ?>
    
    <fieldset><legend>Filters</legend>
    	
    		<?= Html::label('Status: ', 'status'); ?>
    		
    		<?php $list_user_status = ArrayHelper::merge([null => 'all'], $list_user_status); ?>
    		<?= Html::dropDownList('status', $status, $list_user_status, [
    		    'onchange' => "this.form.submit(); return false;",
    		    'id' => "ststus",
    		    'class' => "small",
    		]); ?>
    		
    		<?= Html::label('Group: ', 'group_id'); ?>
    		
    		<?php $list_group_id = ArrayHelper::merge([null => 'all'], $list_group_id); ?>
    		<?= Html::dropDownList('group_id', $group_id, $list_group_id, [
    		    'onchange' => "this.form.submit(); return false;",
    		    'id' => "group_id",
    		]) ?>
    		
    		<?= Html::label('User: ', 'name'); ?>
    		
    		<?= Html::textInput('name', $name, [
    		    'id' => 'name',
    		    'size' => '30',
    		]); ?>
    		
    		<?= Html::submitInput('Apply', [
    		    'class' => 'small',
    		]); ?>
    		
    		<?= Html::a('Clear', [
    		    'user/index',
    		], [
    		    'class' => 'icon icon-reload',
    		]); ?>
    	
    </fieldset>
    
<?= Html::endForm() ?>

<div class="autoscroll">
    
    <table class="list">
    	<thead>
    		<tr>
    			<?php if($sort_by == "login") { 
    				if($sort == "asc") {
    				?>
    			<th title="Sort by Login"> <?= Html::a('Login', ['user/index', 'sort_by' => 'login', 'sort' => 'desc', 'name' => $name, 'status' => $status, 'group_id' => $group_id], ['class' => 'sort asc']); ?> </th>
    			<?php } else { ?>
    			<th title="Sort by Login"> <?= Html::a('Login', ['user/index' ,'sort_by' => 'login', 'sort' => 'asc', 'name' => $name, 'status' => $status, 'group_id' => $group_id], ['class' => 'sort desc']); ?> </th>
    			<?php }} else { ?>
    			<th title="Sort by Login"> <?= Html::a('Login', ['user/index', 'sort_by' => 'login', 'sort' => 'desc', 'name' => $name, 'status' => $status, 'group_id' => $group_id]); ?> </th>
    			<?php } ?>
    			
    			<?php if($sort_by == "firstname") { 
    				if($sort == "asc") {
    				?>
    			<th title="Sort by First name"> <?= Html::a('First name', ['user/index','sort_by' => 'firstname',  'sort' => 'desc', 'name' => $name, 'status' => $status, 'group_id' => $group_id], ['class' => 'sort asc']); ?> </th>
    			<?php } else { ?>
    			<th title="Sort by First name"> <?= Html::a('First name', ['user/index','sort_by' => 'firstname',  'sort' => 'asc', 'name' => $name, 'status' => $status, 'group_id' => $group_id], ['class' => 'sort desc']); ?> </th>
    			<?php }} else { ?>
    			<th title="Sort by First name"> <?= Html::a('First name', ['user/index','sort_by' => 'firstname',  'sort' => 'asc', 'name' => $name, 'status' => $status, 'group_id' => $group_id]); ?> </th>
    			<?php } ?>
    			
    			
    			<?php if($sort_by == "lastname") { 
    				if($sort == "asc") {
    				?>
    			<th title="Sort by Last name"> <?= Html::a('Last name', ['user/index','sort_by' => 'lastname',  'sort' => 'desc', 'name' => $name, 'status' => $status, 'group_id' => $group_id], ['class' => 'sort asc']); ?> </th>
    			<?php } else { ?>
    			<th title="Sort by Last name"> <?= Html::a('Last name', ['user/index','sort_by' => 'lastname',  'sort' => 'asc', 'name' => $name, 'status' => $status, 'group_id' => $group_id], ['class' => 'sort desc']); ?> </th>
    			<?php }} else { ?>
    			<th title="Sort by Last name"> <?= Html::a('Last name', ['user/index','sort_by' => 'lastname',  'sort' => 'desc', 'name' => $name, 'status' => $status, 'group_id' => $group_id]); ?> </th>
    			<?php } ?>
    			
    			<th>Email</th>
 
    			<?php if($sort_by == "admin") { 
    				if($sort == "asc") {
    				?>
    			<th title="Sort by Administrator"> <?= Html::a('Administrator', ['user/index','sort_by' => 'admin',  'sort' => 'desc', 'name' => $name, 'status' => $status, 'group_id' => $group_id], ['class' => 'sort asc']); ?> </th>
    			<?php } else { ?>
    			<th title="Sort by Administrator"> <?= Html::a('Administrator', ['user/index','sort_by' => 'admin',  'sort' => 'asc', 'name' => $name, 'status' => $status, 'group_id' => $group_id], ['class' => 'sort desc']); ?> </th>
    			<?php }} else { ?>
    			<th title="Sort by Administrator"> <?= Html::a('Administrator', ['user/index','sort_by' => 'admin',  'sort' => 'desc', 'name' => $name, 'status' => $status, 'group_id' => $group_id]); ?> </th>
    			<?php } ?>
    			
    			
    			<?php if($sort_by == "created_on") { 
    				if($sort == "asc") {
    				?>
    			<th title="Sort by Created"> <?= Html::a('Created', ['user/index', 'sort_by' => 'created_on', 'sort' => 'desc', 'name' => $name, 'status' => $status, 'group_id' => $group_id], ['class' => 'sort asc']); ?> </th>
    			<?php } else { ?>
    			<th title="Sort by Created"> <?= Html::a('Created', ['user/index', 'sort_by' => 'created_on', 'sort' => 'asc', 'name' => $name, 'status' => $status, 'group_id' => $group_id], ['class' => 'sort desc']); ?> </th>
    			<?php }} else { ?>
    			<th title="Sort by Created"> <?= Html::a('Created', ['user/index', 'sort_by' => 'created_on', 'sort' => 'desc', 'name' => $name, 'status' => $status, 'group_id' => $group_id]); ?> </th>
    			<?php } ?>
    			
    			<?php if($sort_by == "last_login_on") { 
    				if($sort == "asc") {
    				?>
    			<th title="Sort by  Last connection"> <?= Html::a(' Last connection', ['user/index', 'sort_by' => 'last_login_on', 'sort' => 'desc', 'name' => $name, 'status' => $status, 'group_id' => $group_id], ['class' => 'sort asc']); ?> </th>
    			<?php } else { ?>
    			<th title="Sort by  Last connection"> <?= Html::a(' Last connection', ['user/index', 'sort_by' => 'last_login_on', 'sort' => 'asc', 'name' => $name, 'status' => $status, 'group_id' => $group_id], ['class' => 'sort desc']); ?> </th>
    			<?php }} else { ?>
    			<th title="Sort by  Last connection"> <?= Html::a(' Last connection', ['user/index', 'sort_by' => 'last_login_on', 'sort' => 'desc', 'name' => $name, 'status' => $status, 'group_id' => $group_id]); ?> </th>
    			<?php } ?>

    			<th>  </th>
    		</tr>
    	</thead>
    	<tbody>

<?php
$count = 0;
foreach ($models as $model) {
	$count ++;
	if($count%2 == 0) {
		$tr = "user active odd";
	}
	else {
		$tr = "user active even";
	}
?>
	    		<tr class="<?php echo $tr ?>">
	    			<td class="username"> <?= Html::a($model->login, ['user/update', 'id' => $model->id]);  ?> </td>
	    			<td class="firstname"><?php echo $model->firstname ?></td>
	    			<td class="lastname"><?php echo $model->lastname ?></td>
	    			<?php
	    			$emailaddresses = $model->emailaddresses;
	    			$emailaddress = current($emailaddresses);
	    			$eamiladdress_str = "";
	    			if($emailaddress != null) {
	    			  $emailaddress_str = $emailaddress->address;
	    			}
	    			else {
	    				$emailaddress_str = "";
	    			}
	    			?>
	    			<td class="email"> <?= Html::a($emailaddress_str, [$emailaddress_str]); ?></td>
	    			<td class="tick"><?php echo $model->admin ?></td>
	    			<td class="created_on"><?php echo $model->created_on ?></td>
	    			<td class="last_login_on"><?php echo $model->last_login_on ?></td>
				    <td class="buttons">
				    	<?php if($model->status == 3) { ?>
				    	<?= Html::a("Unlock", ['user/status', 'id' => $model->id, 'status' => 1], ['class' => "icon icon-unlock", 'rel' => "nofollow", 'data-method' => "put"]); ?>
				      <?php } else { ?>
				    	<?= Html::a("Lock", ['user/status', 'id' => $model->id, 'status' => 3], ['class' => "icon icon-lock", 'rel' => "nofollow", 'data-method' => "put"]); ?>
				      <?php } ?>
				    	<?= Html::a("Delete", ['user/delete', 'id' => $model->id], ['class' => "icon icon-del", 'data-confirm' => "Are you sure?", 'rel' => "nofollow", 'data-method' => "delete"]); ?>
				    </td>
	    		</tr>
<?php } ?>

    	</tbody>
    </table>

</div>
