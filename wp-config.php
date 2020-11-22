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
define( 'DB_NAME', 'fastca' );

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
define( 'AUTH_KEY',         'CtYBgL5gp#/lmDmMeN!-^1k~p1y}I/.$OEcRB|vO<[`VUg)xsJ0jEg@ <$xdNp_M' );
define( 'SECURE_AUTH_KEY',  'D8|e=*i[_>n@0xqstG:g.6E!,SEb-fL739)+WO=z;L:R1Uu<h[TWd.(UB}J^*6U}' );
define( 'LOGGED_IN_KEY',    'TPg?v@o X!YX4KXkU3m-53Rb[pH[R@y!o5|482%uH4MiR]DxZ#VBHS;Q=CT|^5bQ' );
define( 'NONCE_KEY',        'q+:NX_&q4u;0mmgOJi6yH#BIPw4h*1e_OAyG{O5snhG&>Z0g/CQ0DfhQzSaI /Q9' );
define( 'AUTH_SALT',        ':/[H)NK~&WL8kGuRI%AZPJ.]C#7 uJ5dYAD9_.&5nwYe|xOqUiE][#V%(jHT-5e@' );
define( 'SECURE_AUTH_SALT', ']AqfLBaAp>vc!M(3Fs3Bpy.%onzMF2v-fHTtti5/jkBFhAU>k7p;~JfyEQIy0Mw?' );
define( 'LOGGED_IN_SALT',   '=NP:&zEsXS7{$TtbPV/qr#^z4fD p90!Q*{S {W.h,]n;98F/RMQ;I&drv667B8,' );
define( 'NONCE_SALT',       'ijrj5<5w-onc=3hvl4ITifpI.r@MxTNU>Y`0LIC5w=D$;XUqm+5-E4pr&Ejn>G_[' );

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
