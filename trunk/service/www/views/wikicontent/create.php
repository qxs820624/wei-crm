<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Wikicontent */

$this->title = 'Create Wikicontent';
$this->params['breadcrumbs'][] = ['label' => 'Wikicontents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wikicontent-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
