<?php

namespace app\controllers;

use app\models\Department;

class TestController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $Departs_t = Department::find()->all();
        $Departs = array();
        foreach($Departs_t as $value)
        {
            $Departs[$value->depart_id] = $value->depart_name;
        }
        print_r( $Departs);
    }

}
