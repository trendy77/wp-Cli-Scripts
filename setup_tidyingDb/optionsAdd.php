<?php
	include_once('../tp-config.php');
	
		$inputNum = 0;
		$aliaie=array('@us','@spec','@style','@gov','@glo','@orgbizes','@tp','@vape','@orgbiz', '@ckww');

		foreach ($aliaie as $alias){
			echo ' At site ' . $alias." ";
		$input=array();
		$input[$inputNum] = ('option add ua '.$UA);
		$input[$inputNum++] = ('option add addy ' . $ADDY);
		$input[$inputNum++] = ('option add fbtit ' . $FBTIT);  
		$input[$inputNum++] = ('option add fbpageid '.$FBPAGEID);
		$input[$inputNum++] = ('option add fbappid '. $FBAPPID); 	
		$input[$inputNum++] = ('option add hash ' . $HASH);
		$input[$inputNum++] = ('option add twitcnkey ' . $TWITCNKEY);  
		$input[$inputNum++] = ('option add twitkey '.$TWITKEY);
		$input[$inputNum++] = ('option add twitcnsrt '. $TWITCNSRT); 
		$input[$inputNum++] = ('option add twitsrt ' . $TWITSCT);

		foreach ($input as $comms){	
		$cmd = 'wp ' . $alias . ' ' . $comms;
		echo exec($cmd);
		}
	echo 'done.' . $alias;
	}
	echo 'done all.';
?>