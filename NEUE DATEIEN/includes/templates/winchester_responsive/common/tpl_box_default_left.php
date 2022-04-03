<?php
/**
 * Common Template - tpl_box_default_left.php
 *
 * @package templateSystem
 * @copyright Copyright 2003-2019 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_box_default_left.php for Winchester 2018-11-24 12:49:16Z webchills $
 */

// choose box images based on box position
  if ($title_link) {
    $title = '<a href="' . zen_href_link($title_link) . '">' . $title . BOX_HEADING_LINKS . '</a>';
  }
//
?>


<!--// bof: <?php echo $box_id; ?> //-->
<?php if (COLUMN_WIDTH == '0'){ ?>
<div class="leftBoxContainer" id="<?php echo str_replace('_', '-', $box_id ); ?>" style="width: <?php echo $column_width; ?>">
<?php }else{ ?>
<div class="leftBoxContainer <?php echo $minWidthHide; ?>" id="<?php echo str_replace('_', '-', $box_id ); ?>">
<?php } ?>
<h3 class="leftBoxHeading" id="<?php echo str_replace('_', '-', $box_id) . 'Heading'; ?>"><?php echo $title; ?></h3>
<?php echo $content; ?>
</div>
<!--// eof: <?php echo $box_id; ?> //-->

