<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<?= Html::beginForm(['user/create'], 'post', [ 'id' => "new_user", 'class' => "new_user"]); ?>

<div id "user_form">
	<div class="splitcontentleft">
		<fieldset class="box tabular">
			<legend>Info</legend>
			<p> <?= Html::label('login name', 'user_login'); ?> <span class="required"> *</span> <?= Html::textInput('User[login]', $model->login, ['id' => 'user_login', 'size' => '25']); ?></p>
			<p> <?= Html::label('first name', 'user_firstname'); ?> <span class="required"> *</span> <?= Html::textInput('User[firstname]', $model->firstname, ['id' => 'user_firstname']); ?></p>
			<p> <?= Html::label('last name', 'user_lastname'); ?> <span class="required"> *</span> <?= Html::textInput('User[lastname]', $model->lastname, ['id' => 'user_lastname']); ?></p>
			<p> <?= Html::label('email', 'user_mail'); ?> <span class="required"> *</span> <?= Html::textInput('User[mail]', $model->emailaddress, ['id' => 'user_mail']); ?></p>
			<p> <?= Html::label('language', 'user_language'); ?>
				  <?= Html::dropDownList('User[language]', $model->language, $languages, [
    		    'id' => "user_language",
    		]) ?>
    	</p>
    	<p> <?= Html::label('admin', 'user_admin'); ?> <?= Html::checkbox('User[admin]', $model->isAdmin(), ['id' => "user_admin"]); ?></p>
		</fieldset>
		
		<fieldset class="box tabular">
			<legend>Auth</legend>
			<div id="password_fields" style="">
				<p> <?= Html::label('password', 'user_password'); ?> <span class="required"> *</span> <?= Html::textInput('User[password]', '', ['id' => 'user_password', 'type' => 'password', 'size' => '25']); ?>
				<em class="info"> 8 characters at least</em> </p>
				<p> <?= Html::label('confirm', 'user_password_confirmation'); ?> <span class="required"> *</span> <?= Html::textInput('User[password_confirmation]', '', ['id' => 'user_password_confirmation', 'type' => 'password', 'size' => '25']); ?></p>
				<p> <?= Html::label('generate password', 'user_generate_password'); ?> <?= Html::checkbox('User[generate_password]', false, ['id' => "user_generate_password"]); ?></p>
				<p> <?= Html::label('must change password', 'user_must_change_passwd'); ?> <?= Html::checkbox('User[must_change_passwd]', $model->must_change_passwd, ['id' => "user_must_change_passwd"]); ?></p>
			</div>
		</fieldset>
	</div>
	
	<div class="splitcontentright">
		<fieldset class="box">
			<legend> mail notification</legend>
<p>
	<?= Html::label('email nofication set', 'user_mail_notification', ['class' => "hidden-for-sighted"]); ?>
	<?= Html::dropDownList('User[mail_notification]', $model->mail_notification, $mail_notifications, [
	    'id' => "user_mail_notification",
	]) ?>
</p>

</fieldset>

<fieldset class="box tabular">
  <legend>setting</legend>
  
  <p> <?= Html::label('hide my mail', 'pref_hide_mail'); ?> <?= Html::checkbox('pref_hide_mail', false, ['id' => "pref_hide_mail"]); ?></p>
  <p> <?= Html::label('time zone', 'pref_time_zone'); ?> 
  		<?= Html::dropDownList('pref_time_zone', null, $time_zones, [
	    	'id' => "pref_time_zone",
			]) ?>
	</p>
  
  <p> <?= Html::label('show comments', 'pref_comments_sorting'); ?> 
  		<?= Html::dropDownList('pref_comments_sorting', null, $time_zones, [
	    	'id' => "pref_comments_sorting",
			]) ?>
	</p>

	<p> <?= Html::label('warn on leaving', 'pref_warn_on_leaving_unsaved'); ?> <?= Html::checkbox('pref_warn_on_leaving_unsaved', false, ['id' => "pref_warn_on_leaving_unsaved"]); ?></p>

		</fieldset>
	</div>
	
</div>

<div style="clear:left;">
</div>

<script>
	$(document).ready(function(){
	  $('#user_generate_password').change(function(){
	    var passwd = $('#user_password, #user_password_confirmation');
	    if ($(this).is(':checked')){
	      passwd.val('').attr('disabled', true);
	    }else{
	      passwd.removeAttr('disabled');
	    }
	  }).trigger('change');
	});
</script>

<p>
	<?php if($model->isNewRecord) { ?>
		<?= Html::submitInput('Create', ['name' => 'commit',]); ?>
		<?= Html::submitInput('Create and continue', ['name' => 'continue',]); ?>
	<?php } else { ?>
		<?= Html::submitInput('Save', ['name' => 'commit',]); ?>
	<?php } ?>
</p>

<?= Html::endForm() ?>