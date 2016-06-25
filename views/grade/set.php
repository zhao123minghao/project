<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */

$this->title = 'Grades';
$this->params['breadcrumbs'][] = $this->title;
$this->params['menu_set'] = 1;
?>
<div class="grade-set">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="grade-form">
        <?php $form = ActiveForm::begin(['action'=>Url::to([('grade/set')]),
            'options'=>['class'=>'form-inline']]); ?>
        <?= Html::dropDownList('course',null,$list)?>
        <div class="form-group">
            <?= Html::submitButton( 'Search', ['class' => 'btn btn-success']) ?>
        </div>

    </div>
    <div class="col-md-10">
    <table class="table table-striped">
        <thead>
        <th>student id</th>
        <th>Student name</th>
        <th>grade</th>
        <th></th>
        </thead>
        <tbody>
        <?php foreach ($stu_list as $value):?>
            <tr>
                <td><?=$value->student_id?></td>
                <td><?=$value->student_name?></td>
                <td><?=Html::textInput('grade',$value->grade,['id'=>'text'.$value->cs_id])?></td>
                <td><?php
                    if($value->grade === -1)
                    {
                        $button_name = 'Submit';
                        $button_class = 'btn btn-success';
                    }
                    else
                    {
                        $button_name = 'Modify';
                        $button_class = 'btn btn-primary';
                    }
                        echo Html::button($button_name, ['class' => $button_class,
                        'onclick'=>'setGrade('.$value->cs_id.','.$value->cp_id.')']);

                    ?></td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
    </div>
</div>
<script>
    function setGrade(csID,cpID)
    {
        var line = '#text'+csID;
        var grade = $(line).val();
        window.location.href='<?=Url::to(['grade/setgrade'])?>'+'&cs_id='+csID+'&cp_id='
            +cpID+'&grade='+grade;
        /*$.post('<?=Url::to(['grade/setgrade'])?>',{
            cs_id:csID,
            cp_id:cpID,
            grade:grade
        },function(ret){document.write(ret)})*/
    }
</script>