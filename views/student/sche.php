<?php
/**
 * Created by PhpStorm.
 * User: zhaomh
 * Date: 16-6-14
 * Time: 上午12:17
 */
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CourseStudentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'My Grades';
$this->params['breadcrumbs'][] = $this->title;
$this->params['menu_set'] = 2;
function getCourseContent($data,$date,$time)
{
    foreach($data as $value)
    {
        if($value[0] === $date && $value[1] === $time)
        {
            echo $value[2].'</br>';
            echo $value[3].'</br>';
            echo $value[4].'</br>';
        }
    }
}
?>
<div class="schedule">
    <?php// print_r($list);?>
    <div class="col-md-10">
<table class="sub_table" >
    <tr class="number" id="number0">
        <td class="element1"></td>
        <td class="element1"><center>Mon.</center></td>
        <td class="element1"><center>Tues.</center></td>
        <td class="element1"><center>Wed.</center></td>
        <td class="element1"><center>Thurs.</center></td>
        <td class="element1"><center>Fri.</center></td>
        <td class="element1"><center>Sat.</center></td>
        <td class="element1"><center>Sun.</center></td>
    </tr>
    <tr class="number" id="1">
        <td class="element1">1</td>
        <td class="element" id="11" ><?=getCourseContent($list,1,1)?></td>
        <td class="element" id="12" ><?=getCourseContent($list,2,1)?></td>
        <td class="element" id="13" ><?=getCourseContent($list,3,1)?></td>
        <td class="element" id="14" ><?=getCourseContent($list,4,1)?></td>
        <td class="element" id="15" ><?=getCourseContent($list,5,1)?></td>
        <td class="element" id="16" ><?=getCourseContent($list,6,1)?></td>
        <td class="element" id="17" ><?=getCourseContent($list,7,1)?></td>
    </tr>
    <tr class="number" id="2">
        <td class="element1" >2</td>
        <td class="element"  ><?=getCourseContent($list,1,2)?></td>
        <td class="element"  ><?=getCourseContent($list,2,2)?></td>
        <td class="element"  ><?=getCourseContent($list,3,2)?></td>
        <td class="element"  ><?=getCourseContent($list,4,2)?></td>
        <td class="element"  ><?=getCourseContent($list,5,2)?></td>
        <td class="element"  ><?=getCourseContent($list,6,2)?></td>
        <td class="element"  ><?=getCourseContent($list,7,2)?></td>
    </tr>
    <tr class="number" id="3">
        <td class="element1" >3</td>
        <td class="element"  ><?=getCourseContent($list,1,3)?></td>
        <td class="element"  ><?=getCourseContent($list,2,3)?></td>
        <td class="element"  ><?=getCourseContent($list,3,3)?></td>
        <td class="element"  ><?=getCourseContent($list,4,3)?></td>
        <td class="element"  ><?=getCourseContent($list,5,3)?></td>
        <td class="element"  ><?=getCourseContent($list,6,3)?></td>
        <td class="element"  ><?=getCourseContent($list,7,3)?></td>
    </tr>
    <tr class="number" id="4">
        <td class="element1" >4</td>
        <td class="element"  ><?=getCourseContent($list,1,4)?></td>
        <td class="element"  ><?=getCourseContent($list,2,4)?></td>
        <td class="element"  ><?=getCourseContent($list,3,4)?></td>
        <td class="element"  ><?=getCourseContent($list,4,4)?></td>
        <td class="element"  ><?=getCourseContent($list,5,4)?></td>
        <td class="element"  ><?=getCourseContent($list,6,4)?></td>
        <td class="element"  ><?=getCourseContent($list,7,4)?></td>
    </tr>
    <tr class="number" id="5">
        <td class="element1" >5</td>
        <td class="element"  ><?=getCourseContent($list,1,5)?></td>
        <td class="element"  ><?=getCourseContent($list,2,5)?></td>
        <td class="element"  ><?=getCourseContent($list,3,5)?></td>
        <td class="element"  ><?=getCourseContent($list,4,5)?></td>
        <td class="element"  ><?=getCourseContent($list,5,5)?></td>
        <td class="element"  ><?=getCourseContent($list,6,5)?></td>
        <td class="element"  ><?=getCourseContent($list,7,5)?></td>
    </tr>
</table>
</div>
</div>