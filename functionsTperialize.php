<?php
/**
 * tperialize functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package tperialize
 */

if ( ! function_exists( 'tperialize_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function tperialize_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on tperialize, use a find and replace
		 * to change 'tperialize' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'tperialize', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'tperialize' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'tperialize_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'tperialize_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function tperialize_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'tperialize_content_width', 640 );
}
add_action( 'after_setup_theme', 'tperialize_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function tperialize_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'tperialize' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'tperialize' ),
		 'before_widget' => '<div class="card"><aside id="%1$s" class="widget %2$s">',
 'after_widget'  => '</aside></div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'tperialize_widgets_init' );


Class My_Recent_Posts_Widget extends WP_Widget_Recent_Posts {
 function widget($args, $instance) {
  extract( $args );
  $title = apply_filters('widget_title', empty($instance['title']) ? __('Recent Posts') : $instance['title'], $instance, $this->id_base);
  if( empty( $instance['number'] ) || ! $number = absint( $instance['number'] ) )
 $number = 10;
  $r = new WP_Query( apply_filters( 'widget_posts_args', array( 'posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true ) ) );
 if( $r->have_posts() ) :
  echo $before_widget;
 if( $title ) echo $before_title . $title . $after_title; ?>
 <ul class="collection rpwidget">
 <?php while( $r->have_posts() ) : $r->the_post(); ?> 
 <li class="collection-item avatar">
 <?php echo get_the_post_thumbnail( the_post(), 'thumbnail', array( 'class' => 'alignleft circle' ) ); ?>
 <span class="title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></span>
 <p>by <?php the_author(); ?> on <?php echo get_the_date(); ?></p>
 </li>
 <?php endwhile; ?>
 </ul>
  <?php
 echo $after_widget;
  wp_reset_postdata();
  endif;
 }
}
function my_recent_widget_registration() {
  unregister_widget('WP_Widget_Recent_Posts');
  register_widget('My_Recent_Posts_Widget');
}
add_action('widgets_init', 'my_recent_widget_registration');

 // Dress up the post navigation
add_filter( 'next_post_link' , 'my_nav_next' , 10, 4);
add_filter( 'previous_post_link' , 'my_nav_previous' , 10, 4);
 
function my_nav_next($output, $format, $link, $post ) {
 $text = ' previous post';
 $rel = 'prev';
 return sprintf('<a href="%1$s" rel="%3$s" rel="nofollow" class="waves-effect waves-light btn left"><span class="white-text"><i class="mdi-navigation-chevron-left left"></i>%2$s</span></a>' , get_permalink( $post ), $text, $rel );
}
function my_nav_previous($output, $format, $link, $post ) {
 $text = ' next post';
 $rel = 'next';
 return sprintf('<a href="%1$s" rel="%3$s" rel="nofollow" class="waves-effect waves-light btn right"><span class="white-text">%2$s<i class="mdi-navigation-chevron-right right"></i></span></a>' , get_permalink( $post ), $text, $rel );
}


/**
 * Enqueue scripts and styles.
 */
function tperialize_scripts() {
	//wp_enqueue_script( 'tperialize-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	 // Add Material scripts and styles
 if( !is_admin()){
 wp_deregister_script('jquery');
 wp_enqueue_script( 'material-jquery', 'http://code.jquery.com/jquery-2.1.3.min.js', array(), '1.0', false );
 }
 wp_enqueue_style( 'material-style', get_template_directory_uri() . '/css/materialize.css' );
 wp_enqueue_style( 'tperialize-style', get_stylesheet_uri() );
 wp_enqueue_script( 'material-script', get_template_directory_uri() . '/js/materialize.js', array(), '1.0', false ); 
 wp_enqueue_script( 'material-custom', get_template_directory_uri() . '/js/custom.js', array(), '1.0', false );
 wp_enqueue_script( 'init', get_template_directory_uri() . '/js/init.js', array(), '1.0', false );
 	wp_enqueue_script( 'tperialize-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
 // Check our theme options selections, and load conditional styles
 $themecolors = get_theme_mod( 'material_colors' );
  // Enqueue the selected color schema
 wp_enqueue_style( 'material-colors', get_template_directory_uri() . '/css/'. $themecolors );
 	}
add_action( 'wp_enqueue_scripts', 'tperialize_scripts' );
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

// Add theme options
function material_controls( $wp_customize ) {
 
// Add a section to customizer.php
 $wp_customize->add_section( 'material_options' , 
 array(
   'title'      => __( 'Material Options', 'materialized' ),
   'description' => 'The following theme options are available:',
   'priority'   => 30,
 )
 );
 
// Add setting
 $wp_customize->add_setting(
    'material_colors',
    array(
        'default' => 'blue.css',
    )
 );
 
// Add control 
 $wp_customize->add_control(
    'material_color_selector',
    array(
        'label' => 'Color Scheme',
        'section' => 'material_options',
        'settings' => 'material_colors',
        'type' => 'select',
        'choices' => array(
            'blue.css' => 'Blue',
            'red.css' => 'Red',
            'vape.css' => 'Vape',
            'orange.css' => 'Orange',
        ),
    )
);
}
add_action( 'customize_register', 'material_controls' );


// Custom comment functionality
add_filter('get_avatar','change_avatar_css');
function change_avatar_css($class) {
$class = str_replace("class='avatar", "class='avatar circle left z-depth-1", $class) ;
return $class;
}
 
add_filter('comment_reply_link', 'materialized_reply_link_class'); 
function materialized_reply_link_class($class){
    $class = str_replace("class='comment-reply-link", "class='waves-effect waves-light btn", $class);
    return $class;
}
function materialized_comment($comment, $args, $depth) {
 $GLOBALS['comment'] = $comment;
 extract($args, EXTR_SKIP);
 
 if ( 'div' == $args['style'] ) {
 $tag = 'div';
 $add_below = 'comment';
 } else {
 $tag = 'li';
 $add_below = 'div-comment';
 }
?>
 <<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
 <?php if ( 'div' != $args['style'] ) : ?>
 <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
 <?php endif; ?>
 <div class="comment-author vcard">
 <?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
 <div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
 <?php
 /* translators: 1: date, 2: time */
 printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)' ), '  ', '' );
 ?>
 </div>
 <?php printf( __( '<cite class="fn">%s</cite> <span class="says">wrote:</span>' ), get_comment_author_link() ); ?>
 </div>
 <?php if ( $comment->comment_approved == '0' ) : ?>
 <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em>
 <br />
 <?php endif; ?>
 <?php comment_text(); ?>
 <div class="reply right">
 <?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
 </div>
 <?php if ( 'div' != $args['style'] ) : ?>
 <div class="clear"></div>
 </div>
 <?php endif; ?>
 <div class="divider"></div>
<?php
}

add_action('wp_head', 'create_meta_desc');

function create_meta_desc() {
    global $post;
if (!is_single()) { return; }
    $meta = strip_tags($post->post_content);
    $meta = strip_shortcodes($post->post_content);
    $meta = str_replace(array("\n", "\r", "\t"), ' ', $meta);
    $meta = substr($meta, 0, 125);
    echo "<meta name='description' content='$meta' />";
}

/*
 *Update ALL PUBLISHED posts and pages with the controller post_meta required by the main cod
 * Important: Run Only Once 
 * -> Paste in functions.php
 * -> Remove the comment to add_action
 * -> Visit any administrative page
 * -> Delete or disable this code
 */
//add_action('admin_init','wpse_54258_run_only_once');
function wpse_54258_run_only_once(){   
    global $wpdb;
    $allposts = $wpdb->get_results( "SELECT ID FROM $wpdb->posts WHERE post_status = 'published'" );
    foreach( $allposts as $pt )    {
        add_hashTags( $pt->$ID, $pt->$url);
    }
}

//** MY CUSTOM FUNCTIONS ARE : 
//    **  addSignin() 				// socialLinks()
//    **  switchHead()    			// amazonAdvert()			// add_hashTags()
// 	  ** getGappsTag()   			//** getGTM() 				//	** fbappid()


// replace (affiliate) words with links!!!!    //** enable to add affilate links 2 keywords **//
//add_filter('the_content', 'replace_text_wps');
//add_filter('the_excerpt', 'replace_text_wps');
			//function replace_text_wps($text){
			//$replace = array(
					// 'WORD TO REPLACE' => 'REPLACE WORD WITH THIS'
					// football clothing  BRANDS
		// 'nike'   =>        '<a href="http://mysite.com/myafflink">thesis</a>',
		//'adidas'    =>       '<a href="http://mysite.com/myafflink">studiopress</a>'
//'football'     =>//'jersey'//'vaporizer'     =>
//}


function socialLinks(){
$url = home_url();
if ($url == 'http://organisemybiz.com' ||  'http://es.organisemybiz.com'){
echo '<span>Get the latest news @socialMedia </span>
		<ul class="social-media footer-social">
		<li><a class="sm-twitter" href="https://www.twitter.com/organisemybiz"><span>Twitter</span></a></li>
		<li><a class="sm-facebook" href="https://www.facebook.com/OrganiseBiz"><span>Facebook</span></a></li>
		<li><a class="sm-pinterest" href="https://www.pinterest.com/organisemybiz"><span>Pinterest</span></a></li>
		<li><a class="sm-instagram" href="https://www.instagram.com/organisemybiz/"><span>Instagram</span></a></li>
		</ul>';
	} else if ($url == 'http://vapedirectory.co'){
	echo '<span>Get the latest news @socialMedia</span>
		<ul class="social-media footer-social">
		<li><a class="sm-twitter" href="https://www.twitter.com/vapedirectoryau/"><span>Twitter</span></a></li>
		<li><a class="sm-facebook" href="https://www.facebook.com/vapeDirectory.co/"><span>Facebook</span></a></li>
		<li><a class="sm-pinterest" href="https://www.pinterest.com/vapedirectory/"><span>Pinterest</span></a></li>
		<li><a class="sm-instagram" href="https://www.instagram.com/vapedirectory/"><span>Instagram</span></a></li>
		</ul>';
	} else if ($url == 'http://globetravelsearch.com'){
	echo '<span>Get the latest news @socialMedia</span>
		<ul class="social-media footer-social">
		<li><a class="sm-twitter" href="https://www.twitter.com/globetravel/"><span>Twitter</span></a></li>
		<li><a class="sm-facebook" href="https://www.facebook.com/globetravelsearch/"><span>Facebook</span></a></li>
		<li><a class="sm-pinterest" href="https://www.pinterest.com/globetravelsearch/"><span>Pinterest</span></a></li>
		<li><a class="sm-instagram" href="https://www.instagram.com/globetravelsearch/"><span>Instagram</span></a></li>
		</ul>';
		
	} else if ($url == 'http://womenstylechannel.com'){
	echo '<span>Get the latest news @socialMedia</span>
		<ul class="social-media footer-social">
		<li><a class="sm-twitter" href="https://www.twitter.com/vapedirectoryau/"><span>Twitter</span></a></li>
		<li><a class="sm-facebook" href="https://www.facebook.com/vapeDirectory.co/"><span>Facebook</span></a></li>
		<li><a class="sm-pinterest" href="https://www.pinterest.com/vapedirectory/"><span>Pinterest</span></a></li>
		<li><a class="sm-instagram" href="https://www.instagram.com/vapedirectory/"><span>Instagram</span></a></li>
		</ul>';
	
	} else if ($url ==  'http://customkitsworldwide.com' || 'http://es.customkitsworldwide.com'){
	echo '<span>Get the latest news @socialMedia</span>
		<ul class="social-media footer-social">		
		<li><a class="sm-twitter" href="https://www.twitter.com/customkitworldwide"><span>Twitter</span></a></li>
		<li><a class="sm-facebook" href="https://www.facebook.com/customkitworldwide/"><span>Facebook</span></a></li>
		<li><a class="sm-pinterest" href="https://www.pinterest.com/customkitworldwide"><span>Pinterest</span></a></li>		
		<li><a class="sm-instagram" href="https://www.instagram.com/customkitworldwide/"><span>Instagram</span></a></li>
		</ul>';	
	} else if($url ==  'http://fakenewsregistry.org' || 'http://fakenewsregistry.org/es'){
	echo '<span>Get the latest news @socialMedia</span>
		<ul class="social-media footer-social">
		<li><a class="sm-twitter" href="https://www.twitter.com/news_sans_fact"><span>Twitter</span></a></li>		<li><a class="sm-facebook" href="https://www.facebook.com/fakenewsregistry"><span>Facebook</span></a></li>		<li><a class="sm-pinterest" href="https://www.pinterest.com/fakenewsregistry"><span>Pinterest</span></a></li>		<li><a class="sm-instagram" href="https://www.instagram.com/fakenewsregistry"><span>Instagram</span></a></li>
		</ul>';	
	} else if ($url == 'http://govnews.info'){
		echo '<span>Get the latest news @socialMedia</span>	<ul class="social-media footer-social">	<li><a class="sm-twitter" href="https://www.twitter.com/vapedirectoryau/"><span>Twitter</span></a></li>		<li><a class="sm-facebook" href="https://www.facebook.com/vapeDirectory.co/"><span>Facebook</span></a></li>
		<li><a class="sm-pinterest" href="https://www.pinterest.com/vapedirectory/"><span>Pinterest</span></a></li>		<li><a class="sm-instagram" href="https://www.instagram.com/vapedirectory/"><span>Instagram</span></a></li></ul>';		
	
		}else if ($url == 'http://trendypublishing.com' ||'http://trendypublishing.com.au'){
			echo '<span>Get the latest news @socialMedia </span><ul class="social-media footer-social">	<li><a class="sm-twitter" href="https://www.twitter.com/trendypublishing"><span>Twitter</span></a></li>	<li><a class="sm-facebook" href="https://www.facebook.com/trendy"><span>Facebook</span></a></li><li><a class="sm-pinterest" href="https://www.pinterest.com/trendypublishing"><span>Pinterest</span></a></li>		<li><a class="sm-instagram" href="https://www.instagram.com/trendypublishing"><span>Instagram</span></a></li></ul>';
		}
	}
 
# electronics advert?
function amazonAdvert($choice){
	switch ($choice){
	case '1':
echo '<script src="//z-na.amazon-adsystem.com/widgets/onejs?MarketPlace=US&adInstanceId=8db1de28-51b4-44f5-a156-b4c34a23f666"></script>';
	break;
	case '2':
		echo '<iframe style="width:120px;height:240px;" marginwidth="0" marginheight="0" scrolling="no" frameborder="0" src="//ws-na.amazon-adsystem.com/widgets/q?ServiceVersion=20070822&OneJS=1&Operation=GetAdHtml&MarketPlace=US&source=ss&ref=as_ss_li_til&ad_type=product_link&tracking_id=trendypublish-20&marketplace=amazon&region=US&placement=B01DFKC2SO&asins=B01DFKC2SO&linkId=1b38aef0072296f5d98d912d29b48cc7&show_border=true&link_opens_in_new_window=true"></iframe>';break;
	case '3': echo '<iframe src="//rcm-na.amazon-adsystem.com/e/cm?o=1&p=11&l=ez&f=ifr&linkID=dd7d97a2e110e103f63f14ba20a2a3a8&t=trendypublish-20&tracking_id=trendypublish-20" width="120" height="600" scrolling="no" border="0" marginwidth="0" style="border:none;" frameborder="0"></iframe>';	break;	
// add the tablet !
	case '4':	echo '<iframe style="width:120px;height:240px;" marginwidth="0" marginheight="0" scrolling="no" frameborder="0" src="//ws-na.amazon-adsystem.com/widgets/q?ServiceVersion=20070822&OneJS=1&Operation=GetAdHtml&MarketPlace=US&source=ss&ref=as_ss_li_til&ad_type=product_link&tracking_id=trendypublish-20&marketplace=amazon&region=US&placement=B01MF4QL9E&asins=B01MF4QL9E&linkId=364125b4931bb0ce3ea527fd9e380303&show_border=true&link_opens_in_new_window=true"></iframe>';break;
// and the active pen
case '8': echo	'<iframe style="width:120px;height:240px;" marginwidth="0" marginheight="0" scrolling="no" frameborder="0" src="//ws-na.amazon-adsystem.com/widgets/q?ServiceVersion=20070822&OneJS=1&Operation=GetAdHtml&MarketPlace=US&source=ss&ref=as_ss_li_til&ad_type=product_link&tracking_id=trendypublish-20&marketplace=amazon&region=US&placement=B01AZC3HF2&asins=B01AZC3HF2&linkId=66bad91a6dcf0ea4417df46b697eb15c&show_border=true&link_opens_in_new_window=true"></iframe>';break;
//hue
case '7': echo	'<a target="_blank" href="https://www.amazon.com/gp/search?ie=UTF8&tag=trendypublish-20&linkCode=ur2&linkId=f33cd3b3d78c727880cf5502ee02e05d&camp=1789&creative=9325&index=aps&keywords=philips hue">Hue Lightbulbs</a><img src="//ir-na.amazon-adsystem.com/e/ir?t=trendypublish-20&l=ur2&o=1" width="1" height="1" border="0" alt="" style="border:none !important; margin:0px !important;" />'; break;
// win 10 tablets search ish grid
case '6': echo	'<script type="text/javascript">amzn_assoc_placement = "adunit0";amzn_assoc_search_bar = "true";amzn_assoc_tracking_id = "trendypublish-20";
amzn_assoc_ad_mode = "manual";amzn_assoc_ad_type = "smart";amzn_assoc_marketplace = "amazon";amzn_assoc_region = "US";amzn_assoc_title = "My Amazon Picks";
amzn_assoc_linkid = "7cb74259967239132c8f3fb8d9b5150d";amzn_assoc_asins = "B01MR43S2E,B01H3B17R8,B012DTDBI8,B01NAIQNHQ,B0188NA4DS,B01N2YG91G";</script>
<script src="//z-na.amazon-adsystem.com/widgets/onejs?MarketPlace=US"></script>'; break;
}
} 
 
 

//add_action(  'publish_post',  'add_hashTags', 10, 2 );
function add_2hashTags( $ID, $post ) {
    $post = get_post( $ID );
	$url1 = $post->$post_name;  // get the slug
	$url= bloginfo('url') .'/'. $url1;// your post title
	$APPLICATION_ID = '4ecd9e16';
$APPLICATION_KEY='be54f0e53443501357865cbc055538aa';
  $ch = curl_init('https://api.aylien.com/api/v1/hashtags');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Accept: application/json',
    'X-AYLIEN-TextAPI-Application-Key: ' . APPLICATION_KEY,
    'X-AYLIEN-TextAPI-Application-ID: '. APPLICATION_ID
  ));
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $url);
  $response = curl_exec($ch);
   $keywords= json_decode($response);
   wp_set_post_tags( $ID, $keywords, true );
} 
 function wpsidebar_widgets_init() {
 	register_sidebar( array(
		'name' => 'Newsletter',
		'id' => 'footer_newsletter',
		'description' => _('Widget in this area will be shown in the footer'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="sidebar_title">',
		'after_title' => '</h3>',
	) );
}

add_action( 'widgets_init', 'wpsidebar_widgets_init' );
if(function_exists('add_theme_support')){
	add_theme_support('menus');
}