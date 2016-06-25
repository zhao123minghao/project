<?php
/**
 * Created by PhpStorm.
 * User: zhaomh
 * Date: 16-6-14
 * Time: 上午10:38
 */
use yii\helpers\Html;
use app\models\CpDate;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CourseStudentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Course Selection';
$this->params['breadcrumbs'][] = $this->title;
$this->params['menu_set'] = 2;
function getOperation($data,$item)
{
    foreach($data as $value)
    {
        if($value[0] === $item)
        {
            return $value[2];
        }
    }
    return -1;
}

$keys = array_keys($cp);
//print_r($list);
?>

<div class="course-selection">
    <div class="col-sm-7 course-table">
        <table class="table table-striped">
            <thead>
            <th>course name</th>
            <th>left num</th>
            <th>cost</th>
            <th></th>
            </thead>
            <tbody>
            <?php foreach ($keys as $value):
                $cp_list = CpDate::getList($value);
                $res = getOperation($list,$value);?>
                <tr>
                    <td <?php if($res === -1)
                    {echo 'onmouseover="setColor('.$cp_list.')" onmouseout="rtable()"';}//
                    ?>><?=$cp[$value][0]?></td>
                    <td><?=$cp[$value][2]?></td>
                    <td><?=$cp[$value][1]?></td>
                    <td>
                        <?php

                        //echo $cp_list;
                        if($res !== -1)
                        {
                            $button_name = 'REMOVE';
                            if($fri === $value)
                            {
                                $button_name = 'REMOVE Fri';
                            }
                            if($sec === $value)
                            {
                                $button_name = 'REMOVE Sec';
                            }
                            echo Html::a($button_name, ['student/remove', 'id' => $res],
                                ['class' => 'btn btn-warning btn-xs',]);
                        }
                        else
                        {
                            if($num !== 4)
                            {
                                echo Html::a('ADD', ['student/add', 'id' => $value],
                                    ['class' => 'btn btn-primary btn-xs']);
                            }
                            if($fri === -1)
                            {
                                echo Html::a('ADD Fri', ['student/addfri', 'id' => $value],
                                    ['class' => 'btn btn-primary btn-xs']);
                            }
                            if($sec === -1)
                            {
                                echo Html::a('ADD Sec', ['student/addsec', 'id' => $value],
                                    ['class' => 'btn btn-primary btn-xs']);
                            }
                        }
                        ?></td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>

    <div class="other col-sm-3" id="table-div">
        <?=$this->render('select-table',['slist'=>$slist])?>
    </div>
</div>


<script type="text/javascript">
    window.onload = function()
    {
        <?php if($message === '1') {
        echo 'alert("time collision");';}
        else if($message === '2')
        {echo 'alert("ths course is full.");';}?>
    };
function setColor(time,date)
{
    dt_a = new Array();
    for(var i=1;i<8;i++)
    {
        dt_a[i] = new Array();
        for(var j=1;j<6;j++)
        {
            time_str = String(i);
            date_str = String(j);
            dt_id = '#' + time_str + date_str;//dt_id = '#33';
            dt_a[i][j] = $(dt_id).attr('class');
        }
    }

    time_length = time.length;
    date_length = date.length;
    for(var i=0;i<time_length;i++)
    {
        for(var j=0;j<date_length;j++)
        {
            time_str = String(time[i]);
            date_str = String(date[i]);
            dt_id = '#' + time_str + date_str;//dt_id = '#33';
            dt_class = $(dt_id).attr('class');
            if(dt_class == 'element2 ' || dt_class == 'element2') {
                $(dt_id).addClass("class-yellow");
            }
            else {
                if($(dt_id).hasClass("class-blue"))
                {
                    $(dt_id).removeClass("class-blue");
                }
                if($(dt_id).hasClass("class-lightblue"))
                {
                    $(dt_id).removeClass("class-lightblue");
                }
                if($(dt_id).hasClass("class-green"))
                {
                    $(dt_id).removeClass("class-green");
                }

                $(dt_id).addClass("class-red");
            }
        }
    }
}
function rtable()
{
    for(var i=1;i<8;i++)
    {
        for(var j=1;j<6;j++)
        {
            time_str = String(i);
            date_str = String(j);
            dt_id = '#' + time_str + date_str;//dt_id = '#33';
            dt_class2 = dt_a[i][j];

            if($(dt_id).hasClass("class-blue"))
            {
                $(dt_id).removeClass("class-blue");
            }
            if($(dt_id).hasClass("class-lightblue"))
            {
                $(dt_id).removeClass("class-lightblue");
            }
            if($(dt_id).hasClass("class-green"))
            {
                $(dt_id).removeClass("class-green");
            }
            if($(dt_id).hasClass("class-red"))
            {
                $(dt_id).removeClass("class-red");
            }
            if($(dt_id).hasClass("class-yellow"))
            {
                $(dt_id).removeClass("class-yellow");
            }
            if($(dt_id).hasClass("element2"))
            {
                $(dt_id).removeClass("element2");
            }
            $(dt_id).addClass(dt_class2);
        }
    }
}
</script>