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

/**
 * admin menu
 *
 * @param $length
 * @param $number
 *
 * @return string
 */

function leading_zero($length, $number)
{
    $length = $length - strlen($number);

    for ($i = 0; $i < $length; ++$i) {
        $number = '0' . $number;
    }

    return $number;
}

/**
 * @param int    $total
 * @param int    $num_digits
 * @param string $img_dir
 * @param string $img_ext
 *
 * @return string
 */
function num_to_graphics($total = 0, $num_digits = 1, $img_dir = '', $img_ext = 'jpg')
{
    $output = '';

    $work = leading_zero($num_digits, $total);

    for ($i = 0; $i < $num_digits; ++$i) {
        $output .= "<img src=\"$img_dir/$work[$i].$img_ext\" border=\"0\">\n";
    }

    return $output;
}
