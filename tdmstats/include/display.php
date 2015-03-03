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

function leading_zero($length,$number) {

    $length=$length-strlen($number);

    for ($i = 0; $i < $length; $i++) {
        $number = "0" . $number;
    }

    return($number);
}

function num_to_graphics($total=0, $num_digits=1, $img_dir='', $img_ext='jpg') {

    $output = '';

    $work = leading_zero($num_digits, $total);

    for ($i = 0; $i < $num_digits; $i++) {

        $output .= "<img src=\"$img_dir/$work[$i].$img_ext\" border=\"0\">\n";
    }

    return $output;
}
