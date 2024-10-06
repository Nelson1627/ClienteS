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
define( 'DB_NAME', 'cs' );

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
define( 'AUTH_KEY',         'V,a;uHG4MZ8psdb`cha&DM&KdgShnk:@u;B3+yB4wYvGiIJu!]`tJ`=F48#>&L!h' );
define( 'SECURE_AUTH_KEY',  '.4S&=4`Mx19k9bq$A*n?s@r$@>^R35FH[)vUDwJph8*Nl<AEn/w.+:]K.J>jc?/[' );
define( 'LOGGED_IN_KEY',    'Fn0VKYy&a[[fM:tnog_%#/I<W-5G_F5d|v^V=Yb,P.|!Wua7cgk#3+riaR(/maC:' );
define( 'NONCE_KEY',        'W|N+o3TX@4l=}OFP^l&;U$NFeEoP/8s5?j1 8E.?P)d-B2qr))0q,lzU9c@_;X~A' );
define( 'AUTH_SALT',        'UGdOuk{[t[SiC}[,N2MAE$Jq8gnQ|p4-H#912A;oatTl8{pk4UUHvFRYR]|DL[JE' );
define( 'SECURE_AUTH_SALT', 'H9Sw4;ezhoz`u4+S#Dp<Bog[F/!Q+05;$F~Na<~D*y>H)yaz$5<NW/t#Ig>ozy ]' );
define( 'LOGGED_IN_SALT',   'mIJA pDT J{DqCd:7C4;_%-8|[KRw(%*,dxnb]o,d#PpGkPKfEq-%,G}.Oa>)xLv' );
define( 'NONCE_SALT',       '}y+[1@|)2;b9IEoX[=PSI_!R<cz)SKI%ERjh5Oc#~CFkU8Rbz?L5%(ykhq$J?ffV' );

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
