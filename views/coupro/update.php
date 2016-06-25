<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CouPro */

$this->title = 'Update Course Professer: ' . ' ' . $model->cp_id;
$this->params['breadcrumbs'][] = ['label' => 'Cou Pros', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cp_id, 'url' => ['view', 'id' => $model->cp_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cou-pro-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
