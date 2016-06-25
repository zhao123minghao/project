<?php
/**
 * Created by PhpStorm.
 * User: zhaomh
 * Date: 16-6-16
 * Time: 下午9:58
 */
function getCourseContent($data,$date,$time)
{
    foreach($data as $value)
    {
        if($value[0] === $date && $value[1] === $time)
        {
            $color = $value[2];
            if($color === 2)
            {
                echo 'class-blue';
            }
            else if($color === 1)
            {
                echo 'class-lightblue';
            }
            else
            {
                echo 'class-green';
            }
        }
    }
}
?>
<table class="sub_table" id = "table">
            <tr class="number" id="number0">
                <td class="element2"></td>
                <td class="element2">M.</td>
                <td class="element2">T.</td>
                <td class="element2">W.</td>
                <td class="element2">T.</td>
                <td class="element2">F.</td>
                <td class="element2">S.</td>
                <td class="element2">S.</td>
            </tr>
            <tr class="number" id="1">
                <td class="element2">1</td>
                <td class="element2 <?=getCourseContent($slist,1,1)?>" id="11" ></td>
                <td class="element2 <?=getCourseContent($slist,2,1)?>" id="21" ></td>
                <td class="element2 <?=getCourseContent($slist,3,1)?>" id="31" ></td>
                <td class="element2 <?=getCourseContent($slist,4,1)?>" id="41" ></td>
                <td class="element2 <?=getCourseContent($slist,5,1)?>" id="51" ></td>
                <td class="element2 <?=getCourseContent($slist,6,1)?>" id="61" ></td>
                <td class="element2 <?=getCourseContent($slist,7,1)?>" id="71" ></td>
            </tr>
            <tr class="number" id="2">
                <td class="element2" >2</td>
                <td class="element2 <?=getCourseContent($slist,1,2)?>" id="12"></td>
                <td class="element2 <?=getCourseContent($slist,2,2)?>" id="22" ></td>
                <td class="element2 <?=getCourseContent($slist,3,2)?>" id="32" ></td>
                <td class="element2 <?=getCourseContent($slist,4,2)?>" id="42" ></td>
                <td class="element2 <?=getCourseContent($slist,5,2)?>" id="52" ></td>
                <td class="element2 <?=getCourseContent($slist,6,2)?>" id="62" ></td>
                <td class="element2 <?=getCourseContent($slist,7,2)?>" id="72" ></td>
            </tr>
            <tr class="number" id="3">
                <td class="element2 " >3</td>
                <td class="element2 <?=getCourseContent($slist,1,3)?>" id="13" ></td>
                <td class="element2 <?=getCourseContent($slist,2,3)?>" id="23" ></td>
                <td class="element2 <?=getCourseContent($slist,3,3)?>" id="33" ></td>
                <td class="element2 <?=getCourseContent($slist,4,3)?>" id="43" ></td>
                <td class="element2 <?=getCourseContent($slist,5,3)?>" id="53" ></td>
                <td class="element2 <?=getCourseContent($slist,6,3)?>" id="63" ></td>
                <td class="element2 <?=getCourseContent($slist,7,3)?>" id="73" ></td>
            </tr>
            <tr class="number" id="4">
                <td class="element2" >4</td>
                <td class="element2 <?=getCourseContent($slist,1,4)?>" id="14" ></td>
                <td class="element2 <?=getCourseContent($slist,2,4)?>" id="24" ></td>
                <td class="element2 <?=getCourseContent($slist,3,4)?>" id="34" ></td>
                <td class="element2 <?=getCourseContent($slist,4,4)?>" id="44" ></td>
                <td class="element2 <?=getCourseContent($slist,5,4)?>" id="54" ></td>
                <td class="element2 <?=getCourseContent($slist,6,4)?>" id="64" ></td>
                <td class="element2 <?=getCourseContent($slist,7,4)?>" id="74" ></td>
            </tr>
            <tr class="number" id="5">
                <td class="element2" >5</td>
                <td class="element2 <?=getCourseContent($slist,1,5)?>" id="15" ></td>
                <td class="element2 <?=getCourseContent($slist,2,5)?>" id="25" ></td>
                <td class="element2 <?=getCourseContent($slist,3,5)?>" id="35" ></td>
                <td class="element2 <?=getCourseContent($slist,4,5)?>" id="45" ></td>
                <td class="element2 <?=getCourseContent($slist,5,5)?>" id="55" ></td>
                <td class="element2 <?=getCourseContent($slist,6,5)?>" id="65" ></td>
                <td class="element2 <?=getCourseContent($slist,7,5)?>" id="75" ></td>
            </tr>
        </table>