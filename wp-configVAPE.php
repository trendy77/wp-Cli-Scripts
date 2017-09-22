<?php

// ** MySQL settings ** //
/** The name of the database for WordPress */

define('DB_NAME', 'organ151_vape');

/** MySQL database username */
define('DB_USER', 'organ151_vape');

/** MySQL database password */
define('DB_PASSWORD', 't0mzdez2!');

/** MySQL hostname */
define('DB_HOST', 'localhost');
/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');


define('AUTH_KEY',         'w;,!kjd$gt(NRb=<@4dd(1[(5(g_#cgcu}Y]g`<|b|-HNvUc;Ap|TO_Z:(k;k5s(');
define('SECURE_AUTH_KEY',  '7.U0UA*eK{L:@q-N2zCldd,IV|57v,cvqHx?lGwttR$V{3p|^:Ms?xnOQL{h.Wn#');
define('LOGGED_IN_KEY',    '#Zz}czp]xL+QQ|47hA_E@:dd>qX;31|m`!+dT`z8{xEUSc~Xl~fRn?!Kl8akS<?*');
define('NONCE_KEY',        '?*l$e;D3+hz5,-Q]}U #b(:Fdd|&w>y>PEytCwy>TMs#no_jN})zpB+w,pd,VYR%');
define('AUTH_SALT',        'TT4]Y#]P0P!5;xG!X&NT>GC*O*ddd9.u}!A+1*&di)g`jO zbp-.D&;9sX],/o@}');
define('SECURE_AUTH_SALT', '3%GVTcnR7WhG]vVhnXk)U%]RxXN!]ddd@Qxj{2KQP~s`Mm2adRKqQ@|*%iZ{CoWw');
define('LOGGED_IN_SALT',   'Ld1Fd-~uTqrMTrWXTN+F&gi1:NR39y:wddd^Jh|>|SZ4i>!NT nF`xl(Kw>{Pfm@');
define('NONCE_SALT',       '17)-AQjq1SaOplACBaH<&.y=Tlo3ly#a_nvrrrr[ZoSD) mVl S6?eW|F|ZuQZnA');
/** wp-admin login fix */
define('ADMIN_COOKIE_PATH', '/');
define('WP_HOME','https://govnews.info');
define('WP_SITEURL','https://govnews.info');

$table_prefix = '_77';

define('WP_MEMORY_LIMIT', '256M');

define( 'WP_DEBUG', true );
define( 'WP_DEBUG_DISPLAY', false );
define( 'WP_DEBUG_LOG', true );


define( 'AUTOSAVE_INTERVAL', 300 );
define( 'WP_POST_REVISIONS', 5 );
define( 'EMPTY_TRASH_DAYS', 1 );
define( 'WP_CRON_LOCK_TIMEOUT', 120 );
/* That's all, stop editing! Happy blogging. */
/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
