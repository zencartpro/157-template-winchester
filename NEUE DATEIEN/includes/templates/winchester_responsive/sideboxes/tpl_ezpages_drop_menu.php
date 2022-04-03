<?php
/**
 * Side Box Template
 *
 * @package templateSystem
 * @copyright Copyright 2003-2022 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_ezpages_drop_menu.php 2022-04-02 15:56:41Z webchills $
 */
  $content = "";$content .="\n";for ($i=1, $n=sizeof($var_linksList); $i<=$n; $i++) {$content .= '          <li><i class="icon-circle-arrow-right"></i><a href="' . $var_linksList[$i]['link'] . '">' . $var_linksList[$i]['name'] . '</a></li>' . "\n" ;}