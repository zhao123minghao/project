<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CouProSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Course Professor';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cou-pro-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Cou Pro', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'cp_id',
            'cp_pro',
            'cp_cou',
            'cp_sem',
            'cp_cost',
            'cp_num',

            ['class' => 'yii\grid\ActionColumn'],
            ['label' => '',
                'format' => 'raw',
                'value' => function($url,$model,$key){
                    return Html::a('edit', ['cpdate/index', 'cp_id' => $model],[ //
                'class' => 'btn btn-primary',
                'data' => [
                    'method' => 'post',
                ]]);
                }
            ]
    ]
    ]) 
?>

</div>
