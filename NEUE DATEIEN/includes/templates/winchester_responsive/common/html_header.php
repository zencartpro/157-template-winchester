<?php
/**
 * Zen Cart German Specific
 * Common Template
 *
 * outputs the html header. i,e, everything that comes before the \</head\> tag <br />
 *
 * @copyright Copyright 2003-2022 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: html_header.php for Winchester 2022-04-10 14:19:39Z webchills $
 */
if (!defined('IS_ADMIN_FLAG')) {
    die('Illegal Access');
}

$zco_notifier->notify('NOTIFY_HTML_HEAD_START', $current_page_base, $template_dir);

// Prevent clickjacking risks by setting X-Frame-Options:SAMEORIGIN
header('X-Frame-Options:SAMEORIGIN');

/**
 * load the module for generating page meta-tags
 */
require(DIR_WS_MODULES . zen_get_module_directory('meta_tags.php'));
/**
 * output main page HEAD tag and related headers/meta-tags, etc
 */
?>


<?php

if (!class_exists('Mobile_Detect')) {
  include_once(DIR_WS_CLASSES . 'Mobile_Detect.php');
}
  $detect = new Mobile_Detect;
  $isMobile = $detect->isMobile();
  $isTablet = $detect->isTablet();
  if (!isset($layoutType)) $layoutType = ($isMobile ? ($isTablet ? 'tablet' : 'mobile') : 'default');

  $paginateAsUL = true;

?>
<!DOCTYPE html>
<html <?php echo HTML_PARAMS; ?>>
  <head>
  <meta charset="<?php echo CHARSET; ?>">
  <link rel="dns-prefetch" href="https://code.jquery.com">
  <title><?php echo META_TAG_TITLE; ?></title>
  <meta name="keywords" content="<?php echo META_TAG_KEYWORDS; ?>">
  <meta name="description" content="<?php echo META_TAG_DESCRIPTION; ?>">
  <meta name="language" content="<?php echo META_TAG_LANGUAGE; ?>" />
  <meta name="author" content="<?php echo STORE_NAME ?>">
  <meta name="generator" content="Zen-Cart 1.5.7 - deutsche Version, http://www.zen-cart-pro.at">
<?php if (defined('ROBOTS_PAGES_TO_SKIP') && in_array($current_page_base,explode(",",constant('ROBOTS_PAGES_TO_SKIP'))) || $current_page_base=='down_for_maintenance' || $robotsNoIndex === true) { ?>
  <meta name="robots" content="noindex, nofollow">
<?php } ?>

  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">

<?php if (defined('FAVICON')) { ?>
  <link rel="icon" href="<?php echo FAVICON; ?>" type="image/x-icon">
  <link rel="shortcut icon" href="<?php echo FAVICON; ?>" type="image/x-icon">
<?php } //endif FAVICON ?>

  <base href="<?php echo (($request_type == 'SSL') ? HTTPS_SERVER . DIR_WS_HTTPS_CATALOG : HTTP_SERVER . DIR_WS_CATALOG ); ?>">
<?php if (isset($canonicalLink) && $canonicalLink != '') { ?>
  <link rel="canonical" href="<?php echo $canonicalLink; ?>">
<?php } ?>
<?php
  // BOF hreflang for multilingual sites
  if (!isset($lng) || (isset($lng) && !is_object($lng))) {
    $lng = new language;
  }
if (count($lng->catalog_languages) > 1) {
  foreach($lng->catalog_languages as $key => $value) {
    echo '<link rel="alternate" href="' . ($this_is_home_page ? zen_href_link(FILENAME_DEFAULT, 'language=' . $key, $request_type, false) : $canonicalLink . (strpos($canonicalLink, '?') ? '&amp;' : '?') . 'language=' . $key) . '" hreflang="' . $key . '">' . "\n";
  }
}
// EOF hreflang for multilingual sites
?>
<?php
$manufacturers_id = (isset($_GET['manufacturers_id'])) ? $_GET['manufacturers_id'] : '';
?>
<?php if (RSS_FEED_ENABLED == 'true'){ ?>
<?php echo rss_feed_link_alternate();?>
<?php } ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<?php if (file_exists(DIR_WS_TEMPLATE . "jscript/jquery.min.js")) { ?>
<script type="text/javascript">window.jQuery || document.write(unescape('%3Cscript type="text/javascript" src="<?php echo $template->get_template_dir('.js',DIR_WS_TEMPLATE, $current_page_base,'jscript'); ?>/jquery.min.js"%3E%3C/script%3E'));</script>
<?php } ?>
<script type="text/javascript">window.jQuery || document.write(unescape('%3Cscript type="text/javascript" src="<?php echo $template->get_template_dir('.js','template_default', $current_page_base,'jscript'); ?>/jquery.min.js"%3E%3C/script%3E'));</script>
<?php
/**
* load the loader files
*/
$RC_loader_files = array();
if($RI_CJLoader->get('status') && (!isset($Ajax) || !$Ajax->status())){
    $RI_CJLoader->autoloadLoaders();
    $RI_CJLoader->loadCssJsFiles();
    $RC_loader_files = $RI_CJLoader->header();

    if (!empty($RC_loader_files['meta']))
    foreach($RC_loader_files['meta'] as $file) {
        include($file['src']);
        echo "\n";
    }

    foreach($RC_loader_files['css'] as $file){
        if (!$file['defer']) {
          if($file['include']) {
              include($file['src']);
          } else if (!$RI_CJLoader->get('minify_css')) {
              
              echo '<link rel="stylesheet" type="text/css" href="'.$file['src'] .'" />'."\n";
          } else {
             
              echo '<link rel="stylesheet" type="text/css" href="extras/min/?f='.$file['src'].'&'.$RI_CJLoader->get('minify_time').'" />'."\n";
          }
        }
        else {
          if (!$RI_CJLoader->get('minify_css') || $file['external']) {
            echo '<noscript><link rel="stylesheet" type="text/css" href="'.$file['src'] .'" /></noscript>'."\n";
          } else {
            echo '<noscript><link rel="stylesheet" type="text/css" href="extras/min/?f='.$file['src'].'&'.$RI_CJLoader->get('minify_time').'" /></noscript>'."\n";
          }
        }
    }
}

if (COLUMN_WIDTH == '0' || (in_array($current_page_base,explode(",",'popup_image,popup_image_additional')) )) {  
echo '';
} else {
$responsive_mobile = '<link rel="stylesheet" type="text/css" href="' . $template->get_template_dir('.css',DIR_WS_TEMPLATE, $current_page_base,'css') . '/' . 'responsive_mobile.css' . '" />'; 
require($template->get_template_dir('responsive_mobile.php',DIR_WS_TEMPLATE, $current_page_base,'common'). '/responsive_mobile.php');

$responsive_tablet = '<link rel="stylesheet" type="text/css" href="' . $template->get_template_dir('.css',DIR_WS_TEMPLATE, $current_page_base,'css') . '/' . 'responsive_tablet.css' . '" />'; 
require($template->get_template_dir('responsive_tablet.php',DIR_WS_TEMPLATE, $current_page_base,'common'). '/responsive_tablet.php');

$responsive_default = '<link rel="stylesheet" type="text/css" href="' . $template->get_template_dir('.css',DIR_WS_TEMPLATE, $current_page_base,'css') . '/' . 'responsive_default.css' . '" />'; 
  echo '<link rel="stylesheet" href="' . $template->get_template_dir('.css',DIR_WS_TEMPLATE, $current_page_base,'css') . '/' . 'responsive.css' . '">';
  if ( $detect->isMobile() && !$detect->isTablet() || $detect->isMobile() && !$detect->isTablet() && $_SESSION['layoutType'] == 'mobile' || $detect->isTablet() && $_SESSION['layoutType'] == 'mobile' || $_SESSION['layoutType'] == 'mobile') {
    echo $responsive_mobile;
  } else if ( $detect->isTablet() || $detect->isMobile() && $_SESSION['layoutType'] == 'tablet' || $detect->isTablet() && $_SESSION['layoutType'] == 'tablet' || $_SESSION['layoutType'] == 'tablet'){
    echo $responsive_tablet;
  } else if ($detect->isMobile() && !$detect->isTablet() && $_SESSION['layoutType'] == 'full' || $detect->isTablet() && $_SESSION['layoutType'] == 'full' || $_SESSION['layoutType'] == 'full' ) {
    echo '';
  } else {
    echo $responsive_default;
  }
}

if($detect->isMobile() && !$detect->isTablet() && $_SESSION['layoutType'] == 'full' || $detect->isTablet() && $_SESSION['layoutType'] == 'full' || $detect->isMobile() && !$detect->isTablet() && $_SESSION['layoutType'] == 'full' || $detect->isTablet() && $_SESSION['layoutType'] == 'full' || $_SESSION['layoutType'] == 'full'  ){
$fluidisFixed = 'fluidIsFixed';
} else {
$fluidisFixed = '';
}
?>

<script src="<?php echo $template->get_template_dir('',DIR_WS_TEMPLATE, $current_page_base,'jscript') . '/css_browser_selector.js' ?>" type="text/javascript"></script>
<link href="extras/fontawesome/6.1.1/css/all.css" rel="stylesheet"  type="text/css"/>
<?php require($template->get_template_dir('super_data_head.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/super_data_head.php'); ?>
<?php
  $zco_notifier->notify('NOTIFY_HTML_HEAD_END', $current_page_base);
?>
</head>
<?php // NOTE: Blank line following is intended: ?>

