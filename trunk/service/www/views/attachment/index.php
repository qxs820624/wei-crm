<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Attachments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="attachment-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Attachment', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'container_id',
            'container_type',
            'filename',
            'disk_filename',
            // 'filesize',
            // 'content_type',
            // 'digest',
            // 'downloads',
            // 'author_id',
            // 'created_on',
            // 'description',
            // 'disk_directory',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
