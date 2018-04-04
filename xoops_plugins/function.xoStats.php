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
 * @param $params
 * @param $smarty
 */

function smarty_function_xoStats($params, &$smarty)
{
    global $xoops, $xoopsUser, $xoopsModuleConfig, $xoopsConfig, $HTTP_COOKIE_VARS, $xoopsModule;

    if ($xoopsModule) {
        $ismodule = $xoopsModule->getVar('dirname');
    } else {
        $ismodule = 'index';
    }

    echo '<script type="text/Javascript">
          istat = new Image(1,1);
          istat.src = "' . XOOPS_URL . '/modules/tdmstats/counter.php?sw="+screen.width+"&amp;sc="+screen.colorDepth+"&amp;page="+location.href+"&amp;ismodule=' . $ismodule . '";
          </script>';
}
