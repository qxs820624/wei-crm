<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Issue */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Issues', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="issue-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'tracker_id',
            'project_id',
            'subject',
            'description:ntext',
            'due_date',
            'category_id',
            'status_id',
            'assigned_to_id',
            'priority_id',
            'fixed_version_id',
            'author_id',
            'lock_version',
            'created_on',
            'updated_on',
            'start_date',
            'done_ratio',
            'estimated_hours',
            'parent_id',
            'root_id',
            'lft',
            'rgt',
            'is_private',
            'closed_on',
        ],
    ]) ?>

</div>
