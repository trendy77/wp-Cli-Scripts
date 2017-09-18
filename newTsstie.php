<?php

class autoTPost
{
	/**
	 * config
	 */
	private $_wpuser;
    private $_wppass;
	private $_dbuser;
    private $_dbpass;
    private $_url;
	private $_imgMaxWidth;
	private $_imgMaxHeight;
	/**
	 * constants
	 */
	const DELIMITER = '|';
	/**
	 * internals
	 */
	private $_client;
	private $_title;
	private $_content;
	private $_slug;
	private $_tags;
	private $_categories;
	private $_excerpt;
	private $_postData = array();
	
	
	public function __construct()
	{
	  $this->_path = getDeets['path'];
		$this->_dbuser = getDeets['dbuser'];		// sets user --> from config.ini 'user'.
	    $this->_dbpass = getDeets['dbpass'];
		$this->_dbpass = 'newOb';
	    $this->_url = getDeets['url'];
	    $this->_wpuser = getDeets['_wpuser'];
		$this->_wppass = getDeets['_wppass'];
		
	}
	
	public function createSite()
	{
	
    // Download WordPress
    $download = "wp core download --path=%s";
    WP_CLI::log( 'Downloading WordPress...' );
    WP_CLI::launch( \WP_CLI\Utils\esc_cmd( $download, $PATH ) );

    // Create the wp-config file
    $config = "wp --path=%s core config --dbname=%s --dbuser=%s --dbpass=%s --dbhost=localhost";
    WP_CLI::log( 'Creating wp-config.php...' );
    WP_CLI::launch( \WP_CLI\Utils\esc_cmd( $config, $PATH, $dbname, $dbuser, $dbpass, $dbhost ) );

    // Create the database
    $db_create = "wp --path=%s db create";
    WP_CLI::log( 'Creating the database...' );
    WP_CLI::launch( \WP_CLI\Utils\esc_cmd( $db_create, $PATH ) );

    // Install WordPress core.
    $admin_user  = $wpuser;
    $admin_pass  = $wppass';
    $admin_email = 'thecreator@orgmy.biz';
    $subcommand  = 'install';
    $url    = $url;
	$title = getDeets('tit');
    if ( isset( $assoc_args['multisite'] ) ) {
        $subcommand = 'multisite-install';
    }

    $core_install = "wp --path=%s core %s --url=%s --title=%s --admin_user=%s --admin_password=%s --admin_email=%s";
    WP_CLI::log( 'Installing WordPress...' );
    WP_CLI::launch( \WP_CLI\Utils\esc_cmd( $core_install, $PATH, $subcommand, $url , $title, $admin_user, $admin_pass, $admin_email ) );

    WP_CLI::success( "WordPress installed at $PATH" );
}
		
	}

	
	public function setOpts()
	{
	
    // Download WordPress
    $download = "wp core download --$PATH=%s";
    WP_CLI::log( 'Downloading WordPress...' );
    WP_CLI::launch( \WP_CLI\Utils\esc_cmd( $download, $PATH ) );

	}
	