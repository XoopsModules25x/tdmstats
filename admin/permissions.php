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

require_once XOOPS_ROOT_PATH . '/class/xoopslists.php';
require_once XOOPS_ROOT_PATH . '/class/xoopsform/grouppermform.php';
//require_once XOOPS_ROOT_PATH.'/modules/'.$xoopsModule->dirname().'/class/mygrouppermform.php';

if (!empty($_POST['submit'])) {
    redirect_header(XOOPS_URL . '/modules/' . $xoopsModule->dirname() . '/admin/permissions.php', 1, _AM_XD_GPERMUPDATED);
}
xoops_cp_header();
//require_once __DIR__ . '/admin_header.php';

$adminObject = Admin::getInstance();
$adminObject->displayNavigation(basename(__FILE__));

$module_id = $xoopsModule->getVar('mid');

$perm_name = 'istats_view';
$perm_desc = _AM_ISTATS_PERM2;

$global_perms_array = [
    '4'  => _AM_ISTATS_PERM_4,
    '8'  => _AM_ISTATS_PERM_8,
    '16' => _AM_ISTATS_PERM_16,
];

$permform = new \XoopsGroupPermForm($perm_desc, $module_id, $perm_name, '', 'admin/permissions.php');

foreach ($global_perms_array as $perm_id => $perm_name) {
    $permform->addItem($perm_id, $perm_name);
}

echo $permform->render();

require_once __DIR__ . '/admin_footer.php';
