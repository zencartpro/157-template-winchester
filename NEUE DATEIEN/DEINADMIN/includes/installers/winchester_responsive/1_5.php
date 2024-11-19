<?php
/**
 * @package Winchester Responsive
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: 1_5.php 2024-11-19 06:27:14 webchills $
 */
 
 
$configuration = $db->Execute("SELECT configuration_group_id FROM " . TABLE_CONFIGURATION_GROUP . " WHERE configuration_group_title = '" . BOX_CONFIGURATION_WINCHESTER_RESPONSIVE . "' ORDER BY configuration_group_id ASC;");
if ($configuration->RecordCount() > 0) {
  while (!$configuration->EOF) {
    $db->Execute("DELETE FROM " . TABLE_CONFIGURATION . " WHERE configuration_group_id = " . $configuration->fields['configuration_group_id'] . ";");
    $db->Execute("DELETE FROM " . TABLE_CONFIGURATION_GROUP . " WHERE configuration_group_id = " . $configuration->fields['configuration_group_id'] . ";");
    $configuration->MoveNext();
  }
}

// Layout Settings
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = '&nbsp;&nbsp;<i class=\"fa-solid fa-caret-right fa-xs\"></i>&nbsp;&nbsp;' WHERE configuration_key = 'BREAD_CRUMBS_SEPARATOR' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = 2 WHERE configuration_key = 'DEFINE_BREADCRUMB_STATUS' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = '250px' WHERE configuration_key = 'COLUMN_WIDTH_LEFT' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = 0 WHERE configuration_key = 'COLUMN_RIGHT_STATUS' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = '' WHERE configuration_key = 'CATEGORIES_SEPARATOR' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = '' WHERE configuration_key = 'CATEGORIES_SEPARATOR_SUBS' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = '<span class=\"cat-count\">' WHERE configuration_key = 'CATEGORIES_COUNT_PREFIX' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = '</span>' WHERE configuration_key = 'CATEGORIES_COUNT_SUFFIX' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = 0 WHERE configuration_key = 'SHOW_CUSTOMER_GREETING' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = 0 WHERE configuration_key = 'SHOW_FOOTER_IP' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = 'Yes' WHERE configuration_key = 'IMAGE_USE_CSS_BUTTONS' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = 0 WHERE configuration_key = 'CATEGORIES_TABS_STATUS' LIMIT 1;");

// Maximum Values
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = 0 WHERE configuration_key = 'MAX_MANUFACTURERS_LIST' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = 0 WHERE configuration_key = 'MAX_RECORD_COMPANY_LIST' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = 0 WHERE configuration_key = 'MAX_MUSIC_GENRES_LIST' LIMIT 1;");

// Images
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = '200' WHERE configuration_key = 'SMALL_IMAGE_WIDTH' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = '200' WHERE configuration_key = 'SMALL_IMAGE_HEIGHT' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = '200' WHERE configuration_key = 'IMAGE_PRODUCT_LISTING_WIDTH' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = '200' WHERE configuration_key = 'IMAGE_PRODUCT_LISTING_HEIGHT' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = '200' WHERE configuration_key = 'IMAGE_PRODUCT_NEW_LISTING_WIDTH' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = '200' WHERE configuration_key = 'IMAGE_PRODUCT_NEW_WIDTH' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = '200' WHERE configuration_key = 'IMAGE_PRODUCT_NEW_HEIGHT' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = '200' WHERE configuration_key = 'IMAGE_FEATURED_PRODUCTS_LISTING_WIDTH' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = '200' WHERE configuration_key = 'IMAGE_FEATURED_PRODUCTS_LISTING_HEIGHT' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = '200' WHERE configuration_key = 'IMAGE_PRODUCT_ALL_LISTING_WIDTH' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = '200' WHERE configuration_key = 'IMAGE_PRODUCT_ALL_LISTING_HEIGHT' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = 4 WHERE configuration_key = 'IMAGES_AUTO_ADDED' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = '300' WHERE configuration_key = 'MEDIUM_IMAGE_WIDTH' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = '300' WHERE configuration_key = 'MEDIUM_IMAGE_HEIGHT' LIMIT 1;");

// Product Listing
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = 1 WHERE configuration_key = 'PRODUCT_LIST_IMAGE' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = 0 WHERE configuration_key = 'PRODUCT_LIST_MANUFACTURER' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = 0 WHERE configuration_key = 'PRODUCT_LIST_MODEL' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = 2 WHERE configuration_key = 'PRODUCT_LIST_NAME' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = 3 WHERE configuration_key = 'PRODUCT_LIST_PRICE' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = 1 WHERE configuration_key = 'PRODUCT_LIST_PRICE_BUY_NOW' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = 0 WHERE configuration_key = 'PRODUCT_LISTING_MULTIPLE_ADD_TO_CART' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = 0 WHERE configuration_key = 'PRODUCT_LIST_DESCRIPTION' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = 3 WHERE configuration_key = 'PRODUCT_LISTING_COLUMNS_PER_ROW' LIMIT 1;");

//  Shipping/Packaging
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = 2 WHERE configuration_key = 'SHOW_SHIPPING_ESTIMATOR_BUTTON' LIMIT 1;");

// Stock
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = 1 WHERE configuration_key = 'SHOW_SHOPPING_CART_DELETE' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = 1 WHERE configuration_key = 'SHOW_SHOPPING_CART_UPDATE' LIMIT 1;");

// Product Info
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = 0 WHERE configuration_key = 'PRODUCT_INFO_CATEGORIES' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = 2 WHERE configuration_key = 'PRODUCT_INFO_PREVIOUS_NEXT' LIMIT 1;");

// Index Listing
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = 0 WHERE configuration_key = 'SHOW_PRODUCT_INFO_MAIN_NEW_PRODUCTS' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = 0 WHERE configuration_key = 'SHOW_PRODUCT_INFO_MAIN_SPECIALS_PRODUCTS' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = 0 WHERE configuration_key = 'SHOW_PRODUCT_INFO_MAIN_UPCOMING' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = 0 WHERE configuration_key = 'SHOW_PRODUCT_INFO_CATEGORY_NEW_PRODUCTS' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = 0 WHERE configuration_key = 'SHOW_PRODUCT_INFO_CATEGORY_SPECIALS_PRODUCTS' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = 0 WHERE configuration_key = 'SHOW_PRODUCT_INFO_CATEGORY_UPCOMING' LIMIT 1;");

// EZ Pages
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = 0 WHERE configuration_key = 'EZPAGES_STATUS_HEADER' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = 0 WHERE configuration_key = 'EZPAGES_STATUS_FOOTER' LIMIT 1;");

// ZCA Responsive Template Switch
$db->Execute("INSERT IGNORE INTO " . TABLE_CONFIGURATION . " (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added, use_function, set_function) VALUES 
(NULL, '<b>ACTIVATE Responsive Template</b>', 'COLUMN_WIDTH', '1', 'Column Width - Left Boxes &<br /> Column Width - Right Boxes<br /><b>DO NOT WORK WITH</b><br />(1)Responsive Template Settings<br /><br /><b>Use</b><br />Column Width - Left &<br /> Column Width - Right<br /><br /><br /> 0 = Use Default Template Settings<br />1 = Use Responsive Template Settings<br />', '19', NULL, NOW(), NULL, 'zen_cfg_select_option(array(\'0\', \'1\'),');");

$db->Execute("REPLACE INTO " . TABLE_CONFIGURATION_LANGUAGE . " (configuration_title, configuration_key, configuration_description, configuration_language_id) VALUES
('<b>Responsives Template AKTIVIEREN</b>', 'COLUMN_WIDTH', 'Spaltenbreite - Linke Sideboxen &<br /> Spaltenbreite - Rechte Sideboxen<br /><b>NICHT GEEIGNET FÜR</b><br />(1)Responsives Template Einstellungen<br /><br /><b>Verwende</b><br />Spaltenbreite - Links &<br /> Splatenbreite - Rechts<br /><br /><br /> 0 = Verwende Einstellungen für normales Template<br />1 = Verwende Einstellungen für Responsives Template<br />', 43);");
global $db;
$sql = "SELECT * from " . TABLE_LAYOUT_BOXES . " LIMIT 1";
$result = $db->Execute($sql);
$value = $result->fields['show_box_min_width'];
$type = gettype($value);
if ($type == 'NULL'){

$db->Execute("ALTER TABLE " . TABLE_LAYOUT_BOXES  . " ADD show_box_min_width TINYINT( 1 ) NOT NULL DEFAULT '1' AFTER layout_box_status_single;");

}

// Layout Boxes
$db->Execute("INSERT IGNORE INTO " . TABLE_LAYOUT_BOXES . "   (layout_id, layout_template, layout_box_name, layout_box_status, layout_box_location, layout_box_sort_order, layout_box_sort_order_single, layout_box_status_single, show_box_min_width) VALUES
(NULL, 'default_template_settings', 'ezpages_drop_menu.php', 0, 0, 0, 0, 1, 1);");
$db->Execute("UPDATE " . TABLE_LAYOUT_BOXES . " SET show_box_min_width = 0 WHERE layout_box_name = 'banner_box.php' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_LAYOUT_BOXES . " SET show_box_min_width = 0 WHERE layout_box_name =  'banner_box2.php' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_LAYOUT_BOXES . " SET show_box_min_width = 0 WHERE layout_box_name = 'banner_box_all.php' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_LAYOUT_BOXES . " SET show_box_min_width = 0 WHERE layout_box_name = 'best_sellers.php' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_LAYOUT_BOXES . " SET show_box_min_width = 0 WHERE layout_box_name = 'categories.php' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_LAYOUT_BOXES . " SET show_box_min_width = 0 WHERE layout_box_name = 'currencies.php' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_LAYOUT_BOXES . " SET show_box_min_width = 0 WHERE layout_box_name = 'document_categories.php' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_LAYOUT_BOXES . " SET show_box_min_width = 0 WHERE layout_box_name = 'ezpages.php' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_LAYOUT_BOXES . " SET show_box_min_width = 0 WHERE layout_box_name = 'featured.php' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_LAYOUT_BOXES . " SET show_box_min_width = 0 WHERE layout_box_name = 'information.php' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_LAYOUT_BOXES . " SET show_box_min_width = 0 WHERE layout_box_name = 'languages.php' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_LAYOUT_BOXES . " SET show_box_min_width = 0 WHERE layout_box_name = 'manufacturer_info.php' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_LAYOUT_BOXES . " SET show_box_min_width = 0 WHERE layout_box_name = 'manufacturers.php' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_LAYOUT_BOXES . " SET show_box_min_width = 0 WHERE layout_box_name = 'more_information.php' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_LAYOUT_BOXES . " SET show_box_min_width = 0 WHERE layout_box_name = 'music_genres.php' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_LAYOUT_BOXES . " SET show_box_min_width = 0 WHERE layout_box_name = 'order_history.php' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_LAYOUT_BOXES . " SET show_box_min_width = 0 WHERE layout_box_name = 'product_notifications.php' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_LAYOUT_BOXES . " SET show_box_min_width = 0 WHERE layout_box_name = 'record_companies.php' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_LAYOUT_BOXES . " SET show_box_min_width = 0 WHERE layout_box_name = 'reviews.php' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_LAYOUT_BOXES . " SET show_box_min_width = 0 WHERE layout_box_name = 'search.php' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_LAYOUT_BOXES . " SET show_box_min_width = 0 WHERE layout_box_name = 'shopping_cart.php' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_LAYOUT_BOXES . " SET show_box_min_width = 0 WHERE layout_box_name = 'specials.php' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_LAYOUT_BOXES . " SET show_box_min_width = 0 WHERE layout_box_name = 'whats_new.php' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_LAYOUT_BOXES . " SET show_box_min_width = 0 WHERE layout_box_name = 'whos_online.php' LIMIT 1;");

// About Us
$db->Execute("INSERT IGNORE INTO " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value,configuration_description, configuration_group_id, sort_order,last_modified, date_added, use_function, set_function) VALUES ('Define About Us Status', 'DEFINE_ABOUT_US_STATUS', '1', 'Enable the Defined About Us Link/Text?0= Link ON, Define Text OFF1= Link ON, Define Text ON2= Link OFF, Define Text ON3= Link OFF, Define Text OFF', 25, 90, '', '', NULL, 'zen_cfg_select_option(array(''0'', ''1'', ''2'', ''3''),');");
$db->Execute("REPLACE INTO " . TABLE_CONFIGURATION_LANGUAGE . " (configuration_title, configuration_key, configuration_description, configuration_language_id) VALUES
('Seite Über uns Status', 'DEFINE_ABOUT_US_STATUS', 'Über uns Link/Text aktivieren?<br/>0= Link EIN, Define Text AUS<br/>1= Link EIN, Define Text EIN<br/>2= Link AUS, Define Text EIN<br/>3= Link EIN, Define Text AUS', 43);");

// Carousel Featured Products
$db->Execute("INSERT IGNORE INTO " . TABLE_CONFIGURATION_GROUP . " (configuration_group_title, configuration_group_description, sort_order, visible) VALUES ('Carousel Featured Products', 'Set Carousel Featured Products Options', '1', '1');");
$configuration_group_id = $db->Insert_ID();

$db->Execute("UPDATE " . TABLE_CONFIGURATION_GROUP . " SET sort_order = " . $configuration_group_id . " WHERE configuration_group_id = " . $configuration_group_id . ";");

$db->Execute("INSERT IGNORE INTO " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) VALUES
('Carousel Featured Products', 'CAROUSEL_FEATURED_PRODUCTS', 'true', 'Display your featured products in a carousel?<br /><br/>Default = true<br/>', " . $configuration_group_id . ", 101, 'zen_cfg_select_option(array(\'true\', \'false\'), ', now()),
('Maximum Display Carousel Featured Products', 'MAX_DISPLAY_SEARCH_RESULTS_CAROUSEL_FEATURED', '10', 'Set this to how many featured products you have - regardless of the number, only three will show on the carousel at a time.<br/><br/>Default = 10<br/>', " . $configuration_group_id . ", 102, NULL, now()),
('Display Description', 'CAROUSEL_FEATURED_DESCRIPTION', 'false', 'Display featured products description?<br/><br/>Default = true<br/>', " . $configuration_group_id . ", 105, 'zen_cfg_select_option(array(\'true\', \'false\'), ', now()),
('Description Length', 'CAROUSEL_FEATURED_DESCRIPTION_LENGTH', '100', '--ONLY APPLICABLE IF DISPLAY DISCRIPTION IS TRUE--<br/><br/>Featured product description length in chatacters<br/><br/>Default = 100<br/>', " . $configuration_group_id . ", 106, NULL, now()),
('Display Button', 'CAROUSEL_FEATURED_LINK', 'true', 'Display \"Buy Now\" or \"More Information\" buttons?<br/><br/>Default = true<br/>', " . $configuration_group_id . ", 107, 'zen_cfg_select_option(array(\'true\', \'false\'), ', now()),
('Display Price', 'CAROUSEL_FEATURED_PRICE', 'true', 'Display featured product price?<br/><br/>Default = true<br/>', " . $configuration_group_id . ", 107, 'zen_cfg_select_option(array(\'true\', \'false\'), ', now()),
('Carousel Featured Image Listing Width', 'IMAGE_CAROUSEL_FEATURED_PRODUCTS_LISTING_WIDTH', '200', 'The width of the product images in the carousel.<br/>Default = 100', " . $configuration_group_id . ", 108, NULL, now()),
('Carousel Featured Image Listing Height', 'IMAGE_CAROUSEL_FEATURED_PRODUCTS_LISTING_HEIGHT', '200', 'The height of the product images in the carousel.<br/>Default = 80', " . $configuration_group_id . ", 109, NULL, now());");

$db->Execute("INSERT IGNORE INTO  " . TABLE_ADMIN_PAGES . " (page_key,language_key,main_page,page_params,menu_key,display_on_menu,sort_order) VALUES ('configCarouselFeatured','BOX_CONFIGURATION_CAROUSEL','FILENAME_CONFIGURATION',CONCAT('gID='," . $configuration_group_id . "),'configuration','Y', 65);");

$db->Execute("INSERT IGNORE INTO " . TABLE_CONFIGURATION_GROUP . " (configuration_group_id, language_id, configuration_group_title, configuration_group_description, sort_order, visible ) VALUES 
(" . $configuration_group_id . ", 43, 'Karussell der Empfohlenen Artikel', 'Einstellungen für die Empfohlenen Artikel auf der Startseite', '1', '1');");

$db->Execute("REPLACE INTO " . TABLE_CONFIGURATION_LANGUAGE . " (configuration_title, configuration_key, configuration_description, configuration_language_id) VALUES
('Karussell Empfohlene Artikel - Einschalten?', 'CAROUSEL_FEATURED_PRODUCTS', 'Wollen Sie die Empfohlenen Artikel in einem Karussell anzeigen?<br/><br/>Voreinstellung = true<br/>', 43),
('Karussell Empfohlene Artikel - Anzahl', 'MAX_DISPLAY_SEARCH_RESULTS_CAROUSEL_FEATURED', 'Stellen Sie hier ein, wieviele empfohlene Artikel Sie insgesamt haben. Unabhängig davon werden aus diesem Pool dann drei gleichzeitig im Karussell angezeigt.<br/><br/>Voreinstellung = 10<br/>', 43),
('Karussell Empfohlene Artikel - Artikelbeschreibung anzeigen', 'CAROUSEL_FEATURED_DESCRIPTION', 'Soll die Artikelbeschreibung im Karussel angezeigt werden?<br/><br/>Voreinstellung = 10<br/>', 43),
('Karussell Empfohlene Artikel - Artikelbeschreibung Länge', 'CAROUSEL_FEATURED_DESCRIPTION_LENGTH', 'Wieviele Zeichen der Artikelbeschreibung sollen angezeigt werden? Wirkt nur, wenn Artikelbeschreibung anzeigen oben auf true gesetzt ist!<br/><br/>Voreinstellung = 100<br/>', 43),
('Karussell Empfohlene Artikel - Buttons anzeigen?', 'CAROUSEL_FEATURED_LINK', 'Sollen die Buttons Jetzt kaufen bzw. weitere Informationen angezeigt werden?<br/><br/>Voreinstellung = true<br/>', 43),
('Karussell Empfohlene Artikel - Preis anzeigen?', 'CAROUSEL_FEATURED_PRICE', 'Soll der Preis bei den Artikeln im Karussell angezeigt werden?<br/><br/>Voreinstellung = true<br/>', 43),
('Karussell Empfohlene Artikel - Bildbreite', 'IMAGE_CAROUSEL_FEATURED_PRODUCTS_LISTING_WIDTH', 'Breite der Bilder im Karussell in Pixel<br/><br/>Voreinstellung = 200<br/>', 43),
('Karussell Empfohlene Artikel - Bildhöhe', 'IMAGE_CAROUSEL_FEATURED_PRODUCTS_LISTING_HEIGHT', 'Höhe der Bilder im Karussell in Pixel<br/><br/>Voreinstellung = 200<br/>', 43);");
// Flexible Footer Menu Multilanguage
$db->Execute("CREATE TABLE IF NOT EXISTS " . TABLE_FLEXIBLE_FOOTER_MENU . " (
  page_id int(11) NOT NULL AUTO_INCREMENT,
  language_id int(11) NOT NULL DEFAULT '1',
  page_title varchar(64) CHARACTER SET utf8 NOT NULL DEFAULT '',
  page_url varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  col_header varchar(64) CHARACTER SET utf8 DEFAULT NULL,
  col_image varchar(254) CHARACTER SET utf8 NOT NULL DEFAULT '',
  col_html_text text CHARACTER SET utf8,
  status int(1) NOT NULL DEFAULT '0',
  col_sort_order int(11) NOT NULL DEFAULT '0',
  col_id int(11) NOT NULL DEFAULT '0',
  date_added datetime NOT NULL DEFAULT '0001-01-01 00:00:00',
  last_update datetime DEFAULT NULL,
    PRIMARY KEY (page_id)
    );");

$db->Execute("INSERT IGNORE INTO " . TABLE_FLEXIBLE_FOOTER_MENU . " (page_id, language_id, page_title, page_url, col_header, col_image, col_html_text, status, col_sort_order, col_id, date_added, last_update) VALUES
(1, 1, 'Home', 'index.php?main_page=', '', '', '', 1, 11, 1, now(), now()),
(2, 1, 'Featured', 'index.php?main_page=featured_products', '', '', '', 1, 12, 1, now(), now()),
(3, 1, '', '', 'Shop', '', '', 1, 1, 1, now(), now()),
(4, 1, 'Specials', 'index.php?main_page=specials', '', '', '', 1, 13, 1, now(), now()),
(5, 1, 'New Arrivals', 'index.php?main_page=products_new', '', '', '', 1, 14, 1, now(), now()),
(6, 1, 'View All', 'index.php?main_page=products_all', '', '', '', 1, 15, 1, now(), now()),
(7, 1, '', '', 'Customer Service', '', '', 1, 21, 2, now(), now()),
(8, 1, 'About Us', 'index.php?main_page=about_us', '', '', '', 1, 24, 2, now(), now()),
(9, 1, 'Gift Certificate FAQ', 'index.php?main_page=gv_faq', '', '', '', 1, 26, 2, now(), now()),
(10, 1, 'Discount Coupons', 'index.php?main_page=discount_coupon', '', '', '', 1, 28, 2, now(), now()),
(11, 1, 'Newsletter Unsubscribe', 'index.php?main_page=unsubscribe', '', '', '', 1, 28, 2, now(), now()),
(12, 1, 'Contact Us', 'index.php?main_page=contact_us', '', '', '', 1, 23, 2, now(), now()),
(13, 1, 'Shipping and Returns', 'index.php?main_page=shippinginfo', '', '', '', 1, 22, 2, now(), now()),
(14, 1, 'My Account', 'index.php?main_page=account', '', '', '', 1, 25, 2, now(), now()),
(15, 1, '', '', 'Share and Connect', '', '', 1, 4, 4, now(), now()),
(16, 1, '', '', '', '', '<a href=\"https://www.facebook.com/#\" target=\"_blank\"><i class=\"fa-brands fa-facebook\"></i></a><a href=\"https://bsky.app\" target=\"_blank\"><i class=\"fa-brands fa-bluesky\"></i></a><a href=\"http://www.pinterest.com/#\" target=\"_blank\"><i class=\"fa-brands fa-pinterest\"></i></a><a href=\"https://www.youtube.com/#\" target=\"_blank\"><i class=\"fa-brands fa-youtube\"></i></a><a href=\"#\" target=\"_blank\"><i class=\"fa-brands fa-instagram\"></i></a>', 1, 41, 4, NOW(), NOW()),
(17, 1, '', 'index.php?main_page=impressum', NULL, '', NULL, 1, 15, 1, now(), now()),
(18, 1, '', 'index.php?main_page=privacy', NULL, '', NULL, 1, 16, 1, NOW(), NOW()),
(19, 1, '', 'index.php?main_page=conditions', NULL, '', NULL, 1, 17, 1, NOW(), NOW());");


$db->Execute("CREATE TABLE IF NOT EXISTS " . TABLE_FLEXIBLE_FOOTER_MENU_CONTENT . " (
  pc_id int(11) NOT NULL auto_increment,
  page_id int(11) NOT NULL default '0',
  language_id int(11) NOT NULL default '1',
  page_title varchar(64) NOT NULL default '',
  col_header varchar(64) NOT NULL default '',
  col_html_text text,
  PRIMARY KEY  (`pc_id`),
  KEY idx_flexible_footer_content (page_id,language_id)
);");

$db->Execute("INSERT IGNORE INTO " . TABLE_FLEXIBLE_FOOTER_MENU_CONTENT . " (page_id, language_id, page_title, col_header, col_html_text) VALUES

(1, 43, 'Home', '', ''),
(1, 1, 'Home', '', ''),
(2, 43, 'Wir empfehlen', '', ''),
(2, 1, 'We recommend', '', ''),
(3, 43, '', 'Wichtige Links', ''),
(3, 1, '', 'Important Links', ''),
(4, 43, 'Sonderangebote', '', ''),
(4, 1, 'Specials', '', ''),
(5, 43, 'Neu eingetroffen', '', ''),
(5, 1, 'New Products', '', ''),
(6, 43, 'Alle Artikel', '', ''),
(6, 1, 'All Products', '', ''),
(7, 43, '', 'Kundenservice', ''),
(7, 1, '', 'Customer Service', ''),
(8, 43, 'Über uns', '', ''),
(8, 1, 'About Us', '', ''),
(9, 43, 'Geschenkgutschein FAQ', '', ''),
(9, 1, 'Gift Certificate FAQ', '', ''),
(10, 43, 'Aktionskupons', '', ''),
(10, 1, 'Discount Coupons', '', ''),
(11, 43, 'Newsletter abbestellen', '', ''),
(11, 1, 'Newsletter unsubsribe', '', ''),
(12, 43, 'Kontakt', '', ''),
(12, 1, 'Contact Us', '', ''),
(13, 43, 'Preise und Versand', '', ''),
(13, 1, 'Shippinginfo', '', ''),
(14, 43, 'Mein Konto', '', ''),
(14, 1, 'My Account', '', ''),
(15, 43, '', 'Social Media', ''),
(15, 1, '', 'Social Media', ''),
(16, 1,  '', '', '<a href=\"https://www.facebook.com/#\" target=\"_blank\"><i class=\"fa-brands fa-facebook\"></i></a><a href=\"https://bsky.app/profile/#\" target=\"_blank\"><i class=\"fa-brands fa-bluesky\"></i></a><a href=\"http://www.pinterest.com/#\" target=\"_blank\"><i class=\"fa-brands fa-pinterest\"></i></a><a href=\"https://www.youtube.com/#\" target=\"_blank\"><i class=\"fa-brands fa-youtube\"></i></a><a href=\"#\" target=\"_blank\"><i class=\"fa-brands fa-instagram\"></i></a>'),
(16, 43,  '', '', '<a href=\"https://www.facebook.com/#\" target=\"_blank\"><i class=\"fa-brands fa-facebook\"></i></a><a href=\"https://bsky.app/profile/#\" target=\"_blank\"><i class=\"fa-brands fa-bluesky\"></i></a><a href=\"http://www.pinterest.com/#\" target=\"_blank\"><i class=\"fa-brands fa-pinterest\"></i></a><a href=\"https://www.youtube.com/#\" target=\"_blank\"><i class=\"fa-brands fa-youtube\"></i></a><a href=\"#\" target=\"_blank\"><i class=\"fa-brands fa-instagram\"></i></a>'),
(17, 43, 'Impressum', '', ''),
(17, 1, 'Imprint', '', ''),
(18, 43, 'Datenschutz', '', ''),
(18, 1, 'Privacy Policy', '', ''),
(19, 43, 'AGB', '', ''),
(19, 1, 'Terms & Conditions', '', '');");

$db->Execute("SELECT @sortorder:=max(sort_order) FROM " . TABLE_ADMIN_PAGES . " ;");
$db->Execute("INSERT IGNORE INTO " . TABLE_ADMIN_PAGES . " (page_key, language_key, main_page, page_params, menu_key, display_on_menu, sort_order) VALUES
('flexibleFooterMenu', 'BOX_TOOLS_FLEXIBLE_FOOTER_MENU', 'FILENAME_FLEXIBLE_FOOTER_MENU', '', 'tools', 'Y', @sortorder+1);");

// Column Layout Grid - remove old unused settings
$db->Execute("DELETE FROM " . TABLE_CONFIGURATION . " where configuration_key IN ('PRODUCT_LISTING_LAYOUT_STYLE_CUSTOMER,PRODUCT_LISTING_GRID_SORT');");

                
// Product Listing
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = 0 WHERE configuration_key = 'PRODUCT_LIST_FILTER' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = 0 WHERE configuration_key = 'PRODUCT_LIST_PRICE_BUY_NOW' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = 'columns' WHERE configuration_key = 'PRODUCT_LISTING_LAYOUT_STYLE' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = 'false' WHERE configuration_key = 'PRODUCT_LIST_ALPHA_SORTER' LIMIT 1;");

// Banners
$db->Execute("INSERT IGNORE INTO " . TABLE_BANNERS . " (banners_id, banners_title, banners_url, banners_image, banners_group, banners_html_text, expires_impressions, expires_date, date_scheduled, date_added, date_status_change, status, banners_open_new_windows, banners_on_ssl, banners_sort_order)
  VALUES 
('', 'Modernes Responsives Design', '', 'banners/slide6.jpg', 'homepageslide', NULL, '0', NULL, NULL, '0001-01-01 00:00:00', NULL, '1', '1', '1', '0'),
('', 'Optimiert für alle Geräte', '', 'banners/slide7.jpg', 'homepageslide', NULL, '0', NULL, NULL, '0001-01-01 00:00:00', NULL, '1', '1', '1', '0'),
('', 'Zahlreiche Zusatzfunktionen', '', 'banners/slide14.jpg', 'homepageslide', NULL, '0', NULL, NULL, '0001-01-01 00:00:00', NULL, '1', '1', '1', '0'),
('', 'Multilinguale Installation und Administration', '', 'banners/slide9.jpg', 'homepageslide', NULL, '0', NULL, NULL, '0001-01-01 00:00:00', NULL, '1', '1', '1', '0'),
('', 'Zusatzinfo', '', '', 'Zusatzinfo', '<div id=\"custom-tab-wrapper\"><img src=\"includes/templates/winchester_responsive/images/summer.png\" class=\"custom-tab-image\" alt=\"your alt text here\" /><div id=\"custom-tab-text\">Sie können in diesem Tab jeden Inhalt anzeigen, den Sie wollen.  Wenn Sie Text und/oder Bilder verwenden wollen, nutzen Sie den Bannermanager um Ihre Inhalte einzugeben.<br /><br />Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam interdum feugiat ipsum vehicula sollicitudin. Integer sed lacus eget risus consectetur ullamcorper. Pellentesque rutrum ullamcorper faucibus. Nam porttitor iaculis enim, mattis tristique velit tristique bibendum. Aliquam porta nisl tortor, non luctus justo. Nam tincidunt dui vel mauris tincidunt posuere. Phasellus rhoncus elit et lorem sodales ullamcorper.</div><div class=\"clearBoth\"></div></div>', '0', NULL, NULL, '0001-01-01 00:00:00', NULL, '1', '1', '1', '0'),
('', 'Slideshow per Admin steuerbar', '', 'banners/slide10.jpg', 'homepageslide', NULL, '0', NULL, NULL, '0001-01-01 00:00:00', NULL, '1', '1', '1', '0');");


$db->Execute(" SELECT @gid:=configuration_group_id
FROM ".TABLE_CONFIGURATION_GROUP."
WHERE configuration_group_title= 'Winchester Responsive'
LIMIT 1;");

$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = '1.5' WHERE configuration_key = 'WINCHESTER_RESPONSIVE_VERSION' LIMIT 1;");

$db->Execute("INSERT IGNORE INTO " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) VALUES
	    ('Home Page Slideshow', 'WIN_SLIDER_STATUS', 'true', 'Activate Home Page Slideshow', @gid, 1, now(), now(), '', 'zen_cfg_select_option(array(\'true\', \'false\'),'),
	    ('Banner Display Groups Custom Tab', 'SHOW_BANNERS_GROUP_SETCUSTOMTAB', 'Zusatzinfo', 'Custom Tab for product info page', @gid, 2, now(), now(), '', ''),
	    ('EZ Pages in Header Menu', 'SHOW_EZ_PAGES_MENU', 'true', 'Shows the menu option for EZ pages/important links in the header menu', @gid, 3, now(), now(), '', 'zen_cfg_select_option(array(\'true\', \'false\'),');");

$db->Execute("REPLACE INTO " . TABLE_CONFIGURATION_LANGUAGE . " (configuration_title, configuration_key, configuration_description, configuration_language_id) VALUES
('Winchester - Version', 'WINCHESTER_RESPONSIVE_VERSION', 'Read Only - Zeigt die installierte Winchester Responsive Version', 43),
('Winchester - Tab auf der Artikeldetailseite', 'SHOW_BANNERS_GROUP_SETCUSTOMTAB', 'Titel des zusätzlichen Tabs auf der Artikeldetailseite', 43),
('Winchester - Slideshow', 'WIN_SLIDER_STATUS', 'Wollen Sie die Slideshow auf der Startseite anzeigen?', 43),
('Winchester EZ Pages im Topmenü', 'SHOW_EZ_PAGES_MENU', 'Soll das Headermenü die EZ Pages enthalten?', 43);");

// delete old configuration menu
$admin_page = 'configWinchester_Responsive';
$db->Execute("DELETE FROM " . TABLE_ADMIN_PAGES . " WHERE page_key = '" . $admin_page . "' LIMIT 1;");
// add configuration menu
if (!zen_page_key_exists($admin_page)) {
$db->Execute(" SELECT @gid:=configuration_group_id
FROM ".TABLE_CONFIGURATION_GROUP."
WHERE configuration_group_title= 'Winchester Responsive'
LIMIT 1;");
$db->Execute("INSERT IGNORE INTO " . TABLE_ADMIN_PAGES . " (page_key,language_key,main_page,page_params,menu_key,display_on_menu,sort_order) VALUES 
('configWinchester_Responsive','BOX_CONFIGURATION_WINCHESTER_RESPONSIVE','FILENAME_CONFIGURATION',CONCAT('gID=',@gid),'configuration','Y',@gid)");
}
$messageStack->add('Winchester Responsive Template erfolgreich installiert', 'success');
