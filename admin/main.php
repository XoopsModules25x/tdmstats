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
 * @license       {@link http://www.gnu.org/licenses/gpl-2.0.html GNU GPL 2 or later}
 * @package       tdmstats
 * @since
 * @author        TDM   - TEAM DEV MODULE FOR XOOPS
 * @author        XOOPS Development Team
 */
require_once __DIR__ . '/admin_header.php';
require_once __DIR__ . '/../../../include/cp_header.php';
require_once XOOPS_ROOT_PATH . '/class/xoopsformloader.php';
require_once XOOPS_ROOT_PATH . '/class/tree.php';
require_once XOOPS_ROOT_PATH . '/class/pagenav.php';

xoops_cp_header();


//apelle du menu admin

$adminObject = \Xmf\Module\Admin::getInstance();
$adminObject->displayNavigation(basename(__FILE__));
//$adminObject->displayIndex();

//tdmstats_count
$sq1     = 'SHOW TABLE STATUS FROM `' . XOOPS_DB_NAME . "` LIKE '" . $xoopsDB->prefix('tdmstats_count') . "'";
$result1 = $xoopsDB->queryF($sq1);
$count   = $xoopsDB->fetchArray($result1);
//tdmstats_daycount
$sq1      = 'SHOW TABLE STATUS FROM `' . XOOPS_DB_NAME . "` LIKE '" . $xoopsDB->prefix('tdmstats_daycount') . "'";
$result1  = $xoopsDB->queryF($sq1);
$daycount = $xoopsDB->fetchArray($result1);
//tdmstats_referer
$sq1     = 'SHOW TABLE STATUS FROM `' . XOOPS_DB_NAME . "` LIKE '" . $xoopsDB->prefix('tdmstats_referer') . "'";
$result1 = $xoopsDB->queryF($sq1);
$referer = $xoopsDB->fetchArray($result1);
//tdmstats_hour
$sq1     = 'SHOW TABLE STATUS FROM `' . XOOPS_DB_NAME . "` LIKE '" . $xoopsDB->prefix('tdmstats_hour') . "'";
$result1 = $xoopsDB->queryF($sq1);
$hour    = $xoopsDB->fetchArray($result1);
//tdmstats_today_hour
$sq1        = 'SHOW TABLE STATUS FROM `' . XOOPS_DB_NAME . "` LIKE '" . $xoopsDB->prefix('tdmstats_today_hour') . "'";
$result1    = $xoopsDB->queryF($sq1);
$today_hour = $xoopsDB->fetchArray($result1);
//tdmstats_browser
$sq1     = 'SHOW TABLE STATUS FROM `' . XOOPS_DB_NAME . "` LIKE '" . $xoopsDB->prefix('tdmstats_browser') . "'";
$result1 = $xoopsDB->queryF($sq1);
$browser = $xoopsDB->fetchArray($result1);
//tdmstats_os
$sq1     = 'SHOW TABLE STATUS FROM `' . XOOPS_DB_NAME . "` LIKE '" . $xoopsDB->prefix('tdmstats_os') . "'";
$result1 = $xoopsDB->queryF($sq1);
$os      = $xoopsDB->fetchArray($result1);
//tdmstats_hostname
$sq1      = 'SHOW TABLE STATUS FROM `' . XOOPS_DB_NAME . "` LIKE '" . $xoopsDB->prefix('tdmstats_hostname') . "'";
$result1  = $xoopsDB->queryF($sq1);
$hostname = $xoopsDB->fetchArray($result1);
//tdmstats_week
$sq1     = 'SHOW TABLE STATUS FROM `' . XOOPS_DB_NAME . "` LIKE '" . $xoopsDB->prefix('tdmstats_week') . "'";
$result1 = $xoopsDB->queryF($sq1);
$week    = $xoopsDB->fetchArray($result1);
//tdmstats_week_count
$sq1        = 'SHOW TABLE STATUS FROM `' . XOOPS_DB_NAME . "` LIKE '" . $xoopsDB->prefix('tdmstats_week_count') . "'";
$result1    = $xoopsDB->queryF($sq1);
$week_count = $xoopsDB->fetchArray($result1);
//tdmstats_mth
$sq1     = 'SHOW TABLE STATUS FROM `' . XOOPS_DB_NAME . "` LIKE '" . $xoopsDB->prefix('tdmstats_mth') . "'";
$result1 = $xoopsDB->queryF($sq1);
$mth     = $xoopsDB->fetchArray($result1);
//tdmstats_mth_days
$sq1      = 'SHOW TABLE STATUS FROM `' . XOOPS_DB_NAME . "` LIKE '" . $xoopsDB->prefix('tdmstats_mth_days') . "'";
$result1  = $xoopsDB->queryF($sq1);
$mth_days = $xoopsDB->fetchArray($result1);
//tdmstats_screen
$sq1     = 'SHOW TABLE STATUS FROM `' . XOOPS_DB_NAME . "` LIKE '" . $xoopsDB->prefix('tdmstats_screen') . "'";
$result1 = $xoopsDB->queryF($sq1);
$screen  = $xoopsDB->fetchArray($result1);
//tdmstats_color
$sq1     = 'SHOW TABLE STATUS FROM `' . XOOPS_DB_NAME . "` LIKE '" . $xoopsDB->prefix('tdmstats_color') . "'";
$result1 = $xoopsDB->queryF($sq1);
$color   = $xoopsDB->fetchArray($result1);
//tdmstats_page
$sq1     = 'SHOW TABLE STATUS FROM `' . XOOPS_DB_NAME . "` LIKE '" . $xoopsDB->prefix('tdmstats_page') . "'";
$result1 = $xoopsDB->queryF($sq1);
$page    = $xoopsDB->fetchArray($result1);
//tdmstats_modules
$sq1     = 'SHOW TABLE STATUS FROM `' . XOOPS_DB_NAME . "` LIKE '" . $xoopsDB->prefix('tdmstats_modules') . "'";
$result1 = $xoopsDB->queryF($sq1);
$modules = $xoopsDB->fetchArray($result1);
//tdmstats_pays
$sq1     = 'SHOW TABLE STATUS FROM `' . XOOPS_DB_NAME . "` LIKE '" . $xoopsDB->prefix('tdmstats_pays') . "'";
$result1 = $xoopsDB->queryF($sq1);
$pays    = $xoopsDB->fetchArray($result1);
////////////////
//tdmstats_usercounts
$sq1     = 'SHOW TABLE STATUS FROM `' . XOOPS_DB_NAME . "` LIKE '" . $xoopsDB->prefix('TDMStats_usercount') . "'";
$result1 = $xoopsDB->queryF($sq1);
$user    = $xoopsDB->fetchArray($result1);
////////////////

require_once XOOPS_ROOT_PATH . '/modules/' . $xoopsModule->dirname() . '/class/menu.php';
require_once XOOPS_ROOT_PATH . '/modules/' . $xoopsModule->dirname() . '/include/function.php';

////
if (isset($_REQUEST['table']) && 'optimise' == $_REQUEST['op']) {
    $sq1     = 'OPTIMIZE TABLE ' . $xoopsDB->prefix('' . $_REQUEST['table'] . '');
    $result1 = $xoopsDB->queryF($sq1);
    if ($result1) {
        redirect_header('main.php', 1, _AM_ISTATS_BASE);
    } else {
        redirect_header('index.php', 1, _AM_ISTATS_BASEERROR);
    }
}

echo '
  <tr>
  <td valign="top">
  </td>
  <td valign="top" width="60%">
 <fieldset><legend class="CPmediumTitle">' . $count['Name'] . '</legend>
        <br>';
echo _AM_ISTATS_FREE . ':<b> ' . istats_PrettySize($count['Data_free']) . '&nbsp;<a href="main.php?op=optimise&table=tdmstats_count">' . _AM_ISTATS_OPT . '</a></b>';
echo '<br><br>';
echo _AM_ISTATS_TOTAL . ':<b> ' . istats_PrettySize($count['Data_length'] + $count['Index_length']) . '</b>';
echo '<br><br>
    </fieldset><br>

 <fieldset><legend class="CPmediumTitle">' . $daycount['Name'] . '</legend>
        <br>';
echo _AM_ISTATS_FREE . ':<b> ' . istats_PrettySize($daycount['Data_free']) . '&nbsp;<a href="main.php?op=optimise&table=tdmstats_daycount">' . _AM_ISTATS_OPT . '</a></b>';
echo '<br><br>';
echo _AM_ISTATS_TOTAL . ':<b> ' . istats_PrettySize($daycount['Data_length'] + $daycount['Index_length']) . '</b>';
echo '<br><br>
    </fieldset><br>

 <fieldset><legend class="CPmediumTitle">' . $referer['Name'] . '</legend>
        <br>';
echo _AM_ISTATS_FREE . ':<b> ' . istats_PrettySize($referer['Data_free']) . '&nbsp;<a href="main.php?op=optimise&table=tdmstats_referer">' . _AM_ISTATS_OPT . '</a></b>';
echo '<br><br>';
echo _AM_ISTATS_TOTAL . ':<b> ' . istats_PrettySize($referer['Data_length'] + $referer['Index_length']) . '</b>';
echo '<br><br>
    </fieldset><br>

     <fieldset><legend class="CPmediumTitle">' . $hour['Name'] . '</legend>
        <br>';
echo _AM_ISTATS_FREE . ':<b> ' . istats_PrettySize($hour['Data_free']) . '&nbsp;<a href="main.php?op=optimise&table=tdmstats_hour">' . _AM_ISTATS_OPT . '</a></b>';
echo '<br><br>';
echo _AM_ISTATS_TOTAL . ':<b> ' . istats_PrettySize($hour['Data_length'] + $hour['Index_length']) . '</b>';
echo '<br><br>
    </fieldset><br>

    <fieldset><legend class="CPmediumTitle">' . $today_hour['Name'] . '</legend>
        <br>';
echo _AM_ISTATS_FREE . ':<b> ' . istats_PrettySize($today_hour['Data_free']) . '&nbsp;<a href="main.php?op=optimise&table=tdmstats_today_hour">' . _AM_ISTATS_OPT . '</a></b>';
echo '<br><br>';
echo _AM_ISTATS_TOTAL . ':<b> ' . istats_PrettySize($today_hour['Data_length'] + $today_hour['Index_length']) . '</b>';
echo '<br><br>
        </fieldset><br>

    <fieldset><legend class="CPmediumTitle">' . $browser['Name'] . '</legend>
        <br>';
echo _AM_ISTATS_FREE . ':<b> ' . istats_PrettySize($browser['Data_free']) . '&nbsp;<a href="main.php?op=optimise&table=tdmstats_browser">' . _AM_ISTATS_OPT . '</a></b>';
echo '<br><br>';
echo _AM_ISTATS_TOTAL . ':<b> ' . istats_PrettySize($browser['Data_length'] + $browser['Index_length']) . '</b>';
echo '<br><br>
    </fieldset><br>

        <fieldset><legend class="CPmediumTitle">' . $os['Name'] . '</legend>
        <br>';
echo _AM_ISTATS_FREE . ':<b> ' . istats_PrettySize($os['Data_free']) . '&nbsp;<a href="main.php?op=optimise&table=tdmstats_os">' . _AM_ISTATS_OPT . '</a></b>';
echo '<br><br>';
echo _AM_ISTATS_TOTAL . ':<b> ' . istats_PrettySize($os['Data_length'] + $os['Index_length']) . '</b>';
echo '<br><br>
    </fieldset><br>

    <fieldset><legend class="CPmediumTitle">' . $hostname['Name'] . '</legend>
        <br>';
echo _AM_ISTATS_FREE . ':<b> ' . istats_PrettySize($hostname['Data_free']) . '&nbsp;<a href="main.php?op=optimise&table=tdmstats_hostname">' . _AM_ISTATS_OPT . '</a></b>';
echo '<br><br>';
echo _AM_ISTATS_TOTAL . ':<b> ' . istats_PrettySize($hostname['Data_length'] + $hostname['Index_length']) . '</b>';
echo '<br><br>
    </fieldset><br>

        <fieldset><legend class="CPmediumTitle">' . $week['Name'] . '</legend>
        <br>';
echo _AM_ISTATS_FREE . ':<b> ' . istats_PrettySize($week['Data_free']) . '&nbsp;<a href="main.php?op=optimise&table=tdmstats_week">' . _AM_ISTATS_OPT . '</a></b>';
echo '<br><br>';
echo _AM_ISTATS_TOTAL . ':<b> ' . istats_PrettySize($week['Data_length'] + $week['Index_length']) . '</b>';
echo '<br><br>
    </fieldset><br>

            <fieldset><legend class="CPmediumTitle">' . $week_count['Name'] . '</legend>
        <br>';
echo _AM_ISTATS_FREE . ':<b> ' . istats_PrettySize($week_count['Data_free']) . '&nbsp;<a href="main.php?op=optimise&table=tdmstats_week_count">' . _AM_ISTATS_OPT . '</a></b>';
echo '<br><br>';
echo _AM_ISTATS_TOTAL . ':<b> ' . istats_PrettySize($week_count['Data_length'] + $week_count['Index_length']) . '</b>';
echo '<br><br>
    </fieldset><br>

            <fieldset><legend class="CPmediumTitle">' . $mth['Name'] . '</legend>
        <br>';
echo _AM_ISTATS_FREE . ':<b> ' . istats_PrettySize($mth['Data_free']) . '&nbsp;<a href="main.php?op=optimise&table=tdmstats_mth">' . _AM_ISTATS_OPT . '</a></b>';
echo '<br><br>';
echo _AM_ISTATS_TOTAL . ':<b> ' . istats_PrettySize($mth['Data_length'] + $mth['Index_length']) . '</b>';
echo '<br><br>
    </fieldset><br>

                <fieldset><legend class="CPmediumTitle">' . $mth_days['Name'] . '</legend>
        <br>';
echo _AM_ISTATS_FREE . ':<b> ' . istats_PrettySize($mth_days['Data_free']) . '&nbsp;<a href="main.php?op=optimise&table=tdmstats_mth_days">' . _AM_ISTATS_OPT . '</a></b>';
echo '<br><br>';
echo _AM_ISTATS_TOTAL . ':<b> ' . istats_PrettySize($mth_days['Data_length'] + $mth_days['Index_length']) . '</b>';
echo '<br><br>
    </fieldset><br>

                <fieldset><legend class="CPmediumTitle">' . $screen['Name'] . '</legend>
        <br>';
echo _AM_ISTATS_FREE . ':<b> ' . istats_PrettySize($screen['Data_free']) . '&nbsp;<a href="main.php?op=optimise&table=tdmstats_screen">' . _AM_ISTATS_OPT . '</a></b>';
echo '<br><br>';
echo _AM_ISTATS_TOTAL . ':<b> ' . istats_PrettySize($screen['Data_length'] + $screen['Index_length']) . '</b>';
echo '<br><br>
    </fieldset><br>

                    <fieldset><legend class="CPmediumTitle">' . $color['Name'] . '</legend>
        <br>';
echo _AM_ISTATS_FREE . ':<b> ' . istats_PrettySize($color['Data_free']) . '&nbsp;<a href="main.php?op=optimise&table=tdmstats_color">' . _AM_ISTATS_OPT . '</a></b>';
echo '<br><br>';
echo _AM_ISTATS_TOTAL . ':<b> ' . istats_PrettySize($color['Data_length'] + $color['Index_length']) . '</b>';
echo '<br><br>
    </fieldset><br>

                    <fieldset><legend class="CPmediumTitle">' . $page['Name'] . '</legend>
        <br>';
echo _AM_ISTATS_FREE . ':<b> ' . istats_PrettySize($page['Data_free']) . '&nbsp;<a href="main.php?op=optimise&table=tdmstats_page">' . _AM_ISTATS_OPT . '</a></b>';
echo '<br><br>';
echo _AM_ISTATS_TOTAL . ':<b> ' . istats_PrettySize($page['Data_length'] + $page['Index_length']) . '</b>';
echo '<br><br>
    </fieldset><br>

                        <fieldset><legend class="CPmediumTitle">' . $modules['Name'] . '</legend>
        <br>';
echo _AM_ISTATS_FREE . ':<b> ' . istats_PrettySize($modules['Data_free']) . '&nbsp;<a href="main.php?op=optimise&table=tdmstats_modules">' . _AM_ISTATS_OPT . '</a></b>';
echo '<br><br>';
echo _AM_ISTATS_TOTAL . ':<b> ' . istats_PrettySize($modules['Data_length'] + $modules['Index_length']) . '</b>';
echo '<br><br>
    </fieldset><br>

                        <fieldset><legend class="CPmediumTitle">' . $pays['Name'] . '</legend>
        <br>';
echo _AM_ISTATS_FREE . ':<b> ' . istats_PrettySize($pays['Data_free']) . '&nbsp;<a href="main.php?op=optimise&table=tdmstats_pays">' . _AM_ISTATS_OPT . '</a></b>';
echo '<br><br>';
echo _AM_ISTATS_TOTAL . ':<b> ' . istats_PrettySize($pays['Data_length'] + $pays['Index_length']) . '</b>';
echo '<br><br>
    </fieldset><br>
                        <fieldset ><legend class="CPmediumTitle">' . $user['Name'] . '</legend >
		<br > ';
echo _AM_ISTATS_FREE . ':<b > ' . istats_PrettySize($user['Data_free']) . ' & nbsp;<a href = "main.php?op=optimise&table=tdmstats_usercount" > ' . _AM_ISTATS_OPT . '</a ></b> ';
echo '<br><br> ';
echo _AM_ISTATS_TOTAL . ':<b > ' . istats_PrettySize($user['Data_length'] + $user['Index_length']) . ' </b > ';
echo '<br><br>
	</fieldset ><br><br>';

echo '</td ></tr ></table > ';
require_once __DIR__ . ' /admin_footer.php';
