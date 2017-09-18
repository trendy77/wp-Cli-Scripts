<?php
	// array of sites to iterate through...
$aliaie=array('@orgbiz','@gov','@glo','@orgbizes','@tp','@tpau','@vape','ckww','@spec','@med', '@sty');
	
foreach ($aliaie as $alias){
	echo 'At site ' . $alias;
	// commands to send...
			// update all plugs
	$input=array();
	//$input[0] = ('dbsnap');  
	$input[1] = ('plugin install --activate /home/organ151/public_html/ombiz/ithemessync202.zip');
	// others....

		// wp db export
		//wp db import backup.sql
		//wp search-replace 'dev.example.com' 'public_html.example.com'
			//wp search-replace --dry-run 'dev.example.com' 'public_html.example.com'
		// install a plug?	
			// try typing plugin = 'A PLUGIN' to install
				
		//if (isset($_GET['plugin'])){
		//$input[5]=('wp plugin install ' . $_GET['plugin']);	
	//	}
	// install theme?
	//              wp theme activate twentysixteen
//	$input[4]=('theme install /home/organ151/themeN.zip');
		
		foreach ($input as $comms){	
		// do it for this 'alias'
		$cmd = 'wp ' . $alias . ' ' . $comms;
		echo exec($cmd)."\n";
		}
			
	}
		
	echo 'done';
?>