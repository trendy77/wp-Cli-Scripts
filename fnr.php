<?php
//fnr import
	// array of sites to iterate through...

 $aliaie=array('fnr');
	foreach ($aliaie as $alias){
	$input=array();
	$inputNum = 0;
	//$input[$inputNum] = ('db tables --format=csv');  
	$input[$inputNum] = ('cache flush');
	$input[$inputNum++] = ('wp plugin install wordpress-importer --activate');  
//	$input[$inputNum++] = ("import /home/organ151/Scripts/fakenewsregistry.wordpress.2017-09-20.001.xml --authors=create --skip=image_resize");

//$input[4] = ("media regenerate --only-missing --yes");
//$input[6] = ("option add my_option foobar

	$input[$inputNum++] = ('transient delete-expired');
	$input[$inputNum++] = ('db check');  
	$input[$inputNum++] = ('db optimize');
	$input[$inputNum++] = ('db repair'); 
	$input[$inputNum++] = ('user import-csv /home/organ151/Scripts/users1.csv');	
	$input[$inputNum++] = ('post create --post_type=page --post_title=Home --post_status=publish --field=ID --format=ids');
	$input[$inputNum++] = ('post delete $(wp ' . $alias . ' post list --post_type=page --posts_per_page=1 --post_status=publish --pagename="sample-page" --field=ID --format=ids');  
	$input[$inputNum++] = ('menu create "Main Navigation"');
	$input[$inputNum++] = ('media regenerate --only-missing --yes');
	$input[$inputNum++] = ('rewrite structure "/%category%/%postname%/" --hard');
	$input[$inputNum++] = ('rewrite flush --hard');
	$input[$inputNum++] = ('menu location assign main-navigation primary');
	$input[$inputNum++] = ('option update posts_per_page 6');
	$input[$inputNum++] = ('option update show_on_front "page"');  
	$input[$inputNum++] = ('option update page_on_front $(wp ' .$alias .' post list --post_type=page --post_status=publish --posts_per_page=1 --pagename=home --field=ID --format=ids)');
	$input[$inputNum++] = ('theme install evolve'); 
	$input[$inputNum++] = ('scaffold child-theme evloveChild --parent_theme=evolve --theme_name="evloveChild" --author="TDAFischer" --author_uri=http://orgmy.biz --activate');


		foreach ($input as $comms){	
		// do it for this 'alias'
		$cmd = 'wp ' . $alias . ' ' . $comms;
		echo exec($cmd)."\n";
		}
		echo 'done all...';
	}
?>