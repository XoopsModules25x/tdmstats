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
 
function adminmenu($currentoption=0)
{
    global $xoopsModule, $xoopsConfig;
    $tblColors=Array();
    $tblColors[0]=$tblColors[1]='#DDE';
    $tblColors[$currentoption]='white';
    if (file_exists(XOOPS_ROOT_PATH.'/modules/'.$xoopsModule->getVar('dirname').'/language/'.$xoopsConfig['language'].'/modinfo.php')) {
        include_once '../language/'.$xoopsConfig['language'].'/modinfo.php';
    }
    else {
        include_once '../language/english/modinfo.php';
    }
	echo "<div id=\"navcontainer\"><ul style=\"padding: 3px 0; margin-left: 0; font: bold 12px Verdana, sans-serif; \">";
	echo "<li style=\"list-style: none; margin: 0; display: inline; \"><a href=\"index.php?op=istatsConfig\" style=\"padding: 3px 0.5em; margin-left: 3px; border: 1px solid #778; background: ".$tblColors[0]."; text-decoration: none; \">"._MI_ISTATS_COOKIE_MENU."</a></li>";
	echo "<li style=\"list-style: none; margin: 0; display: inline; \"><a href=\"../../system/admin.php?fct=preferences&amp;op=showmod&amp;mod=".$xoopsModule -> getVar( 'mid' )."\" style=\"padding: 3px 0.5em; margin-left: 3px; border: 1px solid #778; background: ".$tblColors[1]."; text-decoration: none; \">"._PREFERENCES."</a></li></div></ul>";
}
?>
