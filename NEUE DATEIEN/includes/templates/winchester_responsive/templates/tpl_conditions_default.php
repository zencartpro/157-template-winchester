<?php
/**
 * Page Template
 * Zen Cart German Specific (zencartpro adaptations)
 * Loaded automatically by index.php?main_page=conditions.
 * Displays conditions page.
 *
 * @package templateSystem
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_conditions_default.php 2024-11-20 08:49:16Z webchills $
 */
?>
<div class="centerColumn" id="conditions">
<?php if (IT_RECHT_KANZLEI_STATUS == 'ja') { ?>
<h1 id="conditionsHeading"><?php echo $var_pageDetails->fields['pages_title']; ?></h1>
<?php } else { ?>
<h1 id="conditionsHeading"><?php echo HEADING_TITLE; ?></h1>
<?php } ?>

<?php if (DEFINE_CONDITIONS_STATUS >= 1 and DEFINE_CONDITIONS_STATUS <= 2) { ?>
<div id="conditionsMainContent" class="content">
<?php if (IT_RECHT_KANZLEI_STATUS == 'ja') { ?>
<?php echo $var_pageDetails->fields['pages_html_text']; ?>
<?php } else { ?>
<?php
/**
 * require the html_define for the conditions page
 */
  require($define_page);
?>
<?php } ?>
</div>
<?php } ?>
</div>