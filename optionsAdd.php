

	$input[$inputNum++] = ('wp plugin install wordpress-importer --activate');  
	$input[$inputNum++] = ("import /home/organ151/Scripts/fakenewsregistry.wordpress.2017-09-20.001.xml --authors=create --skip=image_resize");


	$input[$inputNum++] = ('user import-csv /home/organ151/Scripts/users1.csv');	
	$input[$inputNum++] = ('post create --post_type=page --post_title=Home --post_status=publish --field=ID --format=ids');
	$input[$inputNum++] = ('post delete $(wp ' . $alias . ' post list --post_type=page --posts_per_page=1 --post_status=publish --pagename="sample-page" --field=ID --format=ids');  	
	$input[$inputNum++] = ('scaffold child-theme evloveChild --parent_theme=evolve --theme_name="evloveChild" --author="TDAFischer" --author_uri=http://orgmy.biz --activate');
