************************************************** **********
CT: TDMStats
Version 1.07 | 12-05-2012
Dev: 2.2.3
************************************************** **********

************************************************** **********
UPDATE
************************************************** **********

- Overwrite the file TDMStats, to update the module from the site administration.
- When using a custom template set, remove the module's templates for regeneration.
- Use the tab admin / plugin for copying the plugin or refer you to the "manual copy"
- Appointments in the administration module To create permissions.


************************************************** **********
INSTALLATION
************************************************** **********

- Upload the entire folder 'TDMStats' folder to / modules /
- Go to Admin of your site to install the module.
- Go to the Administration module, then use the tab 'plugin' to copy the plugin or refer you to the "manual copy".
- Set permissions.



************************************************** **********
Manually copy the files in the folder "xoops_plugins"
************************************************** **********

follow the structure of folders and subfolders

function.xoStats.php (new file)

Copy the file tdmstats/xoops_plugins/function.xoStats.php

into

/class/smarty/xoops_plugins/

************************************************** **********
SMARTY TDMStats
************************************************** **********

1) <{xoStats}> (account visits)

Note: Remember to copy the code "<{xoStats}>" to theme.html in your theme in order to record the visits ...
