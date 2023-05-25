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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'pro_bd' );

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
define( 'AUTH_KEY',         '[bGgs?VCLfTu!alpesX]6n7L7]SCqB5a OZ~4kdh@*x!r24~}03S#U7Rr?zO&a$)' );
define( 'SECURE_AUTH_KEY',  '#.Pkjopi}Jg`!3mehj{|@jlH/)=q?VeJfmr.u;*<l|Vavpf~xC*/8vo|!T*#ubh8' );
define( 'LOGGED_IN_KEY',    'Z7>%AZJLveVGH|  :nn|aU6bK%^0amfGo)KNaEdTxs&::^42;&+=}OH+X^0[8H75' );
define( 'NONCE_KEY',        '{}CKD`jzqZ+NoavSed,0Bi>Hb9=D&E$Beufkocg!7usAV=ul)J:No39V.K(-#pxW' );
define( 'AUTH_SALT',        'oDuy^-dDPOav$cJ?s|R9*O!-|jR/ABEJFWWcCfu%hQgILMJ|;GB<5rE{+0F<c/dN' );
define( 'SECURE_AUTH_SALT', 'toYWyGt93l{CY1B7u;IF`Faf#$Z|)U?j$q`i@+%U8f:^vB&Rp 32S4VVE1O<&E*v' );
define( 'LOGGED_IN_SALT',   'wq#x5k]1UvQJEKC_1r.Ssl>^m7lY$,BzL>yj|TdUJ`@XAgi6QCzW,8qN08Rv=gg@' );
define( 'NONCE_SALT',       'Qt>]X^NR+VXk:#SIl6[osCd&U8N#3;OE{3bx*?Jr~AukSH_>4Zh}K0^f+*deuuSx' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
