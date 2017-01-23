<?php
/*
	Excerpt length
*/
add_filter( 'excerpt_length', 'cryst4l_excerpt_length', 999 );
function cryst4l_excerpt_length( $length ) {
	return 35;
}

/*
	Get excerpt by id
*/
function get_excerpt_by_id($post_id){
    $the_post = get_post($post_id); //Gets post ID
    $the_excerpt = $the_post->post_content; //Gets post_content to be used as a basis for the excerpt
    $excerpt_length = 35; //Sets excerpt length by word count
    $the_excerpt = substr(strip_tags(strip_shortcodes($the_excerpt)), 0, 160); //Strips tags and images
    $words = explode(' ', $the_excerpt, $excerpt_length + 1);

    if(count($words) > $excerpt_length) :
        array_pop($words);
        array_push($words, '…');
        $the_excerpt = implode(' ', $words);
    endif;

    return $the_excerpt;
}

/*
	More link
*/
add_filter( 'excerpt_more', 'cryst4l_more_link' );
function cryst4l_more_link( $more ) {
	return ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">View &raquo;</a>';
}


/**
 * Add SVG capabilities
 */
function wpcontent_svg_mime_type( $mimes = array() ) {
  $mimes['svg']  = 'image/svg+xml';
  $mimes['svgz'] = 'image/svg+xml';
  return $mimes;
}
add_filter( 'upload_mimes', 'wpcontent_svg_mime_type' );


