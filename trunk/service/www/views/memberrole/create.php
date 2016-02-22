<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MemberRole */

$this->title = 'Create Member Role';
$this->params['breadcrumbs'][] = ['label' => 'Member Roles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="member-role-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
