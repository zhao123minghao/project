<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EventSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Events';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-index">
    <div class="password-form">
        <?php $form = ActiveForm::begin(['action'=>Url::to([('event/update')]),
            /*'options'=>['class'=>'form']*/]); ?>
        <div class="form-group">
            <?= Html::label('this_semester:')?>
        </div>
        <div class="form-group">
            <?= Html::label('start date:')?>
            <?= Html::input('date','ts_sdate',$settings[0]['start_date'])?>
        </div>
        <div class="form-group">
            <?= Html::label('end date:')?>
            <?= Html::input('date','ts_edate',$settings[0]['end_date'])?>
        </div>
        <div class="form-group">
            <?= Html::label('student_select:')?>
        </div>
        <div class="form-group">
            <?= Html::label('start date:')?>
            <?= Html::input('date','ss_sdate',$settings[1]['start_date'])?>
        </div>
        <div class="form-group">
            <?= Html::label('end date:')?>
            <?= Html::input('date','ss_edate',$settings[1]['end_date'])?>
        </div>
        <div class="form-group">
            <?= Html::label('professor_select:')?>
        </div>
        <div class="form-group">
            <?= Html::label('start date:')?>
            <?= Html::input('date','ps_sdate',$settings[2]['start_date'])?>
        </div>
        <div class="form-group">
            <?= Html::label('end date:')?>
            <?= Html::input('date','ps_edate',$settings[2]['end_date'])?>
        </div>
        <div class="form-group">
            <?= Html::submitButton( 'Submit', ['class' => 'btn btn-success']) ?>
            <p class="text-danger"><?php //echo $acontent;
                if($acontent === '1'){
                    echo 'ok!';
                } ?></p>
        </div>

    </div>
</div>
