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
 * @version $Id: tpl_header_tablet.php for Winchester 2024-11-27 16:05:16Z webchills $

 */
?>

<?php
if (!isset($flag_disable_header) || !$flag_disable_header) {
?>
<div id="headerWrapper" class="<?php echo $fluidisFixed; ?>">
<!--bof-top-notice-->
<?php if (defined('WIN_TOPNOTICE_STATUS') && (WIN_TOPNOTICE_STATUS === 'true')) { ?>
<div id="top-wrapper-mobile">
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
<!--bof-logo/currency/language/nav/hamburger section-mobile-->
<div id="logoWrapper-mobile">
<!--bof-logo-mobile-->
<div id="logo-mobile">
<?php echo '<a href="' . HTTP_SERVER . DIR_WS_CATALOG . '">' . zen_image($template->get_template_dir(HEADER_LOGO_IMAGE, DIR_WS_TEMPLATE, $current_page_base,'images'). '/' . HEADER_LOGO_IMAGE, HEADER_ALT_TEXT) . '</a>'; ?>
</div>
<!--eof-logo-mobile-->
<!-- bof languages header display -->
<?php if (defined('WIN_HEADER_LANGUAGE_STATUS') && WIN_HEADER_LANGUAGE_STATUS === 'true') { ?>
<div id="navLanguagesWrapper-mobile" class="forward">
<?php require(DIR_WS_MODULES . zen_get_module_directory ('header_languages.php'));?>
</div>
<?php }?>
<!-- eof  languages header display -->
<!-- bof currencies header display -->
<?php if (defined('WIN_HEADER_CURRENCY_STATUS') && WIN_HEADER_CURRENCY_STATUS === 'true') { ?>
<div id="navCurrenciesWrapper-mobile">
<?php require(DIR_WS_MODULES . zen_get_module_directory ('header_currencies.php'));?>
</div>
<?php }?>
<!-- eof currencies header display -->
<!--bof-navi-mobile-->
<!--bof handheld menu display-->
<div id="mobilemenuContainer">
<?php require($template->get_template_dir('tpl_modules_mobile_categories_tabs.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_mobile_categories_tabs.php'); ?>
</div>
<!--eof handheld menu display-->
</div>
<!--bof-navi-mobile-->
<div id="mobile-navi">
<a class="header-cart-mobile" href="<?php echo zen_href_link(FILENAME_ACCOUNT, '', 'SSL'); ?>"><i class="fa-solid fa-user fa-lg"></i></i></a>
<a class="header-cart-mobile" href="<?php echo zen_href_link(FILENAME_ADVANCED_SEARCH); ?>"><i class="fa-solid fa-search fa-lg"></i></i></a>
<a class="header-cart-mobile" href="<?php echo zen_href_link(FILENAME_SHOPPING_CART, '', 'NONSSL'); ?>"><i class="fa-solid fa-cart-shopping fa-lg"></i><?php if ($_SESSION['cart']->count_contents() != 0) { ?> <?php echo $_SESSION['cart']->count_contents();?>  - <?php echo $currencies->format($_SESSION['cart']->show_total());?><?php }?> </a>
</div>
<!--eof-navi-mobile-->
<!--eof-logo/currency/language/nav/hamburger section-mobile-->
</div>
</div>
<?php
    if ($this_is_home_page) {
?>
<?php if (defined('WIN_SLIDER_STATUS') && WIN_SLIDER_STATUS === 'true') { ?>

          <?php require($template->get_template_dir('tpl_home_slider.php',DIR_WS_TEMPLATE, $current_page_base,'common')
                        . '/tpl_home_slider.php');?>
<?php
    } ?>
<?php
    } ?>
<?php } ?>
</div>