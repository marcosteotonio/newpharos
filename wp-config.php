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
define( 'DB_NAME', 'imagin09_wordpress' );

/** MySQL database username */
define( 'DB_USER', 'imagin09_wp' );

/** MySQL database password */
define( 'DB_PASSWORD', 'sereia31' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '9p%lUfGPM[@o@s7vZxNI/LN@w&pbs}~Gn)3e~1~-oNVth:`j)rf8zesi,Zyz>V~h' );
define( 'SECURE_AUTH_KEY',  '0*x>cG(F;||9rVdjDq;m$!cv`CrnKJ=}QyX%/ZNXKi(EM74VrLwuWc.%0[JC2QMT' );
define( 'LOGGED_IN_KEY',    '_];,jiWq6+wy8EP<ARvu[NU_G&k2t,r<b%Oc%EC$I0djVujfhl2Yo>N`%D3{rfd?' );
define( 'NONCE_KEY',        '4CLJkQR,s*?e1^6;/@CnqLP^bOOvNg`%P}k(tg7]whV>r4g 0.0F9=ch?f )9NI4' );
define( 'AUTH_SALT',        ',u.aJU/xhve~JwnHmm>G*$j !Y}}KVh]+anX>S*C?~}}13P@mOmKad$x1rE0NGwj' );
define( 'SECURE_AUTH_SALT', 'Cf!5`H0f~}&1<.Rf~`J#VER~+K6e-8<Fka,@MpqerNAqjXfOQ3ndtTJ@(8XBWo>:' );
define( 'LOGGED_IN_SALT',   'ol6Z8jLxp*0Nx.dB`=ek%t=*ID]`!}Mgv>XkEt*q|hKAfjR,rb`z{P~WPZV2_)P:' );
define( 'NONCE_SALT',       'i3W8&BGAEm)v>t&4l3YMgN+w`e<s@6PMv3OqDkyh9b1msY|{fHc?.%611!3|dZ_-' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
