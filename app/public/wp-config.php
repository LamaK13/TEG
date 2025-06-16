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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          'n#gUd^<3XFz(&@-*.?8^E6bEtBWBGP#</2AX%a5mG06;TkiANB0wg `C1L#HE&->' );
define( 'SECURE_AUTH_KEY',   'H>(Jptn2%M`i<Lb0GFLF7~?X%F)^y}qDY!I^!/>$IxC:$eSMv/8xKEF|8gdJ#H-`' );
define( 'LOGGED_IN_KEY',     'YC|13J>2k3c^cE<FE]eJWG,Axw{#r4`$N^19.w.6Mqsa7cj+GXiB3;c&Q]9Gp7)C' );
define( 'NONCE_KEY',         'Ep5~>mI{[mBo^4ilf&S6[~ `~M| *1;?q&3}4:ymS`mU9,6.c0K/}k/cmuwvg$SJ' );
define( 'AUTH_SALT',         '(O;+1aM<VuNyD@nHM(,SMiIQ;17CE,TdN[Qk;$b9G=!Dw .riG?HV/wm|_WIRh#v' );
define( 'SECURE_AUTH_SALT',  'WLo&rOI>Jz,C?kQ4t9mR<xCJ/MSpX_K%CXv.x:8!)%yUim7tu0c?I5_gq88qKX%T' );
define( 'LOGGED_IN_SALT',    'kQUw8G3J tUEwTUD>nMmDEwYbog+t(%{/sUrsbqWmT2PLEc^U)ip:UGm[qJ]*tE]' );
define( 'NONCE_SALT',        'Rh:JU6>;$|Kl~)j$Wa(x-r[mD;gW30+u5973g dyGoUq4([(]X:XYD#|AmL[y,]G' );
define( 'WP_CACHE_KEY_SALT', 't b aq`AY{j8xyS):7yaQ{vRmLP0Lq{Y04 k9fgg!O}I!wXe|r+L-zm8*{}u=VUf' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
