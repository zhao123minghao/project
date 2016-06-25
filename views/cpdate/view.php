<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CpDate */

$this->title = $model->cpd_id;
$this->params['breadcrumbs'][] = ['label' => 'Course-Professor', 'url' => ['coupro/index']];
$this->params['breadcrumbs'][] = ['label' => 'Cp Dates', 'url' => ['index','cp_id' => $cp_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cp-date-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->cpd_id,'cp_id' => $cp_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->cpd_id,'cp_id' => $cp_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'cpd_id',
            'cpd_date',
            'cpd_time',
            'cpd_cp',
            'cpd_place',
        ],
    ]) ?>

</div>
