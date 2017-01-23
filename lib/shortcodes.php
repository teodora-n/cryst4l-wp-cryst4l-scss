<?php 
/*
	Shortcodes
*/
//Wrapper
function cryst4l_wrapper( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'class' => '',
	), $atts ) );
   return '<div class="u-wrapper '.$class.'">' . do_shortcode($content) . '</div>';
}
add_shortcode('wrapper', 'cryst4l_wrapper');

//Grid
function cryst4l_grid( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'class' => '',
	), $atts ) );
   return '<div class="o-grid o-grid--no-gutter '.$class.'">' . do_shortcode($content) . '</div>';
}
add_shortcode('grid', 'cryst4l_grid');

function cryst4l_grid_flexible( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'class' => '',
	), $atts ) );
   return '<div class="o-grid '.$class.'">' . do_shortcode($content) . '</div>';
}
add_shortcode('grid_flexible', 'cryst4l_grid_flexible');

function cryst4l_one_half( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'class' => '',
	), $atts ) );
   return '<div class="o-grid__item u-6/12'.$class.'"><div class="inner">' . do_shortcode($content) . '</div></div>';
}
add_shortcode('one_half', 'cryst4l_one_half');

function cryst4l_grid_item( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'class' => '',
	), $atts ) );
   return '<div class="o-grid__item '.$class.'">' . do_shortcode($content) . '</div>';
}
add_shortcode('grid_item', 'cryst4l_grid_item');