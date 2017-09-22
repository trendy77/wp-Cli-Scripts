<?php

//export WP
	$aliaie=array('@fnr','@fnres');
	
	foreach ($aliaie as $alias){
		echo ' At site ' . $alias." ";
		
		$input=array();
			$inputNum = 0;
			$input[$inputNum] = ('cache flush');
			$input[$inputNum++] = ('transient delete-expired');
	$input[$inputNum++] = ('db check');  
	$input[$inputNum++] = ('db optimize');
	$input[$inputNum++] = ('db repair'); 	
	$input[$inputNum++] = ('export --skip_comments --filename_format='$alias . $inputNum .'.xml --start_date=2016-01-01 --end_date=2016-12-31');
	$input[$inputNum++] = ('export --skip_comments --filename_format='$alias . $inputNum .'.xml --start_date=2017-01-01 --end_date=2017-02-31');
	$input[$inputNum++] = ('export --skip_comments --filename_format='$alias . $inputNum .'.xml --start_date=2017-03-01 --end_date=2017-05-31');
	$input[$inputNum++] = ('export --skip_comments --filename_format='$alias . $inputNum .'.xml --start_date=2017-06-01 --end_date=2017-08-31');
	$input[$inputNum++] = ('export --skip_comments --filename_format='$alias . $inputNum .'.xml --start_date=2017-09-01 --end_date=2017-09-20');

		foreach ($input as $comms){	
		// do it for this 'alias'
		
		$cmd = 'wp ' . $alias . ' ' . $comms;
		echo exec($cmd)."\n";
		}
		
	echo 'done...' . $alias;
	}
echo 'done all.';


