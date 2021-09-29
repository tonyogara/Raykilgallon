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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'raykilgallon_wp' );

/** MySQL database username */
define( 'DB_USER', 'wpuser' );

/** MySQL database password */
define( 'DB_PASSWORD', 'R@toath69' );

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
define( 'AUTH_KEY',         'zHLe1lw(/>2F?THe2D+($5Li:i#_a_(3yi]`cz{I6[/_4D;]D@t%Ks~Tenf$mN[A' );
define( 'SECURE_AUTH_KEY',  'B-0_=zA#bj6*RmK0LoGlvYLnn{4$DVYP/yrW3:>}m@~7G$sKWs6QJ[Kf:@k}bFi]' );
define( 'LOGGED_IN_KEY',    '<tC2NK76M>Vd19gk2fn-V>2(|J=LB#/UZ8S}ntD0b*2/&H+I9kqO@Gw6xs{}mR8I' );
define( 'NONCE_KEY',        'l`<Imwi|j3q[~vTxMdqWmFH&rx:WnJkDWrn)Q:&WO%*:ICB=ZNRNY#~>1`KU=Y S' );
define( 'AUTH_SALT',        'Pk=R~C@SIRDfyk?JugJ];{x@?i;ug_})Z1%Cj9*=mP7ZOd=!,f<y6thhU0+$dA(a' );
define( 'SECURE_AUTH_SALT', 'ONQ+Aj<~(dO-@=f; _GQYo/J4BVYsZ6:Yn 9[n.+K)X/^D(7Gfmr-I,lDj./Yh+)' );
define( 'LOGGED_IN_SALT',   'tX[[qS~xFJf^15 ?~}kGrR&93 P~/4F0~47N~IV.&Ql4p]~K#nRWQTm`vZ0180IU' );
define( 'NONCE_SALT',       'caG>V>uIal^`InG.M~<]$;XFJW|-Pd*hZbu2btY(X131ayO?NtrFuSB>>:^~Y8mo' );

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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
