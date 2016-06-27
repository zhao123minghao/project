<?php
/**
 * Created by PhpStorm.
 * User: zhaomh
 * Date: 16-6-6
 * Time: 下午2:37
 */
use yii\helpers\Html;

?>
<?php if($menu_set == 0){ ?>
<div class="col-md-2">
    <div class="list-group">
<?php
        echo Html::a('Student Management', ['student/index'], [
        'class' => 'list-group-item menu-relation',]);
        echo Html::a('Professor Management', ['professor/index'], [
        'class' => 'list-group-item menu-relation',]);
        echo Html::a('Course Management', ['course/index'], [
        'class' => 'list-group-item menu-relation',]);
        echo Html::a('Department Management', ['department/index'], [
        'class' => 'list-group-item menu-relation',]);
        echo Html::a('Professor-Course', ['coupro/index'], [
        'class' => 'list-group-item menu-relation',]);
        echo Html::a('Student-Course', ['coursestudent/index'], [
        'class' => 'list-group-item menu-relation',]);
        echo Html::a('Event Management', ['event/index'], [
        'class' => 'list-group-item menu-relation',]);
        echo Html::a('Information Management', ['information/index'], [
        'class' => 'list-group-item menu-relation',]);
?>
    </div>
</div>
<?php }
if($menu_set == 1){?>
    <div class="col-md-2">
        <div class="list-group">
            <?php
            echo Html::a('Course Selection', ['course/procou'], [
                'class' => 'list-group-item menu-relation',]);
            echo Html::a('Grade Management', ['grade/index'], [
                'class' => 'list-group-item menu-relation',]);
            ?>
        </div>
    </div>
<?php }
if($menu_set == 2){?>
<div class="col-md-2">
    <div class="list-group">
        <?php
        echo Html::a('Course Selection', ['student/select'], [
            'class' => 'list-group-item menu-relation',]);
        echo Html::a('My Schedule', ['student/sche'], [
            'class' => 'list-group-item menu-relation',]);
        echo Html::a('My Grades', ['coursestudent/sview'], [
            'class' => 'list-group-item menu-relation',]);
        echo Html::a('My Cost', ['student/cost'], [
            'class' => 'list-group-item menu-relation',]);
        ?>
    </div>
</div>
<?php }