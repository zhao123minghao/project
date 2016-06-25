<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CourseStu */

$this->title = 'Create Course Stu';
$this->params['breadcrumbs'][] = ['label' => 'Course Stus', 'url' => ['coursestudent/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-stu-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
