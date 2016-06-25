<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Student */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="student-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'stu_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'stu_birth')->input('',['type'=>'date']) ?>

    <?= $form->field($model, 'stu_ssn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'stu_status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'stu_gdata')->input('',['type'=>'date']) ?>

    <?= $form->field($model, 'stu_cost')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
