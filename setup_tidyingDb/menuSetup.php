<?php
// menu setup

$aliaie=array('@fnr','@us','@spec','@style','@gov','@glo','@orgbizes','@tp','@vape','@orgbiz', '@ckww');
	$inputNum = 0;

	foreach ($aliaie as $alias){
	
		echo ' At site ';
		$input=array();
		
			$input[$inputNum++] = 'post create --post_type=page --post_title=Home --post_status=publish --field=ID --format=ids)';
			$input[$inputNum++] = ('menu create "Main Navigation"');
			$input[$inputNum++] = ('menu location assign main-navigation primary');
			$input[$inputNum++] = ('option update posts_per_page 6');
			$input[$inputNum++] = ('option update show_on_front "page"');  
			$input[$inputNum++] = ('option update page_on_front $(wp ' .$alias .' post list --post_type=page --post_status=publish --posts_per_page=1 --pagename=home --field=ID --format=ids');
			$input[$inputNum++] = ('menu create "Catgory Navigation"');
			$input[$inputNum++] = ('menu location assign category-navigation top');
			#$input[$inputNum++] = ('menu add ' dfsdfsd
			#$input[$inputNum++] = ('menu l'
			#$input[$inputNum++] = ('menu l'
		
			$input[$inputNum++] = ('menu location assign category-navigation top');
			#$input[$inputNum++] = ('menu add ' dfsdfsd
			#$input[$inputNum++] = ('menu l'
			#$input[$inputNum++] = ('menu l'
	

		foreach ($input as $comms){	
			$cmd = 'wp ' . $alias . ' ' . $comms;
			echo exec($cmd)."\n";
		}
		echo 'done...' . $alias;
	}
	echo 'done all...';