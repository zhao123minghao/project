<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CpDateSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cp Dates';
$this->params['breadcrumbs'][] = $this->title;
$GLOBALS['cp_id'] = $cp_id;
?>
<div class="cp-date-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Cp Date', ['create','cp_id' => $cp_id], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'cpd_id',
            'cpd_date',
            'cpd_time',
            'cpd_cp',
            'cpd_place',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}{update}{delete}',
                'buttons' => [
                    'view' => function($url, $model, $key){
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>',
                            ['view', 'id' => $key,'cp_id' => $GLOBALS['cp_id']],
                            [
                                'class' => 'btn btn-default btn-xs',
                            ]
                        );
                    },
                    'update' => function($url, $model, $key){
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>',
                            ['update', 'id' => $key,'cp_id' => $GLOBALS['cp_id']],
                            [
                                'class' => 'btn btn-default btn-xs',
                            ]
                        );
                    },
                    'delete' => function($url, $model, $key){
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>',
                            ['delete', 'id' => $key,'cp_id' => $GLOBALS['cp_id']],
                            [
                                'class' => 'btn btn-default btn-xs',
                                'data' => ['confirm' => 'Are you sure you want to delete this item?',]
                            ]
                        );
                    },
                ],
            ],
        ],
    ]); ?>

</div>
