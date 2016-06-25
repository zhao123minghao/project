<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CourseStu */

$this->title = 'Update Course-Student:';
$this->params['breadcrumbs'][] = ['label' => 'Course Stus', 'url' => ['coursestudent/index']];
$this->params['breadcrumbs'][] = 'Grade Update';
?>
<div class="course-stu-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('grade_form', [
        'model' => $model,
    ]) ?>

</div>
