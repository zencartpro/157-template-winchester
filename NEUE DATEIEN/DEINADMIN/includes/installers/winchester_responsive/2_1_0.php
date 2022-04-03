<?php
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = '2.1.0' WHERE configuration_key = 'WINCHESTER_RESPONSIVE_VERSION' LIMIT 1;");