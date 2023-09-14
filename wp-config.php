<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'sven-website-2023' );

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
define( 'AUTH_KEY',         '~S^2juoP-,<`/2ENh: %h:*X1!#w&a7[kkI#,i}f/62@J(=Qi=uzS`8Gm(.c_)_y' );
define( 'SECURE_AUTH_KEY',  'p#}CW:+V0M?KOiP`lqEQo{}h#V2Hz|o:T/xrWXG; sS64vRjYtZ)X/g.W-E&yC7V' );
define( 'LOGGED_IN_KEY',    'cGM=5tH`YB:3u<PN=2#Zh0Lxa3]O0zz<%9J^>{`;&_AL(,f>z@k|w]AHzA!j6BL|' );
define( 'NONCE_KEY',        'GoA4mtQ~Evb=JU7dGrE}IP2y1@#aakccN(k<iE}Uyd*@3o@>FBmJh}x0OPe@)1<I' );
define( 'AUTH_SALT',        'B5%vtc/)E =ez#I]JBuM/YW#sA#n0g-}8o8bQ~dhehb!Y2~57L,.t4GX]9cpSI2%' );
define( 'SECURE_AUTH_SALT', 'lu1b0QY~:E/h)4x&c99z13Q2KgjRZ YD@h8&jp0b5TXO#;w_b c+CxA0.)d+M#Q!' );
define( 'LOGGED_IN_SALT',   'Od<MSR:$%w>MTFVnhQ`JdBa7&_GGo56c&xkYx7}ymQ=$4HWX5=BEg5*VKwWGN41r' );
define( 'NONCE_SALT',       'e_+|Ykkg6wp5LkDJv;/u_VR$6bJeN(@$1Z<o&T9.v=%Y#=Q:<oV@_-MqNnEh]3TQ' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
