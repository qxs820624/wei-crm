<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Enabledmodule */

$this->title = 'Update Enabledmodule: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Enabledmodules', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="enabledmodule-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
