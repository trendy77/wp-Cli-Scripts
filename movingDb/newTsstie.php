<?php

class tSite
{
	/**
	 * config
	 */
	private $_wpuser;
    private $_wppass;
	private $_dbuser;
    private $_dbpass;
    private $_url;
	private $_path;
	private $_dbname;
	/**
	 * constants
	 */
	const DELIMITER = '|';
	/**
	 * internals
	 */
	public function __construct()
	{
	  $this->_path = '/home/public_html/fakenews';
		$this->_dbuser = 'organRemote';		// sets user --> from config.ini 'user'.
	    $this->_dbpass = 'organRemotePassword';
		$this->_dbname = 'newOb';
	    $this->_url = 'fakenewsregistry.org';
	    $this->_wpuser = 'theCreator';
		$this->_wppass = '5ekoeXMFRIXuJ&lWLA';
	}
	
	public function createSite()
	{
		// Download WordPress
	  $download = "wp core download --path=".getSiteDeets('$path') ;
	
		echo 'Downloading WordPress...' ;
 		exec cmd( $download );
	
	}
	
	public function setOpts()
	{

	}