<?php

// common vars to define for all...
	
	define('SAVEQUERIES', false);
	define('CONCATENATE_SCRIPTS', true );
	define('ENFORCE_GZIP', true);
	define( 'FORCE_SSL_ADMIN', true );
		//define( 'WP_CONTENT_DIR', '.o/wp-content' );
		//define( 'WP_CONTENT_URL', './orgmy.biz/tp/wp-content');
	define('WP_POST_REVISIONS', false);
	define( 'WP_CRON_LOCK_TIMEOUT', 60 );
	define( 'EMPTY_TRASH_DAYS', 0 ); // Zero days
	//define( 'WP_ALLOW_REPAIR', true );
	define('AUTOSAVE_INTERVAL', 68940);
	define('WP_MEMORY_LIMIT', '256M');
	
	define('WP_DEBUG', true);
	define('SCRIPT_DEBUG', false);
	define('WP_DEBUG_LOG', true);
	define('WP_DEBUG_DISPLAY', true);
	define('FORCE_SSL_LOGIN', true);



// The Main Switch:
define('CURRENT_SERVER','local');

/*  ------------------------ YOUR SERVER CONFIGURATIONS --------------------- */
switch(CURRENT_SERVER){

case 'local':

	/***************************************
	DEVELOPMENT SERVER. OPTIMIZED FOR DEBUGGING
	****************************************/

	define('WP_CACHE', false);
	define('WP_DEBUG', true);
	define('SAVEQUERIES', false);
	define('WP_DEBUG_LOG', false);
	define('WP_DEBUG_DISPLAY', true);
	/*
		The SAVEQUERIES definition saves the database queries to an array to help analyze those queries.
		See http://codex.wordpress.org/Editing_wp-config.php on how to use it.
	*/
	define( 'SCRIPT_DEBUG', true );
	define( 'CONCATENATE_SCRIPTS', false );
	define('DB_NAME', 'devbase');
	define('DB_USER', 'root');
	define('DB_PASSWORD', '');
	define('DB_HOST', 'localhost');
	define('DB_CHARSET', 'utf8mb4');
	define('DB_COLLATE', '');
	// DOMAIN & URL
	define('PROTOCOL', 'http://');
	define('DOMAIN_NAME', 'trendy.chickenkiller.com');
	define('WP_SITEURL', PROTOCOL . DOMAIN_NAME);
	define('PATH_TO_WP', '/'); // if your WordPress is in a subdirectory.
	define('WP_HOME', WP_SITEURL . PATH_TO_WP); // root of your WordPress install
	define('TABLE_PREFIX','wp_'); 
	break;

case 'live':
default:
	/***************************************
	PRODUCTION SERVER. OPTIMIZED FOR SPEED.
	****************************************/
	define('WP_CACHE', true);
	define('WP_DEBUG', false);
	define('SAVEQUERIES', false);
	define( 'SCRIPT_DEBUG', false);
	define( 'CONCATENATE_SCRIPTS', true );
	// log errors in a file (wp-content/debug.log), don't show them to end-users.
	define('WP_DEBUG_LOG', true);
	define('WP_DEBUG_DISPLAY', false);
	define('ENFORCE_GZIP', true);
	// DATABASE
	//define('DB_NAME', 'DATABASE_NAME');
	//define('DB_USER', 'DATABASE_USER');
	//define('DB_PASSWORD', 'DB_PASSWORD');
	//define('DB_HOST', 'localhost');
	define('TABLE_PREFIX','wp_'); 
	// DOMAIN & URL
	define('PROTOCOL', 'https://');
	define('DOMAIN_NAME', 'trendypublishing.com');
	define('WP_SITEURL', PROTOCOL . DOMAIN_NAME);
	define('PATH_TO_WP', '/'); // if your WordPress is in a subdirectory.
	define('WP_HOME', WP_SITEURL . PATH_TO_WP); // root of your WordPress install
	// Using subdomains to serve static content (CDN) ? 
	// To prevent WordPress cookies from being sent with each request to static content on your subdomain, set the cookie domain to your non-static domain only.
	// define('COOKIE_DOMAIN', DOMAIN_NAME);

	// FTP: On some webhosting configurations, Wordpress automatic updates fail. Try the FTP method. If still a no-go, see: http://codex.wordpress.org/Editing_wp-config.php#Override_of_default_file_permissions for alternative methods. */
	/*
	define('FS_METHOD', 'ftpext');
	define('FTP_USER', 'YOUR FTP LOGIN');
	define('FTP_PASS', 'YOUR FTP PASSWORD');
	define('FTP_HOST', 'YOUR FTP HOST (without http:// or ftp://)');
	define('FTP_SSL', false);
*/
	break;
}

/*  ------------------------ SETTINGS COMMON TO ALL SERVERS  --------------------- */

 // Something else than the default wp_. Only numbers, letters, and underscores.
//define('WP_POST_REVISIONS', 5 ); // How many revisions to keep at max.
define('AUTOSAVE_INTERVAL', 120); // in seconds
define('EMPTY_TRASH_DAYS', 7); // in days (use 0 to disable trash)
//wp config REMOVE REVISIONS
define( 'WP_POST_REVISIONS', false);

define('AUTH_KEY',         '_V`ZG:dr5w2>2um`{hX9d|J*}SLkm]A#5.HQPolI;jemYB(55_5!TzMU5hDo?xV_');
define('SECURE_AUTH_KEY',  'S%)0xh;S)LqbZPC^L,wc#G?6;5z&ap-FQyrMAA(*91n8e!n%U[62fW}*W`g)]+K9');
define('LOGGED_IN_KEY',    '-xx]/1zhF/L-A7],e$0_nb$0Vlim{eL4^~>oOT(NIVO{VGr??+PWlU=Hu};SG+]z');
define('NONCE_KEY',        'm*ZYwxVCNt;ZUzAW6po4ne+]h(p6JJP4?~?Q,;Jk{=*Cy,1bNJ2/gRc?w76|b]`D');
define('AUTH_SALT',        'diL#V!lrcjzyzk&B^{My;wujF11M%65E7CA4R~]ZTeH95/vs<Tz8R<I77VqJ5``|');
define('SECURE_AUTH_SALT', 'uQmVGl>ecfg)c.Am4M~S[8Qpn#5#_rLH35EdS<wga[9cUvx}9:|VD}XldfdDb{Wn');
define('LOGGED_IN_SALT',   'fQ,K x<s,3xL@z~(`} EU+`fHPF7*~-eUzPa^E|CmVM4wwtcq?`!mSWW%ANI}7r4');
define('NONCE_SALT',       'UQ={)Vs`8qs+hQ1@$HJisHTSrcX#ruwu}aMZ~Q+4V[K1?3WV^)YnR!,jMt-GTb7X');

/**#@-*/
define( 'WP_CRON_CONTROL_SECRET', 'lickmyshineymetaldaffodilass' );
define( 'CUSTOM_TAGS', true );
define( 'TEST_COOKIE', 'use_this_to_hack_me_you_fuckin_useless_hack_of_pathetic_hacker_yo_momma_loves_cockncookies' );
	
//define( 'WP_CONTENT_URL', 'http://files.domain.com/media' );
//define( 'WP_CONTENT_DIR', $_SERVER['HOME'] . '/files.domain.com/media' );


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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
