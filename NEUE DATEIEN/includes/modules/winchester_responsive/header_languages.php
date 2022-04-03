<?php
/**
 * @package sideboxes
 * @copyright Copyright 2003-2017 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart-pro.at/license/2_0.txt GNU Public License V2.0
 * @version $Id: header_languages.php 2017-09-09 21:13:51Z webchills $
 */

// test if box should display
  $show_languages= false;

  // don't display on checkout page:
  if (substr($current_page, 0, 8) != 'checkout') {
    $show_languages= true;
  }

  if ($show_languages == true) {
    if (!isset($lng) || (isset($lng) && !is_object($lng))) {
      $lng = new language;
    }

    reset($lng->catalog_languages);
    require($template->get_template_dir('tpl_header_languages.php',DIR_WS_TEMPLATE, $current_page_base,'common'). '/tpl_header_languages.php');
  }