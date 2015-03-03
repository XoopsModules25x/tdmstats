<?php

include_once 'admin_header.php';
xoops_cp_header();

$indexAdmin = new ModuleAdmin();
$langue = htmlEntities($_SERVER["HTTP_ACCEPT_LANGUAGE"]);
$langs= explode(",",$_SERVER["HTTP_ACCEPT_LANGUAGE"]);
$file = "Vous acceptez les langues suivantes: ".$langue."<br/>
   mais votre langue principale est: ".$langs[0]."";
//$file_protection = $date = formatTimestamp(time(), "A d B")."Tatane, Xoopsfr<br /><br />
//Cesag, Xoopsfr<br /><br />Grosdunord, Xoopsfr<br /><br />Phira, Xoopsfr<br />";
$indexAdmin->addConfigBoxLine(_AM_ISTATS_TEST.": ".$langue);
echo $indexAdmin->addNavigation('index.php');
echo $indexAdmin->renderIndex();

include 'admin_footer.php';
