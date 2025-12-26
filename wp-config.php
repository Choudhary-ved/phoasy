<?php
/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache



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
/** The name of the database for WordPress */
define( 'DB_NAME', 'phoasy' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' ); // Replace with actual root password

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
define( 'AUTH_KEY',          '$reY[Mz.>@+m54}*kvXD<?|%}YMd,N=XSsCESa@Zd(qLl1ISKd|fZj7$ir*5Su(9' );
define( 'SECURE_AUTH_KEY',   'ykw~,+cBo@1u4[,Y]`$qPYyaOc^-Lge2HVJ`O${e^Dtf,XD|;e:?<<0tLJ={]:EA' );
define( 'LOGGED_IN_KEY',     'ml{!8Q^no~(J)rXk~rfx:1kAteei!P&Pz<mEt;V)`9H~)!^kRX@gj$i`prB6gbIZ' );
define( 'NONCE_KEY',         ':4x`VJPgt,0~`e1<&cESt }dgYrw#)8=Y`N4TB~7wtO$:.:lW4,&zpI^d=MOU1]1' );
define( 'AUTH_SALT',         'uE)AU1S6Gl?q/pe67$4rIUw0z6<UU%mN<D]u>vrAR<<p34%jvQx=iX?1yN,,fX(b' );
define( 'SECURE_AUTH_SALT',  'fUUdO[>g1fJz!i({})B0-zUF>,!T|KUMmkCXx}e)%D1m{Nf1x[QUs-(~ILJ FV:B' );
define( 'LOGGED_IN_SALT',    'r*->;-}6G`[[w|#nb-eaJRrA5|#;/c6Soi#=^*H@yMV#F*yu2VT-{fj&/?NzCe1}' );
define( 'NONCE_SALT',        'B+!&(i{[=L|cA1%VM.yv!wq4Bsf)-+Oi+4y8KtgQDI;N/!IjX$4|Bt1FBw``}Hk8' );
define( 'WP_CACHE_KEY_SALT', 'E8dZ]M<QbNp`b l_UY9$9;ovheN4>+nm[zhhTyim%U-jO]AjZYBf.qG`]La&s7G%' );


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

define( 'FS_METHOD', 'direct' );
define( 'COOKIEHASH', '31a99b9b137dd7f54966d5a0d32371c7' );
define( 'WP_AUTO_UPDATE_CORE', false );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
