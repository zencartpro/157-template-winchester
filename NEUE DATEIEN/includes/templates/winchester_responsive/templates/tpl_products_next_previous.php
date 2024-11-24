<?php
/**
 * Page Template
 * Zen Cart German Specific
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_products_next_previous.php for Winchester 2024-11-24 12:05:58Z webchills $
 */
?>
<div class="navNextPrevWrapper centeredContent">
<?php
// only display when more than 1
  if ($products_found_count > 1) {
?>
<p class="navNextPrevCounter"><?php echo (PREV_NEXT_PRODUCT); ?><?php echo ($position+1 . "/" . $counter); ?></p>
<div class="navNextPrevList"><a href="<?php echo zen_href_link(zen_get_info_page($previous), "cPath=$cPath&products_id=$previous"); ?>"><?php echo '<i class="fa-solid fa-circle-chevron-left fa-2xl" title="' . BUTTON_PREVIOUS_ALT . '"></i></a></div>';?>
<div class="navNextPrevList"><a href="<?php echo zen_href_link(FILENAME_DEFAULT, "cPath=$cPath"); ?>"><?php echo '<i class="fa-solid fa-list fa-2xl" title="' . BUTTON_VIEW_ALL_ALT . '"></i></a></div>';?>
<div class="navNextPrevList"><a href="<?php echo zen_href_link(zen_get_info_page($next_item), "cPath=$cPath&products_id=$next_item"); ?>"><?php echo '<i class="fa-solid fa-circle-chevron-right fa-2xl" title="' . BUTTON_NEXT_ALT . '"></i></a></div>';?>
<?php
  }
?>
</div>