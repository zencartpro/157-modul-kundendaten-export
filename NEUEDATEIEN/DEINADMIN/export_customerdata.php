<?php
/**
* @package Export Customer Data as CSV
* @copyright Copyright 2015-2024, webchills www.webchills.at
* @copyright Portions Copyright 2003-2024 Zen Cart Development Team
* @copyright Portions Copyright 2009 911-need-code-help.blogspot.com
* Zen Cart German Version - www.zen-cart-pro.at
* @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
* @version $Id: export_customerdata.php 2024-01-20 17:51:10 webchills $
*/
require('includes/application_top.php');
?>


<!doctype html>
<html <?php echo HTML_PARAMS; ?>>
  <head>
    <?php require DIR_WS_INCLUDES . 'admin_html_head.php'; ?>

</head>
<body>
<!-- header //-->
<?php require(DIR_WS_INCLUDES . 'header.php'); ?>

 <!-- header_eof //-->
 <!-- body //-->
      <div class="container-fluid">
       
        <h1 class="pageHeading"><?php echo EXPORT_CUSTOMERDATA_HEADING; ?></h1>
 <div class="row"><?php echo TEXT_EXPORT_CUSTOMERDATA_OVERVIEW; ?><br/><br/><?php echo TEXT_EXPORT_CUSTOMERDATA_INFO; ?></div>
 	<br/><br/>
 	 <div class="row">
           <div class="form-group">
 	<a class="btn btn-default" href="export_customerdata/export_customer_data_all_csv.php">Download/Export</a>
       </div>
    </div>
   
 <!-- body_text_eof //-->
      </div>
      <!-- body_eof //-->
      <!-- footer //-->
<?php require DIR_WS_INCLUDES . 'footer.php'; ?>
</body>
</html>
<?php require DIR_WS_INCLUDES . 'application_bottom.php'; ?>