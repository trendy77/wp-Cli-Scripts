<?php
	// array of sites to iterate through...
$aliaie=array('@gov','@glo','@orgbizes','@tp','@tpau','@vape','@orgbiz');
	
foreach ($aliaie as $alias){
	echo 'At site ' . $alias;
	// commands to send...
	$input=array();
	$input[0] = ('plugin update --all');  
	$input[1] = ('cache flush');
	$input[2] = ('transient delete-expired');
	$input[3] = ('db optimize');	
	//$input[4]= ('media regenerate --only-missing --yes');
	// regen media esp. thumbs?
	//$input[5] = ('plugin install --activate https://wordpress.org/plugins/advanced-database-cleaner');
		# Re-generate all thumbnails that have IDs between 1000 and 2000.
//$ seq 1000 2000 | xargs wp media regenerate
		// wp db export
		//wp db import backup.sql
		//wp search-replace 'dev.example.com' 'public_html.example.com'
		//wp search-replace --dry-run 'dev.example.com' 'public_html.example.com'
		//wp theme activate twentysixteen
	//$input[4]=('wp theme install /home/organ151/themeN.zip');
		
		foreach ($input as $comms){	
		// do it for this 'alias'
		$cmd = 'wp ' . $alias . ' ' . $comms;
		echo exec($cmd)."\n";
		}
		echo 'onto next site"\n"';	
	}
	echo 'done';
?>