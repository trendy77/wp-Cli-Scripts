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
define('DB_NAME', 'neoDbToFly');

/** MySQL database username */
define('DB_USER', 'organ151_66');

/** MySQL database password */
define('DB_PASSWORD', 'westside77!');

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
define('AUTH_KEY', 'I~JMVZfGHtba]+|%L:W|)WwFc-Bw|>+4TvTDci]zQs%)6i|le8-Y*qw<qOGyT=TO');
define('SECURE_AUTH_KEY', ',V-:{Zpafe%v!I;,N[N#65ZO#=x@%,I+xG*&a-:9H/ r]+)L&fe_-bkj-&@a|Y`[');
define('LOGGED_IN_KEY', 'K1J2=FL3[d#Kp{N+qV12JR>WHS?^b{kIZR3{ToknS_u(qukO.?st{c`ivPFWNGW(');
define('NONCE_KEY', '(ZHD]Db4rn}J@S,_RE?878imQzs@$K-wqzrKZ37v_ooC<9[j~>^+,+lvK-R=iU}$');
define('AUTH_SALT', '6Tnjw4W[hlG*7AG*4`=KEiYjZzwiINl4,}SlM3K~0D(ZnT;Pdx w7I$3pytW;=R ');
define('SECURE_AUTH_SALT', ':--z.51rop:]wdy7FgWX~2@fj9J=z[L.1k:=JmL,l0M;3VnA2%S%N,o0ZU1Cx+d6');
define('LOGGED_IN_SALT', '+-}+1!1a&Xkx<reA_3qgDWD~a$!h5wF#*N/+|~/#n4n/n|^aRZYwix_KviCdc)vh');
define('NONCE_SALT', 'WOk7{_!5$Spx;j,n|.R7hbZV:DO+0Y;h{xyyMulJ,!>B~C5-0ogzSc2vF9kaqv+=');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = '7c3_';
// If you don't plan to post via email, decrease this
define('WP_MAIL_INTERVAL', 46400); // 1 day (instead of 5 minutes)

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
define('WP_DEBUG', false);
define('WP_HOME','https://trendypublishing.com');
define('WP_SITEURL','https://trendypublishing.com');
define( 'CONCATENATE_SCRIPTS', true );
define( 'FORCE_SSL_ADMIN', true );
//define( 'WP_CONTENT_DIR', '.o/wp-content' );
//define( 'WP_CONTENT_URL', './orgmy.biz/tp/wp-content');

 /** Désactivation des révisions d'articles */
define('WP_POST_REVISIONS', false);
define( 'WP_CACHE', true );
define( 'WP_CRON_LOCK_TIMEOUT', 60 );
define( 'EMPTY_TRASH_DAYS', 0 ); // Zero days
define( 'WP_ALLOW_REPAIR', true );
define( 'DISALLOW_FILE_EDIT', true );
 /** Intervalle des sauvegardes automatique */
define('AUTOSAVE_INTERVAL', 68940);

 /** On augmente la mémoire limite */
define('WP_MEMORY_LIMIT', '96M');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
