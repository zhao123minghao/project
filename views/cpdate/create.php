<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CpDate */

$this->title = 'Create Cp Date';
$this->params['breadcrumbs'][] = ['label' => 'Cp Dates', 'url' => ['index','cp_id' => $cp_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cp-date-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
