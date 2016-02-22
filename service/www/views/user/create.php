<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = 'Register';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<h2><?= Html::a('User', ['user/index']); ?> >> Create user</h2>

<?= $this->render('_form', [
    'model' => $model,
    'languages' => $languages,
    'mail_notifications' => $mail_notifications,
    'time_zones' => $time_zones,
]); ?>

