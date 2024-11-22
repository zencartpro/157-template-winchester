<?php
/**
 * Page Template
 * Zen Cart German Specific (zencartpro adaptations)
 * Loaded automatically by index.php?main_page=product_info.
 * Displays details of a typical product
 *
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_product_info_display.php for Winchester 2024-11-21 08:50:24Z webchills $
 */
 //require(DIR_WS_MODULES . '/debug_blocks/product_info_prices.php');
?>
<div class="centerColumn" id="productGeneral">

<!--bof Form start-->
<?php echo zen_draw_form('cart_quantity', zen_href_link(zen_get_info_page($_GET['products_id']), zen_get_all_get_params(array('action')) . 'action=add_product', $request_type), 'post', 'enctype="multipart/form-data" id="addToCartForm"') . "\n"; ?>
<!--eof Form start-->

<?php if ($messageStack->size('product_info') > 0) echo $messageStack->output('product_info'); ?>

<!--bof Category Icon -->
<?php if ($module_show_categories != 0) {?>
<?php
/**
 * display the category icons
 */
require($template->get_template_dir('/tpl_modules_category_icon_display.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_category_icon_display.php'); ?>
<?php } ?>
<!--eof Category Icon -->

<!--bof Prev/Next top position -->
<?php if (PRODUCT_INFO_PREVIOUS_NEXT == 1 or PRODUCT_INFO_PREVIOUS_NEXT == 3) { ?>
<?php
/**
 * display the product previous/next helper
 */
require($template->get_template_dir('/tpl_products_next_previous.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_products_next_previous.php'); ?>
<?php } ?>
<!--eof Prev/Next top position-->

<br class="clearBoth">

<!--bof Product Name-->
<h1 id="productName" class="productGeneral"><?php echo $products_name; ?></h1>
<!--eof Product Name-->

<div id="pi-left">
<!--bof Main Product Image -->
<?php
  if (!empty($products_image) || !empty($enable_additional_images_without_main_image)) {
  ?>
<?php
/**
 * display the main product image
 */
   require($template->get_template_dir('/tpl_modules_main_product_image.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_main_product_image.php'); ?>

<!--eof Main Product Image-->

<br class="clearBoth">

<!--bof Additional Product Images -->
<?php
/**
 * display the products additional images
 */
  require($template->get_template_dir('/tpl_modules_additional_images.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_additional_images.php'); ?>
<!--eof Additional Product Images -->


</div>
<?php
  }
?>
<div id="pi-right">
<!--bof Product Price block -->
<h2 id="productPrices" class="productGeneral">
<?php
// base price
  if ($show_onetime_charges_description == 'true') {
    $one_time = '<span>' . TEXT_ONETIME_CHARGE_SYMBOL . TEXT_ONETIME_CHARGE_DESCRIPTION . '</span><br>';
  } else {
    $one_time = '';
  }
  echo $one_time . ((zen_has_product_attributes_values((int)$_GET['products_id']) and $flag_show_product_info_starting_at == 1) ? TEXT_BASE_PRICE : '') . zen_get_products_display_price((int)$_GET['products_id']);
?></h2>
<!--eof Product Price block -->

<!--bof free ship icon  -->
<?php if(zen_get_product_is_always_free_shipping($products_id_current) && $flag_show_product_info_free_shipping) { ?>
<div id="freeShippingIcon"><?php echo TEXT_PRODUCT_FREE_SHIPPING_ICON; ?></div>
<?php } ?>
<!--eof free ship icon  -->


<!--bof Attributes Module -->
<?php
  if ($pr_attr->fields['total'] > 0) {
?>
<?php
/**
 * display the product attributes
 */
  require($template->get_template_dir('/tpl_modules_attributes.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_attributes.php'); ?>
<?php
  }
?>
<!--eof Attributes Module -->

<!--bof Quantity Discounts table -->
<?php
  if ($products_discount_type != 0) { ?>
<?php
/**
 * display the products quantity discount
 */
 require($template->get_template_dir('/tpl_modules_products_quantity_discounts.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_products_quantity_discounts.php'); ?>
<?php
  }
?>
<!--eof Quantity Discounts table -->

</div>
<!--bof Add to Cart Box -->
<?php
if (CUSTOMERS_APPROVAL == 3 and TEXT_LOGIN_FOR_PRICE_BUTTON_REPLACE_SHOWROOM == '') {
  // do nothing
} else {
?>
            <?php
    $display_qty = (($flag_show_product_info_in_cart_qty == 1 and $_SESSION['cart']->in_cart($_GET['products_id'])) ? '<p>' . PRODUCTS_ORDER_QTY_TEXT_IN_CART . $_SESSION['cart']->get_quantity($_GET['products_id']) . '</p>' : '');
            if ($products_qty_box_status == 0 or $products_quantity_order_max== 1) {
              // hide the quantity box and default to 1
      $the_button = '<input type="hidden" name="cart_quantity" value="1">';
    } else {
      // show the quantity box
      $the_button = '<div class="max-qty">' . zen_get_products_quantity_min_units_display((int)$_GET['products_id']) . '</div><span class="qty-text">' . PRODUCTS_ORDER_QTY_TEXT . '</span><input type="text" name="cart_quantity" value="' . $products_get_buy_now_qty . '" maxlength="6" size="4" aria-label="' . ARIA_QTY_ADD_TO_CART . '">';
    }
    $the_button .= zen_draw_hidden_field('products_id', (int)$_GET['products_id']);
    $the_button .= zen_image_submit(BUTTON_IMAGE_IN_CART, BUTTON_IN_CART_ALT, ' id="addToCartButton"');
    $display_button = zen_get_buy_now_button($_GET['products_id'], $the_button);
  ?>
  <?php if ($display_qty != '' or $display_button != '') { ?>
    <div id="cartAdd">
    <?php
      echo $display_qty;
      echo $display_button;
            ?>
          </div>
  <?php } // display qty and button ?>
<?php } // CUSTOMERS_APPROVAL == 3 ?>
<!--eof Add to Cart Box-->
</div>
<br class="clearBoth">

<script src="<?php echo $template->get_template_dir('easyResponsiveTabs.js',DIR_WS_TEMPLATE, $current_page_base,'jscript') . '/easyResponsiveTabs.js' ?>" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#horizontalTab').easyResponsiveTabs({
            type: 'accordion', //Types: default, vertical, accordion           
            width: 'auto', //auto or any width like 600px
            fit: true,   // 100% fit in a container
                    activate: function(event) { // Callback function if tab is switched
                var $tab = $(this);
                var $name = $('span', $info);

                $name.text($tab.text());

                $info.show();
            }
        });

        $('#verticalTab').easyResponsiveTabs({
            type: 'vertical',
            width: 'auto',
            fit: true
        });
    });
</script>

 <div id="horizontalTab">
            <ul class="resp-tabs-list">
                <li><?php echo HEADER_TITLE_DESCRIPTION; ?></li>
                <li><?php echo HEADER_TITLE_DETAILS; ?></li>
                <li><?php echo HEADER_TITLE_REVIEWS; ?></li>
		<li>
 <?php
//You will have to change 'SHOW_BANNERS_GROUP_SET9' for each different group you added to display the proper banners
if (SHOW_BANNERS_GROUP_SETCUSTOMTAB != '' && $banner = zen_banner_exists('dynamic', SHOW_BANNERS_GROUP_SETCUSTOMTAB)) 
    { ?>
    <?php if ($banner->RecordCount() > 0) 
       { ?>
       	
        <?php echo $banner->fields['banners_title'];
        } ?>
   
<?php } ?>
   </li>
   <li>
<?php if (($flag_show_gpsr) && (!empty($manufacturers_gpsr_company)))  { ?>

<?php echo HEADER_TITLE_GPSR; ?>
<?php } ?>
</li>
            </ul>
            <div class="resp-tabs-container">
                <div>

<!--bof Product description -->
<?php if ($products_description != '') { ?>
<div id="productDescription" class="productGeneral biggerText"><?php echo stripslashes($products_description); ?></div>
<?php } ?>
<!--eof Product description -->

                </div>
                <div>
<!--bof Product details list  -->
<?php if ( (($flag_show_product_info_model == 1 and $products_model != '') or ($flag_show_product_info_weight == 1 and $products_weight !=0) or ($flag_show_product_info_quantity == 1) or ($flag_show_product_info_manufacturer == 1 and !empty($manufacturers_name))) ) { ?>
<ul id="productDetailsList" class="floatingBox back">
  <?php echo (($flag_show_product_info_model == 1 and $products_model !='') ? '<li>' . TEXT_PRODUCT_MODEL . $products_model . '</li>' : '') . "\n"; ?>
  <?php echo (($flag_show_product_info_weight == 1 and $products_weight !=0) ? '<li>' . TEXT_PRODUCT_WEIGHT .  $products_weight . TEXT_PRODUCT_WEIGHT_UNIT . '</li>'  : '') . "\n"; ?>
  <?php echo (($flag_show_product_info_quantity == 1) ? '<li>' . $products_quantity . TEXT_PRODUCT_QUANTITY . '</li>'  : '') . "\n"; ?>
  <?php echo (($flag_show_product_info_manufacturer == 1 and !empty($manufacturers_name)) ? '<li>' . TEXT_PRODUCT_MANUFACTURER . $manufacturers_name . '</li>' : '') . "\n"; ?>
</ul>
<br class="clearBoth" />
<?php
  }
?>
<!--eof Product details list -->

                </div>
                <div>
<!-- added for dgReview on product page -->
	<?php require($template->get_template_dir('tpl_dgReview.php', DIR_WS_TEMPLATE, $current_page_base,'templates'). '/' . 'tpl_dgReview.php');?>
	<br class="clearBoth">
<!-- added for dgReview on product page -->
</div>
<div>

 <?php
//You will have to change 'SHOW_BANNERS_GROUP_SET9' for each different group you added to display the proper banners
if (SHOW_BANNERS_GROUP_SETCUSTOMTAB != '' && $banner = zen_banner_exists('dynamic', SHOW_BANNERS_GROUP_SETCUSTOMTAB)) { ?>
<?php  if ($banner->RecordCount() > 0)  { ?>
<?php echo zen_display_banner('static', $banner);?>

<?php } ?>
<?php } ?>            
</div>

<?php if ($flag_show_gpsr) { ?>
<?php if (!empty($manufacturers_gpsr_company)) { ?>
 <!--bof GPSR -->
<div id="gpsrinfo" class="productGeneral">
<ul id="gpsrDetailsList">
	<?php echo '<li><b>' . TEXT_MANUFACTURER_GPSR_INFO . '' . $manufacturers_name . '</b></li>'; ?>
	<?php echo '<li>' . TEXT_MANUFACTURER_GPSR_CONTACT_INFO . '</li>'; ?>
	<?php echo '<li>&nbsp; </li>'; ?>
	<?php echo '<li>' . TEXT_MANUFACTURER_GPSR_ADDRESS_INFO . '</li>'; ?>
  <?php echo ((!empty($manufacturers_gpsr_company)) ? '<li>' . TEXT_MANUFACTURER_GPSR_COMPANY . $manufacturers_gpsr_company . '</li>' : '') . "\n"; ?>
  <?php echo ((!empty($manufacturers_gpsr_contact_person)) ? '<li>' . TEXT_MANUFACTURER_GPSR_CONTACT_PERSON . $manufacturers_gpsr_contact_person . '</li>' : '') . "\n"; ?>
  <?php echo ((!empty($manufacturers_gpsr_street)) ? '<li>' . TEXT_MANUFACTURER_GPSR_STREET . $manufacturers_gpsr_street . '</li>' : '') . "\n"; ?>
  <?php echo ((!empty($manufacturers_gpsr_city)) ? '<li>' . TEXT_MANUFACTURER_GPSR_POSTCODE . $manufacturers_gpsr_postcode . ' ' . TEXT_MANUFACTURER_GPSR_CITY . $manufacturers_gpsr_city . '</li>' : '') . "\n"; ?>
  <?php echo ((!empty($manufacturers_gpsr_country)) ? '<li>' . TEXT_MANUFACTURER_GPSR_COUNTRY . $manufacturers_gpsr_country . '</li>' : '') . "\n"; ?>
  <?php echo '<li>&nbsp; </li>'; ?>
  <?php echo '<li>' . TEXT_MANUFACTURER_GPSR_URL_INFO . '</li>'; ?>
  <?php echo ((!empty($manufacturers_gpsr_url)) ? '<li>' . TEXT_MANUFACTURER_GPSR_URL . $manufacturers_gpsr_url . '</li>' : '') . "\n"; ?>
  <?php if (!empty($manufacturers_gpsr_company_noneu)) { ?>
  <?php echo '<li>&nbsp; </li>'; ?>
  <?php echo '<li>' . TEXT_MANUFACTURER_GPSR_CONTACT_INFO_NONEU . '</li>'; ?>
  <?php echo '<li>&nbsp; </li>'; ?>
  <?php echo '<li>' . TEXT_MANUFACTURER_GPSR_ADDRESS_INFO . '</li>'; ?>
  <?php echo ((!empty($manufacturers_gpsr_company_noneu)) ? '<li>' . TEXT_MANUFACTURER_GPSR_COMPANY_NONEU . $manufacturers_gpsr_company_noneu . '</li>' : '') . "\n"; ?>
  <?php echo ((!empty($manufacturers_gpsr_contact_person_noneu)) ? '<li>' . TEXT_MANUFACTURER_GPSR_CONTACT_PERSON_NONEU . $manufacturers_gpsr_contact_person_noneu . '</li>' : '') . "\n"; ?>
  <?php echo ((!empty($manufacturers_gpsr_street_noneu)) ? '<li>' . TEXT_MANUFACTURER_GPSR_STREET_NONEU . $manufacturers_gpsr_street_noneu . '</li>' : '') . "\n"; ?>
  <?php echo ((!empty($manufacturers_gpsr_city_noneu)) ? '<li>' . TEXT_MANUFACTURER_GPSR_POSTCODE_NONEU . $manufacturers_gpsr_postcode_noneu . ' ' . TEXT_MANUFACTURER_GPSR_CITY_NONEU . $manufacturers_gpsr_city_noneu . '</li>' : '') . "\n"; ?>
  <?php echo ((!empty($manufacturers_gpsr_country_noneu)) ? '<li>' . TEXT_MANUFACTURER_GPSR_COUNTRY_NONEU . $manufacturers_gpsr_country_noneu . '</li>' : '') . "\n"; ?>
  <?php echo '<li>&nbsp; </li>'; ?>
  <?php echo '<li>' . TEXT_MANUFACTURER_GPSR_URL_INFO . '</li>'; ?>
  <?php echo ((!empty($manufacturers_gpsr_url_noneu)) ? '<li>' . TEXT_MANUFACTURER_GPSR_URL_NONEU . $manufacturers_gpsr_url_noneu . '</li>' : '') . "\n"; ?>
  <?php echo '<li>&nbsp; </li>'; ?>
  <?php } ?>
  <?php echo ((!empty($manufacturers_gpsr_additional_1)) ? '<li>' . TEXT_MANUFACTURER_GPSR_ADDITIONAL_1 . $manufacturers_gpsr_additional_1 . '</li>' : '') . "\n"; ?>
  <?php echo ((!empty($manufacturers_gpsr_additional_2)) ? '<li>' . TEXT_MANUFACTURER_GPSR_ADDITIONAL_2 . $manufacturers_gpsr_additional_2 . '</li>' : '') . "\n"; ?>
  <?php echo ((!empty($manufacturers_gpsr_additional_3)) ? '<li>' . TEXT_MANUFACTURER_GPSR_ADDITIONAL_3 . $manufacturers_gpsr_additional_3 . '</li>' : '') . "\n"; ?>
</ul>
</div>
 
	<!--eof GPSR -->
<?php } ?>
<?php } ?>
</div>
</div>

<?php
if ($flag_show_ask_a_question) {
?>
<!-- bof Ask a Question -->
<br class="clearBoth">
<span id="productQuestions" class="forward">
<?php echo '<a href="' . zen_href_link(FILENAME_ASK_A_QUESTION, 'pid=' . $_GET['products_id'], 'SSL') . '">' . zen_image_button(BUTTON_IMAGE_ASK_A_QUESTION, BUTTON_ASK_A_QUESTION_ALT, ' id="askAQuestionButton"') . '</a>'; ?>
</span>
<br class="clearBoth">
<br>
<!-- eof Ask a Question -->
<?php
}
?>



<!--bof Prev/Next bottom position -->
<?php if (PRODUCT_INFO_PREVIOUS_NEXT == 2 or PRODUCT_INFO_PREVIOUS_NEXT == 3) { ?>
<?php
/**
 * display the product previous/next helper
 */
 require($template->get_template_dir('/tpl_products_next_previous.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_products_next_previous.php'); ?>
<?php } ?>
<!--eof Prev/Next bottom position -->

<br class="clearBoth" />

<!--bof Product date added/available-->
<?php
  if ($products_date_available > date('Y-m-d H:i:s')) {
    if ($flag_show_product_info_date_available == 1) {
?>
  <p id="productDateAvailable" class="productGeneral centeredContent"><?php echo sprintf(TEXT_DATE_AVAILABLE, zen_date_long($products_date_available)); ?></p>
<?php
    }
  } else {
    if ($flag_show_product_info_date_added == 1) {
?>
      <p id="productDateAdded" class="productGeneral centeredContent"><?php echo sprintf(TEXT_DATE_ADDED, zen_date_long($products_date_added)); ?></p>
<?php
    } // $flag_show_product_info_date_added
  }
?>
<!--eof Product date added/available -->

<!--bof Product URL -->
<?php
  if (!empty($products_url)) {
    if ($flag_show_product_info_url == 1) {
?>
    <p id="productInfoLink" class="productGeneral centeredContent"><?php echo sprintf(TEXT_MORE_INFORMATION, zen_href_link(FILENAME_REDIRECT, 'action=product&products_id=' . zen_output_string_protected($_GET['products_id']), 'NONSSL', true, false)); ?></p>
<?php
    } // $flag_show_product_info_url
  }
?>
<!--eof Product URL -->
<!--bof Cross Sells-->
<?php include $template->get_template_dir('tpl_modules_xsell_products.php', DIR_WS_TEMPLATE, $current_page_base, 'templates') . '/tpl_modules_xsell_products.php';?>
<!--eof Cross Sells-->
<!--bof also purchased products module-->
<?php require($template->get_template_dir('tpl_modules_also_purchased_products.php', DIR_WS_TEMPLATE, $current_page_base,'templates'). '/' . 'tpl_modules_also_purchased_products.php');?>
<!--eof also purchased products module-->

<!--bof Form close-->
</form>
<!--bof Form close-->
</div>
