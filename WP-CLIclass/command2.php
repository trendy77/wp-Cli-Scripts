<?php
include_once('/home/organ151/Scripts/getSiteDeets');

class tpCLI extends WP_CLI_Command
{
///*** THE TPCLi COMMAND SET
// WP TP @id GO  -- INSTALL SITE TO 'id
		///   --- CLEAN UP STARTER PLUGS AND THEMES, INSTALL DB, PLUGINS 
// WP TP @id set -- PLUGS INSTALL AND CLEAN-UP
// WP TP @fnr std
// WP TP @fnr fnrin

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
	$dbhost = '127.0.0.1';
	$config = \WP_CLI::get_runner()->config;
	$extra_config = \WP_CLI::get_runner()->extra_config;
	// Download WordPress
	$download = "wp core download --path=%s";
	WP_CLI::log( 'Downloading WordPress...' );
	WP_CLI::launch( \WP_CLI\Utils\esc_cmd( $download, getSiteDeets('path') );
	// Create the wp-config file
	$config = "wp --path=%s core config --dbname=%s --dbuser=%s --dbpass=%s --dbhost=%s";
	WP_CLI::log( 'Creating wp-config.php...' );
	WP_CLI::launch( \WP_CLI\Utils\esc_cmd( $config,  $path, getSiteDeets('dbname'), getSiteDeets('dbuser'), getSiteDeets('dbpass'), $dbhost );
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
	$mysqli = new mysqli($dbhost, $dbuser, $dbpass);
	if (! $mysqli) {
		WP_CLI::error(	sprintf(	"Unable to connect to database '%s' with user '%s'.",$dbuser, $dbpass));
		return;
	}
	$sql = "CREATE DATABASE IF NOT EXISTS `".$dbname.	"` DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci;";
	if (! $mysqli->query($sql)) {
		WP_CLI::error(sprintf("Unable to create new schema '%s'.", $dbname));
		return;
	}	$mysqli->close();       
		WP_CLI::success(sprintf("Created '%s' database.",$dbname));
	}
			
	public function std ($args, $assoc_args)
	{
		$config = \WP_CLI::get_runner()->config;
		$extra_config = \WP_CLI::get_runner()->extra_config;
	WP_CLI::log($config);
	WP_CLI::log($extra_config);
	}

	public function fnrin( )
	{
		$config = \WP_CLI::get_runner()->config;
		$extra_config = \WP_CLI::get_runner()->extra_config;
		$path = getSiteDeets('path');
		WP_CLI::log( 'Removing extra themes...' );
		WP_CLI::launch( \WP_CLI\Utils\esc_cmd( 'wp --path=%s theme delete twentyfifteen', $path ) );
		WP_CLI::launch( \WP_CLI\Utils\esc_cmd( 'wp --path=%s theme delete twentysixteen', $path ) );
		WP_CLI::log( 'Removing transients & regen any lost pics...' );
		WP_CLI::launch( \WP_CLI\Utils\esc_cmd( 'wp --path=%s transient delete --all', $path ) );
		WP_CLI::launch( \WP_CLI\Utils\esc_cmd( 'wp --path=%s media regenerate --only-missing --yes', $path ));
	}	
}	
WP_CLI::add_command('tp', 'tpCLI');