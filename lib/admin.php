<?php
/*
	Add theme support
*/
add_theme_support('menus');
add_theme_support( 'post-thumbnails' ); 
//add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' ) ); //Uncomment to use
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
load_theme_textdomain('cryst4l', get_template_directory() . '/languages');

/*
	Remove actions
*/
//Remove meta name generator
remove_action('wp_head', 'wp_generator');
//Remove autop from excerpt
remove_filter( 'the_excerpt', 'wpautop' );

/*
	Add filters
*/
//Allow shortcodes in widgets
add_filter('widget_text', 'do_shortcode');
//Remove autop from shortcodes within widgets
add_filter('widget_text', 'shortcode_unautop');

/*
	Removes styles and scripts version number
*/
add_filter( 'style_loader_src', 'cryst4l_remove_vn', 10, 2 );
add_filter( 'script_loader_src', 'cryst4l_remove_vn', 10, 2 );
function cryst4l_remove_vn( $src ) {
    if( strpos( $src, '?ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}

/*
Login stylesheet and link
Optional - uncomment to use
*/
add_action( 'login_enqueue_scripts', 'cryst4l_login_stylesheet' ); 
function cryst4l_login_stylesheet() { ?>
   <link rel="stylesheet" id="custom_wp_admin_css"  href="<?php echo ( get_template_directory_uri() . '/style-login.css ') ; ?>" type="text/css" media="all" />
<?php }

function cryst4l_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'cryst4l_login_logo_url' );

function cryst4l_login_logo_url_title() {
    return get_bloginfo('name');
}
add_filter( 'login_headertitle', 'cryst4l_login_logo_url_title' );

/*
	Add slug to body class
*/
add_filter('body_class', 'add_slug_to_body_class');
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

/*
	Enqueue styles
*/
add_action('wp_enqueue_scripts', 'cryst4l_styles');
function cryst4l_styles(){
	//wp_register_style('cryst4l', get_template_directory_uri() . '/assets/styles/build/styles.min.css', array(), '1.0', 'all');
	//wp_enqueue_style('cryst4l'); 
}

/*
	Enqueue scripts
*/
add_action('init', 'cryst4l_scripts');
//Don't run our js on wp-login & wp-register pages...
function is_login_page() {
    return in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php'));
}
function cryst4l_scripts() {
	  //...and also on admin
	  //Deregister WP jQuery and jQuery UI
	  if(!(is_admin() || is_login_page())){
        wp_deregister_script('jquery'); 
		wp_deregister_script('jquery-ui');
		
		wp_register_script('cryst4l', get_template_directory_uri() . '/assets/js/build/scripts.min.js', array(), '1.0.0', true); 
        wp_enqueue_script('cryst4l');
	  }
}

/*
	Set thumbnail sizes
	Optional - uncomment to use
*/
//add_image_size( 'your-size name', XXX, XXX, true ); // XXX - value in pixels, true or false for hardcrop or not