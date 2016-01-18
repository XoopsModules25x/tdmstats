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
 
$xoopsOption['template_main'] = 'tdmstats_summary.html';
include_once XOOPS_ROOT_PATH."/header.php";
 
 if (!$gperm_handler->checkRight('istats_view', 4, $groups, $xoopsModule->getVar('mid'))) {
redirect_header( XOOPS_URL , 1 , _AM_QUERYNOPERM);
}
 
 
 $summary = CountDays();

    $xoopsTpl->assign('lang_per_hour', _AM_PER_HOUR);
    $xoopsTpl->assign('lang_by_today_hour', _AM_BY_TODAY_HOUR);
    $xoopsTpl->assign('lang_stats_info', _AM_STATS_INFO);
    $xoopsTpl->assign('lang_total_visits', _AM_TOTAL_VISITS);
    $xoopsTpl->assign('total', $summary['total']);
    $xoopsTpl->assign('lang_now', _AM_NOW);
    $xoopsTpl->assign('date_now', formatTimeStamp(time(), 'm'));
    $xoopsTpl->assign('lang_today', _AM_TODAY);
    $xoopsTpl->assign('today', $summary['today']);
    $xoopsTpl->assign('lang_ave_day', _AM_AVE_DAY);
    $xoopsTpl->assign('ava_day', sprintf ("%.0f", $summary['ava_day']));
    $xoopsTpl->assign('lang_today', _AM_TODAY);
    $xoopsTpl->assign('today', $summary['today']);
    $xoopsTpl->assign('lang_ave_day', _AM_AVE_DAY);
    $xoopsTpl->assign('ava_day', sprintf ("%.0f", $summary['ava_day']));
    $xoopsTpl->assign('lang_this_week', _AM_THIS_WEEK);
    $xoopsTpl->assign('this_week', $summary['this_week']);
    $xoopsTpl->assign('lang_ave_week', _AM_AVE_WEEK);
    $xoopsTpl->assign('ava_week', sprintf ("%.0f", $summary['ava_week']));
    $xoopsTpl->assign('lang_this_mth', _AM_THIS_MTH);
    $xoopsTpl->assign('this_mth', $summary['this_mth']);
    $xoopsTpl->assign('lang_ave_mth', _AM_AVE_MTH);
    $xoopsTpl->assign('ava_mth', sprintf ("%.0f", $summary['ava_mth']));
    $xoopsTpl->assign('lang_total_days', _AM_TOTAL_DAYS);
    $xoopsTpl->assign('days', $summary['days']);
    $xoopsTpl->assign('lang_ave_hour', _AM_AVE_HOUR);
    $xoopsTpl->assign('ava_hour', sprintf ("%.2f", $summary['ava_hour']));
    $xoopsTpl->assign('lang_max_daycount', _AM_MAX_DAYCOUNT);
    $xoopsTpl->assign('max_daycount', $summary['max_daycount']);
    $xoopsTpl->assign('lang_max_date', _AM_MAX_DATE);
    $summary['max_date'] = formatTimeStamp($summary['max_date'], 's');
    $xoopsTpl->assign('max_date', $summary['max_date']);
    $xoopsTpl->assign('lang_max_weekcount', _AM_MAX_WEEKCOUNT);
    $xoopsTpl->assign('max_weekcount', $summary['max_weekcount']);
    $xoopsTpl->assign('lang_max_week', _AM_MAX_WEEK);

if (!isset($summary['max_week_w']))
    $summary['max_week_w']=0;
if (!isset($summary['max_week_y']))
    $summary['max_week_y']=0;

    if ($xoopsModuleConfig['longdate'] == 1) {
        $summary['max_week'] = "#".$summary['max_week_w']."&nbsp;&nbsp;&nbsp;".$summary['max_week_y'];
    } else {
        $summary['max_week'] = $summary['max_week_y']."&nbsp;&nbsp;&nbsp;#".$summary['max_week_w'];
    }
    $xoopsTpl->assign('max_week', $summary['max_week']);
    $xoopsTpl->assign('lang_max_mthcount', _AM_MAX_MTHCOUNT);
    $xoopsTpl->assign('max_mthcount', $summary['max_mthcount']);
    $xoopsTpl->assign('lang_max_mth', _AM_MAX_MTH);

if (!isset($summary['max_mth_m']))
    $summary['max_mth_m']=0;
if (!isset($summary['max_mth_y']))
    $summary['max_mth_y']=0;

    if ($xoopsModuleConfig['longdate'] == 1) {
        $summary['max_mth'] = $summary['max_mth_m']."/".$summary['max_mth_y'];
    } else {
        $summary['max_mth'] = $summary['max_mth_y']."/".$summary['max_mth_m'];
    }
    $xoopsTpl->assign('max_mth', $summary['max_mth']);
    $xoopsTpl->assign('lang_forecast', _AM_FORECAST);
    $xoopsTpl->assign('lang_ave', AM_AVE);

    function Chars($text)
    {
        return preg_replace(
                            array("/UK/i"),
                            array("GB"),
                           $text);
    }

    $xoopsTpl->assign('lang_per_hour', _AM_PER_HOUR);
    
    //peux servir
    //$secondes = $totalsecondes % 60;
    //$minutes = ($totalsecondes / 60) % 60;
    //$heures = ($totalsecondes / (60 * 60));
 
    //echo $totalsecondes."<br />";
    //echo  $heures."<br />";
    //echo  $minutes."<br />";
    //echo 	 $secondes."<br />";
//

///USERCOUNT////////////////////////

//usercount item
    $date = formatTimeStamp(time(), 'Y-m-d');
    $user_info = getResult("select * from ".$xoopsDB->prefix("TDMStats_usercount")." where date='$date' order by count DESC LIMIT 3");
    //$total_hour = getResult("select SUM(count) AS sum from ".$xoopsDB->prefix("TDMStats_today_hour")."");

    if($user_info){
    for($i=0; $i<sizeof($user_info); $i++){
    if($user_info[$i]['count'] > 0) {
    //echo $user_info[$i]['userid'];
    $userid = !empty($user_info[$i]['userid']) ?  XoopsUser::getUnameFromId($user_info[$i]['userid']) : substr($user_info[$i]['ip'],0,(6))."..";
    //$count = $user_info[$i]['count'] ;
    $count = strftime( "%H H %M mn %S s", $user_info[$i]['count'] * 60);
    
    //$totalsecondes = $user_info[$i]['count'];
     
    //$hour['hour'][] = $hour_info[$i]['hour'];
    //$hour['percent'][] = round($hour_percent, '2');

    $xoopsTpl->append('item_users', array('id' => 'hour'.$i, 'userid' => $userid, 'info' => $count));
}
    }

 }
 //
 $user_info = getResult("select * from ".$xoopsDB->prefix("TDMStats_usercount")." where date='$date' order by count");
 $user_total = getResult("select SUM(count) AS sum from ".$xoopsDB->prefix("TDMStats_usercount")."");

    if($user_info){

     for($i=0; $i<sizeof($user_info); $i++){
         if($user_total[0]['sum'] > 0){
    $user_percent = $user_info[$i]['count'] * 100 / $user_total[0]['sum'] ;
            // 4*100/62,5 =6,4%
         }else{
             $user_percent = 0;
         }
         
    $userid = !empty($user_info[$i]['userid']) ?  XoopsUser::getUnameFromId($user_info[$i]['userid']) : substr($user_info[$i]['ip'],0,(6))."..";
    $count = gmstrftime( "%H H %M mn %S s", $user_info[$i]['count']);

    if ($user_percent > 0) {
    //$xoopsTpl->append('hours', array('id' => 'hour'.$i, 'hour' => $hour_info[$i]['hour'], 'info' => $hour_info[$i]['count'], 'percent' => round($hour_percent, '2')));
    $xoopsTpl->append('users_map', array('id' => 'user'.$i, 'userid' => $userid, 'info' => $count, 'percent' => round($user_percent, '2')));

    }
    }

 }
///////////////////////////////////
$hour= array();
 $cur_hour = formatTimeStamp(time(), 'H');
 $date = formatTimeStamp(time(), 'Y-m-d');
 $cur_visits = getResult("select * from ".$xoopsDB->prefix("TDMStats_daycount")." where date='$date'");
 $hour_info = getResult("select sum(count) as sum from ".$xoopsDB->prefix("TDMStats_hour")." where hour between '00' and '$cur_hour'");
 $hour_sum = getResult("select sum(count) as sum from ".$xoopsDB->prefix("TDMStats_hour")."");

 if($hour_sum[0]['sum'] > 0){
     $today_hour_percent = $hour_info[0]['sum'] / $hour_sum[0]['sum'];
     $cur_percent = $today_hour_percent * 100;

     if($today_hour_percent > 0){
         $today_hits = $cur_visits[0]['daycount'] / $today_hour_percent;
     }else{
         $today_hits = 0;
     }
 }else{
     $cur_percent = 0;
     $today_hits = 0;
     
 }
    $xoopsTpl->assign('cur_percent', sprintf ("%.0f", $cur_percent));
    $curvisits = $cur_visits[0]['daycount'];
//heure item
    $hour_info = getResult("select * from ".$xoopsDB->prefix("TDMStats_today_hour")." order by count DESC LIMIT 3");
    //$total_hour = getResult("select SUM(count) AS sum from ".$xoopsDB->prefix("TDMStats_today_hour")."");

    if($hour_info){
    for($i=0; $i<sizeof($hour_info); $i++){
    if($hour_info[$i]['count'] > 0) {
    $hour['info'][] = $hour_info[$i]['count'];
    $hour['hour'][] = $hour_info[$i]['hour'];
    //$hour['percent'][] = round($hour_percent, '2');

    $xoopsTpl->append('item_hours', array('id' => 'hour'.$i, 'hour' => $hour_info[$i]['hour'], 'info' => $hour_info[$i]['count']));
}
    }

 }
 //
 $hour_info = getResult("select * from ".$xoopsDB->prefix("TDMStats_today_hour")." order by hour");
 $total_hour = getResult("select SUM(count) AS sum from ".$xoopsDB->prefix("TDMStats_today_hour")."");

    if($hour_info){
     for($i=0; $i<sizeof($hour_info); $i++){
         if($total_hour[0]['sum'] > 0){
    $hour_percent = $hour_info[$i]['count'] * 100 / $total_hour[0]['sum'] ;
            // 4*100/62,5 =6,4%
         }else{
             $hour_percent = 0;
         }
    
    $hour['info'][] = $hour_info[$i]['count'];
    $hour['hour'][] = $hour_info[$i]['hour'];
    $hour['percent'][] = round($hour_percent, '2');

        if ($hour_percent > 0) {
    //$xoopsTpl->append('hours', array('id' => 'hour'.$i, 'hour' => $hour_info[$i]['hour'], 'info' => $hour_info[$i]['count'], 'percent' => round($hour_percent, '2')));
    $xoopsTpl->append('hours_map', array('id' => 'hour'.$i, 'hour' => $hour_info[$i]['hour'], 'info' => $hour_info[$i]['count'], 'percent' => round($hour_percent, '2')));

    }
    }

 }

 
////referent
$ref = array();
$ref['percent'][] = 0;
$ref['color'][] = 0;
$max = $xoopsModuleConfig['maxpage'];

    $ref_info = getResult("select * from ".$xoopsDB->prefix("TDMStats_referer")." order by count DESC LIMIT 3");
    //$total_hour = getResult("select SUM(count) AS sum from ".$xoopsDB->prefix("TDMStats_today_hour")."");

    if($ref_info){
    for($i=0; $i<sizeof($ref_info); $i++){
    if($ref_info[$i]['count'] > 0) {
    $url = (strlen($ref_info[$i]['url']) > 20 ? substr($ref_info[$i]['url'],0,(20))."..." : $ref_info[$i]['url']);
    $ref['info'][] = $ref_info[$i]['count'];
    //$hour['percent'][] = round($hour_percent, '2');

    $xoopsTpl->append('item_refs', array('id' => 'ref'.$i, 'info' => $ref_info[$i]['count'], 'url' => $url));
}
    }

 }

 $ref_info = getResult("select distinct url, count from ".$xoopsDB->prefix("TDMStats_referer")." order by count desc limit $max");
 $ref_total = getResult("select SUM(count) AS sum from ".$xoopsDB->prefix("TDMStats_referer")."");
 for ($i = 0; $i < sizeof($ref_info); $i++) {
     if($ref_total[0]['sum'] > 0){

     $ref_percent = $ref_info[$i]['count'] * 100 / $ref_total[0]['sum'];
     
     } else {
         $ref_percent = 0;
     }
     
    $ref['info'][] = $ref_info[$i]['count'];
    //$ref['ref'][] = (strlen($ref_info[$i]['url']) > 50 ? substr($ref_info[$i]['url'],0,(50))."..." : $ref_info[$i]['url']);
    $title = $ref_info[$i]['url'];
    $url = (strlen($ref_info[$i]['url']) > 50 ? substr($ref_info[$i]['url'],0,(50))."..." : $ref_info[$i]['url']);
    $ref['percent'][] = round($ref_percent, '2');

        if ($ref_percent > 0) {
    //$xoopsTpl->append('refs', array('id' => 'ref'.$i, 'ref' => $url, 'title' => $title, 'info' => $ref_info[$i]['count'], 'percent' => round($ref_percent, '2')));
    $xoopsTpl->append('refs_map', array('id' => 'ref'.$i, 'ref' => $url, 'title' => $title, 'info' => $ref_info[$i]['count'], 'percent' => round($ref_percent, '2')));
 }
 }
 
///////////PAYSSS
    $pays_info = getResult("select * from ".$xoopsDB->prefix("TDMStats_pays")." order by count DESC LIMIT 3");
    //$total_hour = getResult("select SUM(count) AS sum from ".$xoopsDB->prefix("TDMStats_today_hour")."");

    if($pays_info){
    for($i=0; $i<sizeof($pays_info); $i++){
    if($pays_info[$i]['count'] > 0) {
    $pays['country'][] = $pays_info[$i]['country'];
    $pays['info'][] = $pays_info[$i]['count'];
    //$hour['percent'][] = round($hour_percent, '2');

    $xoopsTpl->append('item_pays', array('id' => 'pay'.$i, 'info' => $pays_info[$i]['count'], 'country' => $pays_info[$i]['country'],));
}
    }

 }
 
$max = $xoopsModuleConfig['maxpage'];
 $pays_info = getResult("select distinct country, pays, count from ".$xoopsDB->prefix("TDMStats_pays")." order by count desc limit $max");
 $pays_total = getResult("select SUM(count) AS sum from ".$xoopsDB->prefix("TDMStats_pays")."");

 for ($i = 0; $i < sizeof($pays_info); $i++) {
     if($pays_total[0]['sum'] > 0){

     $pays_percent = $pays_info[$i]['count'] * 100 / $pays_total[0]['sum'];
     
     } else {
         $pays_percent = 0;
     }

    //$pays['info'][] = $pays_info[$i]['count'];
    //$pays['pays'][] = $pays_info[$i]['pays'];
    //$pays['country'][] = $pays_info[$i]['country'];
    $imgpath = XOOPS_ROOT_PATH . "/modules/".$xoopsModule->dirname()."/images/flag/".Chars(strtolower($pays_info[$i]['country'])).".png";
    if (file_exists($imgpath)) {
    $flag = "<img height='30px' alt='".$pays_info[$i]['country']."' title='".$pays_info[$i]['country']."' src='./images/flag/".Chars(strtolower($pays_info[$i]['country'])).".png'>";
    }else {
     $flag = "<img height='30px' alt='".$pays_info[$i]['country']."' title='".$pays_info[$i]['country']."' src='./images/flag/none.png'>";
    }
    //$pays['percent'][] = round($pays_percent, '2');
    //print_r($maxcolor[$i]);
    if ($pays_percent > 0) {
    //$xoopsTpl->append('payss', array('id' => 'pays'.$i, 'flag' => $flag, 'country' => $pays_info[$i]['country'], 'pays' => $pays_info[$i]['pays'], 'info' => $pays_info[$i]['count'], 'percent' => round($pays_percent, '2')));
    $xoopsTpl->append('payss_map', array('id' => 'pays'.$i, 'flag' => $flag, 'country' => $pays_info[$i]['country'], 'pays' => $pays_info[$i]['pays'], 'info' => $pays_info[$i]['count'], 'percent' => round($pays_percent, '2')));
 }
 }

$xoopsTpl->assign('lang_by_ref', _AM_BY_REF);
$xoopsTpl->assign('lang_ref_visits', _AM_REF_VISITS);
$xoopsTpl->assign('lang_ref_percent', _AM_REF_PERCENT);
$xoopsTpl->assign('lang_ref_ref', _AM_REF_REF);
$xoopsTpl->assign('lang_daily_visit', AM_DAILY_VISIT);
$xoopsTpl->assign('date_daily', formatTimeStamp(time(), 'H:i'));
$xoopsTpl->assign('lang_bas_nbr', AM_BAS_NBR);
$xoopsTpl->assign('daycount', $curvisits);
$xoopsTpl->assign('lang_so_far', AM_SO_FARE);
$xoopsTpl->assign('today_hits', sprintf ("%.0f", $today_hits));
$xoopsTpl->assign('lang_page_view', AM_PAGE_VIEW);
$xoopsTpl->assign('lang_by_today_hour', _AM_BY_TODAY_HOUR);
$xoopsTpl->assign('lang_hr_hour', _AM_HR_HOUR);
$xoopsTpl->assign('lang_hr_visits', _AM_HR_VISITS);
