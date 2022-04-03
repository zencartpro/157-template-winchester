<?php
/**
 * @package Flexible Footer Menu
 * @copyright Copyright 2003-2019 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart-pro.at/license/2_0.txt GNU Public License V2.0
 * @version $Id: footer_menu_functions.php 2019-04-19 18:13:51Z webchills $
 */

if (!defined('IS_ADMIN_FLAG')) {
  die('Illegal Access');
}

function zen_set_flexible_footer_menu_status($page_id, $status)
{
  global $db;
  if ($status == '1') {
    return $db->Execute("UPDATE " . TABLE_FLEXIBLE_FOOTER_MENU . " SET status = 1 WHERE page_id = " . (int)$page_id);
  } elseif ($status == '0') {
    return $db->Execute("UPDATE " . TABLE_FLEXIBLE_FOOTER_MENU . " SET status = 0 WHERE page_id = " . (int)$page_id);
  } else {
    return -1;
  }
}
