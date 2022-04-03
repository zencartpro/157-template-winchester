<?php
/**
 * best_sellers sidebox - displays selected number of (usually top ten) best selling products
 *
 
 * @copyright Copyright 2003-2022 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: best_sellers.php for Winchester 2022-04-02 15:39:16Zwebchills $
 */

// test if box should display
  $show_best_sellers= false;

  if (isset($_GET['products_id'])) {
    if (zen_is_logged_in()) {
      $check_query = "select count(*) as count
                      from " . TABLE_CUSTOMERS_INFO . "
                      where customers_info_id = '" . (int)$_SESSION['customer_id'] . "'
                      and global_product_notifications = '1'";

      $check = $db->Execute($check_query);

      if ($check->fields['count'] > 0) {
        $show_best_sellers= true;
      }
    }
  } else {
    $show_best_sellers= true;
  }

  if ($show_best_sellers == true) {
    $limit = (trim(MAX_DISPLAY_BESTSELLERS) == "") ? "" : " LIMIT " . (int)MAX_DISPLAY_BESTSELLERS;
  	if (isset($current_category_id) && ($current_category_id > 0)) {
      $best_sellers_query = "select distinct p.products_id, pd.*, p.*
                             from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd, "
                                    . TABLE_PRODUCTS_TO_CATEGORIES . " p2c, " . TABLE_CATEGORIES . " c
                             where p.products_status = '1'
                             and p.products_ordered > 0
                             and p.products_id = pd.products_id
                             and pd.language_id = '" . (int)$_SESSION['languages_id'] . "'
                             and p.products_id = p2c.products_id
                             and p2c.categories_id = c.categories_id
                             and '" . (int)$current_category_id . "' in (c.categories_id, c.parent_id)
                             order by p.products_ordered desc, pd.products_name";

      $best_sellers_query .= $limit;
      $best_sellers = $db->Execute($best_sellers_query);
    } else {
      $best_sellers_query = "select distinct p.products_id, pd.*, p.*
                             from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd
                             where p.products_status = '1'
                             and p.products_ordered > 0
                             and p.products_id = pd.products_id
                             and pd.language_id = '" . (int)$_SESSION['languages_id'] . "'
                             order by p.products_ordered desc, pd.products_name";

      $best_sellers_query .= $limit;
      $best_sellers = $db->Execute($best_sellers_query);
    }
if ($best_sellers->RecordCount() >= MIN_DISPLAY_BESTSELLERS) {
      $title =  BOX_HEADING_BESTSELLERS;
      $box_id =  'bestsellers';
      $rows = 0;
      while (!$best_sellers->EOF) {
        $rows++;
        $bestsellers_list[$rows]['id'] = $best_sellers->fields['products_id'];
        $bestsellers_list[$rows]['name']  = $best_sellers->fields['products_name'];
        $bestsellers_list[$rows]['image'] = $best_sellers->fields['products_image'];
        $bestsellers_list[$rows]['href'] = zen_href_link(zen_get_info_page($best_sellers->fields["products_id"]), 'cPath=' . zen_get_generated_category_path_rev($best_sellers->fields["master_categories_id"]) . '&products_id=' . $best_sellers->fields["products_id"]);
        $bestsellers_list[$rows]['price'] = zen_get_products_display_price((int)$best_sellers->fields['products_id']);
        $bestsellers_list[$rows]['model']  = $best_sellers->fields['products_model'];
        $bestsellers_list[$rows]['description']  = $best_sellers->fields['products_description'];
        $best_sellers->MoveNext();
      }

      $left_corner = false;
      $right_corner = false;
      $right_arrow = false;
      $title_link = false;
      require($template->get_template_dir('tpl_best_sellers.php',DIR_WS_TEMPLATE, $current_page_base,'sideboxes'). '/tpl_best_sellers.php');
      $title =  BOX_HEADING_BESTSELLERS;
      require($template->get_template_dir($column_box_default, DIR_WS_TEMPLATE, $current_page_base,'common') . '/' . $column_box_default);
    }
  }
