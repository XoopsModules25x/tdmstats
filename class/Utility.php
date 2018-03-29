<?php namespace XoopsModules\Tdmstats;

use Xmf\Request;
use XoopsModules\Tdmstats;
use XoopsModules\Tdmstats\Common;

/**
 * Class Utility
 */
class Utility
{
    use Common\VersionChecks; //checkVerXoops, checkVerPhp Traits

    use Common\ServerStats; // getServerStats Trait

    use Common\FilesManagement; // Files Management Trait

    //--------------- Custom module methods -----------------------------
}
