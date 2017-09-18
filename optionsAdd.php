<?php
	// array of sites to iterate through...
	
	//$aliaie=array('@us','@spec','@style','@gov','@glo','@orgbizes','@tp','@vape','@orgbiz', '@ckww');
	
	$aliaie=array('@us');
	
foreach ($aliaie as $alias){
	echo ' At site ' . $alias." ";
	$input=array();
	$inputNum = 0;
	//$input[$inputNum] = ('db tables --format=csv');  
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
	$input[$inputNum++] = ('option add post create --post_type=page --post_title=Home --post_status=publish --field=ID --format=ids');
	$input[$inputNum++] = ('post delete $(wp ' . $alias . ' post list --post_type=page --posts_per_page=1 --post_status=publish --pagename="sample-page" --field=ID --format=ids');  
	$input[$inputNum++] = ('menu create "Main Navigation"');
	
	$input[$inputNum++] = ('option add post create --post_type=page --post_title=Home --post_status=publish --field=ID --format=ids');
	$input[$inputNum++] = ('post delete $(wp ' . $alias . ' post list --post_type=page --posts_per_page=1 --post_status=publish --pagename="sample-page" --field=ID --format=ids');  
	$input[$inputNum++] = ('menu create "Main Navigation"');
	$input[$inputNum++] = ('rewrite structure "/%category%/%postname%/" --hard'};
	$input[$inputNum++] = ('rewrite flush --hard');
	$input[$inputNum++] = ('menu location assign main-navigation primary');
	$input[$inputNum++] = ('option update posts_per_page 6');
	$input[$inputNum++] = ('option update show_on_front "page"');  
	$input[$inputNum++] = ('option update page_on_front $(wp ' .$alias .' post list --post_type=page --post_status=publish --posts_per_page=1 --pagename=home --field=ID --format=ids)';
		$input[$inputNum++] = ('export --filename_format='.$alias.'.xml --dir=home/organ151/Scripts --skip_comments'); //[--category=<name>]
		$input[$inputNum++] = ('config push ' . $alias . ' --format=csv --dir=home/organ151/Scripts');

// INSTALL
# Download WordPress core
//("core download")

//$input[0] = ("core install");
# Import content from a WXR file
//$input[1] = ("import $IMPORTXML --authors=create --skip=image_resize");
//$input[2] = ('wp plugin install wordpress-importer --activate');  
//$input[3] = ("import $IMPORTXML --authors=create --skip=image_resize");
//$input[4] = ("media regenerate --only-missing --yes");
//$input[5] = ("theme install evolve --activate"); 
//$input[6] = ("scaffold child-theme childTheme --parent_theme=evolve --theme_name='childTheme' --author='TDAFischer' --author_uri=http://orgmy.biz --activate");
//$input[6] = ("option add my_option foobar

		foreach ($input as $comms){	
		// do it for this 'alias'
		$cmd = 'wp ' . $alias . ' ' . $comms;
		echo exec($cmd)."\n";
		}
	echo 'done...' . $alias;
	}
	echo 'done all...';
?>