<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
<meta charset="<?= Yii::$app->charset ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge"/> 
<title><?= Html::encode($this->title) ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="description" content="<?php $this->head() ?>" />
<meta name="keywords" content="issue,bug,tracker" />

<link rel="shortcut icon" href="<?php echo Yii::$app->request->baseUrl; ?>/favicon.ico" />
<link rel="stylesheet" media="all" href="<?php echo Yii::$app->request->baseUrl; ?>/stylesheets/jquery/jquery-ui-1.11.0.css" />
<link rel="stylesheet" media="all" href="<?php echo Yii::$app->request->baseUrl; ?>/stylesheets/application.css" />
<link rel="stylesheet" media="all" href="<?php echo Yii::$app->request->baseUrl; ?>/stylesheets/responsive.css" />

<script src="<?php echo Yii::$app->request->baseUrl; ?>/javascripts/jquery-1.11.1-ui-1.11.0-ujs-3.1.4.js"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/javascripts/application.js"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/javascripts/responsive.js"></script>
<script src="/javascripts/jstoolbar/jstoolbar-textile.min.js"></script><script src="/javascripts/jstoolbar/lang/jstoolbar-en.js"></script><link rel="stylesheet" media="screen" href="/stylesheets/jstoolbar.css" />    <script src="/javascripts/project_identifier.js"></script>
</head>
<body class="controller-welcome action-index">
<div id="wrapper">
	<div class="flyout-menu js-flyout-menu">
	</div>
	
<div id="wrapper2">
<div id="wrapper3">
<div id="top-menu">
    <div id="account">
			 <ul><li><a class="login" href="/login">Logon</a></li>
					<li><a class="register" href="/account/register">Register</a></a></li></ul>
		</div>
		
		<div id="loggedas">
		</div>

		<ul><li><a class="home" href="/">Home</a></li>
				<li><a class="projects" href="/projects">Project</a></li>
				<li><a class="help" href="https://www.redmine.org/guide">Help</a></li>
		</ul>
</div>

<div id="header">

						<a href="#" class="mobile-toggle-button js-flyout-menu-toggle-button"></a>

						<div id="quick-search">
							<form action="/search" accept-charset="UTF-8" method="get">
								<input name="utf8" type="hidden" value="&#x2713;" />

								<label for='q'>
									<a accesskey="4" href="/search">Search</a>:
								</label>
								<input type="text" name="q" id="q" size="20" class="small" accesskey="f" />
							</form>
						</div>

						<h1>Redmine</h1>

</div>

					<div id="main">
							<div id="sidebar">
								<h3>Administration</h3>
								<div id="admin-menu">
									<ul><li><a class="projects" href="?r=project/index">Projects</a></li>
									<li><a class="users selected" href="?r=user/index">Users</a></li>
									<li><a class="groups" href="/groups">Groups</a></li>
									<li><a class="roles" href="/roles">Roles and permissions</a></li>
									<li><a class="trackers" href="/trackers">Trackers</a></li>
									<li><a class="issue_statuses issue-statuses" href="/issue_statuses">Issue statuses</a></li>
									<li><a class="workflows" href="/workflows/edit">Workflow</a></li>
									<li><a class="custom_fields custom-fields" href="/custom_fields">Custom fields</a></li>
									<li><a class="enumerations" href="/enumerations">Enumerations</a></li>
									<li><a class="settings" href="/settings">Settings</a></li>
									<li><a class="server_authentication ldap-authentication" href="/auth_sources">LDAP authentication</a></li>
									<li><a class="plugins" href="/admin/plugins">Plugins</a></li>
									<li><a class="info" href="/admin/info">Information</a></li></ul>
								</div>
							</div>

					    <div id="content">
					        <?= $content ?>
					    </div>
						</div>
					</div>

<div id="ajax-indicator" style="display:none;"><span>Loading...</span></div>
<div id="ajax-modal" style="display:none;"></div>
    
<div id="footer">
  <div class="bgl"><div class="bgr">
    Powered by <a href="https://www.redmine.org/">Redmine</a> &copy; 2006-2015 Jean-Philippe Lang
  </div></div>
</div>
</div>
</div>
</body>
</html>
