<?php
/**
 * column_left module
 *

 * @copyright Copyright 2003-2022 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: column_left.php for Winchester 2024-11-16 15:49:16Z webchills $
 */
if (!defined('IS_ADMIN_FLAG')) {
  die('Illegal Access');
}
$column_box_default='tpl_box_default_left.php';
// Check if there are boxes for the column
$column_left_display= $db->Execute("select layout_box_name, show_box_min_width from " . TABLE_LAYOUT_BOXES . " where layout_box_location = 0 and layout_box_status= '1' and layout_template ='" . $template_dir . "'" . ' order by layout_box_sort_order');

// safety row stop
$box_cnt=0;
$column_width = (int)BOX_WIDTH_LEFT;
while (!$column_left_display->EOF and $box_cnt < 100) {
  $box_cnt++;
  if ( file_exists(DIR_WS_MODULES . 'sideboxes/' . $column_left_display->fields['layout_box_name']) or file_exists(DIR_WS_MODULES . 'sideboxes/' . $template_dir . '/' . $column_left_display->fields['layout_box_name']) ) {
?>
<?php
//$column_box_spacer = 'column_box_spacer_left';


if ($column_left_display->fields['show_box_min_width'] == '0') {
$minWidthHide = 'minWidthHide';
} else {
$minWidthHide = '';
}

if ( file_exists(DIR_WS_MODULES . 'sideboxes/' . $template_dir . '/' . $column_left_display->fields['layout_box_name']) ) {
  $box_id = zen_get_box_id($column_left_display->fields['layout_box_name']);
  require(DIR_WS_MODULES . 'sideboxes/' . $template_dir . '/' . $column_left_display->fields['layout_box_name']);
} else {
  $box_id = zen_get_box_id($column_left_display->fields['layout_box_name']);
  require(DIR_WS_MODULES . 'sideboxes/' . $column_left_display->fields['layout_box_name']);
}
  } // file_exists
  $column_left_display->MoveNext();
} // while column_left
$box_id = ''; 
