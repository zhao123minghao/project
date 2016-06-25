<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */

$this->title = 'Grades';
$this->params['breadcrumbs'][] = $this->title;
$this->params['menu_set'] = 1;
?>
<div class="grade-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="grade-form">
        <?php $form = ActiveForm::begin(['action'=>Url::to([('grade/set')]),
        'options'=>['class'=>'form-inline']]); ?>
        <?= Html::dropDownList('course',null,$list)?>
        <div class="form-group">
            <?= Html::submitButton( 'Search', ['class' => 'btn btn-success']) ?>
        </div>

    </div>
</div>


