<?php

use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'My Information';
$this->params['breadcrumbs'][] = $this->title;
$this->params['menu_set'] = $type;
?>
<div class="course-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="col-md-10">
        <table class="table table-striped">
            <thead>
            <th>date</th>
            <th>message</th>
            </thead>
            <tbody>
            <?php foreach ($model as $cou):?>
                <tr>
                    <td class="infor-date"><?=$cou->date?></td>
                    <td><?=$cou->message?></td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>
