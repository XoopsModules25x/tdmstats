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

include __DIR__ . '/../../mainfile.php';
require XOOPS_ROOT_PATH . '/header.php';

require_once __DIR__ . '/include/function.php';
//include_once('include/GphpChart.class.php');
$gpermHandler = xoops_getHandler('groupperm');
//permission
if (is_object($xoopsUser)) {
    $groups = $xoopsUser->getGroups();
} else {
    $groups = XOOPS_GROUP_ANONYMOUS;
}

define('TDMSTATS_DIRNAME', $xoopsModule->getVar('dirname'));
define('TDMSTATS_URL', XOOPS_URL . '/modules/' . TDMSTATS_DIRNAME);
define('TDMSTATS_IMAGES_URL', TDMSTATS_URL . '/assets/images');

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 1;

switch ($action) {

    case '3':
        include __DIR__ . '/include/user_info.php';
        break;

    case '2':
        include __DIR__ . '/include/stats.php';
        break;

    case '1':
        include __DIR__ . '/include/summary.php';
        break;

    case 'list':
    default:

        $GLOBALS['xoopsOption']['template_main'] = 'tdmstats_index.tpl';
        require_once XOOPS_ROOT_PATH . '/header.php';

        // pour les permissions
        $perm_4  = $gpermHandler->checkRight('istats_view', 4, $groups, $xoopsModule->getVar('mid')) ? true : false;
        $perm_8  = $gpermHandler->checkRight('istats_view', 8, $groups, $xoopsModule->getVar('mid')) ? true : false;
        $perm_16 = $gpermHandler->checkRight('istats_view', 16, $groups, $xoopsModule->getVar('mid')) ? true : false;
        if ($perm_4 === false && $perm_8 === false && $perm_16 === false) {
            redirect_header(XOOPS_URL, 2, _NOPERM);
        }
        //perm
        $xoopsTpl->assign('perm_4', $perm_4);
        $xoopsTpl->assign('perm_8', $perm_8);
        $xoopsTpl->assign('perm_16', $perm_16);
        $xoopsTpl->assign('show_index', true);
        break;
}

$xoopsTpl->assign('action', $action);
$xoopsTpl->assign('lang_traffic_report', _AM_TRAFFIC_REPORT);
$xoopsTpl->assign('lang_summary', _AM_SUMMARY);
if (isset($xoopsModuleConfig['tdmstats_bar'])) {
    $xoopsTpl->assign('img_bar', $xoopsModuleConfig['tdmstats_bar']);
}
$xoopsTpl->assign('lang_traffic', _AM_TRAFFIC);
$xoopsTpl->assign('lang_visitor_info', _AM_VISITOR_INFO);
$xoopsTpl->assign('lang_referer', _AM_REFERER);

$tdmstats_style = isset($xoopsModuleConfig['tdmstats_style']) ? $xoopsModuleConfig['tdmstats_style'] : 'cupertino';
//include script
$xoTheme->addScript(XOOPS_URL . '/modules/' . $xoopsModule->dirname() . '/assets/js/jquery.js');
$xoTheme->addScript(XOOPS_URL . '/modules/' . $xoopsModule->dirname() . '/assets/js/jquery-ui-1.7.2.custom.min.js');
//$xoTheme->addStylesheet(XOOPS_URL."/modules/".$xoopsModule->dirname()."/assets/css/".$tdmstats_style."/jquery-ui-1.7.2.custom.css");
$xoTheme->addStylesheet(XOOPS_URL . '/modules/' . $xoopsModule->dirname() . '/assets/css/styles.css');
require_once XOOPS_ROOT_PATH . '/footer.php';
