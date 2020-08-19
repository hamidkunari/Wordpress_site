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
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define('AUTH_KEY',         'O;.; Ge@p| gl>r@yx{Cbf(-o(.u7M0^>hAOnCA?DH,yF+o>IrIlv>m8@Xg7$frB');
define('SECURE_AUTH_KEY',  'krS{W~eYPC{e^[|v~SJw)R(t(::vq:?lqNOAn2QP+u%-qFlw!N~$4@E6^0=ff.}d');
define('LOGGED_IN_KEY',    '0-)>a}h3}-2bWsQZ&~lKY2_s2Hp!G X{(+90GQ=kLLCF(rDZid+`Ae-YZ[&0 Q8v');
define('NONCE_KEY',        'n6bm^HMSD]S%f+k!j?fr*g?rg-j2:h+&yoH.&4HU%UWkkWuu|[qF;Mh}9N~u4qYY');
define('AUTH_SALT',        'H&iNnu%l?TYMlIMg[Vz|F<9OaJQC|Rt+C3md||Cxul64`Oko?Ul&gWJ*^jL,I#1o');
define('SECURE_AUTH_SALT', 'TrGz.ukaCXPVT$z&^G/NI/}pjfR#)qY9;sjH>-&n6-a3hj1}8|$UBxYP5vFPSX|.');
define('LOGGED_IN_SALT',   'jRxeacyBf91Dh;|JcwdAL:&g^:Qd=$VV_/|EnPxzs=!n1g[e>XvBSa.7Wz95YhLD');
define('NONCE_SALT',       'H}<;h^1|FU||+0kQ|T=|pY|Li)Old3I|{gXqsTJ$/OE(zo;kvzm53LB1zO;Co|1F');

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
