<?php
// install w. license WPMIGRATE
	
	$inputNum = 0;
	$aliaie=array('@fnr','@us','@spec','@style','@gov','@glo','@orgbizes','@tp','@vape','@orgbiz', '@ckww');
	$alias = '@fnr';
	
		//	foreach ($aliaie as $alias){
		//	echo ' At site ' . $alias." ";
	
	
		$input=array();
			
			$input[$inputNum] = ('plugin install "//deliciousbrains.com/dl/wp-migrate-db-pro-latest.zip?licence_key=adde1f7a-25c8-457c-8c6b-6b96dd7481ca&site_url=organisemybiz.com/fakenews"');  
			$input[$inputNum++] = ('plugin install "//deliciousbrains.com/dl/wp-migrate-db-pro-cli-latest.zip?licence_key=adde1f7a-25c8-457c-8c6b-6b96dd7481ca&site_url=organisemybiz.com/fakenews"');  
			
				foreach ($input as $comms)
				{	
					$cmd = 'wp ' . $alias . ' ' . $comms;
					echo exec($cmd)."\n";
				}
			echo 'done.';