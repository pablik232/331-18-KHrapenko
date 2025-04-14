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
define( 'DB_NAME', 'hrapenko331' );

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
define( 'AUTH_KEY',         '@1tJMNB(A7Cm#3b$5 =-S:0rl<fZ(u9t-t.eyTux@Zw%n:Io4_ hdYua!m# Z8l^' );
define( 'SECURE_AUTH_KEY',  'C!&e(cH]@8D]s!FcQA <UCGd[,4f}IAL_e6i`Iq`,?r!:q$@h@3J2!^(Pq{afc)|' );
define( 'LOGGED_IN_KEY',    'jH7 SBU7ozJQJNjgyF$.c9>XG;;VC[|ddlSJt0:pOPXvb5^i{v] Ja?[c5UhAp?2' );
define( 'NONCE_KEY',        '*xg3e+g;*ITEvk)z=c9,oX.nRvr#zCYS4$?GQ0^@nEc#m#rQx=J!:]|NhR>T_@,R' );
define( 'AUTH_SALT',        '0Xh2-0GRY3tS,{EerJX,=X+Ku*Pv2mR76E12#(wnu%uE_b a[Y,u#AQy%Ves5uO;' );
define( 'SECURE_AUTH_SALT', 'IFIhX3;r*{B4:X}{*^qdG$3VcQATEv9UkC%R{km~%dL;n_B>*tWsrsZC&#Fb1Npe' );
define( 'LOGGED_IN_SALT',   'ghP-?V`|-|)?i{3Ba- bGFeETA+HExo2?AQA7t{U[.ei}^o2P_L4b[G($[Xt;JqP' );
define( 'NONCE_SALT',       '%hFAZ}@0d~l,CKf(3UdK3W:YS1=SJP>yiQkZhVLzD@iiVd?oOjZhN91qC#,$yfSD' );

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
$table_prefix = 'wp_331';

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
