<?php
/**
 * Page Template
 *
 * @package templateSystem
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_shippinginfo_default.php for Winchester 2024-11-20 15:49:16Z webchills $
 */
?>
<div class="centerColumn" id="shippingInfo">
<h1 id="shippingInfoHeading"><?php echo HEADING_TITLE; ?></h1>

<?php if (DEFINE_SHIPPINGINFO_STATUS >= 1 and DEFINE_SHIPPINGINFO_STATUS <= 2) { ?>
<div id="shippingInfoMainContent" class="content">
<?php
/**
 * require the html_define for the shippinginfo page
 */
  require($define_page);
?>
</div>
<?php } ?>
</div>
