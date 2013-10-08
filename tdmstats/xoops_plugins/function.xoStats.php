<?php

function smarty_function_xoStats( $params, &$smarty ) {
	
global $xoops,$xoopsUser, $xoopsModuleConfig, $xoopsConfig, $HTTP_COOKIE_VARS, $xoopsModule;


if ($xoopsModule) {
$ismodule = $xoopsModule->getVar("dirname");
}else {
$ismodule = 'index';
}

	echo '<script type="text/Javascript">
		  istat = new Image(1,1);
		  istat.src = "'.XOOPS_URL.'/modules/TDMStats/counter.php?sw="+screen.width+"&sc="+screen.colorDepth+"&page="+location.href+"&ismodule='.$ismodule.'";
		  </script>';	
	
	}
	
?>