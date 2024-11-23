<?php
/**
 * @package languageDefines
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: rl.vat_info.php for Winchester 2024-11-23 07:45:57Z webchills $
 */
 
define('VAT_SHOW_TEXT_VERSANDKOSTENFREI','<br><span class="taxAddon">incl. %s VAT</span>');

if(DISPLAY_PRICE_WITH_TAX=='true')
define('VAT_SHOW_TEXT','<br><span class="taxAddon">incl. %s VAT plus <a href="' . zen_href_link(FILENAME_SHIPPING) . '">shipping and handling</a></span>');
else
define('VAT_SHOW_TEXT','<br><span class="taxAddon">plus %s VAT plus <a href="' . zen_href_link(FILENAME_SHIPPING) . '">shipping and handling</a></span>');