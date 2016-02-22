<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Enumeration */

$this->title = 'Update Enumeration: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Enumerations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="enumeration-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
