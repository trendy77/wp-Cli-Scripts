<?php

// export WP-CLI for WP sites
// run in bash by typing in your terminal 'php routineM.php' 
//and hit ENTER...

$aliaie=array('@gov','@glo','@orgbizes','@tp','@tpau','@vape','@orgbiz');
	$inputNum=0;
	
	foreach ($aliaie as $alias)
	{
		echo ' At site ' . $alias . ' ';
		$input= array();
		$input[$inputNum++] = 'post delete $(wp ' . $alias . ' post list --post_type=page --posts_per_page=1 --post_status=publish --pagename="sample-page" --field=ID --format=ids)';  
		$input[$inputNum++] = ('export --filename_format='.$alias.'.xml --dir=home/organ151/Scripts --skip_comments'); //[--category=<name>]
		$input[$inputNum++] = ('config push ' . $alias . ' --format=csv --dir=home/organ151/Scripts');

	foreach ($input as $comms)
	{	
		// do it for this 'alias'
		$cmd = 'wp @' . $alias . ' ' . $comms;
	
	}
		

	echo 'done all.';
}