<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Userpreferences';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="userpreference-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Userpreference', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'others:ntext',
            'hide_mail',
            'time_zone',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
