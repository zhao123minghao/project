<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Professor;
use app\models\Course;

/* @var $this yii\web\View */
/* @var $model app\models\CouPro */
/* @var $form yii\widgets\ActiveForm */
$professors = new Professor();
$course = new Course();
?>

<div class="cou-pro-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cp_pro')->dropDownList($professors->getProfessorList()) ?>

    <?= $form->field($model, 'cp_cou')->dropDownList($course->getCourseList()) ?>

    <?= $form->field($model, 'cp_sem')->input('',
        ['type'=>'date','value'=>$GLOBALS['this_semester'][0]]) ?>

    <?= $form->field($model, 'cp_cost')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
