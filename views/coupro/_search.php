<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CouProSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cou-pro-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'cp_id') ?>

    <?= $form->field($model, 'cp_pro') ?>

    <?= $form->field($model, 'cp_cou') ?>

    <?= $form->field($model, 'cp_sem') ?>

    <?= $form->field($model, 'cp_cost') ?>

    <?php // echo $form->field($model, 'cp_num') ?>

    <?php // echo $form->field($model, 'cp_place') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
