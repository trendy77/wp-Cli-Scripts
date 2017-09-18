<?php

// common vars to define for all...
	define('WP_CACHE', true);
	define('WP_DEBUG', false);
	define('SAVEQUERIES', false);
	define('SCRIPT_DEBUG', false);
	define('CONCATENATE_SCRIPTS', true );
	define('WP_DEBUG_LOG', true);
	define('WP_DEBUG_DISPLAY', false);
	define('ENFORCE_GZIP', true);


switch($GLOBALS['IDENTIFIER']){
		case 'example':
		// site info	
			define('PATH','/home/organ151/public_html/au');
			define('USER','theCreator');
			define('PASS','t0mzdez2!Q');
			define('ADDY','trendypublishing.com.au');
		// analytics tags
			define('UA','UA-84079763-11');
		//facebook
			define('FBTIT','trendypublishing'	);
			define('FBPAGEID','1209167032497461');
			define('FBAPPID','867691370038214'	);
		//twitter
			define('HASH','@TrendyPublishin'	);
			define('TWTIT' , "newssansfact");
			define('TWITCNKEY' , "2vOkc55DN1UbX6NJjJawC7UNM");
			define('TWITCNSRT' , "tcXIP5xPmXqNRgmiLLBVoEfY1hyKiAaDhhbi4bzrmbB3Urdl6V");
			define('TWITKEY' , "817542417788194816-RpuUbfOb3j8hm5v0HRny4XcQ4Ffv0Lq");
			define('TWITSCT' , "6NL6sJ30NN14L36GiODkA69yvn352hnQtkCtttItGAeI5");
		// wp site info
			define('WP_HOME','https://trendypublishing.com');
			define('WP_SITEURL','https://trendypublishing.com');
			//define('DB_NAME', 'neoDbToFly');
			//define('DB_USER', 'organ151_66');
			//define('DB_PASSWORD', 'westside77!');
			define('TABLE_PREFIX','wp_'); 
			define( 'WP_POST_REVISIONS', false);
			break;			
		
		case 'tpau':
			define('PATH',	'/home/organ151/public_html/au');
			define('USER'	,'theCreator');
			define('PASS'	,'t0mzdez2!Q'	);
			define('ADDY'	,'trendypublishing.com.au');
			define('UA'	,'UA-84079763-11');
			define('FBPAGEID','1209167032497461');
			define('FBAPPID','867691370038214');
			define('FBTIT','trendypublishing');
			define('HASH','@TrendyPublishin'	);
			define('TWTIT' , "newssansfact");
			define('TWITCNKEY' , "2vOkc55DN1UbX6NJjJawC7UNM");
			define('TWITCNSRT' , "tcXIP5xPmXqNRgmiLLBVoEfY1hyKiAaDhhbi4bzrmbB3Urdl6V");
			define('TWITKEY' , "817542417788194816-RpuUbfOb3j8hm5v0HRny4XcQ4Ffv0Lq");
			define('TWITSCT' , "6NL6sJ30NN14L36GiODkA69yvn352hnQtkCtttItGAeI5");
			break;	
		
		case 'tp':
			define('PATH','/home/organ151/public_html/tp');
			define('USER','theCreator');
			define('PASS','Joker999!');
			define('ADDY','trendypublishing.com');
			define('UA','UA-84079763-11');
			define('FBTIT','trendypublishing');
			define('FBPAGEID','1209167032497461');
			define('FBAPPID','867691370038214');
			define('HASH','@trendyPublishin');
			define('TWITCNKEY','');
			define('TWITCNSRT','');
			define('TWITKEY','');
			define('TWITSCT','');
			break;

			case'dev':
			define('PATH','/home/organ151/public_html/au');
			define('USER','theCreator');
			define('PASS','t0mzdez2!Q');
			define('ADDY','trendypublishing.com.au');
			define('UA','UA-84079763-11');
			define('FBPAGEID','1209167032497461');
			define('FBAPPID','867691370038214');
			define('FBTIT','trendypublishing');
			define('HASH','@trendypublishin');
			break;

			case 'orgbizes':
			define('PATH','/home/organ151/public_html/es');
			define('USER','elorganise');
			define('PASS','arribaarribaFuego');
			define('ADDY','es.organisemybiz.com');
			define('UA','UA-84079763-10');
			define('fbappId','1209167032497461');
			define('fbpageId','259565577769881');
			define('TWITCNKEY','2vOkc55DN1UbX6NJjJawC7UNM');
			define('TWITCNSRT','tcXIP5xPmXqNRgmiLLBVoEfY1hyKiAaDhhbi4bzrmbB3Urdl6V');
			define('TWITKEY','817542417788194816-RpuUbfOb3j8hm5v0HRny4XcQ4Ffv0Lq');
			define('TWITSCT','6NL6sJ30NN14L36GiODkA69yvn352hnQtkCtttItGAeI5');
			break;

			case'orgbiz':
			define('PATH','/home/organ151/public_html');
			define('USER','headlines');
			define('PASS','ExtJCJn%jRMzl1(5L5W*JBP#');
			define('ADDY','organisemybiz.com');
			define('UA','UA-84079763-6');
			define('fbappId','1209167032497461');
			define('fbpageId','259565577769881');
			define('TWITCNKEY','2vOkc55DN1UbX6NJjJawC7UNM');
			define('TWITCNSRT','tcXIP5xPmXqNRgmiLLBVoEfY1hyKiAaDhhbi4bzrmbB3Urdl6V');
			define('TWITKEY','817542417788194816-RpuUbfOb3j8hm5v0HRny4XcQ4Ffv0Lq');
			define('TWITSCT','6NL6sJ30NN14L36GiODkA69yvn352hnQtkCtttItGAeI5');
			break;

			case'vape':
			define('PATH','/home/organ151/public_html/vapedirectory');
			define('USER','trendyvape');
			define('PASS','t0mzdez2!');
			define('ADDY','vapedirectory.co');
			define('UA','UA-84079763-9');
			define('HASH','@VapeDirectoryCo');
			define('FBAPPID','1829696163961982');
			break;

			case'glo':
			define('PATH','/home/organ151/public_html/travelsearch');
			define('USER','trendyTravel');
			define('PASS','t0mzdez2!t0mzdez2!');
			define('ADDY','globetravelsearch.com');
			define('HASH','@GlobeTravelSrch');
			define('UA','UA-84079763-13');
			define('fbscrt','598188680454c7e4fe3ace0d5267ed1d');
			define('fbcltk','6013598acf467d04ee5115b4a27421de');
			define('FBAPPID','1234986849903672');
			define('FBPAGEID','232122247192377');
			define('TWITCNKEY','uQvDVa4L687Bc4ushiKPS11m7');
			define('TWITCNSRT','4mmOskv7nGhWFSVRh5QI4rQjRMvGZCJO2apwPJlGNWTVJ3RrQm');
			define('TWITKEY','848746022876598272-KvrowCYanCMFI7832EgyhyJYIlvtR03');
			define('TWITSCT','1eF9ZjfHYj7YPf0qfykJGsXPKYuBwyltJCmbbGnfgqn4N');
			break;
			
			case'gov':
			define('PATH','/home/organ151/public_html/govnews');
			define('USER','govfeed');
			define('PASS','0Q!L!Y34G^$kO8tQuS@INZg0');
			define('ADDY','govnews.info');
			define('UA','UA-84079763-8');
			define('FBAPPID','392413184462764');
			define('fbscrt','06e7300c47ae4a4d1db42f87d0b2e186');
			define('FBPAGEID','1645038759139286');
			break;

			case'fnres':
			define('PATH','/home5/organli6/public_html/es');
			define('USER','elorganise');
			define('ADDY','fakenewsregistry.org/es');
			define('PASS','arribaarribaFuego');
			define('UA','UA-84079763-11');
			define('FBAPPID','1883167178608105');
			define('fbpageId','1209167032497461');
			define('fbscrt','5492eaef66ec612e1c443285d223a2e6');
			define('FBTIT','newssansfact');
			define('TWITCNKEY','2vOkc55DN1UbX6NJjJawC7UNM');
			define('TWITCNSRT','tcXIP5xPmXqNRgmiLLBVoEfY1hyKiAaDhhbi4bzrmbB3Urdl6V');
			define('TWITKEY','817542417788194816-RpuUbfOb3j8hm5v0HRny4XcQ4Ffv0Lq');
			define('TWITSCT','6NL6sJ30NN14L36GiODkA69yvn352hnQtkCtttItGAeI5');
			break;

			case'fnr':
			define('PATH','/home5/organli6/public_html');
			define('USER','theCreator');
			define('PASS','Joker999!');
			define('ADDY','fakenewsregistry.org');
			define('FBAPPID','1883167178608105');
			define('fbpageId','1209167032497461');
			define('fbscrt','5492eaef66ec612e1c443285d223a2e6');
			define('FBTIT','newssansfact');
			define('TWITCNKEY','2vOkc55DN1UbX6NJjJawC7UNM)');
			define('TWITCNSRT','tcXIP5xPmXqNRgmiLLBVoEfY1hyKiAaDhhbi4bzrmbB3Urdl6V');
			define('TWITKEY','817542417788194816-RpuUbfOb3j8hm5v0HRny4XcQ4Ffv0Lq');
			define('TWITSCT','6NL6sJ30NN14L36GiODkA69yvn352hnQtkCtttItGAeI5');
			define('UA','UA-84079763-6');
			break;

			case'ckww':
			define('PATH','/public_html');
			define('USER','customkits');
			define('PASS','t0mzdez2!');
			define('ADDY','customkitsworldwide.com');
			define('UA','UA-85225777-1');
			break;

			case'ckwwes':
			define('PATH','/public_html/es');
			define('USER','trendinho');
			define('PASS','y(2o%3Cs82zmxc!Ckk');
			define('ADDY','es.customkitsworldwide.com');
			define('UA','UA-84079763-');
			break;
		}
					
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				}

			function otherOptions(){
			define('WP_DEBUG', false);
			define( 'CONCATENATE_SCRIPTS', true );
			define( 'FORCE_SSL_ADMIN', true );
			//define( 'WP_CONTENT_DIR', '.o/wp-content' );
			//define( 'WP_CONTENT_URL', './orgmy.biz/tp/wp-content');
			define('WP_POST_REVISIONS', false);
			define( 'WP_CACHE', true );
			define( 'WP_CRON_LOCK_TIMEOUT', 60 );
			define( 'EMPTY_TRASH_DAYS', 0 ); // Zero days
			define( 'WP_ALLOW_REPAIR', true );
			define( 'DISALLOW_FILE_EDIT', true );
			define('AUTOSAVE_INTERVAL', 68940);
			define('WP_MEMORY_LIMIT', '256M');

			}