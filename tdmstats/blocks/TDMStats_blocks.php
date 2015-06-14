<?php
/**
 * ****************************************************************************
 *  - TDMStats By TDM   - TEAM DEV MODULE FOR XOOPS
 *  - GNU Licence Copyright (c)  (http://www.)
 *
 * La licence GNU GPL, garanti à l'utilisateur les droits suivants
 *
 * 1. La liberté d'exécuter le logiciel, pour n'importe quel usage,
 * 2. La liberté de l' étudier et de l'adapter à ses besoins,
 * 3. La liberté de redistribuer des copies,
 * 4. La liberté d'améliorer et de rendre publiques les modifications afin
 * que l'ensemble de la communauté en bénéficie.
 *
 * @copyright       	(http://www.tdmxoops.net)
 * @license        	http://www.fsf.org/copyleft/gpl.html GNU public license
 * @author		TDM ; TEAM DEV MODULE
 *
 * ****************************************************************************
 */
 
include_once (XOOPS_ROOT_PATH . '/mainfile.php');

function b_TDMStats_show($options) {
    global $xoopsConfig;
    include_once(XOOPS_ROOT_PATH . '/modules/TDMStats/include/function.php');
    $results = CountDays();
    $block = array();
    foreach (array_keys($options) as $i) {
        if ($options[$i] == 1) {
            $block['max_date'] = formatTimeStamp($results['max_date'], 's');
            $block['lang_max_date'] =  _MB_ISTATS_MAX_DATE;            // The busiest day
        }
        if ($options[$i] == 2) {
            $block['lang_max_daycount'] =  _MB_ISTATS_MAX_DAYCOUNT;        // The number of visits on the busiest day
            $block['max_daycount'] = ''.$results['max_daycount'].'';
        }
        if ($options[$i] == 3) {
            $block['max_week'] = "#".$results['max_week_w']."&nbsp;&nbsp;&nbsp;".$results['max_week_y'];
            $block['lang_max_week'] =  _MB_ISTATS_MAX_WEEK;
        }
        if ($options[$i] == 4) {
            $block['lang_max_weekcount'] =  _MB_ISTATS_MAX_WEEKCOUNT;        // The number of visitors in the busiest week
            $block['max_weekcount'] = ''.$results['max_weekcount'].'';
        }
        if ($options[$i] == 5) {
            $block['max_mth'] = $results['max_mth_m']."/".$results['max_mth_y'];
            $block['lang_max_mth'] =  _MB_ISTATS_MAX_MTH;
        }
        if ($options[$i] == 6) {
            $block['lang_max_mthcount'] =  _MB_ISTATS_MAX_MTHCOUNT;        // The number of visitors in the busiest month
            $block['max_mthcount'] = ''.$results['max_mthcount'].'';
        }
        if ($options[$i] == 7) {
            $block['lang_total_days'] =  _MB_ISTATS_TOTAL_DAYS;            // The number of days that stats are available for
            $block['days'] = ''.$results['days'].'';
        }
        if ($options[$i] == 8) {
            $block['lang_total_visits'] =  _MB_ISTATS_TOTAL_VISITS;        // The total number of visitors
            $block['total'] = ''.$results['total'].'';
        }
        if ($options[$i] == 9) {
            $block['lang_today'] =  _MB_ISTATS_TODAY;                // The number of visitors so far today
            $block['today'] = ''.$results['today'].'';
        }
        if ($options[$i] == 10) {
            $block['lang_this_week'] =  _MB_ISTATS_THIS_WEEK;            // The number of visitors so far this week
            $block['this_week'] = ''.$results['this_week'].'';
        }
        if ($options[$i] == 11) {
            $block['lang_this_mth'] =  _MB_ISTATS_THIS_MTH;            // The number of visitors so far this month
            $block['this_mth'] = ''.$results['this_mth'].'';
        }
        if ($options[$i] == 12) {
            $block['lang_ave_hour'] =  _MB_ISTATS_AVE_HOUR;            // The average number of visitors per hour
            $block['ava_hour'] = ''.sprintf ("%.2f", $results['ava_hour']).'';
        }
        if ($options[$i] == 13) {
            $block['lang_ave_day'] =  _MB_ISTATS_AVE_DAY;                // The average number of visitors per day
            $block['ava_day'] = ''.sprintf ("%.2f", $results['ava_day']).'';
        }
        if ($options[$i] == 14) {
            $block['lang_ave_week'] =  _MB_ISTATS_AVE_WEEK;            // The average number of visitors per week
            $block['ava_week'] = ''.sprintf ("%.2f", $results['ava_week']).'';
        }
        if ($options[$i] == 15) {
            $block['lang_ave_mth'] =  _MB_ISTATS_AVE_MTH;                // The average number of visitors per month
            $block['ava_mth'] = ''.sprintf ("%.2f", $results['ava_mth']).'';
        }
        if ($options[$i] == 16) {
            $block['lang_p_page'] = _MB_ISTATS_P_PAGE;                // The total number of pages served
            $block['totalpages'] =  $results['totalpages'];
        }
    }

    return $block;
}

function b_TDMStats_counter_show($options) {
    global $xoopsConfig, $xoopsUser, $xoopsModule;

    include_once(XOOPS_ROOT_PATH . '/modules/TDMStats/include/function.php');
    include_once(XOOPS_ROOT_PATH . '/modules/TDMStats/include/display.php');
    
    $result = CountDays();
    
    $block = array();

    $block['welcome'] = _MB_ISTATS_WELCOME;
    $block['uname'] = !empty($xoopsUser) ? $xoopsUser->getVar('uname','E') : _MB_ISTATS_ANONYMOUS;

    if ( $options[0] == 1 ) {
        if (is_object($xoopsUser)) {
            $block['avatar'] = $xoopsUser->getVar('user_avatar');
            if (file_exists(XOOPS_ROOT_PATH.'/uploads/'.$block['avatar'])) {
            $block['avatar'] = '<img src="'.XOOPS_URL.'/uploads/'.$block['avatar'].'" alt="avatar" />';
            } else {
            $block['avatar'] = '';
            }
        } else {
        $block['avatar'] = '<img src="'.XOOPS_URL.'/modules/TDMStats/images/guest.gif" alt="avatar" />';
        }
    } else {
    $block['avatar'] = '';
    }
    
    $block['lang_there'] = _MB_ISTATS_THERE;
    $block['graphics'] = num_to_graphics($result['total'], $options[1], XOOPS_URL . '/modules/TDMStats/images/'.$options[2].'','jpg');
    $block['lang_visitor'] = _MB_ISTATS_VISITOR;

    return $block;
}

function b_TDMStats_info_show($options) {
    global $xoopsConfig, $xoopsUser, $xoopsModule;

    include_once(XOOPS_ROOT_PATH . '/modules/TDMStats/include/function.php');
    include_once(XOOPS_ROOT_PATH . '/modules/TDMStats/include/function.php');

    //news member
    $criteria = new CriteriaCompo(new Criteria('level', 0, '>'));
   // $limit = (!empty($options[0])) ? $options[0] : 10;
    $criteria->setOrder('DESC');
    $criteria->setSort('user_regdate');
    $criteria->setLimit(5);
    $member_handler =& xoops_gethandler('member');
    $newmembers = $member_handler->getUsers($criteria);
    $count = count($newmembers);
    for ($i = 0; $i < $count; $i++) {
        $block['users'][$i]['id'] = $newmembers[$i]->getVar('uid');
        $block['users'][$i]['name'] = $newmembers[$i]->getVar('uname');
        $block['users'][$i]['joindate'] = formatTimestamp($newmembers[$i]->getVar('user_regdate'), 's');
    }

    //online
global $xoopsDB, $xoopsUser, $xoopsModule;
    $online_handler =& xoops_gethandler('online');
            
    mt_srand((double)microtime()*1000000);
    // set gc probabillity to 10% for now..
    if (mt_rand(1, 100) < 11) {
        $online_handler->gc(300);
    }
    if (is_object($xoopsUser)) {
        $uid = $xoopsUser->getVar('uid');
        $uname = $xoopsUser->getVar('uname');
    } else {
        $uid = 0;
        $uname = '';
    }
    if (is_object($xoopsModule)) {
       $online_handler->write($uid, $uname, time(), $xoopsModule->getVar('mid'), $_SERVER['REMOTE_ADDR']);
    } else {
       $online_handler->write($uid, $uname, time(), 0, $_SERVER['REMOTE_ADDR']);
    }
    $onlines = $online_handler->getAll();
    $module_handler =& xoops_gethandler('module');
    $modules = $module_handler->getList(new Criteria('isactive', 1));
    if (false != $onlines) {
        $total = count($onlines);
        //$block = array();
        $guests = 0;
        $members = '';
        for ($i = 0; $i < $total; $i++) {
        $userid =  XoopsUser::getUnameFromId($onlines[$i]['online_uid']);
            if ($onlines[$i]['online_uid'] > 0) {
                $members .= ' <a href="' . XOOPS_URL . '/userinfo.php?uid=' . $onlines[$i]['online_uid'] . '" title="' . $onlines[$i]['online_uname'] . '">' . $userid . '</a>: ';
            
            } else {
                $members .=  $userid.": ";
                $guests++;
            }
        
            if ($onlines[$i]['online_module']) {
            $members .= $modules[$onlines[$i]['online_module']].", ";
        }    else   {
            $members .= _YOURHOME.", ";
        }

        }
        //$block['online']['online_total'] = sprintf(_ONLINEPHRASE, $total);
            if (is_object($xoopsModule)) {
            $mytotal = $online_handler->getCount(new Criteria('online_module', $xoopsModule->getVar('mid')));
            $block['online']['online_total'] = sprintf(_ONLINEPHRASEX, $mytotal, $xoopsModule->getVar('name'));

        }
   
        //$block['lang_members'] = _MEMBERS;
        //$block['lang_guests'] = _GUESTS;
        $block['online']['online_names'] = $members;
        $block['online']['online_members'] = $total - $guests;
        $block['online']['online_guests'] = $guests;
        //$block['online']['online_module'] = $module;
        //$block['lang_more'] = _MORE;
    } else {
        return false;
    }
    //inststats
    $results = CountDays();
    $block['stats']['today'] = $results['today'];
    $block['stats']['total'] = $results['total'];
    $block['stats']['mth'] = $results['this_mth'];
    
    //time
    //usercount item
    $date = formatTimeStamp(time(), 'Y-m-d');
    $user_info = getResult("select * from ".$xoopsDB->prefix("TDMStats_usercount")." where date='$date' order by count DESC LIMIT 5");
    //$total_hour = getResult("select SUM(count) AS sum from ".$xoopsDB->prefix("TDMStats_today_hour")."");
    $times = "";
    if($user_info){
    for($i=0; $i<sizeof($user_info); $i++){
    if($user_info[$i]['count'] > 0) {
            
    $userid = !empty($user_info[$i]['userid']) ?  XoopsUser::getUnameFromId($user_info[$i]['userid']) : XoopsUser::getUnameFromId();
    //$count = $user_info[$i]['count'] ;
    $count = strftime( "%H H %M mn %S s", $user_info[$i]['count'] * 60);
    $times .= "<b>".$userid."</b>: ".$count.", ";
    //$hour['hour'][] = $hour_info[$i]['hour'];
    //$hour['percent'][] = round($hour_percent, '2');
    
        }
    }
    
        $block['times'] = $times;
    }
        
        
    return $block;

    $block['uname'] = !empty($xoopsUser) ? $xoopsUser->getVar('uname','E') : _MB_ISTATS_ANONYMOUS;

    if ( $options[0] == 1 ) {
        if (is_object($xoopsUser)) {
            $block['avatar'] = $xoopsUser->getVar('user_avatar');
            if (file_exists(XOOPS_ROOT_PATH.'/uploads/'.$block['avatar'])) {
            $block['avatar'] = '<img src="'.XOOPS_URL.'/uploads/'.$block['avatar'].'" alt="avatar" />';
            } else {
            $block['avatar'] = '';
            }
        } else {
        $block['avatar'] = '<img src="'.XOOPS_URL.'/modules/TDMStats/images/guest.gif" alt="avatar" />';
        }
    } else {
    $block['avatar'] = '';
    }
    
    $block['lang_there'] = _MB_ISTATS_THERE;
    $block['graphics'] = num_to_graphics($result['total'], $options[1], XOOPS_URL . '/modules/TDMStats/images/'.$options[2].'','jpg');
    $block['lang_visitor'] = _MB_ISTATS_VISITOR;

    //return $block;
}

function b_TDMStats_edit($options)
{
    global $xoopsConfig;
    
    include_once XOOPS_ROOT_PATH.'/mainfile.php';
    
    //$form = ""._MB_ISTATS_DISPLAY_DATE."&nbsp;";
    //if ( $options[0] == 1 ) {
    //	$form .= " checked='checked'";
    //}
    //$form .= " />&nbsp;"._MB_ISTATS_FR."&nbsp;<input type='radio' id='options[]' name='options[]' value='0'";
    //if ( $options[0] == 0 ) {
    //	$form .= " checked='checked'";
    //}
    //$form .= " />&nbsp;"._MB_ISTATS_US."<br />";
    $option = array('1' => _MB_ISTATS_MAX_DATE, '2' => _MB_ISTATS_MAX_DAYCOUNT, '3' => _MB_ISTATS_MAX_WEEK, '4' => _MB_ISTATS_MAX_WEEKCOUNT, '5' => _MB_ISTATS_MAX_MTH, '6' => _MB_ISTATS_MAX_MTHCOUNT, '7' => _MB_ISTATS_TOTAL_DAYS, '8' => _MB_ISTATS_TOTAL_VISITS, '9' => _MB_ISTATS_TODAY, '10' => _MB_ISTATS_THIS_WEEK, '11' => _MB_ISTATS_THIS_MTH, '12' => _MB_ISTATS_AVE_HOUR, '13' => _MB_ISTATS_AVE_DAY, '14' => _MB_ISTATS_AVE_WEEK, '15' => _MB_ISTATS_AVE_MTH, '16' => _MB_ISTATS_P_PAGE );
    $form = _MB_ISTATS_INFO_DESC . "<br /><select name=\"options[]\" multiple=\"multiple\" size=\"10\">";
    foreach ($option  as $key => $value) {
        $form .= "<option value=\"".$key."\" " . (array_search($key, $options) === false ? '' : 'selected="selected"') . ">".$value."</option>";
    }
    $form .= "</select>";

    return $form;

}

function b_TDMStats_counter_edit($options)
{
    global $xoopsConfig;

    include_once XOOPS_ROOT_PATH.'/mainfile.php';

    $form = ""._MB_ISTATS_DISPLAY_AVATAR."&nbsp;<input type='radio' id='options[]' name='options[]' value='1'";
    if ( $options[0] == 1 ) {
        $form .= " checked='checked'";
    }
    $form .= " />&nbsp;"._MB_ISTATS_YES."&nbsp;<input type='radio' id='options[]' name='options[]' value='0'";
    if ( $options[0] == 0 ) {
        $form .= " checked='checked'";
    }
    $form .= " />&nbsp;"._MB_ISTATS_NO."<br />";
    $inputtag = "<input type='text' name='options[]' value='".intval($options[1])."' />";
    $form .= sprintf(_MB_ISTATS_COUNTER_DISPLAY,$inputtag);
    $form .= "<br />".sprintf(_MB_ISTATS_COUNTER_IMG_DIR,XOOPS_URL."modules/TDMStats/images/")."&nbsp;";
    $form .= "<input type='text' name='options[]' value='".$options[2]."' />";
    $form .= "&nbsp;"._MB_ISTATS_DIR."";
    $form .= "<br />"._MB_ISTATS_DIRS_NAME."";

    return $form;
}

function b_TDMStats_info_edit($options)
{
    global $xoopsConfig;

    include_once XOOPS_ROOT_PATH.'/mainfile.php';

    $form = ""._MB_ISTATS_DISPLAY_AVATAR."&nbsp;<input type='radio' id='options[]' name='options[]' value='1'";
    if ( $options[0] == 1 ) {
        $form .= " checked='checked'";
    }
    $form .= " />&nbsp;"._MB_ISTATS_YES."&nbsp;<input type='radio' id='options[]' name='options[]' value='0'";
    if ( $options[0] == 0 ) {
        $form .= " checked='checked'";
    }
    $form .= " />&nbsp;"._MB_ISTATS_NO."<br />";
    $inputtag = "<input type='textaera' name='options[]' value='".intval($options[1])."' />";
    $form .= sprintf(_MB_ISTATS_COUNTER_DISPLAY,$inputtag);
    $form .= "<br />".sprintf(_MB_ISTATS_COUNTER_IMG_DIR,XOOPS_URL."modules/TDMStats/images/")."&nbsp;";
    $form .= "<input type='text' name='options[]' value='".$options[2]."' />";
    $form .= "&nbsp;"._MB_ISTATS_DIR."";
    $form .= "<br />"._MB_ISTATS_DIRS_NAME."";

    return $form;
}
