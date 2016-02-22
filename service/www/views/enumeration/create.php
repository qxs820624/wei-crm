<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Enumeration */

$this->title = 'Create Enumeration';
$this->params['breadcrumbs'][] = ['label' => 'Enumerations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="enumeration-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
