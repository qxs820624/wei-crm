<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Issuestatuse */

$this->title = 'Update Issuestatuse: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Issuestatuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="issuestatuse-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
