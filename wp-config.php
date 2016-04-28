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
define('DB_PASSWORD', 'default');

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
define('AUTH_KEY',         '6;9Y(u#jCMt*1`+V,C+<pX:j;*b1D?+=^y=ht7=6SfV4eNQKtwGO<~zPR;7E!fr_');
define('SECURE_AUTH_KEY',  'iDqxqx]R72>e`2HPu%3up4=WyO>|MC9Qlt=5tCQ2Ri1|Pm&vHGjw,3sC0gnyHf:R');
define('LOGGED_IN_KEY',    'Mj)U}IVc4/?]6E.(<yUdbR4Fdp.mI7guZ?(;/taZH<SC{(u}>}$K_l5}+qI>$/I=');
define('NONCE_KEY',        ':>]?n+GyWLH]hnJXB:m#*1&f66KS[ED34 ?lpU=OmOaS#?Nnqh$6M0dm;mi+^w;e');
define('AUTH_SALT',        ':sDWomB/MqCl:nmM8u2%@S R/P`2a[:rVxt(YI9IZJ%^w]GN?$!=F6kWqNZn$-~<');
define('SECURE_AUTH_SALT', 'cNKf_@Y2UM+(`_RSe->@^8{F]DNQ~:C4tM7T^^JCqzMX4Ic:I=G.nu:q7.^K>/I]');
define('LOGGED_IN_SALT',   'P52zqdk^[W41v=mZ)sQex$-fiROC@nk.(#G<N$wdRCT(SH|u9m,7gBxW5zI yP+/');
define('NONCE_SALT',       '+qnZD*`Vye:SLK:a6 sd#?NRLKu%Cxz[Kpl7DZl,4gtK#sr! FA//eN4KF;Yq,~c');

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
