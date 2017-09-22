<?php

define('DB_NAME', 'organli6_fake');

/** MySQL database username */
define('DB_USER', 'organli6_t77');

/** MySQL database password */
define('DB_PASSWORD', 'queenLizisa10!');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('AUTH_KEY',         '*f$Lc~Fra#-M(@?oeN8(d5HIF?k{IQ2.,+f++@/TcHw0}P_VqyjN,!CM@H?QQ9]L');
define('SECURE_AUTH_KEY',  'V>^aiD)QokoSN+~7Ib{PKS6Q-7G!9+2kOK-!},~1x%wUUZiHb:rS@pd`IcM7<L`C');
define('LOGGED_IN_KEY',    '89D-Q0t7)+iu~T .!E^X-sp-Q>z=J!2pde:$f!<+i[6;s)37x<BiU2o|-SVb2>fX');
define('NONCE_KEY',        '?s7`9w x}__?*WR$9;1lzLeN0FS<+z2HX-:}Zre_87p59?a0lGaaSj<2mowI?%IR');
define('AUTH_SALT',        'CLOO$oW>O9mhYlqa1>.|.O/^vc@(L-2+42bAnvSrUH5#}{iN`3mf^$y*L)|%*BpX');
define('SECURE_AUTH_SALT', '~$&{gZ7F=x/KxGHV_^yJ:A|+/L0cte2`<K^mBt_Q7Ll05A{FBY^G]`K#(7pxpl+]');
define('LOGGED_IN_SALT',   'yc`LZ*EbbT]wG*NNnQ^fc8hr]Bn_|12geq4{:Oa6>]J4r&-;5ziPMMFM=kk-cf>b');
define('NONCE_SALT',       '-NP@hVR_!jU:RIXCNgKoA*^4)XM8Xj2AH%}JDPq4Q=kew8i5rwn[yDAjLd<r)=c>');

/**	$table_prefix = 'ef4_'; for DBNAME ef4  **/
$table_prefix = 'suk_it';   /* also for 5c5 prefix wp_eibr_   **/


define('WP_MEMORY_LIMIT', '256M');

define( 'WP_DEBUG', true );
define( 'WP_DEBUG_DISPLAY', false );
define( 'WP_DEBUG_LOG', true );

define( 'AUTOSAVE_INTERVAL', 300 );
define( 'WP_POST_REVISIONS', 5 );
define( 'EMPTY_TRASH_DAYS', 7 );
define( 'WP_CRON_LOCK_TIMEOUT', 120 );
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
