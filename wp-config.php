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
define('DB_NAME', 'ukrblog');

/** Имя пользователя MySQL */
define('DB_USER', 'root');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', 'awdasd');

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
define('AUTH_KEY',         'u_usbsZWv=3P*>y*MT9Z^Hx4nE4P{tM>R`Ba+kv|Vf<_$<@JGODfAW5];HARJxia');
define('SECURE_AUTH_KEY',  ',R>4 1OJw^J~uxBEN1hPuy3Lpk2Slh3Wy5W%h>m@n1lKYW!Rp@O+%z0KZg%Sq0w!');
define('LOGGED_IN_KEY',    'ST?]ichUs+^;19.tq7,N=d-]X#cEVO-L|E(6@()dlT=E_iSgN{$oMR#Qv/W1Jq7#');
define('NONCE_KEY',        '|gb;lx6o8]n{CwNu?8b[9}`MTi*R@f%ibJIumCUj$iOG1[Xb95a(G(R1J7w6nfF,');
define('AUTH_SALT',        ':mQw68l197!}!8aO]^P-N?X1X<:2**@X;76S5UptF{>8/#^~eQoNCXsv@$-v7(~#');
define('SECURE_AUTH_SALT', 'G=b4>%H+jCFoZe7a421ra1/}Qu^-$|QMU|vuZf!C&%zm99@h{5BG;_BRJa2hc6^*');
define('LOGGED_IN_SALT',   '~1ReX Avz50IB51rfg8[m:9T#I)w;+Z.6!.!)wBdHfkL2@{ftOn+N ,HQjE=;26u');
define('NONCE_SALT',       'Z34MXuu&v9$<rkoNsioY:?hMwt.-30*wZb/$#R9* azJSp[|vEXxm^,aT,>>7{JS');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'ua_';

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

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
