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

include '../../../include/cp_header.php'; 
include_once(XOOPS_ROOT_PATH."/class/xoopsformloader.php");
include_once(XOOPS_ROOT_PATH."/class/tree.php");
include_once XOOPS_ROOT_PATH.'/class/pagenav.php';

xoops_cp_header();
include_once 'admin_header.php';

//apelle du menu admin

$indexAdmin = new ModuleAdmin();
echo $indexAdmin->addNavigation('main.php');
//echo $indexAdmin->renderIndex();


//TDMStats_count
$sq1 = "SHOW TABLE STATUS FROM `".XOOPS_DB_NAME."` LIKE '".$xoopsDB->prefix("TDMStats_count")."'";
$result1=$xoopsDB->queryF($sq1); 
$count=$xoopsDB->fetchArray($result1);
//TDMStats_daycount
$sq1 = "SHOW TABLE STATUS FROM `".XOOPS_DB_NAME."` LIKE '".$xoopsDB->prefix("TDMStats_daycount")."'";
$result1=$xoopsDB->queryF($sq1); 
$daycount=$xoopsDB->fetchArray($result1);
//TDMStats_referer
$sq1 = "SHOW TABLE STATUS FROM `".XOOPS_DB_NAME."` LIKE '".$xoopsDB->prefix("TDMStats_referer")."'";
$result1=$xoopsDB->queryF($sq1); 
$referer=$xoopsDB->fetchArray($result1);
//TDMStats_hour
$sq1 = "SHOW TABLE STATUS FROM `".XOOPS_DB_NAME."` LIKE '".$xoopsDB->prefix("TDMStats_hour")."'";
$result1=$xoopsDB->queryF($sq1); 
$hour=$xoopsDB->fetchArray($result1);
//TDMStats_today_hour
$sq1 = "SHOW TABLE STATUS FROM `".XOOPS_DB_NAME."` LIKE '".$xoopsDB->prefix("TDMStats_today_hour")."'";
$result1=$xoopsDB->queryF($sq1); 
$today_hour=$xoopsDB->fetchArray($result1);
//TDMStats_browser
$sq1 = "SHOW TABLE STATUS FROM `".XOOPS_DB_NAME."` LIKE '".$xoopsDB->prefix("TDMStats_browser")."'";
$result1=$xoopsDB->queryF($sq1); 
$browser=$xoopsDB->fetchArray($result1);
//TDMStats_os
$sq1 = "SHOW TABLE STATUS FROM `".XOOPS_DB_NAME."` LIKE '".$xoopsDB->prefix("TDMStats_os")."'";
$result1=$xoopsDB->queryF($sq1); 
$os=$xoopsDB->fetchArray($result1);
//TDMStats_hostname
$sq1 = "SHOW TABLE STATUS FROM `".XOOPS_DB_NAME."` LIKE '".$xoopsDB->prefix("TDMStats_hostname")."'";
$result1=$xoopsDB->queryF($sq1); 
$hostname=$xoopsDB->fetchArray($result1);
//TDMStats_week
$sq1 = "SHOW TABLE STATUS FROM `".XOOPS_DB_NAME."` LIKE '".$xoopsDB->prefix("TDMStats_week")."'";
$result1=$xoopsDB->queryF($sq1); 
$week=$xoopsDB->fetchArray($result1);
//TDMStats_week_count
$sq1 = "SHOW TABLE STATUS FROM `".XOOPS_DB_NAME."` LIKE '".$xoopsDB->prefix("TDMStats_week_count")."'";
$result1=$xoopsDB->queryF($sq1); 
$week_count=$xoopsDB->fetchArray($result1);
//TDMStats_mth
$sq1 = "SHOW TABLE STATUS FROM `".XOOPS_DB_NAME."` LIKE '".$xoopsDB->prefix("TDMStats_mth")."'";
$result1=$xoopsDB->queryF($sq1); 
$mth=$xoopsDB->fetchArray($result1);
//TDMStats_mth_days
$sq1 = "SHOW TABLE STATUS FROM `".XOOPS_DB_NAME."` LIKE '".$xoopsDB->prefix("TDMStats_mth_days")."'";
$result1=$xoopsDB->queryF($sq1); 
$mth_days=$xoopsDB->fetchArray($result1);
//TDMStats_screen
$sq1 = "SHOW TABLE STATUS FROM `".XOOPS_DB_NAME."` LIKE '".$xoopsDB->prefix("TDMStats_screen")."'";
$result1=$xoopsDB->queryF($sq1); 
$screen=$xoopsDB->fetchArray($result1);
//TDMStats_color
$sq1 = "SHOW TABLE STATUS FROM `".XOOPS_DB_NAME."` LIKE '".$xoopsDB->prefix("TDMStats_color")."'";
$result1=$xoopsDB->queryF($sq1); 
$color=$xoopsDB->fetchArray($result1);
//TDMStats_page
$sq1 = "SHOW TABLE STATUS FROM `".XOOPS_DB_NAME."` LIKE '".$xoopsDB->prefix("TDMStats_page")."'";
$result1=$xoopsDB->queryF($sq1); 
$page=$xoopsDB->fetchArray($result1);
//TDMStats_modules
$sq1 = "SHOW TABLE STATUS FROM `".XOOPS_DB_NAME."` LIKE '".$xoopsDB->prefix("TDMStats_modules")."'";
$result1=$xoopsDB->queryF($sq1); 
$modules=$xoopsDB->fetchArray($result1);
//TDMStats_pays
$sq1 = "SHOW TABLE STATUS FROM `".XOOPS_DB_NAME."` LIKE '".$xoopsDB->prefix("TDMStats_pays")."'";
$result1=$xoopsDB->queryF($sq1); 
$pays=$xoopsDB->fetchArray($result1);
////////////////
//TDMStats_usercounts
$sq1 = "SHOW TABLE STATUS FROM `".XOOPS_DB_NAME."` LIKE '".$xoopsDB->prefix("TDMStats_usercount")."'";
$result1=$xoopsDB->queryF($sq1); 
$user=$xoopsDB->fetchArray($result1);
////////////////

include_once XOOPS_ROOT_PATH.'/modules/'.$xoopsModule->dirname().'/class/menu.php';
include_once XOOPS_ROOT_PATH.'/modules/'.$xoopsModule->dirname().'/include/function.php';

////
 if (isset($_REQUEST['table']) && $_REQUEST['op'] == 'optimise')
 {
 $sq1 = "OPTIMIZE TABLE ".$xoopsDB->prefix("".$_REQUEST['table']."");
 $result1 = $xoopsDB->queryF($sq1);
 if($result1){
	redirect_header( 'main.php', 1, _AM_ISTATS_BASE);
        }else{
	redirect_header( 'index.php', 1, _AM_ISTATS_BASEERROR);
        } 
}


echo '
  <tr>
  <td valign="top">
  </td>
  <td valign="top" width="60%">
 <fieldset><legend class="CPmediumTitle">'.$count['Name'].'</legend>
		<br/>';
		echo _AM_ISTATS_FREE.':<b> ' . istats_PrettySize($count['Data_free']).'&nbsp;<a href="main.php?op=optimise&table=TDMStats_count">'._AM_ISTATS_OPT.'</a></b>';
		echo '<br/><br/>';
		echo _AM_ISTATS_TOTAL.':<b> ' .  istats_PrettySize($count['Data_length'] + $count['Index_length']) . '</b>';
		echo '<br /><br />
	</fieldset><br />
	
 <fieldset><legend class="CPmediumTitle">'.$daycount['Name'].'</legend>
		<br/>';
		echo _AM_ISTATS_FREE.':<b> ' . istats_PrettySize($daycount['Data_free']).'&nbsp;<a href="main.php?op=optimise&table=TDMStats_daycount">'._AM_ISTATS_OPT.'</a></b>';
		echo '<br/><br/>';
		echo _AM_ISTATS_TOTAL.':<b> ' .  istats_PrettySize($daycount['Data_length'] + $daycount['Index_length']) . '</b>';
		echo '<br /><br />
	</fieldset><br />
	
 <fieldset><legend class="CPmediumTitle">'.$referer['Name'].'</legend>
		<br/>';
		echo _AM_ISTATS_FREE.':<b> ' . istats_PrettySize($referer['Data_free']).'&nbsp;<a href="main.php?op=optimise&table=TDMStats_referer">'._AM_ISTATS_OPT.'</a></b>';
		echo '<br/><br/>';
		echo _AM_ISTATS_TOTAL.':<b> ' .  istats_PrettySize($referer['Data_length'] + $referer['Index_length']) . '</b>';
		echo '<br /><br />
	</fieldset><br />
	
	 <fieldset><legend class="CPmediumTitle">'.$hour['Name'].'</legend>
		<br/>';
		echo _AM_ISTATS_FREE.':<b> ' . istats_PrettySize($hour['Data_free']).'&nbsp;<a href="main.php?op=optimise&table=TDMStats_hour">'._AM_ISTATS_OPT.'</a></b>';
		echo '<br/><br/>';
		echo _AM_ISTATS_TOTAL.':<b> ' .  istats_PrettySize($hour['Data_length'] + $hour['Index_length']) . '</b>';
		echo '<br /><br />
	</fieldset><br />
	
	<fieldset><legend class="CPmediumTitle">'.$today_hour['Name'].'</legend>
		<br/>';
		echo _AM_ISTATS_FREE.':<b> ' . istats_PrettySize($today_hour['Data_free']).'&nbsp;<a href="main.php?op=optimise&table=TDMStats_today_hour">'._AM_ISTATS_OPT.'</a></b>';
		echo '<br/><br/>';
		echo _AM_ISTATS_TOTAL.':<b> ' .  istats_PrettySize($today_hour['Data_length'] + $today_hour['Index_length']) . '</b>';
		echo '<br /><br />
		</fieldset><br />
	
	<fieldset><legend class="CPmediumTitle">'.$browser['Name'].'</legend>
		<br/>';
		echo _AM_ISTATS_FREE.':<b> ' . istats_PrettySize($browser['Data_free']).'&nbsp;<a href="main.php?op=optimise&table=TDMStats_browser">'._AM_ISTATS_OPT.'</a></b>';
		echo '<br/><br/>';
		echo _AM_ISTATS_TOTAL.':<b> ' .  istats_PrettySize($browser['Data_length'] + $browser['Index_length']) . '</b>';
		echo '<br /><br />
	</fieldset><br />
	
		<fieldset><legend class="CPmediumTitle">'.$os['Name'].'</legend>
		<br/>';
		echo _AM_ISTATS_FREE.':<b> ' . istats_PrettySize($os['Data_free']).'&nbsp;<a href="main.php?op=optimise&table=TDMStats_os">'._AM_ISTATS_OPT.'</a></b>';
		echo '<br/><br/>';
		echo _AM_ISTATS_TOTAL.':<b> ' .  istats_PrettySize($os['Data_length'] + $os['Index_length']) . '</b>';
		echo '<br /><br />
	</fieldset><br />
	
	<fieldset><legend class="CPmediumTitle">'.$hostname['Name'].'</legend>
		<br/>';
		echo _AM_ISTATS_FREE.':<b> ' . istats_PrettySize($hostname['Data_free']).'&nbsp;<a href="main.php?op=optimise&table=TDMStats_hostname">'._AM_ISTATS_OPT.'</a></b>';
		echo '<br/><br/>';
		echo _AM_ISTATS_TOTAL.':<b> ' .  istats_PrettySize($hostname['Data_length'] + $hostname['Index_length']) . '</b>';
		echo '<br /><br />
	</fieldset><br />
	
		<fieldset><legend class="CPmediumTitle">'.$week['Name'].'</legend>
		<br/>';
		echo _AM_ISTATS_FREE.':<b> ' . istats_PrettySize($week['Data_free']).'&nbsp;<a href="main.php?op=optimise&table=TDMStats_week">'._AM_ISTATS_OPT.'</a></b>';
		echo '<br/><br/>';
		echo _AM_ISTATS_TOTAL.':<b> ' .  istats_PrettySize($week['Data_length'] + $week['Index_length']) . '</b>';
		echo '<br /><br />
	</fieldset><br />
	
			<fieldset><legend class="CPmediumTitle">'.$week_count['Name'].'</legend>
		<br/>';
		echo _AM_ISTATS_FREE.':<b> ' . istats_PrettySize($week_count['Data_free']).'&nbsp;<a href="main.php?op=optimise&table=TDMStats_week_count">'._AM_ISTATS_OPT.'</a></b>';
		echo '<br/><br/>';
		echo _AM_ISTATS_TOTAL.':<b> ' .  istats_PrettySize($week_count['Data_length'] + $week_count['Index_length']) . '</b>';
		echo '<br /><br />
	</fieldset><br />
	
			<fieldset><legend class="CPmediumTitle">'.$mth['Name'].'</legend>
		<br/>';
		echo _AM_ISTATS_FREE.':<b> ' . istats_PrettySize($mth['Data_free']).'&nbsp;<a href="main.php?op=optimise&table=TDMStats_mth">'._AM_ISTATS_OPT.'</a></b>';
		echo '<br/><br/>';
		echo _AM_ISTATS_TOTAL.':<b> ' .  istats_PrettySize($mth['Data_length'] + $mth['Index_length']) . '</b>';
		echo '<br /><br />
	</fieldset><br />
	
				<fieldset><legend class="CPmediumTitle">'.$mth_days['Name'].'</legend>
		<br/>';
		echo _AM_ISTATS_FREE.':<b> ' . istats_PrettySize($mth_days['Data_free']).'&nbsp;<a href="main.php?op=optimise&table=TDMStats_mth_days">'._AM_ISTATS_OPT.'</a></b>';
		echo '<br/><br/>';
		echo _AM_ISTATS_TOTAL.':<b> ' .  istats_PrettySize($mth_days['Data_length'] + $mth_days['Index_length']) . '</b>';
		echo '<br /><br />
	</fieldset><br />
	
				<fieldset><legend class="CPmediumTitle">'.$screen['Name'].'</legend>
		<br/>';
		echo _AM_ISTATS_FREE.':<b> ' . istats_PrettySize($screen['Data_free']).'&nbsp;<a href="main.php?op=optimise&table=TDMStats_screen">'._AM_ISTATS_OPT.'</a></b>';
		echo '<br/><br/>';
		echo _AM_ISTATS_TOTAL.':<b> ' .  istats_PrettySize($screen['Data_length'] + $screen['Index_length']) . '</b>';
		echo '<br /><br />
	</fieldset><br />
	
					<fieldset><legend class="CPmediumTitle">'.$color['Name'].'</legend>
		<br/>';
		echo _AM_ISTATS_FREE.':<b> ' . istats_PrettySize($color['Data_free']).'&nbsp;<a href="main.php?op=optimise&table=TDMStats_color">'._AM_ISTATS_OPT.'</a></b>';
		echo '<br/><br/>';
		echo _AM_ISTATS_TOTAL.':<b> ' .  istats_PrettySize($color['Data_length'] + $color['Index_length']) . '</b>';
		echo '<br /><br />
	</fieldset><br />
	
					<fieldset><legend class="CPmediumTitle">'.$page['Name'].'</legend>
		<br/>';
		echo _AM_ISTATS_FREE.':<b> ' . istats_PrettySize($page['Data_free']).'&nbsp;<a href="main.php?op=optimise&table=TDMStats_page">'._AM_ISTATS_OPT.'</a></b>';
		echo '<br/><br/>';
		echo _AM_ISTATS_TOTAL.':<b> ' .  istats_PrettySize($page['Data_length'] + $page['Index_length']) . '</b>';
		echo '<br /><br />
	</fieldset><br />
	
						<fieldset><legend class="CPmediumTitle">'.$modules['Name'].'</legend>
		<br/>';
		echo _AM_ISTATS_FREE.':<b> ' . istats_PrettySize($modules['Data_free']).'&nbsp;<a href="main.php?op=optimise&table=TDMStats_modules">'._AM_ISTATS_OPT.'</a></b>';
		echo '<br/><br/>';
		echo _AM_ISTATS_TOTAL.':<b> ' .  istats_PrettySize($modules['Data_length'] + $modules['Index_length']) . '</b>';
		echo '<br /><br />
	</fieldset><br />
	
						<fieldset><legend class="CPmediumTitle">'.$pays['Name'].'</legend>
		<br/>';
		echo _AM_ISTATS_FREE.':<b> ' . istats_PrettySize($pays['Data_free']).'&nbsp;<a href="main.php?op=optimise&table=TDMStats_pays">'._AM_ISTATS_OPT.'</a></b>';
		echo '<br/><br/>';
		echo _AM_ISTATS_TOTAL.':<b> ' .  istats_PrettySize($pays['Data_length'] + $pays['Index_length']) . '</b>';
		echo '<br /><br />
	</fieldset><br /><br />
	
							<fieldset><legend class="CPmediumTitle">'.$user['Name'].'</legend>
		<br/>';
		echo _AM_ISTATS_FREE.':<b> ' . istats_PrettySize($user['Data_free']).'&nbsp;<a href="main.php?op=optimise&table=TDMStats_usercount">'._AM_ISTATS_OPT.'</a></b>';
		echo '<br/><br/>';
		echo _AM_ISTATS_TOTAL.':<b> ' .  istats_PrettySize($user['Data_length'] + $user['Index_length']) . '</b>';
		echo '<br /><br />
	</fieldset><br /><br />';
	
	
	echo '</td></tr></table>';
include_once 'admin_footer.php';