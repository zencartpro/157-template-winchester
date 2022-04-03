<?php
/**
 * Page Template
 *
 * @package templateSystem
 * @copyright Copyright 2003-2022 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_about_us_default.php 2022-04-02 13:49:16Z webchills $
 
 */
?>
<div class="centerColumn" id="about_us">
<h1 id="aboutUsHeading"><?php echo HEADING_TITLE; ?></h1>

<div id="aboutUsMainContent" class="content">
<?php
/**
 * require the html_define for the about us page
 */
  require($define_page);
?>
</div>


<div class="buttonRow back"><?php echo zen_back_link() . zen_image_button(BUTTON_IMAGE_BACK, BUTTON_BACK_ALT) . '</a>'; ?></div>
</div>