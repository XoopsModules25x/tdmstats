<?php
/*
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */

/**
 * @copyright     {@link https://xoops.org/ XOOPS Project}
 * @license       {@link https://www.gnu.org/licenses/gpl-2.0.html GNU GPL 2 or later}
 * @package       tdmstats
 * @since
 * @author        TDM   - TEAM DEV MODULE FOR XOOPS
 * @author        XOOPS Development Team
 */
require_once __DIR__ . '/preloads/autoloader.php';

$modversion['version']             = '1.1.0';
$modversion['module_status']       = 'RC-2';
$modversion['release_date']        = '2022/02/20';
$modversion['name']                = 'TDMStats';
$modversion['description']         = _MI_ISTATS_DESC;
$modversion['author']              = 'Original module: Paul Cooke (alias Scripter)<br><b>Adaptation/rewrite: TDM.</b>';
$modversion['author_website_url']  = 'http://www.tdmxoops.net/';
$modversion['author_website_name'] = 'Team Dev Module';
$modversion['credits']             = 'Sam Tang for the original i_Stats script.
                                      <br> Traduction Spanish thanks Don Curioso
                                      <br> Traduction Persian thanks Voltan';
$modversion['help']                = 'page=help';
$modversion['license']             = 'GNU GPL 2.0';
$modversion['license_url']         = 'www.gnu.org/licenses/gpl-2.0.html';
$modversion['official']            = 0; //1 indicates supported by Xoops CORE Dev Team, 0 means 3rd party supported
$modversion['image']               = 'assets/images/logoModule.png';
$modversion['dirname']             = basename(__DIR__);
$modversion['dirmoduleadmin']      = '/Frameworks/moduleclasses/moduleadmin';
$modversion['icons16']             = '../../Frameworks/moduleclasses/icons/16';
$modversion['icons32']             = '../../Frameworks/moduleclasses/icons/32';
$modversion['release_file']        = XOOPS_URL . '/modules/' . $modversion['dirname'] . '/docs/changelog.txt';
$modversion['module_website_url']  = 'www.xoops.org';
$modversion['module_website_name'] = 'XOOPS';
$modversion['min_php']             = '7.2';
$modversion['min_xoops']           = '2.5.10';
$modversion['min_admin']           = '1.2';
$modversion['min_db']              = ['mysql' => '5.5'];

// ------------------- Help files ------------------- //
$modversion['helpsection'] = [
    ['name' => _MI_ISTATS_OVERVIEW, 'link' => 'page=help'],
    ['name' => _MI_ISTATS_DISCLAIMER, 'link' => 'page=disclaimer'],
    ['name' => _MI_ISTATS_LICENSE, 'link' => 'page=license'],
    ['name' => _MI_ISTATS_SUPPORT, 'link' => 'page=support'],
];

// Blocks
$modversion['blocks'][1]['file']        = 'tdmstats_blocks.php';
$modversion['blocks'][1]['name']        = _MI_ISTATS_NAME;
$modversion['blocks'][1]['description'] = _MI_ISTATS_NAME_DESC;
$modversion['blocks'][1]['show_func']   = 'b_tdmstats_show';
$modversion['blocks'][1]['options']     = '1';
$modversion['blocks'][1]['edit_func']   = 'b_tdmstats_edit';
$modversion['blocks'][1]['template']    = 'tdmstats_block_show.tpl';

$modversion['blocks'][2]['file']        = 'tdmstats_blocks.php';
$modversion['blocks'][2]['name']        = _MI_ISTATS_CNT;
$modversion['blocks'][2]['description'] = _MI_ISTATS_CNT_DESC;
$modversion['blocks'][2]['show_func']   = 'b_tdmstats_counter_show';
$modversion['blocks'][2]['options']     = '1|6|default';
$modversion['blocks'][2]['edit_func']   = 'b_tdmstats_counter_edit';
$modversion['blocks'][2]['template']    = 'tdmstats_block_counter.tpl';

$modversion['blocks'][3]['file']        = 'tdmstats_blocks.php';
$modversion['blocks'][3]['name']        = _MI_ISTATS_INFO;
$modversion['blocks'][3]['description'] = _MI_ISTATS_INFO_DESC;
$modversion['blocks'][3]['show_func']   = 'b_tdmstats_info_show';
$modversion['blocks'][3]['options']     = '1|6|default';
$modversion['blocks'][3]['edit_func']   = 'b_tdmstats_info_edit';
$modversion['blocks'][3]['template']    = 'tdmstats_block_info.tpl';

//update
$modversion['onUpdate'] = 'include/update.php';

// All tables should not have any prefix!
$modversion['sqlfile']['mysql'] = 'sql/mysql.sql';

$modversion['tables'][18] = 'tdmstats_counter';
$modversion['tables'][1]  = 'tdmstats_daycount';
$modversion['tables'][2]  = 'tdmstats_referer';
$modversion['tables'][3]  = 'tdmstats_hour';
$modversion['tables'][4]  = 'tdmstats_today_hour';
$modversion['tables'][5]  = 'tdmstats_browser';
$modversion['tables'][6]  = 'tdmstats_os';
$modversion['tables'][7]  = 'tdmstats_hostname';
$modversion['tables'][8]  = 'tdmstats_week';
$modversion['tables'][9]  = 'tdmstats_week_count';
$modversion['tables'][10] = 'tdmstats_mth';
$modversion['tables'][11] = 'tdmstats_mth_days';
$modversion['tables'][12] = 'tdmstats_screen';
$modversion['tables'][13] = 'tdmstats_color';
$modversion['tables'][14] = 'tdmstats_page';
$modversion['tables'][15] = 'tdmstats_modules';
$modversion['tables'][16] = 'tdmstats_pays';
$modversion['tables'][17] = 'tdmstats_usercount';
$modversion['tables'][18] = 'tdmstats_referer';
$modversion['tables'][19] = 'tdmstats_hour';

// Admin things
$modversion['hasAdmin']    = 1;
$modversion['system_menu'] = 1;
$modversion['adminindex']  = 'admin/index.php';
$modversion['adminmenu']   = 'admin/menu.php';

// Blocks

// Menu
$modversion['hasMain']        = 1;
$modversion['sub'][1]['name'] = _MI_ISTATS_SUMMARY;
$modversion['sub'][1]['url']  = 'index.php?action=1';
$modversion['sub'][2]['name'] = _MI_ISTATS_SYSTEM;
$modversion['sub'][2]['url']  = 'index.php?action=3';
$modversion['sub'][3]['name'] = _MI_ISTATS_TRAFFIC;
$modversion['sub'][3]['url']  = 'index.php?action=2';

// Search
$modversion['hasSearch'] = 0;

// Comments
$modversion['hasComment'] = 0;

// Templates
$modversion['templates'][1]['file']        = 'tdmstats_index.tpl';
$modversion['templates'][1]['description'] = '';
$modversion['templates'][2]['file']        = 'tdmstats_summary.tpl';
$modversion['templates'][2]['description'] = '';
$modversion['templates'][3]['file']        = 'tdmstats_stats.tpl';
$modversion['templates'][3]['description'] = '';
$modversion['templates'][4]['file']        = 'tdmstats_user_info.tpl';
$modversion['templates'][4]['description'] = '';

$i                                       = 1;
$modversion['config'][$i]['name']        = 'longdate';
$modversion['config'][$i]['title']       = '_MI_ISTATS_DATE';
$modversion['config'][$i]['description'] = '_MI_ISTATS_DATE_DESC';
$modversion['config'][$i]['formtype']    = 'select';
$modversion['config'][$i]['valuetype']   = 'int';
$modversion['config'][$i]['default']     = 1;
$modversion['config'][$i]['options']     = ['_MI_ISTATS_DATE_FR' => '1', '_MI_ISTATS_DATE_US' => '2'];
++$i;
$modversion['config'][$i]['name']        = 'setlocal';
$modversion['config'][$i]['title']       = '_MI_ISTATS_SETLOCAL';
$modversion['config'][$i]['description'] = '';
$modversion['config'][$i]['formtype']    = 'select';
$modversion['config'][$i]['valuetype']   = 'text';
$modversion['config'][$i]['default']     = 'en_US.UTF-8';
$modversion['config'][$i]['options']     = [
    'fr_FR.UTF-8' => 'fr_FR.UTF-8',
    'cs_CZ.UTF-8' => 'cs_CZ.UTF-8',
    'de_DE.UTF-8' => 'de_DE.UTF-8',
    'en_GB.UTF-8' => 'en_GB.UTF-8',
    'en_IE.UTF-8' => 'en_IE.UTF-8',
    'en_US.UTF-8' => 'en_US.UTF-8',
    'es_ES.UTF-8' => 'es_ES.UTF-8',
    'it_IT.UTF-8' => 'it_IT.UTF-8',
    'pt_PT.UTF-8' => 'pt_PT.UTF-8',
    'ru_RU.UTF-8' => 'ru_RU.UTF-8',
];
++$i;
$modversion['config'][$i]['name']        = 'setlocal2';
$modversion['config'][$i]['title']       = '_MI_ISTATS_SETLOCAL';
$modversion['config'][$i]['description'] = '';
$modversion['config'][$i]['formtype']    = 'select';
$modversion['config'][$i]['valuetype']   = 'text';
$modversion['config'][$i]['default']     = 'eng';
$modversion['config'][$i]['options']     = [
    'fra' => 'fra',
    'ces' => 'ces',
    'deu' => 'deu',
    'eng' => 'eng',
    'esl' => 'esl',
    'ita' => 'ita',
    'por' => 'por',
    'rus' => 'rus',
];
++$i;
$modversion['config'][$i]['name']        = 'maxpage';
$modversion['config'][$i]['title']       = '_MI_ISTATS_MAXPAGE';
$modversion['config'][$i]['description'] = '';
$modversion['config'][$i]['formtype']    = 'texbox';
$modversion['config'][$i]['valuetype']   = 'int';
$modversion['config'][$i]['default']     = 20;
++$i;
$modversion['config'][$i]['name']        = 'maxsession';
$modversion['config'][$i]['title']       = '_MI_ISTATS_MAXSESSION';
$modversion['config'][$i]['description'] = '_MI_ISTATS_MAXSESSION_DESC';
$modversion['config'][$i]['formtype']    = 'texbox';
$modversion['config'][$i]['valuetype']   = 'int';
$modversion['config'][$i]['default']     = 600;
++$i;
$modversion['config'][$i]['name']        = 'maxuser';
$modversion['config'][$i]['title']       = '_MI_ISTATS_MAXUSER';
$modversion['config'][$i]['description'] = '';
$modversion['config'][$i]['formtype']    = 'yesno';
$modversion['config'][$i]['valuetype']   = 'int';
$modversion['config'][$i]['default']     = 0;
++$i;
$modversion['config'][$i]['name']        = 'maxusercount';
$modversion['config'][$i]['title']       = '_MI_ISTATS_MAXUSERCOUNT';
$modversion['config'][$i]['description'] = '';
$modversion['config'][$i]['formtype']    = 'texbox';
$modversion['config'][$i]['valuetype']   = 'int';
$modversion['config'][$i]['default']     = 7;
++$i;

//$modversion['config'][5]['name']  = 'tdmstats_style';
//$modversion['config'][5]['title'] = '_MI_ISTATS_ONGLET';
//$modversion['config'][5]['description']   = '';
//$modversion['config'][5]['formtype']  = 'select';
//$modversion['config'][5]['valuetype'] = 'textarea';
//$modversion['config'][5]['default']   = 'cupertino';
//$modversion['config'][5]['options']   = array('cupertino' => 'cupertino', 'lightness' => 'lightness', 'darkness' => 'darkness', 'smoothness' => 'smoothness', 'start' => 'start', 'redmond' => 'redmond', 'sunny' => 'sunny', 'pepper' => 'pepper', 'eggplant' => 'eggplant' ,
//  'dark-hive' => 'dark-hive', 'excite' => 'excite', 'vader' => 'vader', 'trontastic' => 'trontastic' );
//
require_once XOOPS_ROOT_PATH . '/class/xoopslists.php';
$modversion['config'][$i]['name']        = 'tdmstats_bar';
$modversion['config'][$i]['title']       = '_MI_ISTATS_BAR';
$modversion['config'][$i]['description'] = '';
$modversion['config'][$i]['formtype']    = 'select';
$modversion['config'][$i]['valuetype']   = 'text';
$modversion['config'][$i]['default']     = 'bar0.png';
$modversion['config'][$i]['options']     = \XoopsLists::getFileListAsArray(XOOPS_ROOT_PATH . '/modules/' . basename(__DIR__) . '/assets/images/bar');
$modversion['config'][$i]['category']    = 'global';
++$i;
