<?php
	// WP IMPORTER SCRIPT
	//$aliaie=array('@us','@spec','@style','@gov','@glo','@orgbizes','@tp','@vape','@orgbiz', '@ckww');
	//$aliaie=array('@us');
	//	foreach ($aliaie as $alias){
	//	echo ' At site ' . $alias." ";
		$alias = '@fnr';
		$input=array();
			$inputNum = 0;
			$input[$inputNum] = ('plugin install wordpress-importer --activate');  
			$input[$inputNum++] = ("import /home/organ151/Scripts/fakenewsregistry.wordpress.2017-09-20.000.xml --authors=create --skip=image_resize");
			
			$input[$inputNum++] = 'post create --post_type=page --post_title=Home --post_status=publish --field=ID --format=ids)';
		
			$input[$inputNum++] = ('menu create "Main Navigation"');
			$input[$inputNum++] = ('menu location assign main-navigation primary');
	
			$input[$inputNum++] = ('option update posts_per_page 6');
			$input[$inputNum++] = ('option update show_on_front "page"');  
			$input[$inputNum++] = ('option update page_on_front $(wp ' .$alias .' post list --post_type=page --post_status=publish --posts_per_page=1 --pagename=home --field=ID --format=ids');

			$input[$inputNum++] = ('menu create "Catgory Navigation"');
			
			$input[$inputNum++] = ('user import-csv /home/organ151/Scripts/users1.csv');	
		
			$input[$inputNum++] = ('rewrite structure "/%category%/%postname%/" --hard');
			$input[$inputNum++] = ('rewrite flush --hard');
		
			$input[$inputNum++] = ('theme install /home/organ151/public_html/ombiz/linstar.zip'); 
			$input[$inputNum++] = ('scaffold child-theme LINSTAR --parent_theme=linstar --author="TDAFischer" --author_uri=http://orgmy.biz --activate');
				
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
		};
		echo 'done';