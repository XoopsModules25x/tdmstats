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

defined('XOOPS_ROOT_PATH') || die('Restricted access');

/**
 * @param      $xoopsModule
 * @param null $oldVersion
 *
 * @return bool
 */
function xoops_module_update_TDMStats(\XoopsObject $xoopsModule, $oldVersion = null)
{
    global $xoopsConfig, $xoopsDB, $xoopsUser, $xoopsModule;

    echo $oldVersion;

    if ($oldVersion < 101) {
        $xoopsDB->queryFromFile(XOOPS_ROOT_PATH . '/modules/tdmstats/sql/mysql1.1.sql');
    }

    if ($oldVersion < 109) {
        $xoopsDB->queryFromFile(XOOPS_ROOT_PATH . '/modules/tdmstats/sql/mysql1.2.sql');
    }

    return true;
}

/**
 * @param $fieldname
 * @param $table
 *
 * @return bool
 */
function fieldExists($fieldname, $table)
{
    global $xoopsDB;
    $result = $xoopsDB->queryF("SHOW COLUMNS FROM   $table LIKE '$fieldname'");

    return ($xoopsDB->getRowsNum($result) > 0);
}

/**
 * @param $tablename
 *
 * @return bool
 */
function tableExists($tablename)
{
    global $xoopsDB;
    $result = $xoopsDB->queryF("SHOW TABLES LIKE '$tablename'");

    return ($xoopsDB->getRowsNum($result) > 0);
}
