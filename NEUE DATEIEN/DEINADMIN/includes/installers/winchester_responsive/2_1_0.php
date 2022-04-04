<?php
// Column Layout Grid - remove old unused settings
$db->Execute("DELETE FROM " . TABLE_CONFIGURATION . " where configuration_key IN ('PRODUCT_LISTING_LAYOUT_STYLE_CUSTOMER,PRODUCT_LISTING_GRID_SORT');");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = '2.1.0' WHERE configuration_key = 'WINCHESTER_RESPONSIVE_VERSION' LIMIT 1;");