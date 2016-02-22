<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Project */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin([
    'id' => 'create_project',
    'options' => ['class' => 'create_project'],
    'fieldConfig' => [
        'template' => "{label}\n{input}",
        ],
    ]); ?>

<div class="box tabular">
   <?= $form->field($model, 'name')->textInput() ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'identifier')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'homepage')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_public')->textInput()->label('public') ?>

    <?= $form->field($model, 'parent_id')->textInput()->label('parent project') ?>
    
    <?= $form->field($model, 'inherit_members')->textInput()->label('inherit members') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

</div>

<?php ActiveForm::end(); ?>
