<?php
/**
* @package Export Customer Data as CSV
* @copyright Copyright 2015-2023, webchills www.webchills.at
* @copyright Portions Copyright 2003-2023 Zen Cart Development Team
* @copyright Portions Copyright 2009 911-need-code-help.blogspot.com
* Zen Cart German Version - www.zen-cart-pro.at
* @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
* @version $Id: reg_export_customerdata.php 2023-04-26 18:51:10 webchills $
*/
if (!defined('IS_ADMIN_FLAG')) {
    die('Illegal Access');
}

// This file should normally only need to be run once, but if the user hasn't installed the software properly it
// may need to be run again. Flag tracks the situation
$can_autodelete = true;

if (function_exists('zen_register_admin_page')) {
    if (!zen_page_key_exists('configProdCustomerExport')) {
    // Add Customer Data Export to Tools menu
    // Quick sanity check in case user hasn't uploaded a necessary file on which this depends
		$error_messages = array();
		
		if (!defined('FILENAME_EXPORT_CUSTOMERDATA')) {
			$error_messages[] = 'The export customerdata filename define is missing. Please check that the file ' .
				DIR_WS_INCLUDES . 'extra_datafiles/' . 'export_customerdata.php has been uploaded.';			
			$can_autodelete = false;			
		}
		
		if (count($error_messages) > 0) {
			// Let the user know that there are problem(s) with the installation
			foreach ($error_messages as $error_message) {
				print '<p style="background: #fcc; border: 1px solid #f00; margin: 1em; padding: 0.4em;">' .
					'Error: ' . $error_message . "</p>\n";
			}
		} else {
			// Necessary file is in place so can register the admin page and have the menu item created
        zen_register_admin_page('configProdCustomerExport', 'BOX_TOOLS_EXPORT_CUSTOMERDATA','FILENAME_EXPORT_CUSTOMERDATA', '', 'tools', 'Y', 160);
    }
}
}

if ($can_autodelete) {
	// Either the config utility file has been registered, or it doesn't need to be. Can stop the wasteful process
	// of having this script run again by having it delete itself
	@unlink(DIR_WS_INCLUDES . 'functions/extra_functions/reg_export_customerdata.php');
}