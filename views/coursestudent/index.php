<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CourseStudentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Course Students';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-student-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Course Student', ['coursestu/create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'student_name',
            'course_name',
            'professor_name',
            'semester',
            'grade',
            ['label' => '',
                'format' => 'raw',
                'value' => function($url,$model,$key){
                    return Html::a('Drop', ['coursestu/delete', 'id' => $model],[ //
                        'class' => 'btn btn-primary',
                        'data' => [
                            'confirm' => 'Are you sure you want to delete this item?',
                            'method' => 'post',
                        ]]);
                }
            ],
            ['label' => 'Modify Grade',
                'format' => 'raw',
                'value' => function($url,$model,$key){
                    return Html::a('Modify', ['coursestu/update', 'id' => $model],[ //
                        'class' => 'btn btn-primary',
                        'data' => [
                            'method' => 'post',
                        ]]);
                }
            ]
        ],
    ]); ?>

</div>
