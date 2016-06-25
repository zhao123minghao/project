<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Student;
use app\models\CourseProfessor;
/* @var $this yii\web\View */
/* @var $model app\models\CourseStu */
/* @var $form yii\widgets\ActiveForm */
$stulist = new Student();
$prc = new CourseProfessor();
?>

<div class="course-stu-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cs_stu')->dropDownList($stulist->getStudentList()) ?>

    <?= $form->field($model, 'cs_cp')->dropDownList($prc->getCpDropList()) ?>

    <div class="form-group">
        <?= Html::submitButton( 'Create', ['class' =>  'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
