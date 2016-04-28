<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'salarywinners');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'e`;EKi$!Oi?sI0ekRm[4C-1{Q?.ERy=ZJfM_)6.w7xx)29xNJSN!XV/jna(KbQE9');
define('SECURE_AUTH_KEY',  's/E5sMNF8].Eh#gA%[>6;x{]w@ RSfjtxqdR9e#eCtrK`~{8d:j38}-I-V|Y+Xv ');
define('LOGGED_IN_KEY',    '7z@-J:&c!?&m0!jR4dV:|=|9^.A!F;o3E!g92sy@^v;zi u>OUEc-S zrLRds;#T');
define('NONCE_KEY',        ' i$H}>;RJ_`z# 7D=B<.J:Si.@<W-!aU>|^;$ZAinh.cx9T0mV?(g~!7+ 4}%2C,');
define('AUTH_SALT',        'zcrwH8PGSwBP~On]4>Rw5MjE#:V>H&63I%WRUk=_0#/>[:]!xSo)g0(DVl7T)93 ');
define('SECURE_AUTH_SALT', '8k<m*[}}l&}+i.qAzr9 A/<sv/*=5bt(?+al$;[bA91gklP(Ve,RoNMl#xQM6jrr');
define('LOGGED_IN_SALT',   'y@?2XxMK5ML;Hy)IPu8>SdyWA;TMtSvannbrZk.?/X#z@ 3g2LH[jT++%l_OzneZ');
define('NONCE_SALT',       'e)_j`/hXrV,+<R:=+FfE`vh@cxaR#.n(G+*f7T;~A+{OK35$P#[BwVh<?:gB-X)a');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'sw_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
