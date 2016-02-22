<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Watcher */

$this->title = 'Create Watcher';
$this->params['breadcrumbs'][] = ['label' => 'Watchers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="watcher-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
