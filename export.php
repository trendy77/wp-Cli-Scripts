<?php
	// array of sites to iterate through...
	
	//$aliaie=array('us','spec','style','gov','glo','orgbizes','tp','vape','orgbiz', 'ckww');
	
$aliaie=array('us');
	
	foreach ($aliaie as $alias){
	echo ' At site ' . $alias." ";
	$input=array();
	$inputNum = 0;
	//$input[$inputNum] = ('db tables --format=csv');  
	$input[$inputNum] = ('cache flush');
	$input[$inputNum++] = ('transient delete-expired');
	$input[$inputNum++] = ('db check');  
	$input[$inputNum++] = ('db optimize');
	$input[$inputNum++] = ('db repair'); 	
	$input[$inputNum++] = 'post delete $(wp ' . $alias . ' post list --post_type=page --posts_per_page=1 --post_status=publish --pagename="sample-page" --field=ID --format=ids)';  
	# $input[$inputNum++] = ('rewrite structure "/%category%/%postname%/" --hard'};
	# $input[$inputNum++] = ('rewrite flush --hard');
		$input[$inputNum++] = ('export --filename_format='.$alias.'.xml --dir=home/organ151/Scripts --skip_comments'); //[--category=<name>]
		$input[$inputNum++] = ('config push ' . $alias . ' --format=csv --dir=home/organ151/Scripts');


# Import content from a WXR file
//$input[] = ("import $IMPORTXML --authors=create --skip=image_resize");
//$input[] = ('wp plugin install wordpress-importer --activate');  
//$input[] = ("media regenerate --only-missing --yes");
//$input[] = ("theme install evolve --activate"); 
//$input[] = ("scaffold child-theme childTheme --parent_theme=evolve --theme_name='childTheme' --author='TDAFischer' --author_uri=http://orgmy.biz --activate");


		foreach ($input as $comms){	
		// do it for this 'alias'
		$cmd = 'wp @' . $alias . ' ' . $comms;
		echo exec($cmd)."\n";
		}
		
	echo 'done...' . $alias;
	}
	echo 'done all.';
?>