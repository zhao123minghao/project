<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Department;

/* @var $this yii\web\View */
/* @var $model app\models\Professor */
/* @var $form yii\widgets\ActiveForm */
$departs = new Department();
$status = ['normal'=>'normal','vacation'=>'vocation','business travel'=>'business travel'];
?>

<div class="professor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'pro_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pro_birth')->input('',['type'=>'date']) ?>

    <?= $form->field($model, 'pro_depart')->dropDownList($departs->getDepartList()) ?>

    <?= $form->field($model, 'pro_status')->dropDownList($status) ?>

    <?= $form->field($model, 'pro_ssn')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
