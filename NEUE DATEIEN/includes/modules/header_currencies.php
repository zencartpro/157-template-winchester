<?php
/**
 * Currencies Header Links - allows customer to select from available currencies
 *
 * Zen Cart German Specific (158 code in 157)
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: header_currencies.php for Winchester 2024-11-22 20:02:16Z webchills $
 */
 
// test if box should display
  $show_currencies= false;

  // don't display on checkout page:
  if (substr($current_page, 0, 8) != 'checkout') {
    $show_currencies= true;
  }

  if ($show_currencies == true) {
    if (isset($currencies) && is_object($currencies)) {

      reset($currencies->currencies);
      $currencies_array = array();
	  foreach($currencies->currencies as $key => $value) {
        $currencies_array[] = array('id' => $key, 'text' => (zen_not_null($value['symbol_left']) ? $value['symbol_left'] : $value['symbol_right']) );
      }

      $hidden_get_variables = '';
      reset($_GET);
      foreach($_GET as $key => $value) {
        if ( ($key != 'currency') && ($key != zen_session_name()) && ($key != 'x') && ($key != 'y') ) {
          $hidden_get_variables .= zen_draw_hidden_field($key, $value);
        }
      }

      require($template->get_template_dir('tpl_header_currencies.php',DIR_WS_TEMPLATE, $current_page_base,'common'). '/tpl_header_currencies.php');
    }
  }
