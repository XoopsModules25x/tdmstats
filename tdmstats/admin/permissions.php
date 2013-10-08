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
 
include '../../../include/cp_header.php'; 
include_once(XOOPS_ROOT_PATH."/class/xoopsformloader.php");
include_once(XOOPS_ROOT_PATH."/class/tree.php");
include_once XOOPS_ROOT_PATH.'/class/pagenav.php';
include_once("../include/function.php");

include_once XOOPS_ROOT_PATH . "/class/xoopslists.php";
include_once XOOPS_ROOT_PATH . '/class/xoopsform/grouppermform.php';
//include_once XOOPS_ROOT_PATH.'/modules/'.$xoopsModule->dirname().'/class/mygrouppermform.php';



if( ! empty( $_POST['submit'] ) ) {
	redirect_header( XOOPS_URL."/modules/".$xoopsModule->dirname()."/admin/permissions.php" , 1 , _AM_XD_GPERMUPDATED);
}
 xoops_cp_header();
include_once 'admin_header.php';


$indexAdmin = new ModuleAdmin();
echo $indexAdmin->addNavigation('permissions.php');


$module_id = $xoopsModule->getVar('mid');


$perm_name = "istats_view";
$perm_desc = _AM_ISTATS_PERM2;

	$global_perms_array = array(
        '4' => _AM_ISTATS_PERM_4 ,
		'8' => _AM_ISTATS_PERM_8 ,
		'16' => _AM_ISTATS_PERM_16
		 );
	

$permform = new XoopsGroupPermForm($perm_desc, $module_id, $perm_name, '');	

foreach( $global_perms_array as $perm_id => $perm_name ) {
		$permform->addItem( $perm_id , $perm_name ) ;
	}
	
echo $permform->render();

include_once 'admin_footer.php';