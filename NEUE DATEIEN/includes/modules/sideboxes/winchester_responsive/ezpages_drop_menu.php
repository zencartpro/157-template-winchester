<?php
/**
 * ezpages sidebox - used to display links to EZ-Pages content
 *
 * @package templateSystem
 * @copyright Copyright 2003-2019 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: ezpages_drop_menu.php 2019-08-20 15:27:03Z webchills $
 */
 $ezpages_header_status = $db->Execute('select layout_box_name from ' . TABLE_LAYOUT_BOXES . " where layout_box_status_single = 1 and layout_template ='" . $template_dir . "' and layout_box_name='ezpages_drop_menu.php'");

  if ($ezpages_header_status->RecordCount() != 0) {
    $show_ezpages_header= true;
  }
  
  if ($show_ezpages_header == true) {


    if (isset($var_linksList)) {
      unset($var_linksList);
    }    
    
    $page_query = $db->Execute("SELECT e.*, ec.*
                                FROM " . TABLE_EZPAGES . " e,
                                     " . TABLE_EZPAGES_CONTENT . " ec
                                WHERE e.pages_id = ec.pages_id
                                AND ec.languages_id = " . (int)$_SESSION['languages_id'] . "
                                AND e.status_header = 1                                
                                ORDER BY e.header_sort_order, ec.pages_title");
    
    if ($page_query->RecordCount()>0) {
      $title =  BOX_HEADING_EZPAGES;
      $box_id =  'ezpages';
      $rows = 0;
      while (!$page_query->EOF) {
        $rows++;
        $page_query_list_sidebox[$rows]['id'] = $page_query->fields['pages_id'];
        $page_query_list_sidebox[$rows]['name'] = $page_query->fields['pages_title'];
        $page_query_list_sidebox[$rows]['altURL']  = '';
        switch (true) {
          // external link new window or same window
          case ($page_query->fields['alt_url_external'] != ''):
          $page_query_list_sidebox[$rows]['altURL']  = $page_query->fields['alt_url_external'];
          break;
/*
          // internal link new window
          case ($page_query->fields['alt_url'] != '' and $page_query->fields['page_open_new_window'] == '1'):
          $page_query_list_sidebox[$rows]['altURL']  = (substr($page_query->fields['alt_url'],0,4) == 'http') ?
          $page_query->fields['alt_url'] :
          ($page_query->fields['alt_url']=='' ? '' : zen_href_link($page_query->fields['alt_url'], 'target="_blank', ($page_query->fields['page_is_ssl']=='0' ? 'NONSSL' : 'SSL'), true, true, true));
          break;
          // internal link same window
          case ($page_query->fields['alt_url'] != '' and $page_query->fields['page_open_new_window'] == '0'):
          $page_query_list_sidebox[$rows]['altURL']  = (substr($page_query->fields['alt_url'],0,4) == 'http') ?
          $page_query->fields['alt_url'] :
          ($page_query->fields['alt_url']=='' ? '' : zen_href_link($page_query->fields['alt_url'], '', ($page_query->fields['page_is_ssl']=='0' ? 'NONSSL' : 'SSL'), true, true, true));
          break;
        }
*/
          // internal link new window or same window
          case ($page_query->fields['alt_url'] != ''):
          $page_query_list_sidebox[$rows]['altURL']  = (substr($page_query->fields['alt_url'],0,4) == 'http') ?
          $page_query->fields['alt_url'] :
          ($page_query->fields['alt_url']=='' ? '' : zen_href_link($page_query->fields['alt_url'], '', ($page_query->fields['page_is_ssl']=='0' ? 'NONSSL' : 'SSL'), true, true, true));
          break;
}

        // if altURL is specified, use it; otherwise, use EZPage ID to create link
        $page_query_list_sidebox[$rows]['link'] = ($page_query_list_sidebox[$rows]['altURL'] =='') ?
        zen_href_link(FILENAME_EZPAGES, 'id=' . $page_query->fields['pages_id'] . '&chapter=' . $page_query->fields['toc_chapter'], ($page_query->fields['page_is_ssl']=='0' ? 'NONSSL' : 'SSL')) :
        $page_query_list_sidebox[$rows]['altURL'];
        $page_query_list_sidebox[$rows]['link'] .= ($page_query->fields['page_open_new_window'] == '1' ? '" target="_blank' : '');
        $page_query->MoveNext();
      }

      $title_link = false;

      $var_linksList = $page_query_list_sidebox;

      require($template->get_template_dir('tpl_ezpages_drop_menu.php',DIR_WS_TEMPLATE, $current_page_base,'sideboxes'). '/tpl_ezpages_drop_menu.php');
      require($template->get_template_dir('tpl_box_header.php',DIR_WS_TEMPLATE, $current_page_base,'common'). '/tpl_box_header.php');
    }
  } // test for display