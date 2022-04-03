<?php
/**
 * Side Box Template
 *
 * @package templateSystem
 * @copyright Copyright 2003-2022 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_more_information.php for Winchester 2022-04-02 15:49:16Z webchills $
 */
  $content = '';
  $content .= '<div id="' . str_replace('_', '-', $box_id . 'Content') . '" class="sideBoxContent">' . "\n" ;
  $content .=  "\n" . '<ul style="margin: 0; padding: 0; list-style-type: none;">' . "\n" ;
  for ($i=0, $j=sizeof($more_information); $i<$j; $i++) {
    $content .= '<li><div class="betterMoreinformation">' . $more_information[$i] . '</div></li>' . "\n" ;
  }

  $content .= '</ul>' . "\n" ;
  $content .= '</div>';