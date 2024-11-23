<?php
/**
 * Page Template
 *
 * Loaded automatically by index.php?main_page=advanced_search
 * Displays options fields upon which a product search will be run
 *
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_advanced_search_default.php for Winchester 2024-11-23 14:29:16Z webchills $
 */
?>
<div class="centerColumn" id="advSearchDefault">

<?php echo zen_draw_form('advanced_search', zen_href_link(FILENAME_ADVANCED_SEARCH_RESULT, '', $request_type, false), 'get', 'onsubmit="return check_form(this);"') . zen_hide_session_id(); ?>
<?php echo zen_draw_hidden_field('main_page', FILENAME_ADVANCED_SEARCH_RESULT); ?>

<h1 id="advSearchDefaultHeading"><?php echo HEADING_TITLE_1; ?></h1>

<?php if ($messageStack->size('search') > 0) echo $messageStack->output('search'); ?>
<div id="searchboxfield"><?php echo zen_draw_input_field('keyword', $sData['keyword'], 'placeholder="' . KEYWORD_FORMAT_STRING . '" autofocus aria-label="' . KEYWORD_FORMAT_STRING . '"'); ?>
<br><?php echo zen_draw_checkbox_field('search_in_description', '1', $sData['search_in_description'], 'id="search-in-description"'); ?>
<label class="checkboxLabel" for="search-in-description"><?php echo TEXT_SEARCH_IN_DESCRIPTION; ?></label></div>
<div class="buttonRow center"><?php echo zen_image_submit(BUTTON_IMAGE_SEARCH, BUTTON_SEARCH_ALT); ?></div>
</form>
</div>