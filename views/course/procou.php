<?php

use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'Courses';
$this->params['breadcrumbs'][] = $this->title;
$this->params['menu_set'] = 1;
?>
<div class="course-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="col-md-10">
<table class="table table-striped">
    <thead>
    <th>course id</th>
    <th>course name</th>
    <th></th>
    </thead>
    <tbody>
        <?php foreach ($cou_list as $cou):?>
    <tr>
        <td><?=$cou->course_id?></td>
        <td><?=$cou->cou_name?></td>
        <td>
            <?php
                if(in_array($cou->course_id,$user_list))
                {
                    echo Html::a('REMOVE', ['coupro/remove', 'id' =>  $cou->course_id],
                        ['class' => 'btn btn-warning btn-xs']);
                }
            else
            {
                echo Html::a('ADD', ['coupro/add', 'id' => $cou->course_id],
                    ['class' => 'btn btn-primary btn-xs']);
            }
            ?></td>
    </tr>
        <?php endforeach;?>
    </tbody>
</table>
    </div>
</div>

