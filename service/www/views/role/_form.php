<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Role */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="role-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'position')->textInput() ?>

    <?= $form->field($model, 'assignable')->textInput() ?>

    <?= $form->field($model, 'builtin')->textInput() ?>

    <?= $form->field($model, 'permissions')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'issues_visibility')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'users_visibility')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'time_entries_visibility')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'all_roles_managed')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
