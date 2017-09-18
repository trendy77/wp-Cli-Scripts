<?php
	// array of sites to iterate through...
$aliaie=array('@ckww','@ckwwes');
	
foreach ($aliaie as $alias){
	echo 'At site ' . $alias;
	// commands to send...
			// update all plugs
	$input=array();
	$input[0] = ('plugin update --all');  
	$input[1] = ('cache flush');
	$input[2] = ('transient delete-expired');
	$input[3] = ('db optimize');	
	$input[4]= ('media regenerate --only-missing --yes');
	// regen media esp. thumbs?
	//$input[3] = ('media  $(wp eval 'foreach( get_posts(array("category" => 2,"fields" => "ids")) as $id ) { echo get_post_thumbnail_id($id). " "; }')
		
//$ seq 1000 2000 | xargs wp media regenerate
//	$input[4]=('wp plugin install /home/organ151/Scripts/plug/codepress.zip');	

	// others....

		// wp db export
		//wp db import backup.sql
		//wp search-replace 'dev.example.com' 'public_html.example.com'
			//wp search-replace --dry-run 'dev.example.com' 'public_html.example.com'
		// install a plug?	
			// try typing plugin = 'A PLUGIN' to install
				
	//	if (isset($_GET['plugin'])){
	//	$input[5]=('plugin install ' . $_GET['plugin']);	
//}
	// install theme?
	//              wp theme activate twentysixteen
	//$input[4]=('wp theme install /home/organ151/themeN.zip');
		
		foreach ($input as $comms){	
		// do it for this 'alias'
		$cmd = 'wp ' . $alias . ' ' . $comms;
		echo exec($cmd)."\n";
		}
			
	}
		
	echo 'done';
?>