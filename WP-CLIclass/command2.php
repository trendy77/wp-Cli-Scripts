<?php
class tpCLI extends WP_CLI_Command
{
	///*** THE TPCLi COMMAND SET
	
	//   WP TP GO  -- INSTALL SITE TO 'path
	     ///   --- CLEAN UP STARTER PLUGS AND THEMES, INSTALL DB, PLUGINS 
	// WP TP SET -- PLUGS INSTALL AND CLEAN-UP
	// WP TP POST -- POSTS A MOTHA-FUCKING POST, MOTHA-FUCKER.
	// WP TP MAINTAIN -- REGULAR SITE UPKEEP
	// WP TP MOVE2 -- MOVE SITE 2 ANOTHER DB & ADDRESSS
	
public function go ($args, $assoc_args){
 /**
    installs wp, database, pplugs, etc
 *
	 * ## OPTIONS
	 *
	 * <dest>
	 * : The destination for the new WordPress install.
	 *
	 * [--path=<path>]
	 * : Optional path to the installation.
	 *
	 * [--url=<url>]
	 * :URL of the site
	 *
	 * [--multisite]
	 * : Convert the install to a Multisite installation.
	 *
	 * [--dbuser=<user>]
	 * : Database username
	 *
	 * [--dbpass=<pass>]
	 * : Database password
	 *
	 * [--dbhost=<host>]
	 * : Database host
	 *
	 * [--admin_user]
	 * : Admin username
	 *
	 * [--admin_password]
	 * : Admin password
	 *
	 * [--admin_email]
	 * : Admin email
	 *
	 * [--after_script]
	 * : Custom script to run after install
	 *
     * ## EXAMPLES
        *   wp tp post
       *
         * @when before_wp_load
		*/
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
		 
            $dbhost = '127.0.0.1';
		
		  $config = \WP_CLI::get_runner()->config;
        $extra_config = \WP_CLI::get_runner()->extra_config;
		// Download WordPress
		$download = "wp core download --path=%s";
		WP_CLI::log( 'Downloading WordPress...' );
		WP_CLI::launch( \WP_CLI\Utils\esc_cmd( $download, $path ) );
 		// Create the wp-config file
 		$config = "wp --path=%s core config --dbname=%s --dbuser=%s --dbpass=%s --dbhost=%s";
 		WP_CLI::log( 'Creating wp-config.php...' );
    	WP_CLI::launch( \WP_CLI\Utils\esc_cmd( $config, $path, $dbname, $dbuser, $dbpass, $dbhost ) );
		// Create the database
		$db_create = "wp --path=%s db create";
		WP_CLI::log( 'Creating the database...' );
		WP_CLI::launch( \WP_CLI\Utils\esc_cmd( $db_create, $path ) );
		// Install WordPress core.
		$admin_user  = $wpuser;
		$admin_pass  = $wppass;
		$admin_email = $wpemail;
		$subcommand  = 'install';
		$base_url    = $url;
		if ( isset( $assoc_args['multisite'] ) ) {
			$subcommand = 'multisite-install';
		}
		$core_install = "wp --path=%s core %s --url=%s --title=%s --admin_user=%s --admin_password=%s --admin_email=%s";
		WP_CLI::log( 'Installing WordPress...' );
		WP_CLI::launch( \WP_CLI\Utils\esc_cmd( $core_install, $path, $subcommand, $url, $tit, $wpuser, $wppass, $wpemail ) );
		
		WP_CLI::success( "WordPress installed" );


        $mysqli = new mysqli($db_config['dbhost'], $db_config['dbuser'], $db_config['dbpass']);
        if (! $mysqli) {
            WP_CLI::error(
                sprintf(
                    "Unable to connect to database '%s' with user '%s'.",
                    $db_config['dbhost'],
                    $db_config['dbuser']
                )
            );
            return;
        }
        $sql = "CREATE DATABASE IF NOT EXISTS `".$db_config['dbname'].
            "` DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci;";
        if (! $mysqli->query($sql)) {
            WP_CLI::error(sprintf("Unable to create new schema '%s'.", $db_config['dbname']));
            return;
        }
		$mysqli->close();       
		 WP_CLI::success(sprintf("Created '%s' database.",$dbname));
	}
					
		public function std ($args, $assoc_args)
		{
			$aliaie=array('@orgbiz','@gov','@glo','@orgbizes','@tp','@tpau','@vape','@ckww','@ckwwes');
				foreach ($aliaie as $alias){
					WP_CLI::log( 'At site %s' );






					
		}
	}
			
	 public function fnrset( ){
        $path = '/home/organ151/public_html/fakenews';
		$dbuser = 'organ_remote';		// sets user --> from config.ini 'user'.
	    $dbpass = 'organRemotePassword';
	    $url = 'fakenewsregistry.org';
	    $wpuser = 'theCreator';
		$wppass = '5ekoeXMFRIXuJ&lWLA';
		$wpemail = 'thecreator@orgmy.biz';
		$tit = 'Fake News Registry.org';
		$id = 'fnr';
 		WP_CLI::log( 'Removing extra themes...' );
		WP_CLI::launch( \WP_CLI\Utils\esc_cmd( 'wp --path=%s theme delete twentyfifteen', $path ) );
		WP_CLI::launch( \WP_CLI\Utils\esc_cmd( 'wp --path=%s theme delete twentysixteen', $path ) );
		WP_CLI::log( 'Removing transients & regen any lost pics...' );
		WP_CLI::launch( \WP_CLI\Utils\esc_cmd( 'wp --path=%s transient delete --all', $path ) );
		WP_CLI::launch( \WP_CLI\Utils\esc_cmd( 'wp --path=%s media regenerate --only-missing --yes', $path ));

	}	
}	
WP_CLI::add_command('tp', 'tpCLI');