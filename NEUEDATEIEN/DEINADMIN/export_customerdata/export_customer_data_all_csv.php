<?php
/**
* @package Export Customer Data as CSV
* @copyright Copyright 2015-2024, webchills www.webchills.at
* @copyright Portions Copyright 2003-2022 Zen Cart Development Team
* @copyright Portions Copyright 2009 911-need-code-help.blogspot.com
* Zen Cart German Version - www.zen-cart-pro.at
* @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
* @version $Id: export_customerdata_all_csv.php 2024-01-20 17:20:10 webchills $
*/

chdir('../');
require_once('includes/application_top.php');

if (!defined('IS_ADMIN_FLAG')) {
die('Illegal Access');
}

global $db;

$customerdata = $db->Execute("SELECT 
c.customers_firstname as 'Vorname',
c.customers_lastname as 'Nachname',
c.customers_email_address as 'Email',
ab.entry_company as 'Firma',
ab.entry_street_address as 'Adresszeile 1',
ab.entry_suburb as 'Adresszeile 2',
ab.entry_postcode as 'PLZ',
ab.entry_city as 'Ort',
co.countries_name as 'Land',
c.customers_telephone as 'Telefon'
FROM
" . TABLE_CUSTOMERS . " c,
" . TABLE_ADDRESS_BOOK . " ab
LEFT JOIN " . TABLE_ZONES . " z ON (ab.entry_zone_id = z.zone_id
and ab.entry_country_id = z.zone_country_id)
LEFT JOIN " . TABLE_COUNTRIES . " co ON ab.entry_country_id = co.countries_id
WHERE
ab.customers_id=c.customers_id
and ab.address_book_id = c.customers_default_address_id");

if ($customerdata->EOF) return ''; 

header( 'Content-Type: text/csv' );
header( 'Content-Disposition: attachment;filename=kundendaten.csv' );
$header=FALSE;

foreach ($customerdata as $row) {  
if (!$header) {
echocsv( array_keys( $row ) );
$header=TRUE;
}
echocsv( $row );
}

function echocsv( $fields )
{
$separator = '';
foreach ( $fields as $field )
{
echo $separator . $field;
$separator = ',';
}
echo "\r\n";
}