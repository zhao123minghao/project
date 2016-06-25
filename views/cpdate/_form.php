<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CpDate */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cp-date-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cpd_date')->dropDownList([1=>'Monday',2=>'Tuesday',
    	3=>'Wednsday',4=>'Thursday',5=>'Friday',6=>'Saturday',7=>'Sunday']) ?>

    <?= $form->field($model, 'cpd_time')->dropDownList([1=>'1',2=>'2',3=>'3',
    												4=>'4',5=>'5']) ?>

    <?= $form->field($model, 'cpd_cp')->hiddenInput()->label(false)?>

    <?= $form->field($model, 'cpd_place')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
