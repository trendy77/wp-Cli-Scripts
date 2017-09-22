<?php
	// array of sites to iterate through...
$aliaie=array('@gov','@glo','@orgbizes','@tp','@vape','@orgbiz');
	
foreach ($aliaie as $alias){
	echo ' At site ' . $alias.' ';
	// commands to send...
				// update all plugs
	$input=array();
	$input[0] = ("search-replace 'embedly' 'embedyt'");  
	//$input[1] = ('cache flush');
	
		foreach ($input as $comms){	
		// do it for this 'alias'
		$cmd = 'wp ' . $alias . ' ' . $comms;
		echo exec($cmd)." ";
		}
	
		echo 'onto next site ...';	
	}
	echo 'done';
?>