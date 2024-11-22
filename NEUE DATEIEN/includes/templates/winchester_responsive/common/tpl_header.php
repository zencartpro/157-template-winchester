<?php
/**
 * Common Template - tpl_header.php
 *
 * this file can be copied to /templates/your_template_dir/pagename
 * example: to override the privacy page
 * make a directory /templates/my_template/privacy
 * copy /templates/templates_defaults/common/tpl_footer.php to /templates/my_template/privacy/tpl_header.php
 * to override the global settings and turn off the footer un-comment the following line:
 * 
 * $flag_disable_header = true;
 *
 * Zen Cart German Specific (158 code in 157)
 * @copyright Copyright 2003-2022 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_header.php for Winchester 2024-11-22 18:46:16Z webchills $
 */
?>

<?php
if (!isset($flag_disable_header) || !$flag_disable_header) {
?>
<div id="headerWrapper" class="<?php echo $fluidisFixed; ?>">
<!--bof-top-notice-->
<?php if (defined('WIN_TOPNOTICE_STATUS') && (WIN_TOPNOTICE_STATUS === 'true')) { ?>
<div id="top-wrapper">
<div class="onerow-fluid <?php echo $fluidisFixed; ?>" id="top-inner">
<div id="top-inner-wrapper">
<div class="top-specials"><?php echo HEADER_TITLE_TOP_TEXT; ?></div>     
</div>
</div>
</div>
<?php } ?>
<!--eof-top-notice-->
<div id="top-middle">
<div class="onerow-fluid <?php echo $fluidisFixed; ?>">
<!--bof-top-first-->
<div id="logoWrapper">
<!--bof-logo-->
<div id="logo">
<?php echo '<a href="' . HTTP_SERVER . DIR_WS_CATALOG . '">' . zen_image($template->get_template_dir(HEADER_LOGO_IMAGE, DIR_WS_TEMPLATE, $current_page_base,'images'). '/' . HEADER_LOGO_IMAGE, HEADER_ALT_TEXT) . '</a>'; ?>
</div>
<!--eof-logo-->
<!--bof-search display-->
<div id="searchSection">
<div id="navMainSearchSection"><?php require(DIR_WS_MODULES . 'sideboxes/search_header.php'); ?></div>
</div>
<!--eof-search display-->
<!-- bof languages header display -->
<div id="navLanguagesWrapper" class="forward">
<?php require(DIR_WS_MODULES . zen_get_module_directory ('header_languages.php'));?>
</div>
<!-- eof  languages header display -->
<!--bof-login display-->
<div id="navMain">
    <ul>
<?php if (zen_is_logged_in() && !zen_in_guest_checkout()) { ?>
    <li><a href="<?php echo zen_href_link(FILENAME_LOGOFF, '', 'SSL'); ?>"><?php echo HEADER_TITLE_LOGOFF; ?></a></li>
    <li><a href="<?php echo zen_href_link(FILENAME_ACCOUNT, '', 'SSL'); ?>"><?php echo HEADER_TITLE_MY_ACCOUNT; ?></a></li>
<?php
      } else {
        if (STORE_STATUS == '0') {
?>
    <li class="h-login"><a href="<?php echo zen_href_link(FILENAME_LOGIN, '', 'SSL'); ?>"><?php echo HEADER_TITLE_LOGIN; ?></a></li>
<?php } } ?>
</ul>
</div>
<!--eof-login display-->
</div>
<!--eof-top-first-->
<!--bof-top-second-->
<div id="top-second">
<!--bof-sales-text-->
<div id="taglineWrapper">
<?php if (HEADER_SALES_TEXT != '') { ?>
<div id="tagline">
<?php echo HEADER_SALES_TEXT;?>
</div>
<?php }?>
</div>
<!--eof-sales-text-->
<!--bof-mega-menu-->
<div id="megamenu">
<!--bof handheld menu display-->
<?php require($template->get_template_dir('tpl_modules_mobile_categories_tabs.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_mobile_categories_tabs.php'); ?>
<!--eof handheld menu display-->
</div>
<!--eof-mega-menu-->
<!--bof-header-cart-->
<div id="header-cart">
    <a href="<?php echo zen_href_link(FILENAME_SHOPPING_CART, '', 'NONSSL'); ?>"><i class="fa-solid fa-cart-shopping"></i> <?php echo $_SESSION['cart']->count_contents();?>  - <?php echo $currencies->format($_SESSION['cart']->show_total());?></a>
   <?php if ($_SESSION['cart']->count_contents() != 0) { ?>
<?php }?>
</div>
<!--eof-header-cart-->
</div>
</div>
</div>

<?php if ($detect->isMobile() && !$detect->isTablet() or $detect->isMobile() && !$detect->isTablet() && $_SESSION['layoutType'] == 'mobile' or $detect->isTablet() && $_SESSION['layoutType'] == 'mobile' or $_SESSION['layoutType'] == 'mobile') { ?>

<div id="mobile-nav1">
<?php } else if ($detect->isTablet() or $detect->isMobile() && $_SESSION['layoutType'] == 'tablet' or $detect->isTablet() && $_SESSION['layoutType'] == 'tablet' or $_SESSION['layoutType'] == 'tablet'){ ?>

<div id="mobile-nav1">
<?php } else if ($detect->isMobile() && !$detect->isTablet() && $_SESSION['layoutType'] == 'full' or $detect->isTablet() && $_SESSION['layoutType'] == 'full' or $_SESSION['layoutType'] == 'full'){ ?>

<div id="mobile-nav1" class="hidenav1">
<?php } else { ?>

<div id="mobile-nav1">
<?php } ?>


<a href="<?php echo zen_href_link(FILENAME_ACCOUNT, '', 'SSL'); ?>"><i class="fa fa-user"></i></a>

<a href="<?php echo zen_href_link(FILENAME_ADVANCED_SEARCH); ?>"><i class="fa fa-search"></i></a>

<div class="header-cart">
   <a href="<?php echo zen_href_link(FILENAME_SHOPPING_CART, '', 'NONSSL'); ?>"><?php echo $_SESSION['cart']->count_contents();?>  - <?php echo $currencies->format($_SESSION['cart']->show_total());?></a>
   <?php if ($_SESSION['cart']->count_contents() != 0) { ?>
    <?php }?>
</div>
</div>



<!--eof-branding display-->
<!--eof-header logo and navigation display-->
</div>

<!--bof optional categories tabs navigation display-->
<?php require($template->get_template_dir('tpl_modules_categories_tabs.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_categories_tabs.php'); ?>
<!--eof optional categories tabs navigation display-->

<!--bof header ezpage links-->
<?php if (EZPAGES_STATUS_HEADER == '1' or (EZPAGES_STATUS_HEADER == '2' && zen_is_whitelisted_admin_ip())) { ?>
<?php require($template->get_template_dir('tpl_ezpages_bar_header.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_ezpages_bar_header.php'); ?>
<?php } ?>
<!--eof header ezpage links-->

<?php
    if ($this_is_home_page) {
?>
 <?php
if (WIN_SLIDER_STATUS == 'true') {
?>
          <?php require($template->get_template_dir('tpl_home_slider.php',DIR_WS_TEMPLATE, $current_page_base,'common')
                        . '/tpl_home_slider.php');?>
<?php
    } ?>
<?php
    } ?>

<?php } ?>