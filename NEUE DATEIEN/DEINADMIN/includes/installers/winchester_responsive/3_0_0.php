<?php
// add some new admin switches in Winchester configuration menu
$db->Execute(" SELECT @gid:=configuration_group_id
FROM ".TABLE_CONFIGURATION_GROUP."
WHERE configuration_group_title= 'Winchester Responsive'
LIMIT 1;");
$db->Execute("INSERT IGNORE INTO " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) VALUES
	    ('Winchester - To Top Status', 'WIN_TOTOP_STATUS', 'true', 'Do you want to show a To Top Button on the right corner when scrolling?', @gid, 5, now(), now(), '', 'zen_cfg_select_option(array(\'true\', \'false\'),'),
	    ('Winchester - Slideout Box Status', 'WIN_SLIDEOUTBOX_STATUS', 'true', 'Do you want to show permanently the slideout box on the left corner?', @gid, 6, now(), now(), '', 'zen_cfg_select_option(array(\'true\', \'false\'),'),
	    ('Winchester - Top Notice Status', 'WIN_TOPNOTICE_STATUS', 'true', 'Do you want to show permanently a promotional notice section on the top of the page?', @gid, 7, now(), now(), '', 'zen_cfg_select_option(array(\'true\', \'false\'),'),
	    ('Winchester - Currency Dropdown in Header', 'WIN_HEADER_CURRENCY_STATUS', 'false', 'Do you want to show permanently a currency dropdown on the right side od header?', @gid, 8, now(), now(), '', 'zen_cfg_select_option(array(\'true\', \'false\'),'),
	    ('Winchester - Language Selection in Header', 'WIN_HEADER_LANGUAGE_STATUS', 'false', 'Do you want to show permanently a language switch on the right side od header?', @gid, 8, now(), now(), '', 'zen_cfg_select_option(array(\'true\', \'false\'),'),
	    ('Winchester - Payment Options Icons in Footer', 'WIN_FOOTER_PAYMENT_STATUS', 'true', 'Do you want to show permanently a graphic with your payment options in the footer?', @gid, 8, now(), now(), '', 'zen_cfg_select_option(array(\'true\', \'false\'),'),
	    ('Winchestre - Social Media Icons in Footer', 'WIN_FOOTER_SOCIALMEDIA_STATUS', 'true', 'Do you want to show permanently your social media icons in the footer?', @gid, 8, now(), now(), '', 'zen_cfg_select_option(array(\'true\', \'false\'),'),
	    ('Footer Navigation Status', 'WIN_FOOTERNAVI_STATUS', 'true', 'Do you want to show additional links in the last footer line?', @gid, 9, now(), now(), '', 'zen_cfg_select_option(array(\'true\', \'false\'),');");
$db->Execute("REPLACE INTO " . TABLE_CONFIGURATION_LANGUAGE . " (configuration_title, configuration_key, configuration_description, configuration_language_id) VALUES
('Winchester - To Top aktivieren', 'WIN_TOTOP_STATUS', 'Wollen Sie beim Scrollen rechts unten einen To Top Button anzeigen?', 43),
('Winchester - Slideout Box aktivieren', 'WIN_SLIDEOUTBOX_STATUS', 'Wollen Sie oben links immer die Slideout Box anzeigen?', 43),
('Winchester - Hinweisbereich in der Kopfzeile aktivieren', 'WIN_TOPNOTICE_STATUS', 'Wollen Sie in der Kopfzeile permanent einen Hinweisbereich für aktuelle Aktionen anzeigen?', 43),
('Winchester - Währungsdropdown im Header aktivieren', 'WIN_HEADER_CURRENCY_STATUS', 'Wollen Sie im Header oben rechts permanent einen Währungsumschalter anzeigen?', 43),
('Winchester - Sprachauswahl im Header aktivieren', 'WIN_HEADER_LANGUAGE_STATUS', 'Wollen Sie im Header oben rechts permanent einen Umschalter für die im Shop aktiven Sprachen anzeigen?', 43),
('Winchester - Zahlungsarten Icons im Footer aktivieren', 'WIN_FOOTER_PAYMENT_STATUS', 'Wollen Sie im Footer unten links permanent Icons Ihrer Zahlungsarten anzeigen?', 43),
('Winchester - Social Media Icons im Footer aktivieren', 'WIN_FOOTER_SOCIALMEDIA_STATUS', 'Wollen Sie im Footer unten rechts permanent Ihre Social Media Icons anzeigen?', 43),
('Winchester - Links in letzter Fußzeile aktivieren', 'WIN_FOOTERNAVI_STATUS', 'Wollen Sie die zusätzlichen Links (z.B. Site Map Datenschutz AGB Impressum) in der letzten Fußzeile anzeigen?', 43);");
// set version to 3.0.0
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = '3.0.0' WHERE configuration_key = 'WINCHESTER_RESPONSIVE_VERSION' LIMIT 1;");