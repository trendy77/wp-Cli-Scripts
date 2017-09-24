<?php
// menu setup

$aliaie=array('@fnr');
//,'@us','@spec','@style','@gov','@glo','@orgbizes','@tp','@vape','@orgbiz', '@ckww');
	$inputNum = 0;
	foreach ($aliaie as $alias){
	
		echo ' At site ';
		$input=array();
		
			$input[$inputNum] = ('user import-csv /home/organ151/Scripts/users1.csv');	
			$input[$inputNum++] = ('rewrite structure "/%category%/%postname%/" --hard');
			$input[$inputNum++] = ('rewrite flush --hard');
			$input[$inputNum++] = ('plugin install wordpress-importer --activate');  
			$input[$inputNum++] = ('import /home/organ151/Scripts/fakenewsregistry.wordpress.2017-09-22.xml --authors=create --skip=image_resize	');
			$input[$inputNum++] = ('post create --post_type=page --post_title=Contact --post_status=publish --field=ID --format=ids');
			$input[$inputNum++] = ('post create --post_type=page --post_title=Terms --post_status=publish --field=ID --format=ids');
			$input[$inputNum++] = ('post create --post_type=page --post_title=More... --post_status=publish --field=ID --format=ids');
			$input[$inputNum++] = ('post create --post_type=page --post_title=Latest-Stories --post_status=publish --field=ID --format=ids');
			$input[$inputNum++] = ('post create --post_type=page --post_title=Viral-Content --post_status=publish --field=ID --format=ids');
			$input[$inputNum++] = ('post create --post_type=page --post_title=Home --post_status=publish --field=ID --format=ids');
			$input[$inputNum++] = ('menu create "Main Navigation"');
					$input[$inputNum++] = ('menu item add-post main-navigation Home --position=1');    #menu item update Latest --parent-id=
					$input[$inputNum++] = ('menu item add-post main-navigation Latest --position=2');  #menu item update Viral --parent-id= 
					$input[$inputNum++] = ('menu item add-post main-navigation Viral --position=3');	
					$input[$inputNum++] = ('menu item add-post main-navigation More... --position=4');
					$input[$inputNum++] = ('menu location assign main-navigation primary');
					$input[$inputNum++] = ('menu create "Catgory Navigation"');
					
					$input[$inputNum++] = ('term list --format=csv');
										
					$input[$inputNum++] = ('sidebar list --format=csv');
					
					$input[$inputNum++] = ('widget list --format=csv');
								
			//wp term recount category post_tag
			$input[$inputNum++] = ('option update posts_per_page 6');
			$input[$inputNum++] = ('option update show_on_front "page"');  
			$input[$inputNum++] = ("option update page_on_front $(wp ' .$alias .' post list --post_type=page --post_status=publish --posts_per_page=1 --pagename=home')");
			$input[$inputNum++] = ('menu location assign category-navigation top');
	
		foreach ($input as $comms){	
			$cmd = 'wp ' . $alias . ' ' . $comms;
			echo exec($cmd)."\n";
		}
		echo 'done...' . $alias;
	}
	