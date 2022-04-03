<?php
/**
 * Zen Cart German Specific
 * information sidebox - displays list of general info links, as defined in this file
 *
 
 * @copyright Copyright 2003-2022 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: information.php for Winchester 2019-09-14 09:08:16Z webchills $
 */

  $pointer = zen_image(DIR_WS_TEMPLATE_IMAGES . 'bc_info.gif');
  // uncomment next line to add 1 space between image & text
  // $pointer .= '&nbsp;';

  unset($information);

 if (DEFINE_ABOUT_US_STATUS <= 1) {
    $information[] = '<a href="' . zen_href_link(FILENAME_ABOUT_US) . '">' . $pointer . BOX_INFORMATION_ABOUT_US . '</a>';
 }
  if (DEFINE_SHIPPINGINFO_STATUS <= 1) {
    $information[] = '<a href="' . zen_href_link(FILENAME_SHIPPING) . '">' . $pointer . BOX_INFORMATION_SHIPPING . '</a>';
  }
  if (DEFINE_PRIVACY_STATUS <= 1) {
    $information[] = '<a href="' . zen_href_link(FILENAME_PRIVACY) . '">' . $pointer . BOX_INFORMATION_PRIVACY . '</a>';
  }
  if (DEFINE_CONDITIONS_STATUS <= 1) {
    $information[] = '<a href="' . zen_href_link(FILENAME_CONDITIONS) . '">' . $pointer . BOX_INFORMATION_CONDITIONS . '</a>';
  }
  if (DEFINE_WIDERRUFSRECHT_STATUS <= 1) {
    $information[] = '<a href="' . zen_href_link(FILENAME_WIDERRUFSRECHT) . '">' . $pointer . BOX_INFORMATION_WIDERRUFSRECHT . '</a>';
  }
  if (DEFINE_ZAHLUNGSARTEN_STATUS <= 1) {
    $information[] = '<a href="' . zen_href_link(FILENAME_ZAHLUNGSARTEN) . '">' . $pointer . BOX_INFORMATION_ZAHLUNGSARTEN . '</a>';
  }
  if (DEFINE_IMPRESSUM_STATUS <= 1) {
    $information[] = '<a href="' . zen_href_link(FILENAME_IMPRESSUM) . '">' . $pointer . BOX_INFORMATION_IMPRESSUM . '</a>';
  }
  if (DEFINE_CONTACT_US_STATUS <= 1) {
    $information[] = '<a href="' . zen_href_link(FILENAME_CONTACT_US, '', 'SSL') . '">' . $pointer . BOX_INFORMATION_CONTACT . '</a>';
  }

// forum/bb link:
  if (!empty($external_bb_url) && !empty($external_bb_text)) {
    $information[] = '<a href="' . $external_bb_url . '" target="_blank">' . $pointer . $external_bb_text . '</a>';
  }

  if (DEFINE_SITE_MAP_STATUS <= 1) {
    $information[] = '<a href="' . zen_href_link(FILENAME_SITE_MAP) . '">' . $pointer . BOX_INFORMATION_SITE_MAP . '</a>';
  }

  // only show GV FAQ when installed
  if (defined('MODULE_ORDER_TOTAL_GV_STATUS') && MODULE_ORDER_TOTAL_GV_STATUS == 'true') {
    $information[] = '<a href="' . zen_href_link(FILENAME_GV_FAQ) . '">' . $pointer . BOX_INFORMATION_GV . '</a>';
  }
  // only show Discount Coupon FAQ when installed
  if (DEFINE_DISCOUNT_COUPON_STATUS <= 1 && defined('MODULE_ORDER_TOTAL_COUPON_STATUS') && MODULE_ORDER_TOTAL_COUPON_STATUS == 'true') {
    $information[] = '<a href="' . zen_href_link(FILENAME_DISCOUNT_COUPON) . '">' . $pointer . BOX_INFORMATION_DISCOUNT_COUPONS . '</a>';
  }

  if (SHOW_NEWSLETTER_UNSUBSCRIBE_LINK == 'true') {
    $information[] = '<a href="' . zen_href_link(FILENAME_UNSUBSCRIBE) . '">' . $pointer . BOX_INFORMATION_UNSUBSCRIBE . '</a>';
  }

  require($template->get_template_dir('tpl_information.php',DIR_WS_TEMPLATE, $current_page_base,'sideboxes'). '/tpl_information.php');

  $title =  BOX_HEADING_INFORMATION;
  $title_link = false;

  require($template->get_template_dir($column_box_default, DIR_WS_TEMPLATE, $current_page_base,'common') . '/' . $column_box_default);