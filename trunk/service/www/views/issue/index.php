<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Issues';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="issue-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Issue', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'tracker_id',
            'project_id',
            'subject',
            'description:ntext',
            // 'due_date',
            // 'category_id',
            // 'status_id',
            // 'assigned_to_id',
            // 'priority_id',
            // 'fixed_version_id',
            // 'author_id',
            // 'lock_version',
            // 'created_on',
            // 'updated_on',
            // 'start_date',
            // 'done_ratio',
            // 'estimated_hours',
            // 'parent_id',
            // 'root_id',
            // 'lft',
            // 'rgt',
            // 'is_private',
            // 'closed_on',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
