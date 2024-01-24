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
define( 'DB_NAME', 'test-elementor' );

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
define( 'AUTH_KEY',         '4B@UE+Bi:MffP VbYb)C_*#S$ 8M5v]01--cof9S}/*O8E.L^ovnJ_?9S5/HKWv<' );
define( 'SECURE_AUTH_KEY',  'YSieY$fDzjRAkPLPI}lR#WejA4-og/21GG6&!,U4l~V]*Y;cTkM1R)j8-[QBIzk>' );
define( 'LOGGED_IN_KEY',    'Y.l G_G #~]uHrT(2+L;5!AoFY0bN#-8G(>@rixpl=t6/K0X]}NLL*BZ2/frm$zC' );
define( 'NONCE_KEY',        'FH^~/Jk;18oi,99cKogHBfC*rsp%UbCq=X:`j.8`qCMm!9v[}<AIaNCbBZsH/W+8' );
define( 'AUTH_SALT',        'y97IjKcsQ3va%aXS!-g;G+[|58K)BSl]mwD|,_{+BfjC(-Y_^ %k(X<4}@e~*X4a' );
define( 'SECURE_AUTH_SALT', 'KjlO7e$wEWPM<92!wW>Zk7X@{6MK0|MWc*0_3G?9.bkVl{QrhZnf1!m9:4*sL1gR' );
define( 'LOGGED_IN_SALT',   '7J6Wp0.4/z.3P[ldI+dN+9Cpq7te6*3BPBM%Pcm=/t},[vH5y/0P65oGz&01>T,n' );
define( 'NONCE_SALT',       'Wj8(-o!LvCIV {5ps!Yn96`W Byej}1WC@+l!leP2.zcsAWywpM|)GwSlA;#j)^F' );

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
