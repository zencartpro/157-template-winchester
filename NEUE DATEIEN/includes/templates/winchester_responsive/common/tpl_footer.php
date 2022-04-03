<?php
/**
 * Common Template - tpl_footer.php
 *
 * this file can be copied to /templates/your_template_dir/pagename<br />
 * example: to override the privacy page<br />
 * make a directory /templates/my_template/privacy<br />
 * copy /templates/templates_defaults/common/tpl_footer.php to /templates/my_template/privacy/tpl_footer.php<br />
 * to override the global settings and turn off the footer un-comment the following line:<br />
 * <br />
 * $flag_disable_footer = true;<br />
 *
 * @package templateSystem
 * @copyright Copyright 2003-2022 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_footer.php for Winchester 2022-03-31 10:49:16Z webchills $
 */
require(DIR_WS_MODULES . zen_get_module_directory('footer.php'));
?>

<!--bof-navigation display -->
<div id="navSuppWrapper">
<?php
if (!isset($flag_disable_footer) || !$flag_disable_footer) {
?>
<div id="navSupp">
<?php if (EZPAGES_STATUS_FOOTER == '1' or (EZPAGES_STATUS_FOOTER == '2' and (strstr(EXCLUDE_ADMIN_IP_FOR_MAINTENANCE, $_SERVER['REMOTE_ADDR'])))) { ?>
<ul>
<li><?php echo '<a href="' . HTTPS_SERVER . DIR_WS_CATALOG . '">'; ?><?php echo HEADER_TITLE_CATALOG; ?></a></li>
<li><?php require($template->get_template_dir('tpl_ezpages_bar_footer.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_ezpages_bar_footer.php'); ?></li>
</ul>
<?php } ?>
</div>

<!--bof-flexible footer menu display -->
<div id="flex-navSupp">
<div class="onerow-fluid <?php echo $fluidisFixed; ?>">

<?php require($template->get_template_dir('tpl_flexible_footer_menu.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_flexible_footer_menu.php'); ?>
<br /><br />

<!--bof- site copyright display -->
<div id="siteinfoLegal" class="legalCopyright"><?php echo FOOTER_TEXT_BODY; ?></div>
<!--eof- site copyright display -->

<!--bof sitemap, privacy, conditions -->
<div id="footer-bottom">
                       <?php if (DEFINE_SITE_MAP_STATUS <= 1) { ?>
                        <a href="<?php echo zen_href_link(FILENAME_SITE_MAP); ?>"><?php echo BOX_INFORMATION_SITE_MAP; ?></a>
                        <?php } ?>
                        <?php if (DEFINE_PRIVACY_STATUS <= 1)  { ?>
                        <a href="<?php echo zen_href_link(FILENAME_PRIVACY); ?>"><?php echo BOX_INFORMATION_PRIVACY; ?></a>
                        <?php } ?>
                        <?php if (DEFINE_CONDITIONS_STATUS <= 1) { ?>
                        <a href="<?php echo zen_href_link(FILENAME_CONDITIONS); ?>"><?php echo BOX_INFORMATION_CONDITIONS; ?></a>
                        <?php } ?>

</div>
<!--eof sitemap, privacy, conditions -->


</div>
</div>
<!--eof-flexible footer menu -->

</div>
<!--eof-navigation display -->



<!--bof-ip address display -->
<?php
if (SHOW_FOOTER_IP == '1') {
?>
<div id="siteinfoIP"><?php echo TEXT_YOUR_IP_ADDRESS . '  ' . $_SERVER['REMOTE_ADDR']; ?></div>
<?php
}
?>
<!--eof-ip address display -->

<!--bof-banner #5 display -->
<?php
  if (SHOW_BANNERS_GROUP_SET5 != '' && $banner = zen_banner_exists('dynamic', SHOW_BANNERS_GROUP_SET5)) {
    if ($banner->RecordCount() > 0) {
?>
<div id="bannerFive" class="banners"><?php echo zen_display_banner('static', $banner); ?></div>
<?php
    }
  }
?>
<!--eof-banner #5 display -->


<?php
} // flag_disable_footer
?>