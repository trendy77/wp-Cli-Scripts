<?php
	// array of sites to iterate through...
$aliaie=array('@us','@spec','@style','@gov','@glo','@orgbizes','@tp','@vape','@orgbiz', '@ckww');
	//$aliaie=array('@us');
	foreach ($aliaie as $alias){
		echo ' At site ' . $alias." ";
		
		$site = new TSite($alias);
		echo $site->createSite();	
		echo $site->setOpts();
				
		$input=array();
			$inputNum = 0;
			//$input[$inputNum] = ('db tables --format=csv');  
			$input[$inputNum] = ('import /home/organ151/Scripts/'.$alias.'.xml --path='.$PATH .' --authors=create'); //[--category=<name>]
			$input[$inputNum++] = ('cache flush');
			$input[$inputNum++] = 'post create --post_type=page --post_title=Home --post_status=publish --field=ID --format=ids)';
			$input[$inputNum++] = ('menu create "Main Navigation"');
			$input[$inputNum++] = ('menu location assign main-navigation primary');
			$input[$inputNum++] = ('option update posts_per_page 6');
			$input[$inputNum++] = ('option update show_on_front "page"');  
			$input[$inputNum++] = ('option update page_on_front $(wp ' .$alias .' post list --post_type=page --post_status=publish --posts_per_page=1 --pagename=home --field=ID --format=ids)';
			$input[$inputNum++] = ('menu create "Catgory Navigation"');
			#$input[$inputNum++] = ('user import-csv /home/organ151/Scripts/users1.csv');	
			$input[$inputNum++] = ('media regenerate --only-missing --yes');
			$input[$inputNum++] = ('rewrite structure "/%category%/%postname%/" --hard');
			$input[$inputNum++] = ('rewrite flush --hard');
			$input[$inputNum++] = ('menu location assign category-navigation top');
			#$input[$inputNum++] = ('menu add ' dfsdfsd
			#$input[$inputNum++] = ('menu l'
			#$input[$inputNum++] = ('menu l'
			$input[$inputNum++] = ('theme install evolve'); 
			$input[$inputNum++] = ('scaffold child-theme evloveChild --parent_theme=evolve --theme_name="evloveChild" --author="TDAFischer" --author_uri=http://orgmy.biz --activate');
				
				//$input[0] = ("core install");
				# Import content from a WXR file
				//$input[1] = ("import $IMPORTXML --authors=create --skip=image_resize");
		//$input[2] = ('wp plugin install wordpress-importer --activate');  
		//$input[3] = ("import $IMPORTXML --authors=create --skip=image_resize");
		//$input[4] = ("media regenerate --only-missing --yes");
		//$input[6] = ("option add my_option foobar

		foreach ($input as $comms){	
			$cmd = 'wp ' . $alias . ' ' . $comms;
			echo exec($cmd)."\n";
		}
		echo 'done...' . $alias;
	}
	echo 'done all...';
?>