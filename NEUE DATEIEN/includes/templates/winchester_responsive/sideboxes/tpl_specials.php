<?php
/**
 * Side Box Template
 *
 * @package templateSystem
 * @copyright Copyright 2003-2022 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_specials.php for Winchester 2022-04-02 15:18:16Z webchills $
 */
  $content = "";
  $content .= '<div class="sideBoxContent centeredContent">';
  $specials_box_counter = 0;
  while (!$random_specials_sidebox_product->EOF) {
    $specials_box_counter++;
    $specials_box_price = zen_get_products_display_price($random_specials_sidebox_product->fields['products_id']);
    $content .= "\n" . '  <div class="sideBoxContentItem">';
    $content .= '<div class="box-title"><a href="' . zen_href_link(zen_get_info_page($random_specials_sidebox_product->fields["products_id"]), 'cPath=' . zen_get_generated_category_path_rev($random_specials_sidebox_product->fields["master_categories_id"]) . '&products_id=' . $random_specials_sidebox_product->fields["products_id"]) . '">' . zen_image(DIR_WS_IMAGES . $random_specials_sidebox_product->fields['products_image'], $random_specials_sidebox_product->fields['products_name'], SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT);
    $content .= '<br />' . $random_specials_sidebox_product->fields['products_name'] . '</a></div>';
    $content .= '<div class="box-price">' . $specials_box_price . '</div>';
    $content .= '</div>';
    $random_specials_sidebox_product->MoveNextRandom();
  }
  $content .= '</div>' . "\n";
