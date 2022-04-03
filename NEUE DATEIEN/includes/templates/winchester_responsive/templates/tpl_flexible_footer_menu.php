<?php
/**
 * Flexible Footer Menu
 * 
 * @package templateSystem
 * @copyright Copyright 2003-2019 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_flexible_footer_menu.php 2019-12-18 17:11:16Z webchills $
 *
 * require code to show flexible footer menu
 */
 
include(DIR_WS_MODULES . zen_get_module_directory('flexible_footer_menu.php'));

if (isset($var_linksList) && sizeof($var_linksList) >= 1) {
  $col_output = '';
  $cols = 0;
  for ($list_col=1; $list_col<=9; $list_col++) { 
    $col = '';
    $col_links = 0;
    $col .= '<div class="flexFooterCol ffCcol' . $list_col . '" style="widthplaceholder%">';
    $col .= '<ul>';
    for ($i=1, $n=sizeof($var_linksList); $i<=$n; $i++) { 
      if(substr($var_linksList[$i]['sort'], 0, 1) == $list_col){ 

        $pages_id = $var_linksList[$i]['id'];

 if ($var_linksList[$i]['link'] && $var_linksList[$i]['header']) {
        $col .= '<li><h4>' . '<a href="' . $var_linksList[$i]['link'] . '"' . active_footer_page_class($var_linksList[$i]['id'],$var_linksList[$i]['link']) . '>' . $var_linksList[$i]['header'] . '</a></h4>';
  } else if ($var_linksList[$i]['header']) {
        $col .= '<li><h4>' . $var_linksList[$i]['header'] . '</h4>';
} else {
//show nothing 
}

if ($var_linksList[$i]['title']) {
        $col .= '<li><a href="' . $var_linksList[$i]['link'] . '"' . active_footer_page_class($var_linksList[$i]['id'],$var_linksList[$i]['link']) . '>' . $var_linksList[$i]['title'] . '</a>';
} else { 
//show nothing 
}

 if ($var_linksList[$i]['link'] && $var_linksList[$i]['image']) {
        $col .= '<li><span class="flexFooterColImage">' . '<a href="' . $var_linksList[$i]['link'] . '">' . zen_image(DIR_WS_IMAGES . $var_linksList[$i]['image']) . '</a></span>';
} else if ($var_linksList[$i]['image']) {
        $col .= '<li><span class="flexFooterColImage">' . zen_image(DIR_WS_IMAGES . $var_linksList[$i]['image'], '') . '</span>';
} else {
//show nothing 
}




if ($var_linksList[$i]['text']) {
        $col .= '<li class="flexFooterColText">' . $var_linksList[$i]['text'] . '';
} else { 
//show nothing 
}

		$col .= '</li>' . "\n";
        $col_links++;
      }
    } 
    $col .= '</ul>';
    $col .= '</div>';

    if ($col_links >= 1) {
	  $col_output .= $col;
	  $cols ++;
	}
  } // end FOR loop
  $col_width = (int)(100/$cols)-0.6;//update divs with % width
  $col_output = str_replace('widthplaceholder', 'width: ' . $col_width, $col_output);
  echo $col_output . '<br class="clearBoth" />';
} // end if ?>