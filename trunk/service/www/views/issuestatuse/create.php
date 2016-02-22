<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Issuestatuse */

$this->title = 'Create Issuestatuse';
$this->params['breadcrumbs'][] = ['label' => 'Issuestatuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="issuestatuse-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
