<?php
/**
 * ****************************************************************************
 *  - TDMStats By TDM   - TEAM DEV MODULE FOR XOOPS
 *  - GNU Licence Copyright (c)  (http://www.)
 *
 * La licence GNU GPL, garanti � l'utilisateur les droits suivants
 *
 * 1. La libert� d'ex�cuter le logiciel, pour n'importe quel usage,
 * 2. La libert� de l' �tudier et de l'adapter � ses besoins,
 * 3. La libert� de redistribuer des copies,
 * 4. La libert� d'am�liorer et de rendre publiques les modifications afin
 * que l'ensemble de la communaut� en b�n�ficie.
 *
 * @copyright       	(http://www.tdmxoops.net)
 * @license        	http://www.fsf.org/copyleft/gpl.html GNU public license
 * @author		TDM ; TEAM DEV MODULE 
 *
 * ****************************************************************************
 */
 
function getResult($query) {

	global $xoopsDB;

   	$result = $xoopsDB->query($query);
   	$row = $xoopsDB->fetchArray($result);
   	while($row != NULL) {
   	    $data[] = $row;
   	    $row = $xoopsDB->fetchArray($result);
   	}
	if (isset($data)) {
		return $data;
	}
}



?>
