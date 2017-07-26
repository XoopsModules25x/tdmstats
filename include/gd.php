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

// get result from mysql
function getResult($query)
{
    $result = $xoopsDB->query($query);
    $row    = $xoopsDB->fetchBoth($result);
    while ($row != null) {
        $data[] = $row;
        $row    = $xoopsDB->fetchBoth($result);
    }

    if (isset($data)) {
        return $data;
    }
}

if (function_exists('imagecreate')) {  // only run if gd installed
    include __DIR__ . '/../../../mainfile.php';
    require_once __DIR__ . '/getresult.php';

    $db_link = mysqli_connect(XOOPS_DB_HOST, XOOPS_DB_USER, XOOPS_DB_PASS);
    mysqli_select_db(XOOPS_DB_NAME, $db_link);

    $per_hour_info = getResult('SELECT * FROM ' . XOOPS_DB_PREFIX . '_tdmstats_hour ORDER BY hour');
    $sum_hour      = getResult('SELECT sum(count) AS sum FROM ' . XOOPS_DB_PREFIX . '_tdmstats_hour');
    $max_hour      = getResult('SELECT max(count) AS max FROM ' . XOOPS_DB_PREFIX . '_tdmstats_hour');
    $days          = getResult('SELECT count(DISTINCT date) AS days FROM ' . XOOPS_DB_PREFIX . '_tdmstats_daycount');
    $today_max     = getResult('SELECT max(count) AS max FROM ' . XOOPS_DB_PREFIX . '_tdmstats_today_hour');

    if ($sum_hour[0]['sum'] > 0) {
        $max_percent = $max_hour[0]['max'] / $sum_hour[0]['sum'];
        $max_visit   = $sum_hour[0]['sum'] * $max_percent / $days[0]['days'];
        if ($max_visit < $today_max[0]['max']) {
            $max_visit = $today_max[0]['max'];
        }
    } else {
        $max_visit = 0;
    }

    for ($i = 0, $iMax = count($per_hour_info); $i < $iMax; ++$i) {
        if ($sum_hour[0]['sum'] > 0) {
            $hour_percent   = $per_hour_info[$i]['count'] / $sum_hour[0]['sum'];
            $hour_visit[$i] = $sum_hour[0]['sum'] * $hour_percent / $days[0]['days'];
        } else {
            $hour_visit[$i] = 0;
        }
    }

    $im          = imagecreate(625, 224);
    $col         = imagecolorallocate($im, 189, 199, 231);
    $line_col    = imagecolorallocate($im, 0, 0, 0);
    $red         = imagecolorallocate($im, 255, 0, 0);
    $color_black = imagecolorallocate($im, 0, 0, 0);
    $count       = 0;
    for ($i = 0; $i < 224; $i = $i + 25) {
        if ($count % 2) {
            $col = imagecolorallocate($im, 189, 199, 231);
        } else {
            $col = imagecolorallocate($im, 206, 211, 239);
        }
        imagefilledrectangle($im, 0, $i, 625, $i + 25, $col);
        ++$count;
    }

    $max_visit = sprintf('%.0f', $max_visit);
    imagestring($im, 2, 2, 5, "-$max_visit", $color_black);

    $avg_visit = $max_visit / 5;
    $avg_visit = sprintf('%.0f', $avg_visit);

    $num_sec = 5;
    for ($i = 1; $i < 5; ++$i) {
        $num_sec  += 41;
        $str_loca = $num_sec;
        $str      = $max_visit - $avg_visit * $i;
        imagestring($im, 2, 2, $str_loca, "-$str", $color_black);
    }

    imagestring($im, 2, 2, 205, '-0', $color_black);

    $x = 37;
    for ($i = 0, $iMax = count($hour_visit); $i < $iMax; ++$i) {
        if ($max_visit > 0) {
            $y = $hour_visit[$i] / $max_visit * 200;
        } else {
            $y = 0;
        }
        $y    = 220 - $y;
        $y_id = $i + 1;
        if ($y_id < count($hour_visit)) {
            if ($max_visit > 0) {
                $y2 = $hour_visit[$y_id] / $max_visit * 200;
            } else {
                $y2 = 0;
            }
        } else {
            if ($max_visit > 0) {
                $y2 = $hour_visit[0] / $max_visit * 200;
            } else {
                $y2 = 0;
            }
        }
        $y2 = 220 - $y2;
        $x2 = $x + 25;
        imageline($im, $x, $y, $x2, $y2, $red);
        $x += 25;
    }

    imagejpeg($im);
    imagedestroy($im);
}
