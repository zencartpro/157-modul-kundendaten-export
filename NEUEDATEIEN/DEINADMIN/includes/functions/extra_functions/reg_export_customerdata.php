<?php
if (!defined('IS_ADMIN_FLAG')) {
    die('Illegal Access');
}
if (function_exists('zen_register_admin_page')) {
    if (!zen_page_key_exists('configProdCustomerExport')) {
        // Add Customer Data Export to Tools menu
        zen_register_admin_page('configProdCustomerExport', 'BOX_TOOLS_EXPORT_CUSTOMERDATA','FILENAME_EXPORT_CUSTOMERDATA', '', 'tools', 'Y', 160);
    }
}