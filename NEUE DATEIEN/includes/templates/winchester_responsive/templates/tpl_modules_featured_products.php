<?php
/**
 * Module Template
 *
 * @package templateSystem
 * @copyright Copyright 2003-2022 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_modules_featured_products.php for Winchester 2022-04-02 15:49:16Z webchills $
 */
  $zc_show_featured = false;
  include(DIR_WS_MODULES . zen_get_module_directory(FILENAME_FEATURED_PRODUCTS_MODULE));
?>

<!-- bof: featured products  -->
<?php if ($zc_show_featured == true) { 
 if ($this_is_home_page == 'true' and CAROUSEL_FEATURED_PRODUCTS == 'true') {
?>
   <h2 class="centerBoxHeading"><?php echo TABLE_HEADING_FEATURED_PRODUCTS; ?></h2>
<div class="image_carousel" id="carousel">
<?php
if (is_array($list_box_contents) > 0 ) { ?>
<div id="foo1">
<?php
 for($row=0;$row<sizeof($list_box_contents);$row++) {
    $params = "";
?>

<?php
    for($col=0;$col<sizeof($list_box_contents[$row]);$col++) {
      $r_params = "";
      if (isset($list_box_contents[$row][$col]['params'])) $r_params .= ' ' . (string)$list_box_contents[$row][$col]['params'];
     if (isset($list_box_contents[$row][$col]['text'])) {
?>
    <?php echo '<div' . $r_params . '>' . $list_box_contents[$row][$col]['text'] .  '</div>' . "\n"; ?>
<?php
      }
    }
?>
<?php
  }
?>
<?php
}
?>
</div>
<div class="clearfix"></div>
<a class="prev" id="foo1_prev" href="#"><span>prev</span></a>
<a class="next" id="foo1_next" href="#"><span>next</span></a>
<?php } else { ?>
<div class="centerBoxWrapper" id="featuredProducts">
<?php
/**
 * require the list_box_content template to display the product
 */
  require($template->get_template_dir('tpl_columnar_display.php',DIR_WS_TEMPLATE, $current_page_base,'common'). '/tpl_columnar_display.php');
?>
<?php } ?>
</div>
<?php } ?>
<!-- eof: featured products  -->
