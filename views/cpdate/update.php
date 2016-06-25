<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CpDate */

$this->title = 'Update Cp Date: ' . ' ' . $model->cpd_id;
$this->params['breadcrumbs'][] = ['label' => 'Cp Dates', 'url' => ['index','cp_id' => $cp_id]];
$this->params['breadcrumbs'][] = ['label' => $model->cpd_id, 'url' => ['view', 'id' => $model->cpd_id,'cp_id' => $cp_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cp-date-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
