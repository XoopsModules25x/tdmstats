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

include __DIR__ . '/../../mainfile.php';

include XOOPS_ROOT_PATH . '/header.php';
require_once __DIR__ . '/include/function.php';
$grouppermHandler = xoops_getHandler('groupperm');

$myts    = \MyTextSanitizer::getInstance();
$db_link = mysqli_connect(XOOPS_DB_HOST, XOOPS_DB_USER, XOOPS_DB_PASS);
mysqli_select_db(XOOPS_DB_NAME, $db_link);

//permission
if (is_object($xoopsUser)) {
    $groups = $xoopsUser->getGroups();
    $uid    = $xoopsUser->getVar('uid');
} else {
    $groups = XOOPS_GROUP_ANONYMOUS;
}

//fichier obligatoire
require_once XOOPS_ROOT_PATH . '/modules/' . $xoopsModule->dirname() . '/include/getresult.php';

///passer par admin
if (0 == $helper->getConfig('maxuser') && 1 == $groups[0]) {
    return;
}

/**
 * @changelog
 * passer par session
 */
$time = time();
if (isset($_SESSION['xoops_stats_expire']) && $_SESSION['xoops_stats_expire'] > $time) {
    return;
} else {
    $_SESSION['xoops_stats_expire'] = $time + $helper->getConfig('maxsession');
}

///temp user
if (!isset($_SESSION['tdmstats'])) {
    $_SESSION['tdmstats'] = true;
    $_SESSION['ip']       = $_SERVER['REMOTE_ADDR'];
    $_SESSION['start']    = time();
} else {
    $date   = formatTimestamp(time(), 'Y-m-d');
    $ip     = $_SERVER['REMOTE_ADDR'];
    $userid = isset($uid) ? $uid : false;
    $count  = round((time() - $_SESSION['start']) / 60);
    $check2 = getResult('SELECT * FROM ' . XOOPS_DB_PREFIX . "_tdmstats_usercount WHERE ip='$ip' AND date='$date'");
    if ($check2) {
        if ($userid) {
            $xoopsDB->query('UPDATE ' . XOOPS_DB_PREFIX . "_tdmstats_usercount SET userid='$userid', count=count+'$count' WHERE ip='$ip'");
        } else {
            $xoopsDB->query('UPDATE ' . XOOPS_DB_PREFIX . "_tdmstats_usercount SET count=count+'$count' WHERE ip='$ip'");
        }
    } else {
        $xoopsDB->query('INSERT INTO ' . XOOPS_DB_PREFIX . "_tdmstats_usercount VALUES('', '$userid', '$ip', '$date', $count)");
    }
}
////////////
/**
 * update page count
 *
 * @feature
 * Keeps total count of pages served, including refreshes and revisits
 */
$page = $_REQUEST['page'];

if ('' != $page) {
    $check_page = getResult('SELECT * FROM ' . XOOPS_DB_PREFIX . "_tdmstats_page WHERE page='$page'");
    if ($check_page) {
        $xoopsDB->query('UPDATE ' . XOOPS_DB_PREFIX . "_tdmstats_page SET count=count+1 WHERE page='$page'");
    } else {
        $xoopsDB->query('INSERT INTO ' . XOOPS_DB_PREFIX . "_tdmstats_page VALUES('', '$page', '1')");
    }
}

/**
 * update modules count
 *
 * @feature
 * Keeps total count of pages served, including refreshes and revisits
 */
if ('' != $_REQUEST['ismodule']) {
    $ismodule   = $_REQUEST['ismodule'];
    $check_page = getResult('SELECT * FROM ' . XOOPS_DB_PREFIX . "_tdmstats_modules WHERE modules='$ismodule'");
    if ($check_page) {
        $xoopsDB->query('UPDATE ' . XOOPS_DB_PREFIX . "_tdmstats_modules SET count=count+1 WHERE modules='$ismodule'");
    } else {
        $xoopsDB->query('INSERT INTO ' . XOOPS_DB_PREFIX . "_tdmstats_modules VALUES('', '$ismodule', '1')");
    }
}

/**
 * @note
 * trouver le pays et la ville .
 */
$no_ip  = $_SERVER['REMOTE_ADDR']; /*$no_ip="81.220.188.171";*/
$hostip = "http://api.hostip.info/get_html.php?ip=$no_ip";
$result = file($hostip);
//for country
$test = preg_match('/^(.*)\((.*)\)/', $result[0], $matches);
/*
Dans le tableau $result, on trouve :*/
$ispays    = strstr($result[0], ' ');
$iscountry = $matches[2];
if ('' != $result) {
    $check_pays = getResult('SELECT * FROM ' . XOOPS_DB_PREFIX . "_tdmstats_pays WHERE pays='$ispays'");
    if ($check_pays) {
        $xoopsDB->query('UPDATE ' . XOOPS_DB_PREFIX . "_tdmstats_pays SET count=count+1 , country='$iscountry' WHERE pays='$ispays'");
    } else {
        $xoopsDB->query('INSERT INTO ' . XOOPS_DB_PREFIX . "_tdmstats_pays VALUES('', '$ispays', '$iscountry', '1')");
    }
}

/**
 * @feature
 * Keeps a count of visitors per day
 */
// update daycount record

$date = formatTimestamp(time(), 'Y-m-d');

$check_date = getResult('SELECT * FROM ' . XOOPS_DB_PREFIX . "_tdmstats_daycount WHERE date='$date'");
if ($check_date) {
    $xoopsDB->query('UPDATE ' . XOOPS_DB_PREFIX . "_tdmstats_daycount SET daycount=daycount+1 WHERE date='$date'");
} else {
    $xoopsDB->query('INSERT INTO ' . XOOPS_DB_PREFIX . "_tdmstats_daycount VALUES('', '$date', '1')");
    $xoopsDB->query('UPDATE ' . XOOPS_DB_PREFIX . "_tdmstats_today_hour SET count='0'");
}

/**
 * @feature
 * Keeps a count of total visitors
 */
// update total visits
$xoopsDB->query('UPDATE ' . XOOPS_DB_PREFIX . '_tdmstats_count SET count=count+1');

/**
 * @feature
 * Keeps track of users hostnames
 */
// get user hostname
$r_hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
if ($r_hostname == $_SERVER['REMOTE_ADDR']) {
    $hostname = 'IP Only';
} else {
    $r_hostname = explode('.', $r_hostname);
    $host_size  = count($r_hostname);
    if (3 == $host_size) {
        $hostname = $r_hostname[$host_size - 2] . '.' . $r_hostname[$host_size - 1];
    } else {
        $hostname = $r_hostname[$host_size - 3] . '.' . $r_hostname[$host_size - 2] . '.' . $r_hostname[$host_size - 1];
    }
}

/**
 * @changelog
 * v1.01 Added $myts functions to clean up referer url?querystring
 */
// update is_hostname
$check_host = getResult('SELECT * FROM ' . XOOPS_DB_PREFIX . "_tdmstats_hostname WHERE hostname='$hostname'");
if ($check_host) {
    $xoopsDB->query('UPDATE ' . XOOPS_DB_PREFIX . "_tdmstats_hostname set count=count+1 WHERE hostname='$hostname'");
} else {
    $xoopsDB->query('INSERT INTO ' . XOOPS_DB_PREFIX . "_tdmstats_hostname VALUES('$hostname', '1')");
}

/**
 * @feature
 * Keeps track of referers
 */

$referer = $_SERVER['HTTP_REFERER'];
if (false === strpos($referer, XOOPS_URL)) {
    $check_ref = getResult('SELECT * FROM ' . XOOPS_DB_PREFIX . "_tdmstats_referer WHERE url='" . $referer . "'");
    if ($check_ref) {
        $xoopsDB->query('update ' . XOOPS_DB_PREFIX . "_tdmstats_referer set count=count+1 where url='" . $referer . "'");
    } elseif ('' != $referer) {
        $xoopsDB->query('INSERT INTO ' . XOOPS_DB_PREFIX . "_tdmstats_referer VALUES('', '" . $referer . "', '1')");
    }
}

/**
 * @feature
 * Keeps a count of visitors per week
 */
// update is_week

$is_week = formatTimestamp(time(), 'w');

$xoopsDB->query('update ' . XOOPS_DB_PREFIX . "_tdmstats_week set count=count+1 where day='$is_week'");

/**
 * @feature
 * Keeps track of users browser
 */

/**
 * @changelog
 * v1.02 Added more Browsers
 * v1.02 Improved browser detection.
 * v1.03 Improved browser detection
 */

/**
 * maybe keep original string if 'other' allowing for detection of new ones
 */

// get user browser
if (false !== strpos($_SERVER['HTTP_USER_AGENT'], 'Opera 7')) {
    $user_browser = 'Opera 7';
} elseif (false !== strpos($_SERVER['HTTP_USER_AGENT'], 'Googlebot')) {
    $user_browser = 'Googlebot';
} elseif (false !== strpos($_SERVER['HTTP_USER_AGENT'], 'msnbot')) {
    $user_browser = 'msnbot';
} elseif (false !== strpos($_SERVER['HTTP_USER_AGENT'], 'Yahoo')) {
    $user_browser = 'Yahoo';
} elseif (false !== strpos($_SERVER['HTTP_USER_AGENT'], 'Opera/9')) {
    $user_browser = 'Opera 9';
} elseif (false !== strpos($_SERVER['HTTP_USER_AGENT'], 'Opera/8')) {
    $user_browser = 'Opera 8';
} elseif (false !== strpos($_SERVER['HTTP_USER_AGENT'], 'Opera/7')) {
    $user_browser = 'Opera 7';
} elseif (false !== strpos($_SERVER['HTTP_USER_AGENT'], 'Konqueror/3')) {
    $user_browser = 'Konqueror 3';
} elseif (false !== strpos($_SERVER['HTTP_USER_AGENT'], 'Konqueror/2')) {
    $user_browser = 'Konqueror 2';
} elseif (false !== strpos($_SERVER['HTTP_USER_AGENT'], 'Navigator/9')) {
    $user_browser = 'Netscape 9';
} elseif (false !== strpos($_SERVER['HTTP_USER_AGENT'], 'Netscape/8')) {
    $user_browser = 'Netscape 8';
} elseif (false !== strpos($_SERVER['HTTP_USER_AGENT'], 'Netscape/7')) {
    $user_browser = 'Netscape 7';
} elseif (false !== strpos($_SERVER['HTTP_USER_AGENT'], 'Lynx')) {
    $user_browser = 'Lynx';
} elseif (false !== strpos($_SERVER['HTTP_USER_AGENT'], 'Links')) {
    $user_browser = 'Links';
} elseif (false !== strpos($_SERVER['HTTP_USER_AGENT'], 'OmniWeb')) {
    $user_browser = 'OmniWeb';
} elseif (false !== strpos($_SERVER['HTTP_USER_AGENT'], 'WebTV')) {
    $user_browser = 'WebTV';
} elseif (false !== strpos($_SERVER['HTTP_USER_AGENT'], 'Avant Browser')) {
    $user_browser = 'Avant Browser';
} elseif (false !== strpos($_SERVER['HTTP_USER_AGENT'], 'MyIE2')) {
    $user_browser = 'MyIE2';
} elseif (false !== strpos($_SERVER['HTTP_USER_AGENT'], 'Galeon')) {
    $user_browser = 'Galeon';
} elseif (false !== strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 8')) {
    $user_browser = 'Internet Explorer 8';
} elseif (false !== strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 7')) {
    $user_browser = 'Internet Explorer 7';
} elseif (false !== strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 6')) {
    $user_browser = 'Internet Explorer 6';
//adding firefox
} elseif (false !== strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox/3')) {
    $user_browser = 'Firefox 3';
} elseif (false !== strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox/2')) {
    $user_browser = 'Firefox 2';
} elseif (false !== strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox/1')) {
    $user_browser = 'Firefox 1';
//
} elseif (false !== strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome/3')) {
    $user_browser = 'Chrome 3';
} elseif (false !== strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome/2')) {
    $user_browser = 'Chrome 2';
} elseif (false !== strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome/1')) {
    $user_browser = 'Chrome 1';
} elseif (false !== strpos($_SERVER['HTTP_USER_AGENT'], 'Gecko')) {
    $user_browser = 'Gecko';
} else {
    $user_browser = 'Other';
}

// update browser record
$check_week = getResult('SELECT * FROM ' . XOOPS_DB_PREFIX . "_tdmstats_browser WHERE browser='$user_browser'");
if ($check_week) {
    $xoopsDB->query('UPDATE ' . XOOPS_DB_PREFIX . "_tdmstats_browser SET count=count+1 WHERE browser='$user_browser'");
} else {
    $xoopsDB->query('INSERT INTO ' . XOOPS_DB_PREFIX . "_tdmstats_browser VALUES('$user_browser', '1')");
}

/**
 * @feature
 * Keeps track of users OS
 */

/**
 * @changelog
 * v1.02 Added more OS's
 * v1.02 Improved OS detection
 */
// get user os
if (false !== strpos($_SERVER['HTTP_USER_AGENT'], 'Windows NT 6.1')) {
    $user_os = 'Windows Seven';
} elseif (false !== strpos($_SERVER['HTTP_USER_AGENT'], 'Windows NT 6.0')) {
    $user_os = 'Windows Vista';
} elseif (false !== strpos($_SERVER['HTTP_USER_AGENT'], 'Windows NT 5.1')) {
    $user_os = 'Windows XP';
} elseif (false !== strpos($_SERVER['HTTP_USER_AGENT'], 'Windows NT 5.2')) {
    $user_os = 'Windows Server 2003';
} elseif (false !== strpos($_SERVER['HTTP_USER_AGENT'], 'Windows NT 5.0')) {
    $user_os = 'Windows 2000';
} elseif (false !== strpos($_SERVER['HTTP_USER_AGENT'], 'Windows NT 4')) {
    $user_os = 'Windows NT 4.0';
} elseif (false !== strpos($_SERVER['HTTP_USER_AGENT'], 'Windows 98')
          || false !== strpos($_SERVER['HTTP_USER_AGENT'], 'Win 98')) {
    $user_os = 'Windows 98';
} elseif (false !== strpos($_SERVER['HTTP_USER_AGENT'], 'Windows 95')
          || false !== strpos($_SERVER['HTTP_USER_AGENT'], 'Win 95')) {
    $user_os = 'Windows 95';
} elseif (false !== strpos($_SERVER['HTTP_USER_AGENT'], 'Windows 9')
          || false !== strpos($_SERVER['HTTP_USER_AGENT'], 'Win 9')) {
    $user_os = 'Windows 9x';
} elseif (false !== strpos($_SERVER['HTTP_USER_AGENT'], 'Windows Me')
          || false !== strpos($_SERVER['HTTP_USER_AGENT'], 'winme')) {
    $user_os = 'Windows Me';
} elseif (false !== strpos($_SERVER['HTTP_USER_AGENT'], 'Win32')) {
    $user_os = 'Win32';
} elseif (false !== strpos($_SERVER['HTTP_USER_AGENT'], 'PPC')
          || false !== strpos($_SERVER['HTTP_USER_AGENT'], 'Mac_PowerPC')) {
    $user_os = 'Mac Power PC';
} elseif (false !== strpos($_SERVER['HTTP_USER_AGENT'], 'Mac OS X')) {
    $user_os = 'Mac OS X';
} elseif (false !== strpos($_SERVER['HTTP_USER_AGENT'], 'Mac')) {
    $user_os = 'Macintosh';
//remove X11
    // } elseif (false !== strpos($_SERVER['HTTP_USER_AGENT'], "X11")) {
    //   $user_os = "X11";
} elseif (false !== strpos($_SERVER['HTTP_USER_AGENT'], 'SunOS')) {
    $user_os = 'SunOS';
} elseif (false !== strpos($_SERVER['HTTP_USER_AGENT'], 'BeOS')) {
    $user_os = 'BeOS';
} elseif (false !== strpos($_SERVER['HTTP_USER_AGENT'], 'FreeBSD')) {
    $user_os = 'FreeBSD';
} elseif (false !== strpos($_SERVER['HTTP_USER_AGENT'], 'OpenBSD')) {
    $user_os = 'OpenBSD';
} elseif (false !== strpos($_SERVER['HTTP_USER_AGENT'], 'IRIX')) {
    $user_os = 'IRIX';
} elseif (false !== strpos($_SERVER['HTTP_USER_AGENT'], 'OS/2')) {
    $user_os = 'OS/2';
} elseif (false !== strpos($_SERVER['HTTP_USER_AGENT'], 'Plan9')) {
    $user_os = 'Plan9';
} elseif (false !== strpos($_SERVER['HTTP_USER_AGENT'], 'OSF')) {
    $user_os = 'OSF';
} elseif (false !== strpos($_SERVER['HTTP_USER_AGENT'], 'HP-UX')) {
    $user_os = 'HP-UX';
} elseif (false !== strpos($_SERVER['HTTP_USER_AGENT'], 'Fedora')) {
    $user_os = 'Linux Fedora';
} elseif (false !== strpos($_SERVER['HTTP_USER_AGENT'], 'Ubuntu')) {
    $user_os = 'Linux Ubuntu';
} elseif (false !== strpos($_SERVER['HTTP_USER_AGENT'], 'Linux')) {
    $user_os = 'Linux';
} elseif (false !== strpos($_SERVER['HTTP_USER_AGENT'], 'unix')) {
    $user_os = 'Other Unix';
} else {
    $user_os = 'Other';
}

// update os record
$check_week = getResult('SELECT * FROM ' . XOOPS_DB_PREFIX . "_tdmstats_os WHERE os='$user_os'");
if ($check_week) {
    $xoopsDB->query('UPDATE ' . XOOPS_DB_PREFIX . "_tdmstats_os SET count=count+1 WHERE os='$user_os'");
} else {
    $xoopsDB->query('INSERT INTO ' . XOOPS_DB_PREFIX . "_tdmstats_os (os, count) VALUES('$user_os', '1')");
}

/**
 * @feature
 * Keeps track of visitors per hour (accumulative)
 */
// update hour record

$is_hour = formatTimestamp(time(), 'H');

$xoopsDB->query('update ' . XOOPS_DB_PREFIX . "_tdmstats_hour set count=count+1 where hour='$is_hour'");

/**
 * @feature
 * Keeps track of visitors per hour (daily)
 */
// update today hour record
$xoopsDB->query('update ' . XOOPS_DB_PREFIX . "_tdmstats_today_hour set count=count+1 where hour='$is_hour'");

$week = formatTimestamp(time(), 'W');
$mth  = date('m');
$year = formatTimestamp(time(), 'Y');

/**
 * @feature
 * Keeps track of visitors per hour (weekly)
 */
$check_week = getResult('SELECT * FROM ' . XOOPS_DB_PREFIX . "_tdmstats_week_count WHERE week='$week' AND year='$year'");
if ($check_week) {
    $xoopsDB->query('UPDATE ' . XOOPS_DB_PREFIX . "_tdmstats_week_count SET count=count+1 WHERE week='$week' AND year='$year'");
} else {
    $xoopsDB->query('INSERT INTO ' . XOOPS_DB_PREFIX . "_tdmstats_week_count VALUES('', '$week', '$year', '1')");
}

/**
 * @feature
 * Keeps track of visitors per hour (monthly)
 */
$check_mth = getResult('SELECT * FROM ' . XOOPS_DB_PREFIX . "_tdmstats_mth WHERE mth='$mth' AND year='$year'");
if ($check_mth) {
    $xoopsDB->query('UPDATE ' . XOOPS_DB_PREFIX . "_tdmstats_mth SET count=count+1 WHERE mth='$mth' AND year='$year'");
} else {
    $xoopsDB->query('INSERT INTO ' . XOOPS_DB_PREFIX . "_tdmstats_mth VALUES('', '$mth', '$year', '1')");
    $xoopsDB->query('UPDATE ' . XOOPS_DB_PREFIX . '_tdmstats_mth_days SET count=0');
}

/**
 * @feature
 * Keeps track of visitors per month
 */

$day = formatTimestamp(time(), 'd');

$xoopsDB->query('UPDATE ' . XOOPS_DB_PREFIX . "_tdmstats_mth_days SET count=count+1 WHERE day='$day'");

/**
 * @feature
 * Keeps track of visitors screen size ie 800x600
 */
// update screen width
switch ($_REQUEST['sw']) {

    case '640':
        $sw_id = 1;
        break;

    case '800':
        $sw_id = 2;
        break;

    case '1024':
        $sw_id = 3;
        break;

    case '1152':
        $sw_id = 4;
        break;

    case '1280':
        $sw_id = 5;
        break;

    case '1600':
        $sw_id = 6;
        break;

    case '2048':
        $sw_id = 7;
        break;

    case '2560':
        $sw_id = 8;
        break;

    case '3200':
        $sw_id = 9;
        break;

    case '1920':
        $sw_id = 11;
        break;

    default:
        $sw_id = 10;
        break;
}
$xoopsDB->query('UPDATE ' . XOOPS_DB_PREFIX . "_tdmstats_screen SET count=count+1 WHERE id='$sw_id'");

/**
 * @feature
 * Keeps track of visitors screen colour depth
 */
// update screen color
switch ($_REQUEST['sc']) {

    case '8':
        $sc_id = 1;
        break;

    case '16':
        $sc_id = 2;
        break;

    case '24':
        $sc_id = 3;
        break;

    case '32':
        $sc_id = 4;
        break;

    default:
        $sc_id = 5;
        break;

}

$xoopsDB->query('UPDATE ' . XOOPS_DB_PREFIX . "_tdmstats_color SET count=count+1 WHERE id='$sc_id'");
