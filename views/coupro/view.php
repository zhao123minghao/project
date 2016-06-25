<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CouPro */

$this->title = $model->cp_id;
$this->params['breadcrumbs'][] = ['label' => 'Cou Pros', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cou-pro-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->cp_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->cp_id], [
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
            'cp_id',
            'cp_pro',
            'cp_cou',
            'cp_sem',
            'cp_cost',
            'cp_num',
        ],
    ]) ?>

</div>
