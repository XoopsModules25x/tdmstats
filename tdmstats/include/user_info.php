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
 
$xoopsOption['template_main'] = "tdmstats_user_info.html";
include_once XOOPS_ROOT_PATH."/header.php";

 if (!$gperm_handler->checkRight('istats_view', 16, $groups, $xoopsModule->getVar('mid'))) {
redirect_header( XOOPS_URL , 1 , _AM_QUERYNOPERM);
}

	$xoopsTpl->assign('lang_by_browser', _AM_BY_BROWSER);
	$xoopsTpl->assign('lang_by_os', _AM_BY_OS);
	$xoopsTpl->assign('lang_sw_sw', _AM_SW_SW);
	$xoopsTpl->assign('lang_sc_sc', _AM_SC_SC);
	$xoopsTpl->assign('lang_by_host', _AM_BY_HOST);
	$xoopsTpl->assign('lang_bro_bro', _AM_BRO_BRO);

//broser item
 global $xoopsDB;
 $bro_info = getResult("select * from ".$xoopsDB->prefix("TDMStats_browser")." order by count desc limit 3");
 
 for ($i = 0; $i < sizeof($bro_info); $i++) {
 
	//$browser['info'][] = $bro_info[$i]['count'];
	//$browser['browser'][] = $bro_info[$i]['browser'];
	//$browser['percent'][] = round($bro_percent, '2');
	
	$xoopsTpl->append('item_browsers', array('id' => 'bro'.$i, 'browser' => $bro_info[$i]['browser'], 'info' => $bro_info[$i]['count']));
	
 }
//broser

 global $xoopsDB;
 $bro_info = getResult("select * from ".$xoopsDB->prefix("TDMStats_browser")." order by count desc");
 $bro_total = getResult("select SUM(count) AS sum from ".$xoopsDB->prefix("TDMStats_browser")."");
 
 for ($i = 0; $i < sizeof($bro_info); $i++) {
	 if ($bro_total[0]['sum'] > 0) {

	 $bro_percent = $bro_info[$i]['count'] * 100 / $bro_total[0]['sum'];

	} else {
		 $bro_percent = 0;
		 $bro_bar = 0;
	 }
	 $bro_no = $i+1;
	$browser['info'][] = $bro_info[$i]['count'];
	$browser['browser'][] = $bro_info[$i]['browser'];
	$browser['percent'][] = round($bro_percent, '2');
	
	if ($bro_percent > 0) {
	//$xoopsTpl->append('browsers', array('id' => 'bro'.$i, 'browser' => $bro_info[$i]['browser'], 'info' => $bro_info[$i]['count'], 'percent' => round($bro_percent, '2')));
	$xoopsTpl->append('browsers_map', array('id' => 'bro'.$i, 'browser' => $bro_info[$i]['browser'], 'info' => $bro_info[$i]['count'], 'percent' => round($bro_percent, '2')));
 }
 }

	$xoopsTpl->assign('lang_os_os', _AM_OS_OS);


///////// ITEM OS ////////////
 global $xoopsDB;
 $os_info = getResult("select * from ".$xoopsDB->prefix("TDMStats_os")." order by count desc limit 3");

 for($i=0; $i<sizeof($os_info); $i++){
	 
	//$os['info'][] = $os_info[$i]['count'];	
	//$os['os'][] = $os_info[$i]['os'];
	//$os['percent'][] = round($os_percent, '2');

 $xoopsTpl->append('item_os', array('id' => 'os'.$i, 'os' => $os_info[$i]['os'], 'info' => $os_info[$i]['count']));

 }	
/////////OS ////////////
 global $xoopsDB;
 $os_info = getResult("select * from ".$xoopsDB->prefix("TDMStats_os")." order by count desc");
 $os_total = getResult("select SUM(count) AS sum from ".$xoopsDB->prefix("TDMStats_os")."");

 for($i=0; $i<sizeof($os_info); $i++){
	 if($os_total[0]['sum'] > 0){
	
	$os_percent = $os_info[$i]['count'] * 100 / $os_total[0]['sum'];
	 
	 }else{
		 $os_percent = 0;
		 $os_bar = 0;
	 }
	 $os_no = $i + 1;
	$os['info'][] = $os_info[$i]['count'];	
	$os['os'][] = $os_info[$i]['os'];
	$os['percent'][] = round($os_percent, '2');

	if ($os_percent > 0) {
 //$xoopsTpl->append('oss', array('id' => 'os'.$i, 'os' => $os_info[$i]['os'], 'info' => $os_info[$i]['count'], 'percent' => round($os_percent, '2')));
 $xoopsTpl->append('oss_map', array('id' => 'os'.$i, 'os' => $os_info[$i]['os'], 'info' => $os_info[$i]['count'], 'percent' => round($os_percent, '2')));
 }
 }
 
///////////////////ITEM SW/////////
 global $xoopsDB;
 $sw_info = getResult("select * from ".$xoopsDB->prefix("TDMStats_screen")." order by count desc limit 3");
 
 for($i=0; $i<sizeof($sw_info); $i++){
	
	//$sw['info'][] = $sw_info[$i]['count'];	
	//$sw['sw'][] = $sw_info[$i]['width'];
	//$sw['percent'][] = round($sw_percent, '2');
	
  $xoopsTpl->append('item_sw', array('id' => 'sw'.$i, 'sw' => $sw_info[$i]['width'], 'info' => $sw_info[$i]['count']));

  }
///////////////////SW/////////
 global $xoopsDB;
 $sw_info = getResult("select * from ".$xoopsDB->prefix("TDMStats_screen")." order by count desc");
 $sw_total = getResult("select SUM(count) AS sum from ".$xoopsDB->prefix("TDMStats_screen")."");

 for($i=0; $i<sizeof($sw_info); $i++){
	 if($os_total[0]['sum'] > 0){
	 
	$sw_percent = $sw_info[$i]['count'] * 100 / $sw_total[0]['sum'];
	 
	 }else{
		 $sw_percent = 0;
		 $sw_bar = 0;
	 }
	 $sw_no = $i + 1;	
	$sw['info'][] = $sw_info[$i]['count'];	
	$sw['sw'][] = $sw_info[$i]['width'];
	$sw['percent'][] = round($sw_percent, '2');
	
if ($sw_percent > 0) {
  //$xoopsTpl->append('sws', array('id' => 'sw'.$i, 'sw' => $sw_info[$i]['width'], 'info' => $sw_info[$i]['count'], 'percent' => round($sw_percent, '2')));
  $xoopsTpl->append('sws_map', array('id' => 'sw'.$i, 'sw' => $sw_info[$i]['width'], 'info' => $sw_info[$i]['count'], 'percent' => round($sw_percent, '2')));
}
  }
 
/////////////// ITEM SC/////////////////////////
 global $xoopsDB;
 $sc_info = getResult("select * from ".$xoopsDB->prefix("TDMStats_color")." order by count desc limit 3");

 for($i=0; $i<sizeof($sc_info); $i++){
	 	
	//$sc['info'][] = $sc_info[$i]['count'];	
	//$sc['sc'][] = $sc_info[$i]['color'];
	//$sc['percent'][] = round($sc_percent, '2');
	
	 $xoopsTpl->append('item_sc', array('id' => 'sc'.$i, 'sc' => $sc_info[$i]['color'], 'info' => $sc_info[$i]['count']));

 }
///////////////SC/////////////////////////
 global $xoopsDB;
 $sc_info = getResult("select * from ".$xoopsDB->prefix("TDMStats_color")." order by count desc");
 $sc_total = getResult("select SUM(count) AS sum from ".$xoopsDB->prefix("TDMStats_color")."");

 for($i=0; $i<sizeof($sc_info); $i++){
	 if($sc_total[0]['sum'] > 0){
	 
	$sc_percent = $sc_info[$i]['count'] * 100 / $sc_total[0]['sum'];

	}else{
		 $sc_percent = 0;
		 $sc_bar = 0;
	 }
	 $sc_no = $i + 1;	
	$sc['info'][] = $sc_info[$i]['count'];	
	$sc['sc'][] = $sc_info[$i]['color'];
	$sc['percent'][] = round($sc_percent, '2');
	
	if ($sc_percent > 0) {
	 //$xoopsTpl->append('scs', array('id' => 'sc'.$i, 'sc' => $sc_info[$i]['color'], 'info' => $sc_info[$i]['count'], 'percent' => round($sc_percent, '2')));
  	 $xoopsTpl->append('scs_map', array('id' => 'sc'.$i, 'sc' => $sc_info[$i]['color'], 'info' => $sc_info[$i]['count'], 'percent' => round($sc_percent, '2')));
}
 }

	$xoopsTpl->assign('lang_host_host', _AM_HOST_HOST);

//////////ITEM HOST/////////////
 global $xoopsDB;
 $max = $xoopsModuleConfig['maxpage'];
 $host_info = getResult("select distinct hostname, count from ".$xoopsDB->prefix("TDMStats_hostname")." order by count desc limit 3");

 for($i=0; $i<sizeof($host_info); $i++){
	
	//$host['info'][] = $host_info[$i]['count'];	
	//$host['host'][] = $host_info[$i]['hostname'];
	//$host['percent'][] = round($host_percent, '2');
	
	$xoopsTpl->append('item_host', array('id' => 'host'.$i, 'host' => $host_info[$i]['hostname'], 'info' => $host_info[$i]['count']));
 }
 
//////////HOST/////////////
 global $xoopsDB;
 $max = $xoopsModuleConfig['maxpage'];
 $host_info = getResult("select distinct hostname, count from ".$xoopsDB->prefix("TDMStats_hostname")." order by count desc limit $max");
 $host_total = getResult("select SUM(count) AS sum from ".$xoopsDB->prefix("TDMStats_hostname")."");

 for($i=0; $i<sizeof($host_info); $i++){
	 if($host_total[0]['sum'] > 0){
	 
	$host_percent = $host_info[$i]['count'] * 100 / $host_total[0]['sum'];
	
	}else{
		 $host_percent = 0;
	 }
	 $host_no = $i + 1;
	$host['info'][] = $host_info[$i]['count'];	
	$host['host'][] = $host_info[$i]['hostname'];
	$host['percent'][] = round($host_percent, '2');
	
	//$xoopsTpl->append('hosts', array('id' => 'host'.$i, 'host' => $host_info[$i]['hostname'], 'info' => $host_info[$i]['count'], 'percent' => round($host_percent, '2')));
	$xoopsTpl->append('hosts_map', array('id' => 'host'.$i, 'host' => $host_info[$i]['hostname'], 'info' => $host_info[$i]['count'], 'percent' => round($host_percent, '2')));

 }

?>