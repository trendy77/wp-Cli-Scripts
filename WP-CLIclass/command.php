<?php
include_once('../tp-config.php');

	class tpCLI extends WP_CLI_Command
	{
		public function go ($args, $assoc_args)
		{
			$path = isset( $assoc_args['path'] ) ? $assoc_args['path'] : getcwd();
			$site_path = ($path);
	
			// Download WordPress
			$download = "wp core download --path=%s";
			WP_CLI::log( 'Downloading WordPress...' );
			WP_CLI::launch( \WP_CLI\Utils\esc_cmd( $download, $path ) );
			
			// Create the wp-config file
			$config = "wp --path=%s core config --dbname=%s --dbuser=%s --dbpass=%s --dbhost=%s";
			WP_CLI::log( 'Creating wp-config.php...' );
			WP_CLI::launch( \WP_CLI\Utils\esc_cmd( $config, $site_path, $dbname, $dbuser, $dbpass, $dbhost ) );
		
			// Create the database
			$db_create = "wp --path=%s db create";
			WP_CLI::log( 'Creating the database...' );
			WP_CLI::launch( \WP_CLI\Utils\esc_cmd( $db_create, $site_path ) );
		
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
			WP_CLI::launch( \WP_CLI\Utils\esc_cmd( $core_install, $site_path, $subcommand, 'https://' . $args[0], $args[0], $admin_user, $admin_pass, $admin_email ) );
				if ( isset( $assoc_args['after_script'] ) ) {
					WP_CLI::launch( $assoc_args['after_script'] . ' ' . $args[0] . '&>/dev/null' );
				}
			WP_CLI::success( "WordPress installed at $site_path" );
	
			$mysqli = new mysqli($db_config['dbhost'], $db_config['dbuser'], $db_config['dbpass']);
				if (! $mysqli) {
					WP_CLI::error('db connection error'	);
					return;
				}
			$sql = "CREATE DATABASE IF NOT EXISTS `".$db_config['dbname'].
				"` DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci;";
				if(!$mysqli->query($sql)) {
					WP_CLI::error(sprintf("Unable to create new schema '%s'.", $db_config['dbname']));
					return;
				}
			$mysqli->close();        
			WP_CLI::success(sprintf("Created '%s' database.", $db_config['dbname']));
		}
			

		public function set($args){
			$config = \WP_CLI::get_runner()->config;
			$extra_config = \WP_CLI::get_runner()->extra_config;
			$id = $args;
			$path = isset( $assoc_args['path'] ) ? $assoc_args['path'] : getcwd();
				WP_CLI::log( 'Removing extra themes...' );
				WP_CLI::launch( \WP_CLI\Utils\esc_cmd( 'wp --path=%s theme delete twentyfifteen', $path ) );
				WP_CLI::launch( \WP_CLI\Utils\esc_cmd( 'wp --path=%s theme delete twentysixteen', $path ) );
				    WP_CLI::log( 'Removing default plugins...' );
					WP_CLI::launch( \WP_CLI\Utils\esc_cmd( 'wp --path=%s plugin delete hello', $path ) );
					WP_CLI::launch( \WP_CLI\Utils\esc_cmd( 'wp --path=%s plugin delete akismet', $path ) );
						WP_CLI::launch( \WP_CLI\Utils\esc_cmd( 'wp --path=%s plugin delete no-follow', $path ) );
					WP_CLI::log( 'Removing sample data...' );
					WP_CLI::launch( \WP_CLI\Utils\esc_cmd( 'wp --path=%s db query "TRUNCATE TABLE suk_itposts; TRUNCATE TABLE suk_itpostmeta; TRUNCATE TABLE suk_itcomments; TRUNCATE TABLE suk_itcommentmeta;"', $path ) );
					WP_CLI::launch( \WP_CLI\Utils\esc_cmd( 'wp --path=%s user meta update 1 show_welcome_panel "0"', $path ) );
					WP_CLI::launch( \WP_CLI\Utils\esc_cmd( 'wp --path=%s transient delete --all', $path ) );
				WP_CLI::log( 'Removing default plugins...' );	
			if file_exists('/home/organ151/Scripts/plugsToInstall.txt') {
				$plugins = file_get_contents('/home/organ151/Scripts/plugsToInstall.txt');
				$plugins = array_filter( explode( PHP_EOL, $plugins ) );
				foreach ( $plugins as $plugin ) {
					$cmd = 'wp %s plugin install %s';
					$cmd = \WP_CLI\Utils\esc_cmd( $cmd, $id, $plugin );
					$result = WP_CLI::launch( $cmd, false, true );
					WP_CLI::log( $result );
				} 
			echo exec('wp %s plugin status', $args )."\n";
			}
			 else 
			{
				WP_CLI::log( 'Plugin list not found' );
			}
		}
	}
		
WP_CLI::add_command('tp', 'tpCLI');