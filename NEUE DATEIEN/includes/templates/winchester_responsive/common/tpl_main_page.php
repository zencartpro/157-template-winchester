<?php
/**
 * Common Template - tpl_main_page.php
 * Zen Cart German Specific
 * Governs the overall layout of an entire page
 * Normally consisting of a header, left side column. center column. right side column and footer
 * For customizing, this file can be copied to /templates/your_template_dir/pagename
 * example: to override the privacy page
 * - make a directory /templates/my_template/privacy
 * - copy /templates/templates_defaults/common/tpl_main_page.php to /templates/my_template/privacy/tpl_main_page.php
 * 
 * to override the global settings and turn off columns un-comment the lines below for the correct column to turn off
 * to turn off the header and/or footer uncomment the lines below
 * Note: header can be disabled in the tpl_header.php
 * Note: footer can be disabled in the tpl_footer.php
 *
 * $flag_disable_header = true;
 * $flag_disable_left = true;
 * $flag_disable_right = true;
 * $flag_disable_footer = true;
 * 
 * // example to not display right column on main page when Always Show Categories is OFF
 * 
 * if ($current_page_base == 'index' and $cPath == '') {
 *  $flag_disable_right = true;
 * }
 * 
 * example to not display right column on main page when Always Show Categories is ON and set to categories_id 3
 * 
 * if ($current_page_base == 'index' and $cPath == '' or $cPath == '3') {
 *  $flag_disable_right = true;
 * }
 * 
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_main_page.php for Winchester 2024-11-22 16:32:16Z webchills $
 */
if (!defined('IS_ADMIN_FLAG')) {
    die('Illegal Access');
}

// the following statements can be modified as needed to set additional flags
  if (in_array($current_page_base,explode(",",'shopping_cart')) ) {
    $flag_disable_right = true;
  }

  if (in_array($current_page_base,explode(",",'login,create_account,no_account,checkout_shipping,checkout_payment,checkout_confirmation,account,account_edit,address_book_process')) ) {
    $flag_disable_right = true;
    $flag_disable_left = true;
  }

if ($this_is_home_page) {
  $flag_disable_right = true;
  $flag_disable_left = true;
}

if (isset ($flag_disable_right) && $flag_disable_right == 'true' or COLUMN_RIGHT_STATUS == '0') {
$box_width_right = preg_replace('/[^0-9]/', '', '0'); 
$box_width_right_new = '';
}else{
$box_width_right = COLUMN_WIDTH_RIGHT;
$box_width_right = preg_replace('/[^0-9]/', '', $box_width_right); 
$box_width_right_new = 'col' . $box_width_right;
}

if (isset ($flag_disable_left) && $flag_disable_left == 'true' or COLUMN_LEFT_STATUS == '0') {
$box_width_left = preg_replace('/[^0-9]/', '', '0'); 
$box_width_left_new = '';
}else{
$box_width_left = COLUMN_WIDTH_LEFT;
$box_width_left = preg_replace('/[^0-9]/', '', $box_width_left); 
$box_width_left_new = 'col' . $box_width_left;
}

$side_columns_total = $box_width_left + $box_width_right;
$center_column = '970'; // This value should not be altered
$center_column_width = $center_column - $side_columns_total;


  $header_template = 'tpl_header.php';
  $footer_template = 'tpl_footer.php';
  $left_column_file = 'column_left.php';
  $right_column_file = 'column_right.php';
  $body_id = ($this_is_home_page) ? 'indexHome' : str_replace('_', '', $_GET['main_page']);
?>
<body id="<?php echo $body_id . 'Body'; ?>"<?php if($zv_onload !='') echo ' onload="'.$zv_onload.'"'; ?>>
<?php if (defined('WIN_TOTOP_STATUS') && (WIN_TOTOP_STATUS === 'true')) { ?>
<script src="<?php echo $template->get_template_dir('',DIR_WS_TEMPLATE, $current_page_base,'jscript') . '/back_to_top.min.js' ?>" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
BackToTop({
text : '<?php echo BACK_TO_TOP; ?>',
autoShow : true,
timeEffect : 750
});
});
</script> 
<?php } ?>
<?php
  if (SHOW_BANNERS_GROUP_SET1 != '' && $banner = zen_banner_exists('dynamic', SHOW_BANNERS_GROUP_SET1)) {
    if ($banner->RecordCount() > 0) {
?>
<div id="bannerOne" class="banners"><?php echo zen_display_banner('static', $banner); ?></div>
<?php
    }
  }
?>

<?php if (COLUMN_WIDTH == '0'){ ?>

<div id="mainWrapper">

<?php
 /**
  * prepares and displays header output
  *
  */
  if (CUSTOMERS_APPROVAL_AUTHORIZATION == 1 && CUSTOMERS_AUTHORIZATION_HEADER_OFF == 'true' and ($_SESSION['customers_authorization'] != 0 or !zen_is_logged_in())) {
    $flag_disable_header = true;
  }
  require($template->get_template_dir('tpl_header.php',DIR_WS_TEMPLATE, $current_page_base,'common'). '/tpl_header.php');?>

<table width="100%" border="0" cellspacing="0" cellpadding="0" id="contentMainWrapper">
  <tr>
<?php
if (COLUMN_LEFT_STATUS == 0 || (CUSTOMERS_APPROVAL == '1' and !zen_is_logged_in()) || (CUSTOMERS_APPROVAL_AUTHORIZATION == 1 && CUSTOMERS_AUTHORIZATION_COLUMN_LEFT_OFF == 'true' and ($_SESSION['customers_authorization'] != 0 or !zen_is_logged_in()))) {
  // global disable of column_left
  $flag_disable_left = true;
}
if (!isset($flag_disable_left) || !$flag_disable_left) {
?>

 <td id="navColumnOne" class="columnLeft" style="width: <?php echo (int)COLUMN_WIDTH_LEFT; ?>px">
<?php
 /**
  * prepares and displays left column sideboxes
  *
  */
?>
<div id="navColumnOneWrapper" style="width: <?php echo (int)BOX_WIDTH_LEFT; ?>px"><?php require(DIR_WS_MODULES . zen_get_module_directory('column_left.php')); ?></div></td>
<?php
}
?>
<td valign="top">


<?php }else{ ?>
<?php
 /**
  * prepares and displays header output
  *
  */
  if (CUSTOMERS_APPROVAL_AUTHORIZATION == 1 && CUSTOMERS_AUTHORIZATION_HEADER_OFF == 'true' and ($_SESSION['customers_authorization'] != 0 or $_SESSION['customer_id'] == '')) {
    $flag_disable_header = true;
  }


	if ($detect->isMobile() && !$detect->isTablet() || $detect->isMobile() && !$detect->isTablet() && $_SESSION['layoutType'] == 'mobile' || $detect->isTablet() && $_SESSION['layoutType'] == 'mobile' || $_SESSION['layoutType'] == 'mobile') {

    	require($template->get_template_dir('tpl_header_mobile.php',DIR_WS_TEMPLATE, $current_page_base,'common'). '/tpl_header_mobile.php');

} else if ($detect->isTablet() || $detect->isMobile() && $_SESSION['layoutType'] == 'tablet' || $detect->isTablet() && $_SESSION['layoutType'] == 'tablet' || $_SESSION['layoutType'] == 'tablet'){

	require($template->get_template_dir('tpl_header_tablet.php',DIR_WS_TEMPLATE, $current_page_base,'common'). '/tpl_header_tablet.php');

} else if ($detect->isMobile() && !$detect->isTablet() && $_SESSION['layoutType'] == 'full' || $detect->isTablet() && $_SESSION['layoutType'] == 'full' || $_SESSION['layoutType'] == 'full'){

	require($template->get_template_dir('tpl_header.php',DIR_WS_TEMPLATE, $current_page_base,'common'). '/tpl_header.php');

} else {

	require($template->get_template_dir('tpl_header.php',DIR_WS_TEMPLATE, $current_page_base,'common'). '/tpl_header.php');

  }  

?>


<div class="onerow-fluid <?php echo $fluidisFixed; ?>">

<?php
if (COLUMN_LEFT_STATUS == 0 || (CUSTOMERS_APPROVAL == '1' and !zen_is_logged_in()) || (CUSTOMERS_APPROVAL_AUTHORIZATION == 1 && CUSTOMERS_AUTHORIZATION_COLUMN_LEFT_OFF == 'true' and ($_SESSION['customers_authorization'] != 0 or !zen_is_logged_in()))) {
  // global disable of column_left
  $flag_disable_left = true;
}
if (!isset($flag_disable_left) || !$flag_disable_left) {
?>

  <div class="<?php echo $box_width_left_new; ?>">
<?php
 /**
  * prepares and displays left column sideboxes
  *
  */
?>
<?php require(DIR_WS_MODULES . zen_get_module_directory('column_left.php')); ?>
  </div>

<?php
}
?>

<?php
 /**
  * decide center column width
  *
  */
 ?>

<div class="<?php echo 'col' . $center_column_width; ?>">

<?php } ?>

<!-- bof  breadcrumb -->
<?php if (!$breadcrumb->isEmpty() && (DEFINE_BREADCRUMB_STATUS == '1' || (DEFINE_BREADCRUMB_STATUS == '2' && !$this_is_home_page))) { ?>
    <div id="navBreadCrumb"><?php echo $breadcrumb->trail(BREAD_CRUMBS_SEPARATOR); ?></div>
<?php } ?>
<!-- eof breadcrumb -->

<?php
  if (SHOW_BANNERS_GROUP_SET3 != '' && $banner = zen_banner_exists('dynamic', SHOW_BANNERS_GROUP_SET3)) {
    if ($banner->RecordCount() > 0) {
?>
    <div id="bannerThree" class="banners"><?php echo zen_display_banner('static', $banner); ?></div>
<?php
    }
  }
?>

<!-- bof upload alerts -->
<?php if ($messageStack->size('upload') > 0) echo $messageStack->output('upload'); ?>
<!-- eof upload alerts -->
<?php if ($messageStack->size('main_content') > 0) echo $messageStack->output('main_content'); ?>

<?php
 /**
  * prepares and displays center column
  *
  */
 require($body_code);
?>

<?php
  if (SHOW_BANNERS_GROUP_SET4 != '' && $banner = zen_banner_exists('dynamic', SHOW_BANNERS_GROUP_SET4)) {
    if ($banner->RecordCount() > 0) {
?>
    <div id="bannerFour" class="banners"><?php echo zen_display_banner('static', $banner); ?></div>
<?php
    }
  }
?>

<?php if (COLUMN_WIDTH == '0'){ ?>

</td>

<?php
if (COLUMN_RIGHT_STATUS == 0 || (CUSTOMERS_APPROVAL == '1' and !zen_is_logged_in()) || (CUSTOMERS_APPROVAL_AUTHORIZATION == 1 && CUSTOMERS_AUTHORIZATION_COLUMN_RIGHT_OFF == 'true' and ($_SESSION['customers_authorization'] != 0 or !zen_is_logged_in()))) {
  // global disable of column_right
  $flag_disable_right = true;
}
if (!isset($flag_disable_right) || !$flag_disable_right) {
?>
<td id="navColumnTwo" class="columnRight" style="width: <?php echo (int)COLUMN_WIDTH_RIGHT; ?>"px>
<?php
 /**
  * prepares and displays right column sideboxes
  *
  */
?>
<div id="navColumnTwoWrapper" style="width: <?php echo (int)BOX_WIDTH_RIGHT; ?>"px><?php require(DIR_WS_MODULES . zen_get_module_directory('column_right.php')); ?></div></td>
<?php
}
?>
  </tr>
</table>

<?php }else{ ?>
<br class="clearBoth" /> 
<br class="clearBoth" />
</div>


<?php
if (COLUMN_RIGHT_STATUS == 0 || (CUSTOMERS_APPROVAL == '1' and !zen_is_logged_in()) || (CUSTOMERS_APPROVAL_AUTHORIZATION == 1 && CUSTOMERS_AUTHORIZATION_COLUMN_RIGHT_OFF == 'true' and ($_SESSION['customers_authorization'] != 0 or !zen_is_logged_in()))) {
  // global disable of column_right
  $flag_disable_right = true;
}
if (!isset($flag_disable_right) || !$flag_disable_right) {
?>

<div class="<?php echo $box_width_right_new; ?>">

<?php
 /**
  * prepares and displays right column sideboxes
  *
  */
?>

<?php require(DIR_WS_MODULES . zen_get_module_directory('column_right.php')); ?>
</div>
<?php
}
?>
</div>
<?php } ?>
<br class="clearBoth" /> 
<?php
 /**
  * prepares and displays footer output
  *
  */
  if (CUSTOMERS_APPROVAL_AUTHORIZATION == 1 && CUSTOMERS_AUTHORIZATION_FOOTER_OFF == 'true' and ($_SESSION['customers_authorization'] != 0 or $_SESSION['customer_id'] == '')) {
    $flag_disable_footer = true;
  }
  require($template->get_template_dir('tpl_footer.php',DIR_WS_TEMPLATE, $current_page_base,'common'). '/tpl_footer.php');
?>

<!--bof- banner #6 display -->
<?php
  if (SHOW_BANNERS_GROUP_SET6 != '' && $banner = zen_banner_exists('dynamic', SHOW_BANNERS_GROUP_SET6)) {
    if ($banner->RecordCount() > 0) {
?>
<div id="bannerSix" class="banners"><?php echo zen_display_banner('static', $banner); ?></div>
<?php
    }
  }
?>
<!--eof- banner #6 display -->

<?php if (COLUMN_WIDTH == '0'){ ?>
</div><!--eof-->
<br class="clearBoth">
<?php }else{ ?>
<?php //do nothing ?>
<?php } ?>
<?php if (defined('WIN_SLIDEOUTBOX_STATUS') && (WIN_SLIDEOUTBOX_STATUS === 'true')) { ?>
<script src="<?php echo $template->get_template_dir('',DIR_WS_TEMPLATE, $current_page_base,'jscript') . '/jquery.tabSlideOut.v1.3.js' ?>" type="text/javascript"></script>

    <script type="text/javascript">
    $(function(){
        $('.slide-out-div').tabSlideOut({
            tabHandle: '.handle',                     //class of the element that will become your tab
            pathToTabImage: 'includes/templates/winchester_responsive/images/tab.png', //path to the image for the tab //Optionally can be set using css
            imageHeight: '50px',                     //height of tab image           //Optionally can be set using css
            imageWidth: '60px',                       //width of tab image            //Optionally can be set using css
	    tabLocation: 'left',                      //side of screen where tab lives, top, right, bottom, or left
            speed: 300,                               //speed of animation
            action: 'click',                          //options: 'click' or 'hover', action to trigger animation
            topPos: '100px',                          //position from the top/ use if tabLocation is left or right
            leftPos: '20px',                          //position from left/ use if tabLocation is bottom or top
            fixedPosition: true                      //options: true makes it stick(fixed position) on scroll
        });

    });

    </script>

   <div class="slide-out-div">
    <a class="handle" href="http://link-for-non-js-users.html">Content</a>
<?php echo SLIDE_OUT_CONTENT; ?>
         </div>
<?php } ?>
<?php
/**
* load the loader JS files
*/
if(!empty($RC_loader_files)){
  foreach($RC_loader_files['css'] as $RC_order=>$file){
		if ($file['defer']) {
			if($file['include']) {
					include($file['src']);
			} else if (!$RI_CJLoader->get('minify_css') || $file['external']) {
					echo '
					<script type="text/javascript" async>
						var elm = document.createElement("link");
						elm.rel = "stylesheet";
						elm.type = "text/css";
						elm.href = "'.$file['src'] .'";
						
						var links = document.getElementsByTagName("link")[0];
						links.parentNode.appendChild(elm);
					</script>';
			} else {
					echo '
					<script type="text/javascript" async>
						var elm = document.createElement("link");
						elm.rel = "stylesheet";
						elm.type = "text/css";
						elm.href = "extras/min/?f='.$file['src'].'&'.$RI_CJLoader->get('minify_time').'";
						
						var links = document.getElementsByTagName("link")[0];
						links.parentNode.appendChild(elm);
					</script>';
			}
		}
	}

  foreach($RC_loader_files['jscript'] as $file)
    if($file['include']) {
      include($file['src']);
    } else if(!$RI_CJLoader->get('minify_js')) {
      echo '<script type="text/javascript" src="'.$file['src'].'"'.($file['defer'] ? ' defer async': '').'></script>'."\n";

    } else {
      echo '<script type="text/javascript" src="extras/min/?f='.$file['src'].'&'.$RI_CJLoader->get('minify_time').'"'.($file['defer'] ? ' defer async': '').'></script>'."\n";
    }
}
?>
<?php 
if (SHOPVOTE_STATUS == "ja")  {
	require(DIR_WS_TEMPLATE . 'shopvote/shopvote_badge_and_reviews.php');
}
?>
<?php /* add any end-of-page code via an observer class */
  $zco_notifier->notify('NOTIFY_FOOTER_END', $current_page);
?>
</body>