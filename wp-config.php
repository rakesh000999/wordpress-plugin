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
define( 'DB_NAME', 'wordpress_database' );

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
define( 'AUTH_KEY',         'ZYh_Q>%BV5 LIF9Y)<!I7J.Xb4*?EZAO[VfMCFI.6l2rF^N}6ZU(Oc?8cEJ(N.oc' );
define( 'SECURE_AUTH_KEY',  '5LYOYU@&!`QvCNjfp7c$4;,kOR)=7gu*P(k6=Km@i-8bQpDNc_D l{S$j!BM9%Dv' );
define( 'LOGGED_IN_KEY',    '?`Qq]YYO{mEG>.^WtbfYhnkIQw+J{nQ;;C%PM/~**LKOG>Tm8+n~GR,B&<AvVqWF' );
define( 'NONCE_KEY',        '7Sl^C%<=jSCA=u4q-[4HLN66ur4i6%QcbEvp vl/^#GE#2bW%]jUsbF7{BV*C=!(' );
define( 'AUTH_SALT',        'h8cw0)>Ww_[;L >?7yAiEn~[61%r/1OeoA ox9zY#2Zz_7ciP>D|Ed;,}idYs]Bi' );
define( 'SECURE_AUTH_SALT', 'sBx,m7qPu,b//+AWhu4z&&}o^>J+3B};D(:X?0q[IY.8Dqss4~?%M|aQC&wV&c-%' );
define( 'LOGGED_IN_SALT',   'Z.e^J5KcSDN|ixiXXu4?Qd=N7w+8>S|X!UE>l(4W5vMYHuQAu+XWlsNHf.,LFocp' );
define( 'NONCE_SALT',       '2}a8uz?.lARTVu$!Ar6~&H$,VFcI386Tj~Ecr)$#P%nQu]gZ.f>Pc]9y&c<r,>|Z' );

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
