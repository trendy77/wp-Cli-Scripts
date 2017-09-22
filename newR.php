<?php
	// array of sites to iterate through...
	
	//$aliaie=array('@us','@spec','@style','@gov','@glo','@orgbizes','@tp','@vape','@orgbiz', '@ckww');
	
	//$aliaie=array('fnr');
	
	//foreach ($aliaie as $alias){
	//echo ' At site ' . $alias." ";
	// commands to send...
				// update all plugs
		$path = '/home/public_html/fakenews';
		$dbuser = 'organRemote';		// sets user --> from config.ini 'user'.
	    $dbpass = 'organRemotePassword';
		$dbname = 'newOb';
	    $url = 'fakenewsregistry.org';
	    $wpuser = 'theCreator';
		$wpemail = 'thecreator@orgmy.biz';
		$wppass = '5ekoeXMFRIXuJ&lWLA';
		$subcommand  = 'install';
		$tit = 'Fake News Registry.org';
		
		$download = "wp core download --path=%s";
    WP_CLI::log( 'Downloading WordPress...' );
    WP_CLI::launch( \WP_CLI\Utils\esc_cmd( $download, $path ) );
		
	$core_install = "wp --path=%s core %s --url=%s --title=%s --admin_user=%s --admin_password=%s --admin_email=%s";
		WP_CLI::log( 'Installing WordPress...' );
	WP_CLI::launch( \WP_CLI\Utils\esc_cmd( $core_install, $path, $subcommand, $url, $tit, $wpuser, $wppass, $wpemail ) );
	WP_CLI::log( 'Removing extra themes...' );
    WP_CLI::launch( \WP_CLI\Utils\esc_cmd( 'wp --path=%s theme delete twentyfifteen', $path ) );
    WP_CLI::launch( \WP_CLI\Utils\esc_cmd( 'wp --path=%s theme delete twentysixteen', $path ) );

    WP_CLI::log( 'Removing default plugins...' );
    WP_CLI::launch( \WP_CLI\Utils\esc_cmd( 'wp --path=%s plugin delete hello', $path ) );
    WP_CLI::launch( \WP_CLI\Utils\esc_cmd( 'wp --path=%s plugin delete akismet', $path ) );
	WP_CLI::log( 'Removing sample data...' );
    WP_CLI::launch( \WP_CLI\Utils\esc_cmd( 'wp --path=%s db query "TRUNCATE TABLE suk_itposts; TRUNCATE TABLE suk_itpostmeta; TRUNCATE TABLE suk_itcomments; TRUNCATE TABLE suk_itcommentmeta;"', $path ) );
    WP_CLI::launch( \WP_CLI\Utils\esc_cmd( 'wp --path=%s user meta update 1 show_welcome_panel "0"', $path ) );
		
	WP_CLI::log( 'Done.' );


//$input[0] = 
# Import content from a WXR file
//$input[1] = ("import $IMPORTXML --authors=create --skip=image_resize");
//$input[2] = ('wp plugin install wordpress-importer --activate');  
//$input[3] = ("import $IMPORTXML --authors=create --skip=image_resize");
//$input[4] = ("media regenerate --yes");
//$input[5] = ("theme install evolve --activate"); 
//$input[6] = ("scaffold child-theme childTheme --parent_theme=evolve --theme_name='childTheme' --author='TDAFischer' --author_uri=http://orgmy.biz --activate");
//$input[6] = ("option add my_option foobar



?>