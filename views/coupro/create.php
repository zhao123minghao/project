<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CouPro */

$this->title = 'Create Course-Professer';
$this->params['breadcrumbs'][] = ['label' => 'Course-Professor', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cou-pro-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
