<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Wikicontent */

$this->title = 'Update Wikicontent: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Wikicontents', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="wikicontent-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
