<?php
/**
 * Created by PhpStorm.
 * User: zhaomh
 * Date: 16-6-27
 * Time: 上午8:31
 */

use yii\helpers\Html;
use app\models\CpDate;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CourseStudentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'My Cost';
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
$all = 0;
?>

<div class="course-selection">
    <div class="col-sm-10">
        <table class="table table-striped">
            <thead>
            <th>course name</th>
            <th>cost</th>
            </thead>
            <tbody>
            <?php foreach ($keys as $value):
                $res = getOperation($list,$value);
                if($res !== -1 && $fri !== $value && $sec !== $value) {
                echo '<tr><td>' . $cp[$value][0] . '</td>';//

                echo '<td>' . $cp[$value][1] . '</td></tr>';
                    $all += $cp[$value][1];
                }
            endforeach;?>
            <tr>
                <td>ALL</td>
                <td><?=$all?></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>