<?php
/*
	Register custom posts
*/
add_action( 'init', 'cryst4l_custom_posts' ); 
function cryst4l_custom_posts() {
	//Example of custom post type with taxonomies
$labels = array(
    'name' => 'Cryst4l Custom Posts',
    'singular_name' => 'Cryst4l Custom Post',
    'add_new' => 'Add New',
    'add_new_item' => 'Add New Cryst4l Custom Post',
    'edit_item' => 'Edit Cryst4l Custom Post',
    'new_item' => 'New Cryst4l Custom Post',
    'all_items' => 'All Cryst4l Custom Posts',
    'view_item' => 'View Cryst4l Custom Post',
    'search_items' => 'Search Cryst4l Custom Posts',
    'not_found' =>  'No Cryst4l Custom Posts found',
    'not_found_in_trash' => 'No Cryst4l Custom Posts found in Trash', 
    'parent_item_colon' => '',
    'menu_name' => 'Cryst4l Custom Posts'
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => array( 'slug' => 'cryst4l' ),
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'comments' ),
	'taxonomies' => array('cryst4l_tag', 'cryst4l_category')
  ); 
  
  //ADD TAXONOMIES
   $cryst4lcat = array( 
	'name' => __( 'Cryst4l Categories', 'taxonomy general name' ),  
    'singular_name' => __( 'Cryst4l Category', 'taxonomy singular name' )
	);
    register_taxonomy('cryst4l_category', 'cryst4l', array(
	'hierarchical' => true,  
    'labels' => $cryst4lcat,  
    'show_ui' => true,  
    'query_var' => true,  
    'rewrite' => array( 'slug' => 'cryst4l_category' ),
	));
	$cryst4ltags = array( 
	'name' => __( 'Cryst4l Tags', 'taxonomy general name' ),  
    'singular_name' => __( 'Cryst4l Tag', 'taxonomy singular name' )
	); 
    register_taxonomy('cryst4l_tag', 'cryst4l', array(
	'name' => __( 'Cryst4l Tags', 'taxonomy general name' ),  
    'singular_name' => __( 'Cryst4l Tag', 'taxonomy singular name' ), 
	'hierarchical' => true,  
    'labels' => $cryst4ltags,  
    'show_ui' => true,  
    'query_var' => true,  
    'rewrite' => array( 'slug' => 'cryst4l_tag' ),
	)); 

  //Edit above and uncomment the below line to register your custom post type
  //register_post_type( 'cryst4l', $args );
}