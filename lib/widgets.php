<?php
/*
	Add widget areas
*/
add_action( 'widgets_init', 'cryst4l_widget_areas' );
function cryst4l_widget_areas(){
	//Add Main Sidebar
	register_sidebar(array(
		'id' => 'sidebar',
		'name' => __('Sidebar', 'cryst4l'),
		'description' => __(' This is the main sidebar.', 'cryst4l'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget_title">',
		'after_title' => '</h3>',
	));
	
	//Add Another Sidebar
	register_sidebar(array(
		'id' => 'sidebar_2',
		'name' => __('Additional Sidebar', 'cryst4l'),
		'description' => __('This is a second sidebar.', 'cryst4l'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget_title">',
		'after_title' => '</h3>',
	));
	
	//Add Footer widget area
	register_sidebar(array(
		'id' => 'footer_widget_area',
		'name' => __('Footer Widget Area', 'cryst4l'),
		'description' => __('This is the footer widget area.', 'cryst4l'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget_title">',
		'after_title' => '</h4>',
	));
	
}