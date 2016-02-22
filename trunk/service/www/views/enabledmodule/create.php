<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Enabledmodule */

$this->title = 'Create Enabledmodule';
$this->params['breadcrumbs'][] = ['label' => 'Enabledmodules', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="enabledmodule-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
