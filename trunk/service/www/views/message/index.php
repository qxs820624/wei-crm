<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Messages';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="message-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Message', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'board_id',
            'parent_id',
            'subject',
            'content:ntext',
            // 'author_id',
            // 'replies_count',
            // 'last_reply_id',
            // 'created_on',
            // 'updated_on',
            // 'locked',
            // 'sticky',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
