<?php
// routine Maintenance for WP sites
// run in bash by typing in your terminal 'php routineM.php' 
//and hit ENTER...

// array of sites to iterate through...
$aliaie=array('@gov','@glo','@orgbizes','@tp','@tpau','@vape','@orgbiz');
$inputNum=0;

foreach ($aliaie as $alias)
{
	
	echo 'At site ' . $alias;
		// commands to send...
		$input=array();
		$input[$inputNum] = ('plugin update --all');  
		$input[$inputNum++] = ('cache flush');
		$input[$inputNum++] = ('transient delete-expired');
		$input[$inputNum++] = ('db check');  
		$input[$inputNum++] = ('db optimize');
		$input[$inputNum++] = ('db repair'); 
		$input[$inputNum++] = ('db optimize');	
		$input[$inputNum++]= ('media regenerate --only-missing --yes');
	
		//$input[5] = ('plugin install --activate https://wordpress.org/plugins/advanced-database-cleaner');
	
		foreach ($input as $comms){	
		$cmd = 'wp ' . $alias . ' ' . $comms;
		echo exec($cmd)."\n";
		}
	echo 'onto next site...';	
}