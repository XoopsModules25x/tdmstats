<?php
include_once "../../mainfile.php";

include XOOPS_ROOT_PATH . '/header.php';
include_once('include/function.php');
$gperm_handler =& xoops_gethandler('groupperm');


$myts =& MyTextSanitizer::getInstance();
$db_link = mysql_connect(XOOPS_DB_HOST, XOOPS_DB_USER, XOOPS_DB_PASS);
mysql_select_db(XOOPS_DB_NAME, $db_link);

//permission
if (is_object($xoopsUser)) {
   $groups = $xoopsUser->getGroups();
   $uid = $xoopsUser->getVar('uid');
} else {
	$groups = XOOPS_GROUP_ANONYMOUS;
}

//fichier obligatoire
include_once(XOOPS_ROOT_PATH ."/modules/".$xoopsModule->dirname()."/include/getresult.php");


///passer par admin
if ($xoopsModuleConfig['maxuser'] == 0 && $groups[0] == 1) {
 return;
}
 
 /**
  * @changelog
  * passer par session
  */
	$time = time();
    if ( isset($_SESSION['xoops_stats_expire']) && $_SESSION['xoops_stats_expire'] > $time ) {
	 return;
    } else {
  $_SESSION['xoops_stats_expire'] = $time + $xoopsModuleConfig['maxsession'];
  }
  

///temp user
if (!isset($_SESSION['tdmstats'])) {
$_SESSION['tdmstats'] = true;
$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
$_SESSION['start'] = time();
} else {
	$date = formatTimeStamp(time(), 'Y-m-d');
	$ip = $_SERVER['REMOTE_ADDR'];
	$userid = isset($uid) ?  $uid : false;
	$count	=  round((time() - $_SESSION['start']) / 60);
	$check2 = getResult("SELECT * FROM ".XOOPS_DB_PREFIX."_TDMStats_usercount WHERE ip='$ip' AND date='$date'");
	if ($check2) {
	if($userid) {
		mysql_query("UPDATE ".XOOPS_DB_PREFIX."_TDMStats_usercount SET userid='$userid', count=count+'$count' WHERE ip='$ip'");
		$_SESSION['start'] = time();
	}else {
		mysql_query("UPDATE ".XOOPS_DB_PREFIX."_TDMStats_usercount SET count=count+'$count' WHERE ip='$ip'");
		$_SESSION['start'] = time();
	}
	} else {
		mysql_query("INSERT INTO ".XOOPS_DB_PREFIX."_TDMStats_usercount VALUES('', '$userid', '$ip', '$date', $count)");
		$_SESSION['start'] = time();
	}

}
////////////
/**
 * update page count
 * @feature
 * Keeps total count of pages served, including refreshes and revisits
 */


if ($_REQUEST['page']) { 
	$page = $_REQUEST['page'];
	$check_page = getResult("SELECT * FROM ".XOOPS_DB_PREFIX."_TDMStats_page WHERE page='$page'");
	if ($check_page) {
		mysql_query("UPDATE ".XOOPS_DB_PREFIX."_TDMStats_page SET count=count+1 WHERE page='$page'");
	} else {
		mysql_query("INSERT INTO ".XOOPS_DB_PREFIX."_TDMStats_page VALUES('', '$page', '1')");
	}
}

/**
 * update modules count
 * @feature
 * Keeps total count of pages served, including refreshes and revisits
 */

if ($_REQUEST['ismodule']) {
	$ismodule = $_REQUEST['ismodule'];
	$check_module = getResult("SELECT * FROM ".XOOPS_DB_PREFIX."_TDMStats_modules WHERE modules='$ismodule");
	if ($check_module) {
		mysql_query("UPDATE ".XOOPS_DB_PREFIX."_TDMStats_modules SET count=count+1 WHERE modules='$ismodule'");
	} else {
		mysql_query("INSERT INTO ".XOOPS_DB_PREFIX."_TDMStats_modules VALUES('', '$ismodule', '1')");
	}
}

/**
 * @note
 * trouver le pays et la ville .
 */
$no_ip=$_SERVER['REMOTE_ADDR']; /*$no_ip="81.220.188.171";*/
$hostip= "http://api.hostip.info/get_html.php?ip=$no_ip";
$result = file($hostip);
//for country
$test = preg_match('/^(.*)\((.*)\)/', $result[0], $matches);
/*
Dans le tableau $result, on trouve :*/
$ispays = strstr($result[0], " ");
$iscountry = $matches[2];
if ($result != "") {
	$check_pays = getResult("SELECT * FROM ".XOOPS_DB_PREFIX."_TDMStats_pays WHERE pays='$ispays'");
	if ($check_pays) {
		mysql_query("UPDATE ".XOOPS_DB_PREFIX."_TDMStats_pays SET count=count+1 , country='$iscountry' WHERE pays='$ispays'");
	} else {
		mysql_query("INSERT INTO ".XOOPS_DB_PREFIX."_TDMStats_pays VALUES('', '$ispays', '$iscountry', '1')");
	}
}


/**
 * @feature
 * Keeps a count of visitors per day
 */
// update daycount record

$date = formatTimeStamp(time(), 'Y-m-d');

$check_date = getResult("SELECT * FROM ".XOOPS_DB_PREFIX."_TDMStats_daycount WHERE date='$date'");
if ($check_date) {
	 mysql_query("UPDATE ".XOOPS_DB_PREFIX."_TDMStats_daycount SET daycount=daycount+1 WHERE date='$date'");
} else {
	mysql_query("INSERT INTO ".XOOPS_DB_PREFIX."_TDMStats_daycount VALUES('', '$date', '1')");
	mysql_query("UPDATE ".XOOPS_DB_PREFIX."_TDMStats_today_hour SET count='0'");
}

/**
 * @feature
 * Keeps a count of total visitors
 */
// update total visits
mysql_query("UPDATE ".XOOPS_DB_PREFIX."_TDMStats_count SET count=count+1");

/**
 * @feature
 * Keeps track of users hostnames
 */
// get user hostname
$r_hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
if ($r_hostname == $_SERVER['REMOTE_ADDR']) {
	$hostname = "IP Only";
} else {
	$r_hostname = explode(".", $r_hostname);
	$host_size = sizeof($r_hostname);
	if ($host_size == 3) {
		$hostname = $r_hostname[$host_size-2].".".$r_hostname[$host_size-1];
	} else {
		$hostname = $r_hostname[$host_size-3].".".$r_hostname[$host_size-2].".".$r_hostname[$host_size-1];
	}
}

/**
 * @changelog
 * v1.01 Added $myts functions to clean up referer url?querystring
 */
// update is_hostname
$check_host = getResult("SELECT * FROM ".XOOPS_DB_PREFIX."_TDMStats_hostname WHERE hostname='$hostname'");
if ($check_host) {
	mysql_query("UPDATE ".XOOPS_DB_PREFIX."_TDMStats_hostname set count=count+1 WHERE hostname='$hostname'");
} else {
	mysql_query("INSERT INTO ".XOOPS_DB_PREFIX."_TDMStats_hostname VALUES('$hostname', '1')");
}

/**
 * @feature
 * Keeps track of referers
 */

$referer = $_SERVER['HTTP_REFERER'];
if (!strstr($referer, XOOPS_URL)) {
	$check_ref = getResult("select * from ".XOOPS_DB_PREFIX."_TDMStats_referer where url='".$referer."'");
	if ($check_ref) {
		mysql_query("update ".XOOPS_DB_PREFIX."_TDMStats_referer set count=count+1 where url='".$referer."'");
	} elseif($referer != "") {
		mysql_query("insert into ".XOOPS_DB_PREFIX."_TDMStats_referer values('', '".$referer."', '1')");
	}
}

/**
 * @feature
 * Keeps a count of visitors per week
 */
// update is_week



$is_week = formatTimeStamp(time(), 'w');

mysql_query("update ".XOOPS_DB_PREFIX."_TDMStats_week set count=count+1 where day='$is_week'");


/**
 * @feature
 * Keeps track of users browser
 */

/**
 * @changelog
 * v1.02 Added more Browsers
 * v1.02 Improved browser detection.
 * v1.03 Improved browser detection
 */

/**
 * maybe keep original string if 'other' allowing for detection of new ones
 */

// get user browser
if (strstr($_SERVER['HTTP_USER_AGENT'], "Opera 7")) {
	$user_browser = "Opera 7";
} elseif (strstr($_SERVER['HTTP_USER_AGENT'], "Googlebot")) {
	$user_browser = "Googlebot";
} elseif (strstr($_SERVER['HTTP_USER_AGENT'], "msnbot")) {
	$user_browser = "msnbot";
} elseif (strstr($_SERVER['HTTP_USER_AGENT'], "Yahoo")) {
	$user_browser = "Yahoo";
} elseif (strstr($_SERVER['HTTP_USER_AGENT'], "Opera/9")) {
	$user_browser = "Opera 9";
} elseif (strstr($_SERVER['HTTP_USER_AGENT'], "Opera/8")) {
	$user_browser = "Opera 8";
} elseif (strstr($_SERVER['HTTP_USER_AGENT'], "Opera/7")) {
	$user_browser = "Opera 7";
} elseif (strstr($_SERVER['HTTP_USER_AGENT'], "Konqueror/3")) {
	$user_browser = "Konqueror 3";
} elseif (strstr($_SERVER['HTTP_USER_AGENT'], "Konqueror/2")) {
	$user_browser = "Konqueror 2";
} elseif (strstr($_SERVER['HTTP_USER_AGENT'], "Navigator/9")) {
	$user_browser = "Netscape 9";
} elseif (strstr($_SERVER['HTTP_USER_AGENT'], "Netscape/8")) {
	$user_browser = "Netscape 8";
} elseif (strstr($_SERVER['HTTP_USER_AGENT'], "Netscape/7")) {
	$user_browser = "Netscape 7";
} elseif (strstr($_SERVER['HTTP_USER_AGENT'], "Lynx")) {
	$user_browser = "Lynx";
} elseif (strstr($_SERVER['HTTP_USER_AGENT'], "Links")) {
	$user_browser = "Links";
} elseif (strstr($_SERVER['HTTP_USER_AGENT'], "OmniWeb")) {
	$user_browser = "OmniWeb";
} elseif (strstr($_SERVER['HTTP_USER_AGENT'], "WebTV")) {
	$user_browser = "WebTV";
} elseif (strstr($_SERVER['HTTP_USER_AGENT'], "Avant Browser")) {
	$user_browser = "Avant Browser";
} elseif (strstr($_SERVER['HTTP_USER_AGENT'], "MyIE2")) {
	$user_browser = "MyIE2";
} elseif (strstr($_SERVER['HTTP_USER_AGENT'], "Galeon")) {
	$user_browser = "Galeon";
} elseif (strstr($_SERVER['HTTP_USER_AGENT'], "MSIE 8")) {
	$user_browser = "Internet Explorer 8";
} elseif (strstr($_SERVER['HTTP_USER_AGENT'], "MSIE 7")) {
	$user_browser = "Internet Explorer 7";
} elseif (strstr($_SERVER['HTTP_USER_AGENT'], "MSIE 6")) {
	$user_browser = "Internet Explorer 6";
//adding firefox
} elseif (strstr($_SERVER['HTTP_USER_AGENT'], "Firefox/3")) {
	$user_browser = "Firefox 3";
} elseif (strstr($_SERVER['HTTP_USER_AGENT'], "Firefox/2")) {
	$user_browser = "Firefox 2";
} elseif (strstr($_SERVER['HTTP_USER_AGENT'], "Firefox/1")) {
	$user_browser = "Firefox 1";
//
} elseif (strstr($_SERVER['HTTP_USER_AGENT'], "Chrome/3")) {
	$user_browser = "Chrome 3";
} elseif (strstr($_SERVER['HTTP_USER_AGENT'], "Chrome/2")) {
	$user_browser = "Chrome 2";
} elseif (strstr($_SERVER['HTTP_USER_AGENT'], "Chrome/1")) {
	$user_browser = "Chrome 1";
} elseif (strstr($_SERVER['HTTP_USER_AGENT'], "Gecko")) {
	$user_browser = "Gecko";
} else {
	$user_browser = "Other";
}

 // update browser record
 $check_week = getResult("SELECT * FROM ".XOOPS_DB_PREFIX."_TDMStats_browser WHERE browser='$user_browser'");
 if ($check_week) {
	 mysql_query("UPDATE ".XOOPS_DB_PREFIX."_TDMStats_browser SET count=count+1 WHERE browser='$user_browser'");
 } else {
	 mysql_query("INSERT INTO ".XOOPS_DB_PREFIX."_TDMStats_browser VALUES('$user_browser', '1')");
 }

/**
 * @feature
 * Keeps track of users OS
 */

/**
 * @changelog
 * v1.02 Added more OS's
 * v1.02 Improved OS detection
 */
 // get user os
 if (strstr($_SERVER['HTTP_USER_AGENT'], "Windows NT 6.1")) {
	 $user_os = "Windows Seven";
  } elseif(strstr($_SERVER['HTTP_USER_AGENT'], "Windows NT 6.0")) {
	 $user_os = "Windows Vista";	
 } elseif(strstr($_SERVER['HTTP_USER_AGENT'], "Windows NT 5.1")) {
	 $user_os = "Windows XP";  
 } elseif(strstr($_SERVER['HTTP_USER_AGENT'], "Windows NT 5.2")) {
	 $user_os = "Windows Server 2003";					 
 } elseif(strstr($_SERVER['HTTP_USER_AGENT'], "Windows NT 5.0")) {
	 $user_os = "Windows 2000";
 } elseif(strstr($_SERVER['HTTP_USER_AGENT'], "Windows NT 4")) {
	 $user_os = "Windows NT 4.0";
 } elseif(strstr($_SERVER['HTTP_USER_AGENT'], "Windows 98") || strstr($_SERVER['HTTP_USER_AGENT'], "Win 98")) {
	 $user_os = "Windows 98";
 } elseif(strstr($_SERVER['HTTP_USER_AGENT'], "Windows 95") || strstr($_SERVER['HTTP_USER_AGENT'], "Win 95")) {
	 $user_os = "Windows 95";
 } elseif(strstr($_SERVER['HTTP_USER_AGENT'], "Windows 9") || strstr($_SERVER['HTTP_USER_AGENT'], "Win 9")) {
	 $user_os = "Windows 9x";
 } elseif(strstr($_SERVER['HTTP_USER_AGENT'], "Windows Me") || strstr($_SERVER['HTTP_USER_AGENT'], "winme")) {
	 $user_os = "Windows Me";
 } elseif(strstr($_SERVER['HTTP_USER_AGENT'], "Win32")) {
	 $user_os = "Win32";
 } elseif(strstr($_SERVER['HTTP_USER_AGENT'], "PPC") || strstr($_SERVER['HTTP_USER_AGENT'], "Mac_PowerPC")) {
	 $user_os = "Mac Power PC";
 } elseif(strstr($_SERVER['HTTP_USER_AGENT'], "Mac OS X")) {
	 $user_os = "Mac OS X";
 } elseif(strstr($_SERVER['HTTP_USER_AGENT'], "Mac")) {
	 $user_os = "Macintosh";
//remove X11	 
// } elseif(strstr($_SERVER['HTTP_USER_AGENT'], "X11")) {
//	 $user_os = "X11";
 } elseif(strstr($_SERVER['HTTP_USER_AGENT'], "SunOS")) {
	 $user_os = "SunOS";
 } elseif(strstr($_SERVER['HTTP_USER_AGENT'], "BeOS")) {
	 $user_os = "BeOS";
 } elseif(strstr($_SERVER['HTTP_USER_AGENT'], "FreeBSD")) {
	 $user_os = "FreeBSD";
 } elseif(strstr($_SERVER['HTTP_USER_AGENT'], "OpenBSD")) {
	 $user_os = "OpenBSD";
 } elseif(strstr($_SERVER['HTTP_USER_AGENT'], "IRIX")) {
	 $user_os = "IRIX";
 } elseif(strstr($_SERVER['HTTP_USER_AGENT'], "OS/2")) {
	 $user_os = "OS/2";
 } elseif(strstr($_SERVER['HTTP_USER_AGENT'], "Plan9")) {
	 $user_os = "Plan9";
 } elseif(strstr($_SERVER['HTTP_USER_AGENT'], "OSF")) {
	 $user_os = "OSF";
 } elseif(strstr($_SERVER['HTTP_USER_AGENT'], "HP-UX")) {
	 $user_os = "HP-UX";
 } elseif(strstr($_SERVER['HTTP_USER_AGENT'], "Fedora")) {
	 $user_os = "Linux Fedora";						 
 } elseif(strstr($_SERVER['HTTP_USER_AGENT'], "Ubuntu")) {
	 $user_os = "Linux Ubuntu";					 
 } elseif(strstr($_SERVER['HTTP_USER_AGENT'], "Linux")) {
	 $user_os = "Linux";
 } elseif(strstr($_SERVER['HTTP_USER_AGENT'], "unix")) {
	 $user_os = "Other Unix";
 } else {
	 $user_os = "Other";
 }

 // update os record
 $check_week = getResult("SELECT * FROM ".XOOPS_DB_PREFIX."_TDMStats_os WHERE os='$user_os'");
 if ($check_week) {
	 mysql_query("UPDATE ".XOOPS_DB_PREFIX."_TDMStats_os SET count=count+1 WHERE os='$user_os'");
 } else {
	 mysql_query("INSERT INTO ".XOOPS_DB_PREFIX."_TDMStats_os (os, count) VALUES('$user_os', '1')");
 }

/**
 * @feature
 * Keeps track of visitors per hour (accumulative)
 */
 // update hour record

 $is_hour = formatTimeStamp(time(), 'H');

 mysql_query("update ".XOOPS_DB_PREFIX."_TDMStats_hour set count=count+1 where hour='$is_hour'");

/**
 * @feature
 * Keeps track of visitors per hour (daily)
 */
 // update today hour record
 mysql_query("update ".XOOPS_DB_PREFIX."_TDMStats_today_hour set count=count+1 where hour='$is_hour'");

 $week = formatTimeStamp(time(), 'W');
 $mth = date('m');
 $year = formatTimeStamp(time(), 'Y');


/**
 * @feature
 * Keeps track of visitors per hour (weekly)
 */
 $check_week = getResult("SELECT * FROM ".XOOPS_DB_PREFIX."_TDMStats_week_count WHERE week='$week' AND year='$year'");
 if ($check_week) {
	 mysql_query("UPDATE ".XOOPS_DB_PREFIX."_TDMStats_week_count SET count=count+1 WHERE week='$week' AND year='$year'");
 } else {
	 mysql_query("INSERT INTO ".XOOPS_DB_PREFIX."_TDMStats_week_count VALUES('', '$week', '$year', '1')");
 }

/**
 * @feature
 * Keeps track of visitors per hour (monthly)
 */
 $check_mth = getResult("SELECT * FROM ".XOOPS_DB_PREFIX."_TDMStats_mth WHERE mth='$mth' AND year='$year'");
 if ($check_mth) {
	 mysql_query("UPDATE ".XOOPS_DB_PREFIX."_TDMStats_mth SET count=count+1 WHERE mth='$mth' AND year='$year'");
 } else {
	 mysql_query("INSERT INTO ".XOOPS_DB_PREFIX."_TDMStats_mth VALUES('', '$mth', '$year', '1')");
	 mysql_query("UPDATE ".XOOPS_DB_PREFIX."_TDMStats_mth_days SET count=0");
 }

/**
 * @feature
 * Keeps track of visitors per month
 */

 $day = formatTimeStamp(time(), 'd');

 mysql_query("UPDATE ".XOOPS_DB_PREFIX."_TDMStats_mth_days SET count=count+1 WHERE day='$day'");

 
/**
 * @feature
 * Keeps track of visitors screen size ie 800x600
 */
 // update screen width
 switch ($_REQUEST['sw']) {

	 case '640':
	 	$sw_id = 1;
	 	break;

	 case '800':
		$sw_id = 2;
		break;

	case '1024':
		$sw_id = 3;
		break;

	case '1152':
		$sw_id = 4;
		break;

	case '1280':
		$sw_id = 5;
		break;

	case '1600':
		$sw_id = 6;
		break;
		
	case '2048':
		$sw_id = 7;
		break;
		
	case '2560':
		$sw_id = 8;
		break;
	
	case '3200':
		$sw_id = 9;
		break;
		
	case '1920':
		$sw_id = 11;
		break;
	
	default:
		$sw_id = 10;
		break;
}
mysql_query("UPDATE ".XOOPS_DB_PREFIX."_TDMStats_screen SET count=count+1 WHERE id='$sw_id'");

/**
 * @feature
 * Keeps track of visitors screen colour depth
 */
 // update screen color
switch ($_REQUEST['sc']) {

	case '8':
	 	$sc_id = 1;
	 	break;

	case '16':
	 	$sc_id = 2;
	 	break;

	case '24':
	 	$sc_id = 3;
	 	break;

	case '32':
	 	$sc_id = 4;
	 	break;

	default:
	 	$sc_id = 5;
	 	break;

}

mysql_query("UPDATE ".XOOPS_DB_PREFIX."_TDMStats_color SET count=count+1 WHERE id='$sc_id'");
	
	
?>