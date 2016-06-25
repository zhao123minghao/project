<?php
/**
 * Created by PhpStorm.
 * User: zhaomh
 * Date: 16-6-17
 * Time: 上午8:36
 */

$filename = 'settings.json';
$handle = fopen($filename,'r');
$contents = fread($handle,filesize($filename));
fclose($handle);
$json_setting = json_decode($contents,true,16);
$current_date = date('y-m-d');
foreach($json_setting as $item){
    if(strtotime($current_date) >= strtotime($item['start_date'])
        && strtotime($current_date) <= strtotime($item['end_date']))
    {
        $GLOBALS[$item['name']] = 'on';
    }
    else
    {
        $GLOBALS[$item['name']] = 'off';
    }
}
$GLOBALS[$json_setting[0]['name']] = [$json_setting[0]['start_date'],$json_setting[0]['end_date']];
