<?php
/** Enable W3 Total Cache */
//define('WP_CACHE', true); // Added by W3 Total Cache  // COMMENTED OUT TO MAYBE FIX THE SITES FUCKING PROBLEMS FINDLALY, MAR 17


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

// ** MySQL settings ** //

define('DB_NAME', 'organ151_72f');

/** MySQL database username */
define('DB_USER', 'organ151_7');

/** MySQL database password */
define('DB_PASSWORD', 'Hello1212!');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');
//define('NOBLOGREDIRECT', 'organisemybiz.com');

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'YK.!N-4q+*2+vXmPqfQ*k1<<n^+d<,1,mB530(3Na~y5b;Ox-T4/v]]A2^c$-n`,');
define('SECURE_AUTH_KEY',  'p[W8Af^p,@M5W~8[[Uri|e`{v?X1OgwM_wB[&E(p`)cV-dPLf}B(9Bwd-f6/}5`y');
define('LOGGED_IN_KEY',    '%jkz y{h,PH;U!0}7,|I8yH2vLE-5e:<2y7`%>$,l*,X58fq*dJ5lQG7^I+726!*');
define('NONCE_KEY',        '|-d>Ji)wb5iG(8 b.]1S alvvnn|LJwhc(I^xIsqd<.+!WRXX$KDs-X$5ie`#A{z');
define('AUTH_SALT',        '{(B*-vdy(BARS_W|QO|(-p.rvrS?`EdGhM Kb; {3VG6V9N+k]hIc<V 7Z[4aa~h');
define('SECURE_AUTH_SALT', '~[Azm>i5c<vR ). {UStJr^`vF,twSoo(XY2~g-_W2|+A$n-x5?0WTM@HT6Yc|m[');
define('LOGGED_IN_SALT',   'g`A7$=m}3f+F|fDGql?R$aMdv-=HAp|+`USq*()Mt-s!rb,?VQq{X2joo~q|`Vix');
define('NONCE_SALT',       'FipO.r48m@:isG07%it@>-l@vByiNBZ#Rt!&{cf/2co#h<j4q6x!TQ&,Xp*kj}K|');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = '7c3_';

define( 'WP_MEMORY_LIMIT', '256M' );
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_DISPLAY', true );
define( 'WP_DEBUG_LOG', true );
/** wp-admin login fix */
// define('ADMIN_COOKIE_PATH', '/');
define('WP_HOME','https://organisemybiz.com');
define('WP_SITEURL','https://organisemybiz.com');
define('FORCE_SSL_ADMIN', true);
define( 'CONCATENATE_SCRIPTS', true );

define( 'EMPTY_TRASH_DAYS', 1 );
define( 'WP_CRON_LOCK_TIMEOUT', 120 );
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');