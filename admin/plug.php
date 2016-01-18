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

 xoops_cp_header();
include_once 'admin_header.php';

$indexAdmin = new ModuleAdmin();
echo $indexAdmin->addNavigation('plug.php');

$myts =& MyTextSanitizer::getInstance();
$op = isset($_REQUEST['op']) ? $_REQUEST['op'] : 'list';
 

 switch($op) {
  
    //sauv
 case "create":
 //Copie du plug
$indexFile = XOOPS_ROOT_PATH."/modules/".$xoopsModule->dirname()."/xoops_plugins/function.xoStats.php";
$erreur = copy($indexFile, XOOPS_ROOT_PATH."/class/smarty/xoops_plugins/function.xoStats.php");
 if($erreur){
    redirect_header( 'plug.php', 1, _AM_ISTATS_BASE);
        }else{
    redirect_header( 'plug.php', 1, _AM_ISTATS_BASEERROR);
        }

    break;
    

    
 case "list":
  default:
    
    if (!is_readable(XOOPS_ROOT_PATH ."/class/smarty/xoops_plugins/function.xoStats.php")) {
    $veriffile = '<span style="color: red;"><a href="plug.php?op=create"><img src="./../images/off.gif"> '._AM_ISTATS_PLUGERROR.'</span></a>';
    } else {
    $veriffile = '<span style="color: green;"><img src="./../images/on.gif" >'._AM_ISTATS_PLUGOK.'</span>';
    }
    
    echo '<fieldset><legend class="CPmediumTitle">'._AM_ISTATS_PLUGETAT.'</legend>
		<br/>';
        echo $veriffile;
        echo '<br/><br/>'._AM_ISTATS_PLUGHELP.'<br /><br />
	</fieldset><br /> <br />';

    break;
    
  }
include_once 'admin_footer.php';
