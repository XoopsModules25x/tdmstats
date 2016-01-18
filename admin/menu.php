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

defined("XOOPS_ROOT_PATH") or die("XOOPS root path not defined");

$path = dirname(dirname(dirname(dirname(__FILE__))));
include_once $path . '/mainfile.php';

$dirname         = basename(dirname(dirname(__FILE__)));
$module_handler  = xoops_gethandler('module');
$module          = $module_handler->getByDirname($dirname);
$pathIcon32      = $module->getInfo('icons32');
$pathModuleAdmin = $module->getInfo('dirmoduleadmin');
$pathLanguage    = $path . $pathModuleAdmin;

if (!file_exists($fileinc = $pathLanguage . '/language/' . $GLOBALS['xoopsConfig']['language'] . '/' . 'main.php')) {
    $fileinc = $pathLanguage . '/language/english/main.php';
}

include_once $fileinc;

$adminmenu = array();

$i = 1;
$adminmenu[$i]["title"] = _AM_MODULEADMIN_HOME;
$adminmenu[$i]["link"]  = "admin/index.php";
$adminmenu[$i]["icon"]  = $pathIcon32 . '/home.png';

$i++;
$adminmenu[$i]["title"] =  _MI_ISTATS_INDEX;
$adminmenu[$i]["link"]  = "admin/main.php";
$adminmenu[$i]["icon"]  = $pathIcon32 . '/manage.png';

$i++;
$adminmenu[$i]["title"] =  _MI_ISTATS_PLUG;
$adminmenu[$i]["link"]  = "admin/plug.php";
$adminmenu[$i]["icon"]  = $pathIcon32 . '/addlink.png';

$i++;
$adminmenu[$i]["title"] = _MI_ISTATS_PERMISSIONS;
$adminmenu[$i]["link"]  = "admin/permissions.php";
$adminmenu[$i]["icon"]  = $pathIcon32 . '/permissions.png';

$i++;
$adminmenu[$i]['title'] = _AM_MODULEADMIN_ABOUT;
$adminmenu[$i]["link"]  = "admin/about.php";
$adminmenu[$i]["icon"]  = $pathIcon32 . '/about.png';
