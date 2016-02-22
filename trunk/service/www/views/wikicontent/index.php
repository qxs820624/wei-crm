<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Wikicontents';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wikicontent-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Wikicontent', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'page_id',
            'author_id',
            'text:ntext',
            'comments',
            // 'updated_on',
            // 'version',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
