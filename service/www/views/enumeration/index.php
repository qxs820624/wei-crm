<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Enumerations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="enumeration-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Enumeration', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'position',
            'is_default',
            'type',
            // 'active',
            // 'project_id',
            // 'parent_id',
            // 'position_name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
