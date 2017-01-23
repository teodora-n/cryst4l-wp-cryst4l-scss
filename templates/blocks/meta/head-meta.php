<meta charset="utf-8">
<!--[if gte IE 9]><!-->
    <script type="text/javascript">
      // Change <html> classes if JavaScript is enabled
      document.documentElement.classList.remove('no-js');
      document.documentElement.classList.add('js');
	</script>
<!--<![endif]-->
<?php 
global $post;

//Meta title conditional
//Using meta boxes defined in metaboxes.php
//If there's value entered in the "meta title" metabox, use this, or if not, use the blog name as a fallback

$meta_title = get_post_meta($post->ID,'_smartmeta_meta_title', true);
if($meta_title){ ?>
	<title><?php wp_title('|',true,'right'); echo $meta_title ?></title>
<?php } else { ?>
	<title><?php wp_title('|',true,'right'); bloginfo('name'); ?></title>
<?php } ?>

<meta name="viewport" content="width=device-width,initial-scale=1.0">

<?php 
//Meta description conditional
//Using meta boxes defined in metaboxes.php
//Using different meta description for different page types with a fallback if there's no metabox value

if(is_page() || is_single() || is_singular()){
	$desc = substr(strip_tags(strip_shortcodes(get_post_meta($post->ID,'_smartmeta_meta_desc', true))), 0, 160);
	$the_excerpt = str_replace(array("\r", "\n"), '', get_excerpt_by_id($post->ID));
	if($desc){
		$meta_desc = $desc;
	} else {
		$meta_desc = $the_excerpt;
	}
	if($meta_title){
		$the_title = $meta_title;
	} else {
		$the_title = get_the_title($post->ID);
	}
} else if(is_tax() || is_category()){
	$meta_desc = substr(strip_tags(strip_shortcodes(category_description())), 0, 160);
	$the_title = single_cat_title('', false);
} else if(is_search()){
	$meta_desc = 'Search results for: '. get_search_query();
	$the_title = 'Search results from '.get_bloginfo('name');
}
if (has_post_thumbnail( $post->ID )){
	$the_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
	$the_image_url = $the_image[0]; 
} else {
	$the_image_url = get_template_directory_uri(). '/images/no-image.png'; 
}

//Define Twitter handle and FB App ID
$twitter_handle = '';
$fb_app_id = ''; ?>

<meta name="description" content="<?php echo $meta_desc ?>">
<meta charset="<?php bloginfo( 'charset' ); ?>" />

<!--Favicons and icons-->
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/optimised/favicon/favicon-180x180.png">
<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/optimised/favicon/favicon-180x180.png">

<!-- Open Graph data -->
<meta property="og:title" content="<?php echo $the_title ?>" />  
<meta property="og:type" content="article" />
<meta property="og:url" content="<?php echo get_permalink($post->ID); ?>" />
<meta property="og:image" content="<?php echo $the_image_url ?>" />
<meta property="og:description" content="<?php echo $meta_desc ?>" />
<meta property="og:site_name" content="<?php echo $the_title; ?>" />
<meta property="fb:app_id" content="<?php echo $fb_app_id;?>" />

<!-- Schema.org markup for Google+ -->
<meta itemprop="name" content="<?php echo $the_title; ?>" />
<meta itemprop="description" content="<?php echo $meta_desc ?>" />
<meta itemprop="image" content="<?php echo $the_image_url ?>" />

<!-- Twitter Card data -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="<?php echo $twitter_handle; ?>">
<meta name="twitter:title" content="<?php echo $the_title; ?>">
<meta name="twitter:description" content="<?php echo $meta_desc ?>">
<meta name="twitter:creator" content="<?php echo $twitter_handle; ?>">
<meta name="twitter:image:src" content="<?php echo $the_image_url ?>">

<meta name="robots" content="<?php echo get_post_meta($post->ID,'_smartmeta_meta_robots', true); ?>"/>
<time class="entry-date" datetime="<?php the_date('c'); ?>" itemprop="datePublished" pubdate><?php the_date('F jS, Y'); ?></time>

<style><?php include(TEMPLATEPATH."/assets/styles/build/styles.min.css"); ?></style>