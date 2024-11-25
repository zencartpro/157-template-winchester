DROP TABLE IF EXISTS flexible_footer_menu;
DROP TABLE IF EXISTS flexible_footer_menu_content;

CREATE TABLE `flexible_footer_menu` (
  `page_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL DEFAULT 1,
  `page_title` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `page_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `col_header` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `col_image` varchar(254) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `col_html_text` text CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `col_sort_order` int(11) NOT NULL DEFAULT 0,
  `col_id` int(11) NOT NULL DEFAULT 0,
  `date_added` datetime NOT NULL DEFAULT '0001-01-01 00:00:00',
  `last_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `flexible_footer_menu`
--

INSERT INTO `flexible_footer_menu` (`page_id`, `language_id`, `page_title`, `page_url`, `col_header`, `col_image`, `col_html_text`, `status`, `col_sort_order`, `col_id`, `date_added`, `last_update`) VALUES
(1, 1, 'About us', 'index.php?main_page=about_us', '', '', '', 1, 11, 1, '2024-11-17 06:36:37', '2024-11-24 18:19:47'),
(2, 1, 'Featured', 'index.php?main_page=featured_products', '', '', '', 1, 23, 2, '2024-11-17 06:36:37', '2024-11-24 18:19:47'),
(3, 1, '', '', 'Shop Info', '', '', 1, 1, 1, '2024-11-17 06:36:37', '2024-11-24 17:57:27'),
(4, 1, 'Specials', 'index.php?main_page=specials', '', '', '', 1, 15, 1, '2024-11-17 06:36:37', '2024-11-24 18:18:17'),
(5, 1, 'New Products', 'index.php?main_page=products_new', '', '', '', 1, 14, 1, '2024-11-17 06:36:37', '2024-11-17 06:36:37'),
(6, 1, 'All Products', 'index.php?main_page=products_all', '', '', '', 1, 15, 1, '2024-11-17 06:36:37', '2024-11-24 18:19:39'),
(7, 1, '', '', 'Customer Service', '', '', 1, 2, 2, '2024-11-17 06:36:37', '2024-11-24 18:13:09'),
(9, 1, 'Gift Certificate FAQ', 'index.php?main_page=gv_faq', '', '', '', 1, 24, 2, '2024-11-17 06:36:37', '2024-11-24 18:19:57'),
(10, 1, 'Discount Coupons', 'index.php?main_page=discount_coupon', '', '', '', 1, 25, 2, '2024-11-17 06:36:37', '2024-11-24 18:20:05'),
(12, 1, 'Contact Us', 'index.php?main_page=contact_us', '', '', '', 1, 27, 2, '2024-11-17 06:36:37', '2024-11-24 18:20:23'),
(13, 1, 'Shipping and Returns', 'index.php?main_page=shippinginfo', '', '', '', 1, 12, 1, '2024-11-17 06:36:37', '2024-11-24 17:58:21'),
(15, 1, '', '', 'My Account', '', '', 1, 3, 3, '2024-11-17 06:36:37', '2024-11-24 18:20:38'),
(17, 1, 'Imprint', 'index.php?main_page=impressum', NULL, '', NULL, 1, 19, 1, '2024-11-17 06:36:37', '2024-11-24 18:14:34'),
(18, 1, 'Privacy', 'index.php?main_page=privacy', NULL, '', NULL, 1, 22, 2, '2024-11-17 06:36:37', '2024-11-17 06:36:37'),
(19, 1, 'Conditions', 'index.php?main_page=conditions', NULL, '', NULL, 1, 21, 2, '2024-11-17 06:36:37', '2024-11-24 18:17:35'),
(23, 1, 'Password forgotten', 'index.php?main_page=password_forgotten', NULL, '', NULL, 1, 33, 3, '2024-11-24 17:45:25', '2024-11-24 18:20:47'),
(25, 1, 'Order History', 'index.php?main_page=account_history', NULL, '', NULL, 1, 31, 3, '2024-11-24 17:50:28', '2024-11-24 18:20:55'),
(26, 1, 'Address Book', 'index.php?main_page=address_book', NULL, '', NULL, 1, 32, 3, '2024-11-24 17:56:29', '2024-11-24 18:21:05'),
(27, 1, 'Revocation Clause', 'index.php?main_page=widerrufsrecht', NULL, '', NULL, 1, 26, 2, '2024-11-24 18:01:13', '2024-11-24 18:20:14'),
(28, 1, 'Payment Options', 'index.php?main_page=zahlungsarten', NULL, '', NULL, 1, 13, 1, '2024-11-25 16:45:13', '2024-11-25 16:45:13');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `flexible_footer_menu_content`
--

CREATE TABLE `flexible_footer_menu_content` (
  `pc_id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL DEFAULT 0,
  `language_id` int(11) NOT NULL DEFAULT 1,
  `page_title` varchar(64) NOT NULL DEFAULT '',
  `col_header` varchar(64) NOT NULL DEFAULT '',
  `col_html_text` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `flexible_footer_menu_content`
--

INSERT INTO `flexible_footer_menu_content` (`pc_id`, `page_id`, `language_id`, `page_title`, `col_header`, `col_html_text`) VALUES
(1, 1, 43, 'Über uns', '', ''),
(2, 1, 1, 'About Us', '', ''),
(3, 2, 43, 'Wir empfehlen', '', ''),
(4, 2, 1, 'We recommend', '', ''),
(5, 3, 43, '', 'Shop Info', ''),
(6, 3, 1, '', 'Shop Info', ''),
(7, 4, 43, 'Sonderangebote', '', ''),
(8, 4, 1, 'Specials', '', ''),
(9, 5, 43, 'Neu eingetroffen', '', ''),
(10, 5, 1, 'New Products', '', ''),
(11, 6, 43, 'Alle Artikel', '', ''),
(12, 6, 1, 'All Products', '', ''),
(13, 7, 43, '', 'Kundenservice', ''),
(14, 7, 1, '', 'Customer Service', ''),
(15, 9, 43, 'Geschenkgutschein FAQ', '', ''),
(16, 9, 1, 'Gift Certificate FAQ', '', ''),
(17, 10, 43, 'Aktionskupons', '', ''),
(18, 10, 1, 'Discount Coupons', '', ''),
(19, 12, 43, 'Kontakt', '', ''),
(20, 12, 1, 'Contact Us', '', ''),
(21, 13, 43, 'Preise und Versand', '', ''),
(22, 13, 1, 'Shippinginfo', '', ''),
(23, 15, 43, '', 'Mein Konto', ''),
(24, 15, 1, '', 'My Account', ''),
(25, 17, 43, 'Impressum', '', ''),
(26, 17, 1, 'Imprint', '', ''),
(27, 18, 43, 'Datenschutz', '', ''),
(28, 18, 1, 'Privacy Policy', '', ''),
(29, 19, 43, 'AGB', '', ''),
(30, 19, 1, 'Terms & Conditions', '', ''),
(31, 23, 43, 'Passwort vergessen', '', ''),
(32, 23, 1, 'Passwort forgotten', '', ''),
(33, 25, 43, 'Bestellverlauf', '', ''),
(34, 25, 1, 'Order History', '', ''),
(35, 26, 43, 'Adressbuch', '', ''),
(36, 26, 1, 'Address Book', '', ''),
(37, 27, 43, 'Widerrufsrecht', '', ''),
(38, 27, 1, 'Revocation Clause', '', ''),
(39, 28, 43, 'Zahlungsarten', '', ''),
(40, 28, 1, 'Terms & Conditions', '', '');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `flexible_footer_menu`
--
ALTER TABLE `flexible_footer_menu`
  ADD PRIMARY KEY (`page_id`);

--
-- Indizes für die Tabelle `flexible_footer_menu_content`
--
ALTER TABLE `flexible_footer_menu_content`
  ADD PRIMARY KEY (`pc_id`),
  ADD KEY `idx_flexible_footer_content` (`page_id`,`language_id`);