<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CourseStudentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'My Grades';
$this->params['breadcrumbs'][] = $this->title;
$this->params['menu_set'] = 2;
?>
<div class="course-student-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn',],

            ['attribute'=>'course_name'],
            ['attribute'=>'professor_name'],
            ['attribute'=>'semester'],
            ['attribute'=>'grade'],
        ],
        'options'=>['class'=>'col-md-10'],
    ]); ?>

</div>
