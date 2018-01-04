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

require_once __DIR__ . '/../../../include/cp_header.php';
require_once XOOPS_ROOT_PATH . '/class/xoopsformloader.php';
require_once XOOPS_ROOT_PATH . '/class/tree.php';
require_once XOOPS_ROOT_PATH . '/class/pagenav.php';
require_once __DIR__ . '/../include/function.php';

xoops_cp_header();
if (!is_readable(XOOPS_ROOT_PATH . '/Frameworks/art/functions.admin.php')) {
    Adminmenu(2, _AM_ISTATS_ABOUT);
} else {
    require_once XOOPS_ROOT_PATH . '/Frameworks/art/functions.admin.php';
    loadModuleAdminMenu(2, _AM_ISTATS_ABOUT);
}

//menu
echo '<div class="CPbigTitle" style="background-image: url(../assets/images/decos/about.png); background-repeat: no-repeat; background-position: left; padding-left: 60px; padding-top:20px; padding-bottom:15px;">
<h3><strong>' . _AM_ISTATS_ABOUT . '</strong></h3>';
echo '</div><br>';
/** @var XoopsModuleHandler $moduleHandler */
$moduleHandler = xoops_getHandler('module');
$versioninfo   = $moduleHandler->get($xoopsModule->getVar('mid'));
echo '
    <style type="text/css">
    label,text {
        display: block;
        float: left;
        margin-bottom: 2px;
    }
    label {
        text-align: right;
        width: 150px;
        padding-right: 20px;
    }
    br {
        clear: left;
    }
    </style>
';

echo "<fieldset><legend style='font-weight: bold; color: #900;'>" . $xoopsModule->getVar('name') . '</legend>';
echo "<div style='padding: 8px;'>";
echo "<img src='" . XOOPS_URL . '/modules/' . $xoopsModule->getVar('dirname') . '/' . $versioninfo->getInfo('image') . "' alt='' hspace='10' vspace='0'></a>\n";
echo "<div style='padding: 5px;'><strong>" . $versioninfo->getInfo('name') . ' version ' . $versioninfo->getInfo('version') . "</strong></div>\n";
echo '<label>' . _AM_ABOUT_RELEASEDATE . ':</label><text>' . $versioninfo->getInfo('release') . '</text><br>';
echo '<label>' . _AM_ABOUT_AUTHOR . ':</label><text>' . $versioninfo->getInfo('author') . '</text><br>';
echo '<label>' . _AM_ABOUT_CREDITS . ':</label><text>' . $versioninfo->getInfo('credits') . '</text><br>';
echo '<label>' . _AM_ABOUT_LICENSE . ':</label><text><a href="' . $versioninfo->getInfo('license_file') . '" target="_blank" >' . $versioninfo->getInfo('license') . "</a></text>\n";
echo '</div>';
echo '</fieldset>';
echo '<br clear="all">';

echo "<fieldset><legend style='font-weight: bold; color: #900;'>" . _AM_ABOUT_MODULE_INFO . '</legend>';
echo "<div style='padding: 8px;'>";
echo '<label>' . _AM_ABOUT_MODULE_STATUS . ':</label><text>' . $versioninfo->getInfo('module_status') . '</text><br>';
echo '<label>' . _AM_ABOUT_WEBSITE . ':</label><text>' . "<a href='" . $versioninfo->getInfo('module_website_url') . "' target='_blank'>" . $versioninfo->getInfo('module_website_name') . '</a>' . '</text><br>';
echo '</div>';
echo '</fieldset>';
echo '<br clear="all">';

echo "<fieldset><legend style='font-weight: bold; color: #900;'>" . _AM_ABOUT_AUTHOR_INFO . '</legend>';
echo "<div style='padding: 8px;'>";
echo '<label>' . _AM_ABOUT_AUTHOR_NAME . ':</label><text>' . $versioninfo->getInfo('author') . '</text><br>';
echo '<label>' . _AM_ABOUT_WEBSITE . ':</label><text>' . "<a href='" . $versioninfo->getInfo('author_website_url') . "' target='_blank'>" . $versioninfo->getInfo('author_website_name') . '</a>' . '</text><br>';
echo '</div>';
echo '</fieldset>';
echo '<br clear="all">';

$file = XOOPS_ROOT_PATH . '/modules/tdmstats/changelog.txt';
if (is_readable($file)) {
    echo "<fieldset><legend style='font-weight: bold; color: #900;'>" . _AM_ABOUT_CHANGELOG . '</legend>';
    echo "<div style='padding: 8px;'>";
    echo '<div>' . implode('<br>', file($file)) . '</div>';
    echo '</div>';
    echo '</fieldset>';
    echo '<br clear="all">';
}

xoops_cp_footer();
