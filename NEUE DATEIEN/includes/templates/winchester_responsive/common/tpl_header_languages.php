<?php
/**
 * Header Language Switch Template
 *
 * @package templateSystem
 * @copyright Copyright 2003-2022 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart-pro.at/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_header_languages.php for Winchester 2022-03-31 10:19:16Z webchills $
 */
  $content = "&nbsp;&nbsp;&nbsp;&nbsp;"; 
  foreach($lng->catalog_languages as $key => $value){
  $content .= '<a href="' . zen_href_link($_GET['main_page'], zen_get_all_get_params(array('language', 'currency')) . 'language=' . $key, $request_type) . '">' . zen_image(DIR_WS_LANGUAGES .  $value['directory'] . '/images/' . $value['image'], $value['name'], '', '', 'align="absmiddle"') . '</a>&nbsp;&nbsp;&nbsp;&nbsp;';
  }  
  echo $content;