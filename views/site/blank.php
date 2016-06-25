<?php
/**
 * Created by PhpStorm.
 * User: zhaomh
 * Date: 16-6-17
 * Time: 下午3:22
 */
$session = \yii::$app->session;
$user_type = $session->get('type');
$this->params['menu_set'] = $user_type;
?>

This Selection has closen.
