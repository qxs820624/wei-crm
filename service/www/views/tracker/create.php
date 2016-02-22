<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Tracker */

$this->title = 'Create Tracker';
$this->params['breadcrumbs'][] = ['label' => 'Trackers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tracker-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
