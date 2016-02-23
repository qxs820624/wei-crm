<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <h2><?= Html::a('User', ['user/index']); ?> >> View user</h2>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'login',
            'hashed_password',
            'firstname',
            'lastname',
            'admin',
            'status',
            'last_login_on',
            'language',
            'auth_source_id',
            'created_on',
            'updated_on',
            'type',
            'identity_url:url',
            'mail_notification',
            'salt',
            'must_change_passwd',
            'passwd_changed_on',
        ],
    ]) ?>

</div>
