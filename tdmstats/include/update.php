<?php
// ------------------------------------------------------------------------- //
//                       XOOPS - Module MP Manager                           //
//                       <http://www.xoops.org/>                             //
// ------------------------------------------------------------------------- //
//  This program is free software; you can redistribute it and/or modify     //
//  it under the terms of the GNU General Public License as published by     //
//  the Free Software Foundation; either version 2 of the License, or        //
//  (at your option) any later version.                                      //
//                                                                           //
//  This program is distributed in the hope that it will be useful,          //
//  but WITHOUT ANY WARRANTY; without even the implied warranty of           //
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            //
//  GNU General Public License for more details.                             //
//                                                                           //
//  You should have received a copy of the GNU General Public License        //
//  along with this program; if not, write to the Free Software              //
//  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA //
// ------------------------------------------------------------------------- // 
//                 Votre nouveau systeme de messagerie priver                //
//                                                                           //
//                               "MP"                                        //
//                                                                           //
//                       http://lexode.info/mods                             //
//                                                                           //
//                                                                           //
//---------------------------------------------------------------------------//
if( ! defined( 'XOOPS_ROOT_PATH' ) ) exit ;


function xoops_module_update_TDMStats(&$xoopsModule, $oldVersion = null) {

  global $xoopsConfig, $xoopsDB, $xoopsUser, $xoopsModule;
  
  echo $oldVersion;

  if($oldVersion < 101) {
  $xoopsDB->queryFromFile(XOOPS_ROOT_PATH."/modules/TDMStats/sql/mysql1.1.sql");
  }

  if($oldVersion < 109) {
  $xoopsDB->queryFromFile(XOOPS_ROOT_PATH."/modules/TDMStats/sql/mysql1.2.sql");
  }

  return true;
}

function FieldExists($fieldname,$table) {
	global $xoopsDB;
	$result=$xoopsDB->queryF("SHOW COLUMNS FROM	$table LIKE '$fieldname'");
	return($xoopsDB->getRowsNum($result) > 0);
}

function TableExists($tablename) {
	global $xoopsDB;
	$result=$xoopsDB->queryF("SHOW TABLES LIKE '$tablename'");
	return($xoopsDB->getRowsNum($result) > 0);
}
?>
