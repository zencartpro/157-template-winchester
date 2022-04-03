<?php
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = '1.7.1' WHERE configuration_key = 'WINCHESTER_RESPONSIVE_VERSION' LIMIT 1;");