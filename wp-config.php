<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'user118216_kg');

/** Имя пользователя MySQL */
define('DB_USER', 'user118216_kg');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', '9I0y2H9y');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'iaM8:-q0NH[gZ,b9KTVlRD2V5CiTZ!<sO;>dNz^|X[51h/k~KgaX,d&WhYc<z@}F');
define('SECURE_AUTH_KEY',  'Q[}]Qp;7`n9.Qc7Il/gz9]{fF}}t,S:u(!YtUDcyEd:KRaYWf60#y[ic{mo9Xvs&');
define('LOGGED_IN_KEY',    'LwpCvOVwNN+f%lAr`im|[$Br1L7Ru7%BtlluBhgDKf0qGfV2Pu9IWhnGvnd[6{CT');
define('NONCE_KEY',        'a~R)W=}S2&IjoB@rtc>|Zf3!9W+]eRe2Jj?aA.B^{O!S/!u.m.{W4+S$5>t!M<Bw');
define('AUTH_SALT',        'Pu&@vSL*V6I:)ov9mT@K>+Ew;k^rESBog+:MfAcm&le9~1bCNy85qe/A +O}5.ai');
define('SECURE_AUTH_SALT', ')#qe;<E,86pIGhljF%<5y3=SWn)D#K&,n37S-CaI]ruCJyesG30U& uAQQ,7ApBu');
define('LOGGED_IN_SALT',   '(`UG *sXSc|2Z7SG=g)b-QG3gkH7Kl|F)P2;P^>TDwxnB :*.e%<V+Z2tu9qV4#w');
define('NONCE_SALT',       'C5+[UmQK#t0zu#jM|28~1r;M#;u4Jw|^^^42l|>&.(D`^fZU43o|-2EC{gFeqB19');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);
define( 'WPCF7_AUTOP', false );

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
