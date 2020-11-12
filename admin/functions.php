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

use XoopsModules\Tdmstats;

/**
 * @param int $currentoption
 */
function adminmenu($currentoption = 0)
{
    global $xoopsModule, $xoopsConfig;
    $tblColors                 = [];
    $tblColors[0]              = $tblColors[1] = '#DDE';
    $tblColors[$currentoption] = 'white';

    $helper = Tdmstats\Helper::getInstance();
    $helper->loadLanguage('modinfo');

    echo '<div id="navcontainer"><ul style="padding: 3px 0; margin-left: 0; font: bold 12px Verdana, sans-serif; ">';
    echo '<li style="list-style: none; margin: 0; display: inline; "><a href="index.php?op=istatsConfig" style="padding: 3px 0.5em; margin-left: 3px; border: 1px solid #778; background: ' . $tblColors[0] . '; text-decoration: none; ">' . _MI_ISTATS_COOKIE_MENU . '</a></li>';
    echo '<li style="list-style: none; margin: 0; display: inline; "><a href="../../system/admin.php?fct=preferences&amp;op=showmod&amp;mod='
         . $xoopsModule->getVar('mid')
         . '" style="padding: 3px 0.5em; margin-left: 3px; border: 1px solid #778; background: '
         . $tblColors[1]
         . '; text-decoration: none; ">'
         . _PREFERENCES
         . '</a></li></div></ul>';
}
