<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress_db' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '~m|h @E~k8$8WhA!4+L!KOJ?VDra?&M!YZEH/wvO[YpESZTw,40m7%3kXJ3sS}GG' );
define( 'SECURE_AUTH_KEY',  '~-MkPWcJC?dk[F@]ui(O,T #VgH+HB-0SMQnzv%vA^F9%)pxp  yzS_qFl8Q?+H-' );
define( 'LOGGED_IN_KEY',    'Vv>AQ$0Ievsy*$aEb3;T)T]Rc8^EFJ7N>I/;_Q!!=1CF5l~A$+C0H.k20MMG&e4k' );
define( 'NONCE_KEY',        '!r {Q<Mtq>Z5<]8LSZ)M>dQm3+Dh$i`|R&j5@3S4HG3+Z`>?X[GHtMWIJ1IAxTYU' );
define( 'AUTH_SALT',        'Wm~xj[53)gK>w])Do7~agvOCD,p,mDLFynwd3$q87Y)_u5  n4$gd^lfl3T?HiFY' );
define( 'SECURE_AUTH_SALT', ';mJ>^KUfPm_llxZ@W`EQB~/U4Vnu$:]GM(an4zaI1)2K *JZToEq[XF{>8s}(4KT' );
define( 'LOGGED_IN_SALT',   '<VVZ-T)4mIHJ]?m)U%A#h SM#TOs=vXNm87?U04*kwGm!Rqv*)D4;<?+45cL8>)1' );
define( 'NONCE_SALT',       'G%25!&44MC1q7+TU6eLjT/hQE(HIJ@U6QDy1%rAp2*$J{?]B#R;p*v;8T+Ek41O]' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
