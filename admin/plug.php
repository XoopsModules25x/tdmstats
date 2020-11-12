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

use Xmf\Module\Admin;

require_once __DIR__ . '/admin_header.php';

require_once dirname(__DIR__, 3) . '/include/cp_header.php';
require_once XOOPS_ROOT_PATH . '/class/xoopsformloader.php';
require_once XOOPS_ROOT_PATH . '/class/tree.php';
require_once XOOPS_ROOT_PATH . '/class/pagenav.php';
require_once dirname(__DIR__) . '/include/function.php';

xoops_cp_header();
require_once __DIR__ . '/admin_header.php';

$adminObject = Admin::getInstance();
$adminObject->displayNavigation(basename(__FILE__));

$myts = \MyTextSanitizer::getInstance();
$op   = $_REQUEST['op'] ?? 'list';

switch ($op) {
    //sauv
    case 'create':
        //Copie du plug
        $indexFile = XOOPS_ROOT_PATH . '/modules/' . $xoopsModule->dirname() . '/xoops_plugins/function.xoStats.php';
        $erreur    = copy($indexFile, XOOPS_ROOT_PATH . '/class/smarty/xoops_plugins/function.xoStats.php');
        if ($erreur) {
            redirect_header('plug.php', 1, _AM_ISTATS_BASE);
        } else {
            redirect_header('plug.php', 1, _AM_ISTATS_BASEERROR);
        }

        break;
    case 'list':
    default:

        if (!is_readable(XOOPS_ROOT_PATH . '/class/smarty/xoops_plugins/function.xoStats.php')) {
            $veriffile = '<span style="color: red;"><a href="plug.php?op=create"><img src="./../assets/images/off.gif"> ' . _AM_ISTATS_PLUGERROR . '</span></a>';
        } else {
            $veriffile = '<span style="color: green;"><img src="./../assets/images/on.gif" >' . _AM_ISTATS_PLUGOK . '</span>';
        }

        echo '<fieldset><legend class="CPmediumTitle">' . _AM_ISTATS_PLUGETAT . '</legend>
        <br>';
        echo $veriffile;
        echo '<br><br>' . _AM_ISTATS_PLUGHELP . '<br><br>
    </fieldset><br> <br>';

        break;
}
require_once __DIR__ . '/admin_footer.php';
