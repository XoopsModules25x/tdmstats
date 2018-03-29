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
 * @copyright    {@link https://xoops.org/ XOOPS Project}
 * @license      {@link http://www.gnu.org/licenses/gpl-2.0.html GNU GPL 2 or later}
 * @package       tdmstats
 * @since
 * @author       TDM   - TEAM DEV MODULE FOR XOOPS
 * @author       XOOPS Development Team
 */

use XoopsModules\Tdmstats;
/** @var Tdmstats\Helper $helper */
$helper = Tdmstats\Helper::getInstance();

$GLOBALS['xoopsOption']['template_main'] = 'tdmstats_user_info.tpl';
require_once XOOPS_ROOT_PATH . '/header.php';

if (!$gpermHandler->checkRight('istats_view', 16, $groups, $xoopsModule->getVar('mid'))) {
    redirect_header(XOOPS_URL, 1, _AM_QUERYNOPERM);
}

$xoopsTpl->assign('lang_by_browser', _AM_BY_BROWSER);
$xoopsTpl->assign('lang_by_os', _AM_BY_OS);
$xoopsTpl->assign('lang_sw_sw', _AM_SW_SW);
$xoopsTpl->assign('lang_sc_sc', _AM_SC_SC);
$xoopsTpl->assign('lang_by_host', _AM_BY_HOST);
$xoopsTpl->assign('lang_bro_bro', _AM_BRO_BRO);

//broser item
global $xoopsDB;
$bro_info = getResult('SELECT * FROM ' . $xoopsDB->prefix('tdmstats_browser') . ' ORDER BY count DESC LIMIT 3');

for ($i = 0, $iMax = count($bro_info); $i < $iMax; ++$i) {

    //$browser['info'][] = $bro_info[$i]['count'];
    //$browser['browser'][] = $bro_info[$i]['browser'];
    //$browser['percent'][] = round($bro_percent, '2');

    $xoopsTpl->append('item_browsers', [
        'id'      => 'bro' . $i,
        'browser' => $bro_info[$i]['browser'],
        'info'    => $bro_info[$i]['count']
    ]);
}
//broser

global $xoopsDB;
$bro_info  = getResult('SELECT * FROM ' . $xoopsDB->prefix('tdmstats_browser') . ' ORDER BY count DESC');
$bro_total = getResult('SELECT SUM(count) AS sum FROM ' . $xoopsDB->prefix('tdmstats_browser') . '');

for ($i = 0, $iMax = count($bro_info); $i < $iMax; ++$i) {
    if ($bro_total[0]['sum'] > 0) {
        $bro_percent = $bro_info[$i]['count'] * 100 / $bro_total[0]['sum'];
    } else {
        $bro_percent = 0;
        $bro_bar     = 0;
    }
    $bro_no               = $i + 1;
    $browser['info'][]    = $bro_info[$i]['count'];
    $browser['browser'][] = $bro_info[$i]['browser'];
    $browser['percent'][] = round($bro_percent, '2');

    if ($bro_percent > 0) {
        //$xoopsTpl->append('browsers', array('id' => 'bro'.$i, 'browser' => $bro_info[$i]['browser'], 'info' => $bro_info[$i]['count'], 'percent' => round($bro_percent, '2')));
        $xoopsTpl->append('browsers_map', [
            'id'      => 'bro' . $i,
            'browser' => $bro_info[$i]['browser'],
            'info'    => $bro_info[$i]['count'],
            'percent' => round($bro_percent, '2')
        ]);
    }
}

$xoopsTpl->assign('lang_os_os', _AM_OS_OS);

///////// ITEM OS ////////////
global $xoopsDB;
$os_info = getResult('SELECT * FROM ' . $xoopsDB->prefix('tdmstats_os') . ' ORDER BY count DESC LIMIT 3');

for ($i = 0, $iMax = count($os_info); $i < $iMax; ++$i) {

    //$os['info'][] = $os_info[$i]['count'];
    //$os['os'][] = $os_info[$i]['os'];
    //$os['percent'][] = round($os_percent, '2');

    $xoopsTpl->append('item_os', ['id' => 'os' . $i, 'os' => $os_info[$i]['os'], 'info' => $os_info[$i]['count']]);
}
/////////OS ////////////
global $xoopsDB;
$os_info  = getResult('SELECT * FROM ' . $xoopsDB->prefix('tdmstats_os') . ' ORDER BY count DESC');
$os_total = getResult('SELECT SUM(count) AS sum FROM ' . $xoopsDB->prefix('tdmstats_os') . '');

for ($i = 0, $iMax = count($os_info); $i < $iMax; ++$i) {
    if ($os_total[0]['sum'] > 0) {
        $os_percent = $os_info[$i]['count'] * 100 / $os_total[0]['sum'];
    } else {
        $os_percent = 0;
        $os_bar     = 0;
    }
    $os_no           = $i + 1;
    $os['info'][]    = $os_info[$i]['count'];
    $os['os'][]      = $os_info[$i]['os'];
    $os['percent'][] = round($os_percent, '2');

    if ($os_percent > 0) {
        //$xoopsTpl->append('oss', array('id' => 'os'.$i, 'os' => $os_info[$i]['os'], 'info' => $os_info[$i]['count'], 'percent' => round($os_percent, '2')));
        $xoopsTpl->append('oss_map', [
            'id'      => 'os' . $i,
            'os'      => $os_info[$i]['os'],
            'info'    => $os_info[$i]['count'],
            'percent' => round($os_percent, '2')
        ]);
    }
}

///////////////////ITEM SW/////////
global $xoopsDB;
$sw_info = getResult('SELECT * FROM ' . $xoopsDB->prefix('tdmstats_screen') . ' ORDER BY count DESC LIMIT 3');

for ($i = 0, $iMax = count($sw_info); $i < $iMax; ++$i) {

    //$sw['info'][] = $sw_info[$i]['count'];
    //$sw['sw'][] = $sw_info[$i]['width'];
    //$sw['percent'][] = round($sw_percent, '2');

    $xoopsTpl->append('item_sw', ['id' => 'sw' . $i, 'sw' => $sw_info[$i]['width'], 'info' => $sw_info[$i]['count']]);
}
///////////////////SW/////////
global $xoopsDB;
$sw_info  = getResult('SELECT * FROM ' . $xoopsDB->prefix('tdmstats_screen') . ' ORDER BY count DESC');
$sw_total = getResult('SELECT SUM(count) AS sum FROM ' . $xoopsDB->prefix('tdmstats_screen') . '');

for ($i = 0, $iMax = count($sw_info); $i < $iMax; ++$i) {
    if ($os_total[0]['sum'] > 0) {
        $sw_percent = $sw_info[$i]['count'] * 100 / $sw_total[0]['sum'];
    } else {
        $sw_percent = 0;
        $sw_bar     = 0;
    }
    $sw_no           = $i + 1;
    $sw['info'][]    = $sw_info[$i]['count'];
    $sw['sw'][]      = $sw_info[$i]['width'];
    $sw['percent'][] = round($sw_percent, '2');

    if ($sw_percent > 0) {
        //$xoopsTpl->append('sws', array('id' => 'sw'.$i, 'sw' => $sw_info[$i]['width'], 'info' => $sw_info[$i]['count'], 'percent' => round($sw_percent, '2')));
        $xoopsTpl->append('sws_map', [
            'id'      => 'sw' . $i,
            'sw'      => $sw_info[$i]['width'],
            'info'    => $sw_info[$i]['count'],
            'percent' => round($sw_percent, '2')
        ]);
    }
}

/////////////// ITEM SC/////////////////////////
global $xoopsDB;
$sc_info = getResult('SELECT * FROM ' . $xoopsDB->prefix('tdmstats_color') . ' ORDER BY count DESC LIMIT 3');

for ($i = 0, $iMax = count($sc_info); $i < $iMax; ++$i) {

    //$sc['info'][] = $sc_info[$i]['count'];
    //$sc['sc'][] = $sc_info[$i]['color'];
    //$sc['percent'][] = round($sc_percent, '2');

    $xoopsTpl->append('item_sc', ['id' => 'sc' . $i, 'sc' => $sc_info[$i]['color'], 'info' => $sc_info[$i]['count']]);
}
///////////////SC/////////////////////////
global $xoopsDB;
$sc_info  = getResult('SELECT * FROM ' . $xoopsDB->prefix('tdmstats_color') . ' ORDER BY count DESC');
$sc_total = getResult('SELECT SUM(count) AS sum FROM ' . $xoopsDB->prefix('tdmstats_color') . '');

for ($i = 0, $iMax = count($sc_info); $i < $iMax; ++$i) {
    if ($sc_total[0]['sum'] > 0) {
        $sc_percent = $sc_info[$i]['count'] * 100 / $sc_total[0]['sum'];
    } else {
        $sc_percent = 0;
        $sc_bar     = 0;
    }
    $sc_no           = $i + 1;
    $sc['info'][]    = $sc_info[$i]['count'];
    $sc['sc'][]      = $sc_info[$i]['color'];
    $sc['percent'][] = round($sc_percent, '2');

    if ($sc_percent > 0) {
        //$xoopsTpl->append('scs', array('id' => 'sc'.$i, 'sc' => $sc_info[$i]['color'], 'info' => $sc_info[$i]['count'], 'percent' => round($sc_percent, '2')));
        $xoopsTpl->append('scs_map', [
            'id'      => 'sc' . $i,
            'sc'      => $sc_info[$i]['color'],
            'info'    => $sc_info[$i]['count'],
            'percent' => round($sc_percent, '2')
        ]);
    }
}

$xoopsTpl->assign('lang_host_host', _AM_HOST_HOST);

//////////ITEM HOST/////////////
global $xoopsDB;
$max       = $helper->getConfig('maxpage');
$host_info = getResult('SELECT DISTINCT hostname, count FROM ' . $xoopsDB->prefix('tdmstats_hostname') . ' ORDER BY count DESC LIMIT 3');

for ($i = 0, $iMax = count($host_info); $i < $iMax; ++$i) {

    //$host['info'][] = $host_info[$i]['count'];
    //$host['host'][] = $host_info[$i]['hostname'];
    //$host['percent'][] = round($host_percent, '2');

    $xoopsTpl->append('item_host', [
        'id'   => 'host' . $i,
        'host' => $host_info[$i]['hostname'],
        'info' => $host_info[$i]['count']
    ]);
}

//////////HOST/////////////
global $xoopsDB;
$max        = $helper->getConfig('maxpage');
$host_info  = getResult('select distinct hostname, count from ' . $xoopsDB->prefix('tdmstats_hostname') . " order by count desc limit $max");
$host_total = getResult('SELECT SUM(count) AS sum FROM ' . $xoopsDB->prefix('tdmstats_hostname') . '');

for ($i = 0, $iMax = count($host_info); $i < $iMax; ++$i) {
    if ($host_total[0]['sum'] > 0) {
        $host_percent = $host_info[$i]['count'] * 100 / $host_total[0]['sum'];
    } else {
        $host_percent = 0;
    }
    $host_no           = $i + 1;
    $host['info'][]    = $host_info[$i]['count'];
    $host['host'][]    = $host_info[$i]['hostname'];
    $host['percent'][] = round($host_percent, '2');

    //$xoopsTpl->append('hosts', array('id' => 'host'.$i, 'host' => $host_info[$i]['hostname'], 'info' => $host_info[$i]['count'], 'percent' => round($host_percent, '2')));
    $xoopsTpl->append('hosts_map', [
        'id'      => 'host' . $i,
        'host'    => $host_info[$i]['hostname'],
        'info'    => $host_info[$i]['count'],
        'percent' => round($host_percent, '2')
    ]);
}
