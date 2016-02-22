<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Emailaddresse */

$this->title = 'Create Emailaddresse';
$this->params['breadcrumbs'][] = ['label' => 'Emailaddresses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="emailaddresse-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
