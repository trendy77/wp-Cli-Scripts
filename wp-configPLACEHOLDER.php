<?php

$IDENTIFIER ='spec';

require_once('/home/organ151/Scripts/tSiteNoClass.php');

/** Location of your WordPress configuration. */
require_once('/home/organ151/Scripts/greyMatter/'. $IDENTIFIER . '.php');

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
    define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');