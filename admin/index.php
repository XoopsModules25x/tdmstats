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

require_once __DIR__ . '/admin_header.php';
xoops_cp_header();

$adminObject = \Xmf\Module\Admin::getInstance();
$langue      = htmlentities($_SERVER['HTTP_ACCEPT_LANGUAGE']);
$langs       = explode(',', $_SERVER['HTTP_ACCEPT_LANGUAGE']);
$file        = 'Vous acceptez les langues suivantes: ' . $langue . '<br>
   mais votre langue principale est: ' . $langs[0] . '';
//$file_protection = $date = formatTimestamp(time(), "A d B")."Tatane, Xoopsfr<br><br>
//cesagonchu, Xoopsfr<br><br>Grosdunord, Xoopsfr<br><br>Phira, Xoopsfr<br>";
$adminObject->addConfigBoxLine(_AM_ISTATS_TEST . ': ' . $langue);
$adminObject->displayNavigation(basename(__FILE__));
$adminObject->displayIndex();

require_once __DIR__ . '/admin_footer.php';
