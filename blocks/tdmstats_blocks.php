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

use XoopsModules\Tdmstats\{
    Helper
};
/** @var Helper $helper */

//require_once XOOPS_ROOT_PATH . '/mainfile.php';

/**
 * @param $options
 *
 * @return array
 */
function b_tdmstats_show($options)
{
    if (!class_exists(Helper::class)) {
        return false;
    }

    $helper = Helper::getInstance();
    $helper->loadLanguage('main');
    $helper->loadLanguage('modinfo');
    $helper->loadLanguage('blocks');

    $block = [];

    global $xoopsConfig;
    require_once XOOPS_ROOT_PATH . '/modules/tdmstats/include/function.php';
    $results = CountDays();
    $block   = [];
    foreach (array_keys($options) as $i) {
        if (1 == $options[$i]) {
            $block['max_date']      = formatTimestamp($results['max_date'], 's');
            $block['lang_max_date'] = _MB_ISTATS_MAX_DATE;            // The busiest day
        }
        if (2 == $options[$i]) {
            $block['lang_max_daycount'] = _MB_ISTATS_MAX_DAYCOUNT;        // The number of visits on the busiest day
            $block['max_daycount']      = '' . $results['max_daycount'] . '';
        }
        if (3 == $options[$i]) {
            $block['max_week']      = '#' . $results['max_week_w'] . '&nbsp;&nbsp;&nbsp;' . $results['max_week_y'];
            $block['lang_max_week'] = _MB_ISTATS_MAX_WEEK;
        }
        if (4 == $options[$i]) {
            $block['lang_max_weekcount'] = _MB_ISTATS_MAX_WEEKCOUNT;        // The number of visitors in the busiest week
            $block['max_weekcount']      = '' . $results['max_weekcount'] . '';
        }
        if (5 == $options[$i]) {
            $block['max_mth']      = $results['max_mth_m'] . '/' . $results['max_mth_y'];
            $block['lang_max_mth'] = _MB_ISTATS_MAX_MTH;
        }
        if (6 == $options[$i]) {
            $block['lang_max_mthcount'] = _MB_ISTATS_MAX_MTHCOUNT;        // The number of visitors in the busiest month
            $block['max_mthcount']      = '' . $results['max_mthcount'] . '';
        }
        if (7 == $options[$i]) {
            $block['lang_total_days'] = _MB_ISTATS_TOTAL_DAYS;            // The number of days that stats are available for
            $block['days']            = '' . $results['days'] . '';
        }
        if (8 == $options[$i]) {
            $block['lang_total_visits'] = _MB_ISTATS_TOTAL_VISITS;        // The total number of visitors
            $block['total']             = '' . $results['total'] . '';
        }
        if (9 == $options[$i]) {
            $block['lang_today'] = _MB_ISTATS_TODAY;                // The number of visitors so far today
            $block['today']      = '' . $results['today'] . '';
        }
        if (10 == $options[$i]) {
            $block['lang_this_week'] = _MB_ISTATS_THIS_WEEK;            // The number of visitors so far this week
            $block['this_week']      = '' . $results['this_week'] . '';
        }
        if (11 == $options[$i]) {
            $block['lang_this_mth'] = _MB_ISTATS_THIS_MTH;            // The number of visitors so far this month
            $block['this_mth']      = '' . $results['this_mth'] . '';
        }
        if (12 == $options[$i]) {
            $block['lang_ave_hour'] = _MB_ISTATS_AVE_HOUR;            // The average number of visitors per hour
            $block['ava_hour']      = '' . sprintf('%.2f', $results['ava_hour']) . '';
        }
        if (13 == $options[$i]) {
            $block['lang_ave_day'] = _MB_ISTATS_AVE_DAY;                // The average number of visitors per day
            $block['ava_day']      = '' . sprintf('%.2f', $results['ava_day']) . '';
        }
        if (14 == $options[$i]) {
            $block['lang_ave_week'] = _MB_ISTATS_AVE_WEEK;            // The average number of visitors per week
            $block['ava_week']      = '' . sprintf('%.2f', $results['ava_week']) . '';
        }
        if (15 == $options[$i]) {
            $block['lang_ave_mth'] = _MB_ISTATS_AVE_MTH;                // The average number of visitors per month
            $block['ava_mth']      = '' . sprintf('%.2f', $results['ava_mth']) . '';
        }
        if (16 == $options[$i]) {
            $block['lang_p_page'] = _MB_ISTATS_P_PAGE;                // The total number of pages served
            $block['totalpages']  = $results['totalpages'];
        }
    }

    return $block;
}

/**
 * @param $options
 *
 * @return array
 */
function b_tdmstats_counter_show($options)
{
    global $xoopsConfig, $xoopsUser, $xoopsModule;

    require_once XOOPS_ROOT_PATH . '/modules/tdmstats/include/function.php';
    require_once XOOPS_ROOT_PATH . '/modules/tdmstats/include/display.php';

    $result = CountDays();

    $block = [];

    $block['welcome'] = _MB_ISTATS_WELCOME;
    $block['uname']   = !empty($xoopsUser) ? $xoopsUser->getVar('uname', 'E') : _MB_ISTATS_ANONYMOUS;

    if (1 == $options[0]) {
        if (is_object($xoopsUser)) {
            $block['avatar'] = $xoopsUser->getVar('user_avatar');
            if (file_exists(XOOPS_ROOT_PATH . '/uploads/' . $block['avatar'])) {
                $block['avatar'] = '<img src="' . XOOPS_URL . '/uploads/' . $block['avatar'] . '" alt="avatar">';
            } else {
                $block['avatar'] = '';
            }
        } else {
            $block['avatar'] = '<img src="' . XOOPS_URL . '/modules/tdmstats/assets/images/guest.gif" alt="avatar">';
        }
    } else {
        $block['avatar'] = '';
    }

    $block['lang_there']   = _MB_ISTATS_THERE;
    $block['graphics']     = num_to_graphics($result['total'], $options[1], XOOPS_URL . '/modules/tdmstats/assets/images/' . $options[2] . '', 'jpg');
    $block['lang_visitor'] = _MB_ISTATS_VISITOR;

    return $block;
}

/**
 * @param $options
 * @return array|bool
 */
function b_tdmstats_info_show($options)
{
    global $xoopsConfig, $xoopsUser, $xoopsModule;

    require_once XOOPS_ROOT_PATH . '/modules/tdmstats/include/function.php';
    require_once XOOPS_ROOT_PATH . '/modules/tdmstats/include/function.php';

    //news member
    $criteria = new \CriteriaCompo(new \Criteria('level', 0, '>'));
    // $limit = (!empty($options[0])) ? $options[0] : 10;
    $criteria->setOrder('DESC');
    $criteria->setSort('user_regdate');
    $criteria->setLimit(5);
    /** @var \XoopsMemberHandler $memberHandler */
    $memberHandler = xoops_getHandler('member');
    $newmembers    = $memberHandler->getUsers($criteria);
    $count         = count($newmembers);
    for ($i = 0; $i < $count; ++$i) {
        $block['users'][$i]['id']       = $newmembers[$i]->getVar('uid');
        $block['users'][$i]['name']     = $newmembers[$i]->getVar('uname');
        $block['users'][$i]['joindate'] = formatTimestamp($newmembers[$i]->getVar('user_regdate'), 's');
    }

    //online
    global $xoopsDB, $xoopsUser, $xoopsModule;
    $onlineHandler = xoops_getHandler('online');

    // set gc probabillity to 10% for now..
    if (random_int(1, 100) < 11) {
        $onlineHandler->gc(300);
    }
    if (is_object($xoopsUser)) {
        $uid   = $xoopsUser->getVar('uid');
        $uname = $xoopsUser->getVar('uname');
    } else {
        $uid   = 0;
        $uname = '';
    }
    if (is_object($xoopsModule)) {
        $onlineHandler->write($uid, $uname, time(), $xoopsModule->getVar('mid'), $_SERVER['REMOTE_ADDR']);
    } else {
        $onlineHandler->write($uid, $uname, time(), 0, $_SERVER['REMOTE_ADDR']);
    }
    $onlines = $onlineHandler->getAll();
    /** @var \XoopsModuleHandler $moduleHandler */
    $moduleHandler = xoops_getHandler('module');
    $modules       = $moduleHandler->getList(new \Criteria('isactive', 1));
    if (false !== $onlines) {
        $total = count($onlines);
        //$block = [];
        $guests  = 0;
        $members = '';
        foreach ($onlines as $iValue) {
            $userid = \XoopsUser::getUnameFromId($iValue['online_uid']);
            if ($iValue['online_uid'] > 0) {
                $members .= ' <a href="' . XOOPS_URL . '/userinfo.php?uid=' . $iValue['online_uid'] . '" title="' . $iValue['online_uname'] . '">' . $userid . '</a>: ';
            } else {
                $members .= $userid . ': ';
                ++$guests;
            }

            if ($iValue['online_module']) {
                $members .= $modules[$iValue['online_module']] . ', ';
            } else {
                $members .= _YOURHOME . ', ';
            }
        }
        //$block['online']['online_total'] = sprintf(_ONLINEPHRASE, $total);
        if (is_object($xoopsModule)) {
            $mytotal                         = $onlineHandler->getCount(new \Criteria('online_module', $xoopsModule->getVar('mid')));
            $block['online']['online_total'] = sprintf(_ONLINEPHRASEX, $mytotal, $xoopsModule->getVar('name'));
        }

        //$block['lang_members'] = _MEMBERS;
        //$block['lang_guests'] = _GUESTS;
        $block['online']['online_names']   = $members;
        $block['online']['online_members'] = $total - $guests;
        $block['online']['online_guests']  = $guests;
        //$block['online']['online_module'] = $module;
        //$block['lang_more'] = _MORE;
    } else {
        return false;
    }
    //inststats
    $results                 = CountDays();
    $block['stats']['today'] = $results['today'];
    $block['stats']['total'] = $results['total'];
    $block['stats']['mth']   = $results['this_mth'];

    //time
    //usercount item
    $date      = formatTimestamp(time(), 'Y-m-d');
    $user_info = getResult('select * from ' . $xoopsDB->prefix('tdmstats_usercount') . " where date='$date' order by count DESC LIMIT 5");
    //$total_hour = getResult("select SUM(count) AS sum from ".$xoopsDB->prefix("tdmstats_today_hour")."");
    $times = '';
    if ($user_info) {
        foreach ($user_info as $iValue) {
            if ($iValue['count'] > 0) {
                $userid = !empty($iValue['userid']) ? \XoopsUser::getUnameFromId($iValue['userid']) : \XoopsUser::getUnameFromId();
                //$count = $user_info[$i]['count'] ;
                $count = gmstrftime('%H H %M mn %S s', $iValue['count']);
                $times .= '<b>' . $userid . '</b>: ' . $count . ', ';
                //$hour['hour'][] = $hour_info[$i]['hour'];
                //$hour['percent'][] = round($hour_percent, '2');
            }
        }

        $block['times'] = $times;
    }

    return $block;
    $block['uname'] = !empty($xoopsUser) ? $xoopsUser->getVar('uname', 'E') : _MB_ISTATS_ANONYMOUS;

    if (1 == $options[0]) {
        if (is_object($xoopsUser)) {
            $block['avatar'] = $xoopsUser->getVar('user_avatar');
            if (file_exists(XOOPS_ROOT_PATH . '/uploads/' . $block['avatar'])) {
                $block['avatar'] = '<img src="' . XOOPS_URL . '/uploads/' . $block['avatar'] . '" alt="avatar">';
            } else {
                $block['avatar'] = '';
            }
        } else {
            $block['avatar'] = '<img src="' . XOOPS_URL . '/modules/tdmstats/assets/images/guest.gif" alt="avatar">';
        }
    } else {
        $block['avatar'] = '';
    }

    $block['lang_there']   = _MB_ISTATS_THERE;
    $block['graphics']     = num_to_graphics($result['total'], $options[1], XOOPS_URL . '/modules/tdmstats/assets/images/' . $options[2] . '', 'jpg');
    $block['lang_visitor'] = _MB_ISTATS_VISITOR;
    //return $block;
}

/**
 * @param $options
 *
 * @return string
 */
function b_tdmstats_edit($options)
{
    global $xoopsConfig;

    require_once XOOPS_ROOT_PATH . '/mainfile.php';

    //$form = ""._MB_ISTATS_DISPLAY_DATE."&nbsp;";
    //if ($options[0] == 1) {
    //  $form .= " checked";
    //}
    //$form .= ">&nbsp;"._MB_ISTATS_FR."&nbsp;<input type='radio' id='options[]' name='options[]' value='0'";
    //if ($options[0] == 0) {
    //  $form .= " checked";
    //}
    //$form .= ">&nbsp;"._MB_ISTATS_US."<br>";
    $option = [
        '1'  => _MB_ISTATS_MAX_DATE,
        '2'  => _MB_ISTATS_MAX_DAYCOUNT,
        '3'  => _MB_ISTATS_MAX_WEEK,
        '4'  => _MB_ISTATS_MAX_WEEKCOUNT,
        '5'  => _MB_ISTATS_MAX_MTH,
        '6'  => _MB_ISTATS_MAX_MTHCOUNT,
        '7'  => _MB_ISTATS_TOTAL_DAYS,
        '8'  => _MB_ISTATS_TOTAL_VISITS,
        '9'  => _MB_ISTATS_TODAY,
        '10' => _MB_ISTATS_THIS_WEEK,
        '11' => _MB_ISTATS_THIS_MTH,
        '12' => _MB_ISTATS_AVE_HOUR,
        '13' => _MB_ISTATS_AVE_DAY,
        '14' => _MB_ISTATS_AVE_WEEK,
        '15' => _MB_ISTATS_AVE_MTH,
        '16' => _MB_ISTATS_P_PAGE,
    ];
    $form   = _MB_ISTATS_INFO_DESC . '<br><select name="options[]" multiple="multiple" size="10">';
    foreach ($option as $key => $value) {
        $form .= '<option value="' . $key . '" ' . (!in_array($key, $options, true) ? '' : 'selected') . '>' . $value . '</option>';
    }
    $form .= '</select>';

    return $form;
}

/**
 * @param $options
 *
 * @return string
 */
function b_tdmstats_counter_edit($options)
{
    global $xoopsConfig;

    require_once XOOPS_ROOT_PATH . '/mainfile.php';

    $form = '' . _MB_ISTATS_DISPLAY_AVATAR . "&nbsp;<input type='radio' id='options[]' name='options[]' value='1'";
    if (1 == $options[0]) {
        $form .= ' checked';
    }
    $form .= '>&nbsp;' . _MB_ISTATS_YES . "&nbsp;<input type='radio' id='options[]' name='options[]' value='0'";
    if (0 == $options[0]) {
        $form .= ' checked';
    }
    $form     .= '>&nbsp;' . _MB_ISTATS_NO . '<br>';
    $inputtag = "<input type='text' name='options[]' value='" . (int)$options[1] . "'>";
    $form     .= sprintf(_MB_ISTATS_COUNTER_DISPLAY, $inputtag);
    $form     .= '<br>' . sprintf(_MB_ISTATS_COUNTER_IMG_DIR, XOOPS_URL . 'modules/tdmstats/assets/images/') . '&nbsp;';
    $form     .= "<input type='text' name='options[]' value='" . $options[2] . "'>";
    $form     .= '&nbsp;' . _MB_ISTATS_DIR . '';
    $form     .= '<br>' . _MB_ISTATS_DIRS_NAME . '';

    return $form;
}

/**
 * @param $options
 *
 * @return string
 */
function b_tdmstats_info_edit($options)
{
    global $xoopsConfig;

    require_once XOOPS_ROOT_PATH . '/mainfile.php';

    $form = '' . _MB_ISTATS_DISPLAY_AVATAR . "&nbsp;<input type='radio' id='options[]' name='options[]' value='1'";
    if (1 == $options[0]) {
        $form .= ' checked';
    }
    $form .= '>&nbsp;' . _MB_ISTATS_YES . "&nbsp;<input type='radio' id='options[]' name='options[]' value='0'";
    if (0 == $options[0]) {
        $form .= ' checked';
    }
    $form     .= '>&nbsp;' . _MB_ISTATS_NO . '<br>';
    $inputtag = "<input type='textaera' name='options[]' value='" . (int)$options[1] . "'>";
    $form     .= sprintf(_MB_ISTATS_COUNTER_DISPLAY, $inputtag);
    $form     .= '<br>' . sprintf(_MB_ISTATS_COUNTER_IMG_DIR, XOOPS_URL . 'modules/tdmstats/assets/images/') . '&nbsp;';
    $form     .= "<input type='text' name='options[]' value='" . $options[2] . "'>";
    $form     .= '&nbsp;' . _MB_ISTATS_DIR . '';
    $form     .= '<br>' . _MB_ISTATS_DIRS_NAME . '';

    return $form;
}
