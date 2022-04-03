<?php
/**
 * featured_products module - prepares content for display
 *
 * @package modules
 * @copyright Copyright 2003-2022 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: featured_products.php for Winchester 2019-09-14 11:02:16Z webchills $
 */
if (!defined('IS_ADMIN_FLAG')) {
  die('Illegal Access');
}

// initialize vars
$categories_products_id_list = array();
$list_of_products = '';
$featured_products_query = '';
$display_limit = '';

if ( (($manufacturers_id > 0 && empty($_GET['filter_id'])) || !empty($_GET['music_genre_id']) || !empty($_GET['record_company_id'])) || empty($new_products_category_id) ) {
  $featured_products_query = "SELECT p.products_id, p.products_image, pd.products_name, p.master_categories_id
                              FROM " . TABLE_PRODUCTS . " p
                              LEFT JOIN " . TABLE_FEATURED . " f ON p.products_id = f.products_id
                              LEFT JOIN " . TABLE_PRODUCTS_DESCRIPTION . " pd ON p.products_id = pd.products_id
                              AND pd.language_id = " . (int)$_SESSION['languages_id'] . "
                              WHERE p.products_status = 1
                              AND f.status = 1";
} else {
  // get all products and cPaths in this subcat tree
  $productsInCategory = zen_get_categories_products_list( (($manufacturers_id > 0 && !empty($_GET['filter_id'])) ? zen_get_generated_category_path_rev($_GET['filter_id']) : $cPath), false, true, 0, $display_limit);

  if (is_array($productsInCategory) && sizeof($productsInCategory) > 0) {
    // build products-list string to insert into SQL query
    foreach($productsInCategory as $key => $value) {
      $list_of_products .= $key . ', ';
    }
    $list_of_products = substr($list_of_products, 0, -2); // remove trailing comma
    $featured_products_query = "SELECT p.products_id, p.products_image, pd.products_name, p.master_categories_id
                                FROM " . TABLE_PRODUCTS . " p
                                LEFT JOIN " . TABLE_FEATURED . " f ON p.products_id = f.products_id
                                LEFT JOIN " . TABLE_PRODUCTS_DESCRIPTION . " pd ON p.products_id = pd.products_id
                                  AND pd.language_id = " . (int)$_SESSION['languages_id'] . "
                                WHERE p.products_status = 1
                                AND f.status = 1
                                AND p.products_id IN (" . $list_of_products . ")";
  }
}
if ($this_is_home_page == 'true' and CAROUSEL_FEATURED_PRODUCTS == 'true') {
if ($featured_products_query != '') $featured_products = $db->ExecuteRandomMulti($featured_products_query, MAX_DISPLAY_SEARCH_RESULTS_CAROUSEL_FEATURED);
} else {
if ($featured_products_query != '') $featured_products = $db->ExecuteRandomMulti($featured_products_query, MAX_DISPLAY_SEARCH_RESULTS_FEATURED);
}

$row = 0;
$col = 0;
$list_box_contents = array();
$title = '';

$num_products_count = ($featured_products_query == '') ? 0 : $featured_products->RecordCount();

// show only when 1 or more
if ($num_products_count > 0) {
   if ($this_is_home_page == 'true' and CAROUSEL_FEATURED_PRODUCTS == 'true') {
  } else {  
   if ($num_products_count < SHOW_PRODUCT_INFO_COLUMNS_FEATURED_PRODUCTS || SHOW_PRODUCT_INFO_COLUMNS_FEATURED_PRODUCTS == 0) {
    $col_width = floor(100/$num_products_count);
   } else {
    $col_width = floor(100/SHOW_PRODUCT_INFO_COLUMNS_FEATURED_PRODUCTS);
   }
  }
  
  while (!$featured_products->EOF) {
  if ($this_is_home_page == 'true' and CAROUSEL_FEATURED_PRODUCTS == 'true') {
    if (CAROUSEL_FEATURED_PRICE == 'true') {
    $products_price = (zen_has_product_attributes_values((int)$featured_products->fields['products_id']) ? TEXT_BASE_PRICE : '') . zen_get_products_display_price($featured_products->fields['products_id']);
    if (!isset($productsInCategory[$featured_products->fields['products_id']])) $productsInCategory[$featured_products->fields['products_id']] = zen_get_generated_category_path_rev($featured_products->fields['master_categories_id']);
    } else {
      $products_price = '';
    }
    	
    if (CAROUSEL_FEATURED_DESCRIPTION == 'true') {
      $products_description = zen_trunc_string(zen_clean_html(stripslashes(zen_get_products_description($featured_products->fields['products_id'], $_SESSION['languages_id']))), CAROUSEL_FEATURED_DESCRIPTION_LENGTH);
    } else {
      $products_description = '';
    }
	
    if (CAROUSEL_FEATURED_LINK == 'true') {	
      if (zen_has_product_attributes($featured_products->fields['products_id'])) {
        $buy_now_link = '<div class="product_detail"><a href="' . zen_href_link(zen_get_info_page($featured_products->fields['products_id']), 'cPath=' . zen_get_generated_category_path_rev($featured_products->fields['master_categories_id']) . '&products_id=' . $featured_products->fields['products_id']) . '">' .zen_image_button(BUTTON_IMAGE_GOTO_PROD_DETAILS , BUTTON_GOTO_PROD_DETAILS_ALT).'</a></div>';
      } else {
        $buy_now_link = zen_get_buy_now_button($featured_products->fields['products_id'],'<a href="' . zen_href_link($_GET['main_page'], zen_get_all_get_params(array('action')) . 'action=buy_now&products_id=' . $featured_products->fields['products_id']) . '">' . zen_image_button(BUTTON_IMAGE_BUY_NOW, BUTTON_BUY_NOW_ALT) .'<br/>'.'</a>&nbsp;<br />');
      }
     }
	} else {
	$products_price = zen_get_products_display_price($featured_products->fields['products_id']);
	}
	
	if (!isset($productsInCategory[$featured_products->fields['products_id']])) $productsInCategory[$featured_products->fields['products_id']] = zen_get_generated_category_path_rev($featured_products->fields['master_categories_id']);
    $zco_notifier->notify('NOTIFY_MODULES_FEATURED_PRODUCTS_B4_LIST_BOX', array(), $featured_products->fields, $products_price);
	if ($this_is_home_page == 'true' and CAROUSEL_FEATURED_PRODUCTS == 'true') {
      $list_box_contents[$row][$col] = array('params' =>'class="panel"',
      'text' => (($featured_products->fields['products_image'] == '' and PRODUCTS_IMAGE_NO_IMAGE_STATUS == 0) ? '' : '<div class="carouselImage"><a href="' . zen_href_link(zen_get_info_page($featured_products->fields['products_id']), 'cPath=' . $productsInCategory[$featured_products->fields['products_id']] . '&products_id=' . $featured_products->fields['products_id']) . '">' . zen_image(DIR_WS_IMAGES . $featured_products->fields['products_image'], $featured_products->fields['products_name'], IMAGE_CAROUSEL_FEATURED_PRODUCTS_LISTING_WIDTH, IMAGE_CAROUSEL_FEATURED_PRODUCTS_LISTING_HEIGHT) . '</a></div>') . '<div class="carouselTitle"><a href="' . zen_href_link(zen_get_info_page($featured_products->fields['products_id']), 'cPath=' . $productsInCategory[$featured_products->fields['products_id']] . '&products_id=' . $featured_products->fields['products_id']) . '">' . $featured_products->fields['products_name'] . '</a></div><br /><div class="carouselDescription">' . $products_description . '</div><br /><div class="carouselPrice">' . $products_price . '</div><div class="carouselBuyNow">' . $buy_now_link . '</div>');
    } else {	
      $list_box_contents[$row][$col] = array('params' =>'class="centerBoxContentsFeatured centeredContent back"' . ' ' . 'style="width:' . $col_width . '%;"',
					     'text' => (($featured_products->fields['products_image'] == '' and PRODUCTS_IMAGE_NO_IMAGE_STATUS == 0) ? '' : '<div class="box_image"><a href="' . zen_href_link(zen_get_info_page($featured_products->fields['products_id']), 'cPath=' . $productsInCategory[$featured_products->fields['products_id']] . '&products_id=' . $featured_products->fields['products_id']) . '">' . zen_image(DIR_WS_IMAGES . $featured_products->fields['products_image'], $featured_products->fields['products_name'], IMAGE_FEATURED_PRODUCTS_LISTING_WIDTH, IMAGE_FEATURED_PRODUCTS_LISTING_HEIGHT) . '</a></div><br />') . '<div class="product_title"><a href="' . zen_href_link(zen_get_info_page($featured_products->fields['products_id']), 'cPath=' . $productsInCategory[$featured_products->fields['products_id']] . '&products_id=' . $featured_products->fields['products_id']) . '">' . $featured_products->fields['products_name'] . '</a></div><br /><div class="price">' . $products_price . '</div><div class="product_detail"><a href="'. zen_href_link(zen_get_info_page($featured_products->fields['products_id']), 'cPath=' . $productsInCategory[$featured_products->fields['products_id']] . '&products_id=' . $featured_products->fields['products_id']) . '">' .zen_image_button(BUTTON_IMAGE_GOTO_PROD_DETAILS , BUTTON_GOTO_PROD_DETAILS_ALT).'</a></div>');
    }
	
    $col ++;
    if ($col > (SHOW_PRODUCT_INFO_COLUMNS_FEATURED_PRODUCTS - 1)) {
      $col = 0;
      $row ++;
    }
    $featured_products->MoveNextRandom();
  }

  if ($featured_products->RecordCount() > 0) {
    if (isset($new_products_category_id) && $new_products_category_id !=0) {
      $category_title = zen_get_categories_name((int)$new_products_category_id);
      $title = '<h2 class="centerBoxHeading">' . TABLE_HEADING_FEATURED_PRODUCTS . ($category_title != '' ? ' - ' . $category_title : '') . '</h2>';
    } else {
      $title = '<h2 class="centerBoxHeading">' . TABLE_HEADING_FEATURED_PRODUCTS . '</h2>';
    }
    $zc_show_featured = true;
  }
}

