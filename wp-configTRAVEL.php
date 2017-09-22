<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'traveldb');

/** MySQL database username */
define('DB_USER', 'user1');

/** MySQL database password */
define('DB_PASSWORD', 'Letmein$@');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '$hB#rH&^w(Rlp/:PtHyQ!G.fD}J^uNypFFW6Z]V1s%3+rS%=iQyS@=qL >[,&o(_');
define('SECURE_AUTH_KEY',  '+]?IK}BtN/|B0)t~r.4(pY<9$/LC:J,1iW:sJ]7;Q-Ln~QHW`~q0FE>Tc)(,eVwr');
define('LOGGED_IN_KEY',    'uN22@&0Z[p~<}=T[3iOQ{*XQF*5MuKe/Q$x0],JIH^=x~(^3(VLG__>/:IRV_p|x');
define('NONCE_KEY',        'tC6xHeA^qsuy.o9Jj<dcp9=~V/[gQx%qw&,MDo:.E) etNObWWSss@+P?zCPEB{E');
define('AUTH_SALT',        '?wwMCpw#{,XJ`[!g_0ahwp[ fpY0Px|*vZ,=^4,$EA<w#/oL@@.;9Q6de^N9?@st');
define('SECURE_AUTH_SALT', '#*-ca~Cqb~D$O|6vx>A}Yp+p35)SoG`k9&Ap&K9,rek0o*g^YG~z7_H@)(rfrzVg');
define('LOGGED_IN_SALT',   '.0sYyChi^:zje00#U3 sT}nenTBs6`>2g@*84j&qLq{=n3:HdlBQiYYDwJeRKx3H');
define('NONCE_SALT',       'KCuc&JRW-/-qru!gVHc%%SU[rJ2>B ;57:jy0q/DfD7GLkz[p}7?iSxK d$O[[L:');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
