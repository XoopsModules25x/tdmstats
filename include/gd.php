<?php
/**
 * ****************************************************************************
 *  - TDMStats By TDM   - TEAM DEV MODULE FOR XOOPS
 *  - GNU Licence Copyright (c)  (http://www.)
 *
 * La licence GNU GPL, garanti à l'utilisateur les droits suivants
 *
 * 1. La liberté d'exécuter le logiciel, pour n'importe quel usage,
 * 2. La liberté de l' étudier et de l'adapter à ses besoins,
 * 3. La liberté de redistribuer des copies,
 * 4. La liberté d'améliorer et de rendre publiques les modifications afin
 * que l'ensemble de la communauté en bénéficie.
 *
 * @copyright       	(http://www.tdmxoops.net)
 * @license        	http://www.fsf.org/copyleft/gpl.html GNU public license
 * @author		TDM ; TEAM DEV MODULE
 *
 * ****************************************************************************
 */

if (function_exists('imagecreate')) {  // only run if gd installed
include ('../../../mainfile.php');
include_once ('getresult.php');

$db_link = mysql_connect(XOOPS_DB_HOST, XOOPS_DB_USER, XOOPS_DB_PASS);
mysql_select_db(XOOPS_DB_NAME, $db_link);

$per_hour_info = getResult("select * from ".XOOPS_DB_PREFIX."_TDMStats_hour order by hour");
$sum_hour      = getResult("select sum(count) as sum from ".XOOPS_DB_PREFIX."_TDMStats_hour");
$max_hour      = getResult("select max(count) as max from ".XOOPS_DB_PREFIX."_TDMStats_hour");
$days          = getResult("select count(distinct date) as days from ".XOOPS_DB_PREFIX."_TDMStats_daycount");
//$today_max     = getResult("select max(count) as max from ".XOOPS_DB_PREFIX."_TDMStats_today_hour");

 if ($sum_hour[0]['sum'] > 0){
     $max_percent = $max_hour[0]['max'] / $sum_hour[0]['sum'];
     $max_visit = $sum_hour[0]['sum'] * $max_percent / $days[0]['days'];
     if ($max_visit < $today_max[0]['max']){
         $max_visit = $today_max[0]['max'];
     }
 } else {
     $max_visit = 0;
 }

 for ($i = 0; $i < sizeof($per_hour_info); $i++) {
     if ($sum_hour[0]['sum'] > 0) {
         $hour_percent = $per_hour_info[$i]['count'] / $sum_hour[0]['sum'];
         $hour_visit[$i] = $sum_hour[0]['sum'] * $hour_percent / $days[0]['days'];
     } else {
         $hour_visit[$i] = 0;
     }
 }

 $im = imagecreate(625, 224);
 $col = ImageColorAllocate($im, 189, 199, 231);
 $line_col = ImageColorAllocate($im, 0, 0, 0);
 $red = ImageColorAllocate($im, 255, 0, 0);
 $color_black = ImageColorAllocate($im, 0, 0, 0);
 $count = 0;
 for ($i = 0; $i < 224; $i = $i + 25){
     if ($count % 2) {
         $col = ImageColorAllocate($im, 189, 199, 231);
     } else {
         $col = ImageColorAllocate($im, 206, 211, 239);
     }
     imagefilledrectangle ($im, 0, $i, 625, $i+25, $col);
     $count++;
 }

 $max_visit = sprintf("%.0f", $max_visit);
 imagestring($im, 2, 2, 5, "-$max_visit", $color_black);

 $avg_visit = $max_visit / 5;
 $avg_visit = sprintf("%.0f", $avg_visit);

 $num_sec = 5;
 for ($i = 1; $i < 5; $i++) {
     $num_sec += 41;
     $str_loca = $num_sec;
     $str = $max_visit - $avg_visit * $i;
     imagestring($im, 2, 2, $str_loca, "-$str", $color_black);
 }

 imagestring($im, 2, 2, 205, "-0", $color_black);

 $x = 37;
 for ($i = 0; $i < sizeof($hour_visit); $i++) {
     if($max_visit > 0){
         $y = $hour_visit[$i] / $max_visit * 200;
     } else {
         $y = 0;
     }
     $y = 220 - $y;
     $y_id = $i+1;
     if ($y_id < sizeof($hour_visit)) {
         if ($max_visit > 0){
             $y2 = $hour_visit[$y_id] / $max_visit * 200;
         } else {
             $y2 = 0;
         }
     } else {
         if ($max_visit > 0) {
             $y2 = $hour_visit[0] / $max_visit * 200;
         } else {
             $y2 = 0;
         }
     }
     $y2 = 220 - $y2;
     $x2 = $x + 25;
     imageline ($im, $x, $y, $x2, $y2, $red);
     $x+=25;
 }

 imagejpeg($im);
 imagedestroy($im);
}
