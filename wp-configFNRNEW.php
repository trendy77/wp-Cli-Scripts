<?php

$IDENTIFIER ='fnr';

// ** MySQL settings ** //
/** The name of the database for WordPress */

define('DB_NAME', 'newOb');

/** MySQL database username */
define('DB_USER', 'organ_remote');
/** MySQL database password */
define('DB_PASSWORD', 'organRemotePassword');
/** MySQL hostname */
define('DB_HOST', 'localhost');
/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');
/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

$table_prefix = 'suk_it'; 

define('AUTH_KEY',         'w;,!kjd$gt(NRb=<@4RZ([(5(g_#cgcu}Y]g`<|b|-HNvUc;Ap|TO_Z:(kc;k5s(');
define('SECURE_AUTH_KEY',  '7.U0UA*eK{L:@q-fdddClU,IV|57v,cvqHx?lGwttR$V{3p|^:Ms?xnOQL{h.Wn#');
define('LOGGED_IN_KEY',    '#Zz}czp]xL+QQ|47hA_dddpb>qX;31|m`!+dT`z8{xEUSc~Xl~fRn?!Kl8akS<?*');
define('NONCE_KEY',        '?*l$e;D3+hz5,-Q]}U #b(:F*h|&w>y>PEytCwy>TMs#no_jN})zpB+w,pd,VYR%');
define('AUTH_SALT',        'TT4]Y#]P0P!5;xG!X&NccGC*O*n-J9.u}!A+1*&di)g`jO zbp-.D&;9sX],/o@}');
define('SECURE_AUTH_SALT', '3%GVTcnR7WhG]vVhnXkcc%]RxXN!]7=Q@Qxj{2KQP~s`Mm2adRKqQ@|*%iZ{CoWw');
define('LOGGED_IN_SALT',   'Ld1Fd-~uTqrMTrWXTN+ccgi1:NR39y:wd$L^Jh|>|SZ4i>!NT nF`xl(Kw>{Pfm@');
define('NONCE_SALT',       '17)-AQjq1SaOplACBaHcc.y=Tlo3ly#a_nv9)$D[ZoSD) mVl S6?eW|F|ZuQZnA');


define ('WP_CONTENT_FOLDERNAME', 'stuff');
define( 'WP_CONTENT_URL', '//fakenewsregistry.org/stuff' );
define( 'WP_CONTENT_DIR', '/home/organ151/public_html/fakenews/stuff' );
/** Location of your WordPress configuration. */

define('WP_MEMORY_LIMIT', '256M');
/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
    define('ABSPATH', dirname(__FILE__) . '/');
/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');



