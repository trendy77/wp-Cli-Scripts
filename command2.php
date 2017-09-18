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
		$path = isset( $assoc_args['path'] ) ? $assoc_args['path'] : getcwd();
		//$path = $path . '/' . $args[0];
		$dbuser    = $assoc_args['dbuser'];
		$dbpass    = $assoc_args['dbpass'];
		$dbhost    = $assoc_args['dbhost'];
		 if (empty($assoc_args['dbhost'])) {
            $assoc_args['dbhost'] = '127.0.0.1';
		$dbname = str_replace( '.', '_', $args[0] );
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
		$admin_user  = $assoc_args['admin_user'];
		$admin_pass  = $assoc_args['admin_password'];
		$admin_email = $assoc_args['admin_email'];
		$subcommand  = 'install';
		$base_url    = $assoc_args['url'];
		if ( isset( $assoc_args['multisite'] ) ) {
			$subcommand = 'multisite-install';
		}
		$core_install = "wp --path=%s core %s --url=%s --title=%s --admin_user=%s --admin_password=%s --admin_email=%s";
		WP_CLI::log( 'Installing WordPress...' );
		WP_CLI::launch( \WP_CLI\Utils\esc_cmd( $core_install, $path, $subcommand, 'https://' . $args[0], $args[0], $admin_user, $admin_pass, $admin_email ) );
		if ( isset( $assoc_args['after_script'] ) ) {
			WP_CLI::launch( $assoc_args['after_script'] . ' ' . $args[0] . '&>/dev/null' );
		}
		WP_CLI::success( "WordPress installed at $path" );
	}

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
        $mysqli->close();        WP_CLI::success(sprintf("Created '%s' database.", $db_config['dbname']));
      		}
			
			
public function maintain ($args, $assoc_args){

$aliaie=array('@orgbiz','@gov','@glo','@orgbizes','@tp','@tpau','@vape','@ckww','@ckwwes');

foreach ($aliaie as $alias){

WP_CLI::log( 'At site %s' );
	$input=array();
	$input[0] = ('plugin update --all');  
	$input[1] = ('cache flush');
	$input[2] = ('transient delete-expired');
	$input[3] = ('db optimize');	
	$input[4]= ('media regenerate --only-missing --yes');
	//$input[3] = ('media  $(wp eval 'foreach( get_posts(array("category" => 2,"fields" => "ids")) as $id ) { echo get_post_thumbnail_id($id). " "; }')

	$input[5]=('plugin install /home/organ151/Scripts/plug/wp-cfm.zip');	
	//     wp theme activate twentysixteen
	//$input[4]=('wp theme install /home/organ151/themeN.zip');
		
		foreach ($input as $command){	
		WP_CLI::log( 'Doing %s' );
		$command = 'wp ' . $alias . ' ' . $command;
		WP_CLI::launch( \WP_CLI\Utils\esc_cmd( $command, $alias ));
				}
	WP_CLI::success( "moving onto next site ..." );
	}
}
			
	 public function set($args, $assoc_args){
       /**
     * setup WP
     *sets all the plugins and theme info for my sites
     * ## OPTIONS
     *
     * <site>...
     * : The site(s) to setup. ie foldername
     *
     * [--path=<path>]
     * : path to site
     *
	 * [--plugin_list=<plugin_list>]
     * : path to plugin txt file
     * ---
     * default: success
     * options:
     *   - success
     *   - error
     * ---
     *
     * ## EXAMPLES
     *
     *     wp tp set 
     *
     * @when before_wp_load
     */ 
      $path = $getSiteDeets('$path');
	$id = $GLOBALS['IDENTIFIER'];
 		WP_CLI::log( 'Removing extra themes...' );
		WP_CLI::launch( \WP_CLI\Utils\esc_cmd( 'wp --path=%s theme delete twentyfifteen', $path ) );
		WP_CLI::launch( \WP_CLI\Utils\esc_cmd( 'wp --path=%s theme delete twentysixteen', $path ) );
	WP_CLI::log( 'Removing transients & regen any lost pics...' );
	WP_CLI::launch( \WP_CLI\Utils\esc_cmd( 'wp --path=%s transient delete --all', $path ) );
	WP_CLI::launch( \WP_CLI\Utils\esc_cmd( 'wp --path=%s media regenerate --only-missing --yes', $path ));
	
	WP_CLI::log( 'ADDING default plugins...' );	
		if ( isset( $assoc_args['plugin_list'] ) && file_exists( $assoc_args['plugin_list'] ) ) {
			$plugins = file_get_contents( $assoc_args['plugin_list'] );
			$plugins = array_filter( explode( PHP_EOL, $plugins ) );
				foreach ( $plugins as $plugin ) {
WP_CLI::launch( \WP_CLI\Utils\report_batch_operation_results( 'wp --path%s plugin install --activate $plugin' ) );	
	//					$result = WP_CLI::launch( $cmd, false, true );
					WP_CLI::log( $result );
				} 
			echo exec('wp --path%s plugin status', $path )."\n";
			} else {
				WP_CLI::log( 'Plugin list not found' );
					}
				}
			}
WP_CLI::add_command('tp', 'tpCLI');