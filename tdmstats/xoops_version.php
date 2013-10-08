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

$modversion['name']        = "TDMStats";
$modversion['version']     = "1.08";
$modversion['description'] = _MI_ISTATS_DESC;
$modversion['author']	   = 'Original module: Paul Cooke (alias Scripter)<br /><b>Adaptation/rewrite: TDM.</b>';

$modversion['author'] = 'Original module: Paul Cooke (alias Scripter)<br />Adaptation/rewrite: TDM';
$modversion['author_website_url'] = "http://www.tdmxoops.net/";
$modversion['author_website_name'] = "Team Dev Mdodule";

$modversion['credits']     = "Sam Tang for the original i_Stats script.
<br /> Traduction Spanish thanks Don Curioso
<br /> Traduction Persian thanks Voltan";
$modversion['help']        = 'page=help';
$modversion['license']     = 'GNU GPL 2.0';
$modversion['license_url'] = "www.gnu.org/licenses/gpl-2.0.html/";
$modversion['official']    = 0;
$modversion['image']       = "images/TDMStats_logo.png";
$modversion['dirname']     = "TDMStats";


$modversion['dirmoduleadmin'] = '/Frameworks/moduleclasses/moduleadmin';
$modversion['icons16']        = '../../Frameworks/moduleclasses/icons/16';
$modversion['icons32']        = '../../Frameworks/moduleclasses/icons/32';

//about
$modversion['release_date']        = '2012/05/12';
$modversion["module_website_url"]  = "http://www.xoops.org/";
$modversion["module_website_name"] = "XOOPS";
$modversion["module_status"]       = "RC";
$modversion['min_php']             = '5.2';
$modversion['min_xoops']           = "2.5";
$modversion['min_admin']           = '1.1';
$modversion['min_db']              = array(
    'mysql'  => '5.0.7',
    'mysqli' => '5.0.7'
);


// Blocks
$modversion['blocks'][1]['file'] = 'TDMStats_blocks.php';
$modversion['blocks'][1]['name'] = _MI_ISTATS_NAME;
$modversion['blocks'][1]['description'] = 'Shows stats';
$modversion['blocks'][1]['show_func'] = 'b_TDMStats_show';
$modversion['blocks'][1]['options'] = "1";
$modversion['blocks'][1]['edit_func'] = "b_TDMStats_edit";
$modversion['blocks'][1]['template'] = 'tdmstats_block_show.html';

$modversion['blocks'][2]['file'] = 'TDMStats_blocks.php';
$modversion['blocks'][2]['name'] = _MI_ISTATS_CNT;
$modversion['blocks'][2]['description'] = 'Show counter';
$modversion['blocks'][2]['show_func'] = 'b_TDMStats_counter_show';
$modversion['blocks'][2]['options'] = "1|6|default";
$modversion['blocks'][2]['edit_func'] = "b_TDMStats_counter_edit";
$modversion['blocks'][2]['template'] = 'tdmstats_block_counter.html';

$modversion['blocks'][3]['file'] = 'TDMStats_blocks.php';
$modversion['blocks'][3]['name'] = 'info';
$modversion['blocks'][3]['description'] = 'Show info user';
$modversion['blocks'][3]['show_func'] = 'b_TDMStats_info_show';
$modversion['blocks'][3]['options'] = "1|6|default";
$modversion['blocks'][3]['edit_func'] = "b_TDMStats_info_edit";
$modversion['blocks'][3]['template'] = 'tdmstats_block_info.html';

//update
$modversion['onUpdate'] = 'include/update.php';

// All tables should not have any prefix!
$modversion['sqlfile']['mysql'] = "sql/mysql.sql";

$modversion['tables'][0]   = "TDMStats_count";
$modversion['tables'][1]   = "TDMStats_daycount";
$modversion['tables'][2]   = "TDMStats_referer";
$modversion['tables'][3]   = "TDMStats_hour";
$modversion['tables'][4]   = "TDMStats_today_hour";
$modversion['tables'][5]   = "TDMStats_browser";
$modversion['tables'][6]   = "TDMStats_os";
$modversion['tables'][7]   = "TDMStats_hostname";
$modversion['tables'][8]   = "TDMStats_week";
$modversion['tables'][9]   = "TDMStats_week_count";
$modversion['tables'][10]  = "TDMStats_mth";
$modversion['tables'][11]  = "TDMStats_mth_days";
$modversion['tables'][12]  = "TDMStats_screen";
$modversion['tables'][13]  = "TDMStats_color";
$modversion['tables'][14]  = "TDMStats_page";
$modversion['tables'][15]  = "TDMStats_modules";
$modversion['tables'][16]  = "TDMStats_pays";
$modversion['tables'][17]  = "TDMStats_usercount";

// Admin things
$modversion['hasAdmin']    = 1;
$modversion['system_menu']    = 1;
$modversion['adminindex'] = "admin/index.php";
$modversion['adminmenu'] = "admin/menu.php";

// Blocks

// Menu
$modversion['hasMain'] = 1;
$modversion['sub'][1]['name'] = _MI_ISTATS_SUMMARY;
$modversion['sub'][1]['url'] = "index.php?action=1";
$modversion['sub'][2]['name'] = _MI_ISTATS_SYSTEM;
$modversion['sub'][2]['url'] = "index.php?action=3";
$modversion['sub'][3]['name'] = _MI_ISTATS_TRAFFIC;
$modversion['sub'][3]['url'] = "index.php?action=2";

// Search
$modversion['hasSearch']   = 0;

// Comments
$modversion['hasComment']  = 0;

// Templates
$modversion['templates'][1]['file'] = 'tdmstats_index.html';
$modversion['templates'][1]['description'] = '';
$modversion['templates'][2]['file'] = 'tdmstats_summary.html';
$modversion['templates'][2]['description'] = '';
$modversion['templates'][3]['file'] = 'tdmstats_stats.html';
$modversion['templates'][3]['description'] = '';
$modversion['templates'][4]['file'] = 'tdmstats_user_info.html';
$modversion['templates'][4]['description'] = '';

$i=1;
$modversion['config'][$i]['name']	= 'longdate';
$modversion['config'][$i]['title']	= '_MI_ISTATS_DATE';
$modversion['config'][$i]['description']	= '_MI_ISTATS_DATE_DESC';
$modversion['config'][$i]['formtype']	= 'select';
$modversion['config'][$i]['valuetype']	= 'int';
$modversion['config'][$i]['default']	= 1;
$modversion['config'][$i]['options']	= array('_MI_ISTATS_DATE_FR' => '1','_MI_ISTATS_DATE_US' => '2');
$i++;
$modversion['config'][$i]['name']	= 'setlocal';
$modversion['config'][$i]['title']	= '_MI_ISTATS_SETLOCAL';
$modversion['config'][$i]['description']	= '';
$modversion['config'][$i]['formtype']	= 'select';
$modversion['config'][$i]['valuetype']	= 'text';
$modversion['config'][$i]['default']	= 'en_US.UTF-8';
$modversion['config'][$i]['options']	= array(
'fr_FR.UTF-8' => 'fr_FR.UTF-8',
'cs_CZ.UTF-8' => 'cs_CZ.UTF-8',
'de_DE.UTF-8' => 'de_DE.UTF-8',
'en_GB.UTF-8' => 'en_GB.UTF-8',
'en_IE.UTF-8' => 'en_IE.UTF-8',
'en_US.UTF-8' => 'en_US.UTF-8',
'es_ES.UTF-8' => 'es_ES.UTF-8',
'it_IT.UTF-8' => 'it_IT.UTF-8',
'pt_PT.UTF-8' => 'pt_PT.UTF-8',
'ru_RU.UTF-8' => 'ru_RU.UTF-8'


);
$i++;
$modversion['config'][$i]['name']	= 'setlocal2';
$modversion['config'][$i]['title']	= '';
$modversion['config'][$i]['description']	= '';
$modversion['config'][$i]['formtype']	= 'select';
$modversion['config'][$i]['valuetype']	= 'text';
$modversion['config'][$i]['default']	= 'eng';
$modversion['config'][$i]['options']	= array(
'fra' => 'fra',
'ces' => 'ces',
'deu' => 'deu',
'eng' => 'eng',
'esl' => 'esl',
'ita' => 'ita',
'por' => 'por',
'rus' => 'rus',


);
$i++;
$modversion['config'][$i]['name'] = 'maxpage';
$modversion['config'][$i]['title'] = '_MI_ISTATS_MAXPAGE';
$modversion['config'][$i]['description'] = '';
$modversion['config'][$i]['formtype'] = 'texbox';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = 20;
$i++;
$modversion['config'][$i]['name'] = 'maxsession';
$modversion['config'][$i]['title'] = '_MI_ISTATS_MAXSESSION';
$modversion['config'][$i]['description'] = '_MI_ISTATS_MAXSESSION_DESC';
$modversion['config'][$i]['formtype'] = 'texbox';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = 600;
$i++;
$modversion['config'][$i]['name'] = 'maxuser';
$modversion['config'][$i]['title'] = '_MI_ISTATS_MAXUSER';
$modversion['config'][$i]['description'] = '';
$modversion['config'][$i]['formtype'] = 'yesno';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = 0;
$i++;
$modversion['config'][$i]['name'] = 'maxusercount';
$modversion['config'][$i]['title'] = '_MI_ISTATS_MAXUSERCOUNT';
$modversion['config'][$i]['description'] = '';
$modversion['config'][$i]['formtype'] = 'texbox';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = 7;
$i++;

//$modversion['config'][5]['name']	= 'tdmstats_style';
//$modversion['config'][5]['title']	= '_MI_ISTATS_ONGLET';
//$modversion['config'][5]['description']	= '';
//$modversion['config'][5]['formtype']	= 'select';
//$modversion['config'][5]['valuetype']	= 'textarea';
//$modversion['config'][5]['default']	= 'cupertino';
//$modversion['config'][5]['options']	= array('cupertino' => 'cupertino', 'lightness' => 'lightness', 'darkness' => 'darkness', 'smoothness' => 'smoothness', 'start' => 'start', 'redmond' => 'redmond', 'sunny' => 'sunny', 'pepper' => 'pepper', 'eggplant' => 'eggplant' ,
//	'dark-hive' => 'dark-hive', 'excite' => 'excite', 'vader' => 'vader', 'trontastic' => 'trontastic' );
//
include_once XOOPS_ROOT_PATH . "/class/xoopslists.php";
$modversion["config"][$i]["name"]           = "tdmstats_bar";
$modversion["config"][$i]["title"]          = "_MI_ISTATS_BAR";
$modversion["config"][$i]["description"]    = "";
$modversion["config"][$i]["formtype"]       = "select";
$modversion["config"][$i]["valuetype"]      = "text";
$modversion["config"][$i]["default"]        = "bar0.png";
$modversion["config"][$i]["options"]        = XoopsLists::getFileListAsArray(XOOPS_ROOT_PATH . "/modules/".basename( dirname( __FILE__ ) )."/images/bar");
$modversion["config"][$i]["category"]       = "global";
$i++;
?>