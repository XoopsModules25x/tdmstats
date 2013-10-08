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

include_once "../../mainfile.php";
include_once('include/function.php');


$gperm_handler =& xoops_gethandler('groupperm');
//permission
if (is_object($xoopsUser)) {
    $groups = $xoopsUser->getGroups();
} else {
	$groups = XOOPS_GROUP_ANONYMOUS;
}

define("TDMSTATS_DIRNAME", $xoopsModule->getVar("dirname"));
define("TDMSTATS_URL", XOOPS_URL . '/modules/' . TDMSTATS_DIRNAME);
define("TDMSTATS_IMAGES_URL", TDMSTATS_URL . '/images');


$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 1;

// pour les permissions
	$perm_4 = ($gperm_handler->checkRight('istats_view', 4, $groups, $xoopsModule->getVar('mid'))) ? true : false ;
	$perm_8 = ($gperm_handler->checkRight('istats_view', 8, $groups, $xoopsModule->getVar('mid'))) ? true : false ;
	$perm_16 = ($gperm_handler->checkRight('istats_view', 16, $groups, $xoopsModule->getVar('mid'))) ? true : false ;
    if ($perm_4 == false && $perm_8 == false && $perm_16 == false){
        redirect_header(XOOPS_URL, 2, _NOPERM);
    }

 switch($action) {

	 case "3":
		 include "include/user_info.php";
	     break;

	 case "2":
		 include "include/stats.php";
	     break;

	 case "1":
	 default:
		 include "include/summary.php";
		 break;
		 
}


 $xoopsTpl->assign('img_bar', $xoopsModuleConfig['tdmstats_bar']);

	
//$tdmstats_style = isset($xoopsModuleConfig['tdmstats_style']) ? $xoopsModuleConfig['tdmstats_style'] : 'cupertino';
//include script
$xoTheme->addScript(XOOPS_URL."/modules/".$xoopsModule->dirname()."/js/jquery.js");
$xoTheme->addScript(XOOPS_URL."/modules/".$xoopsModule->dirname()."/js/jquery-ui-1.7.2.custom.min.js");
//$xoTheme->addStylesheet(XOOPS_URL."/modules/".$xoopsModule->dirname()."/css/".$tdmstats_style."/jquery-ui-1.7.2.custom.css");
$xoTheme->addStylesheet( XOOPS_URL."/modules/".$xoopsModule->dirname()."/css/styles.css");
include_once XOOPS_ROOT_PATH."/footer.php";
?>