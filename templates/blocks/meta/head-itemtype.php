<?php 
//Assign appropriate itemtype
if (is_front_page()){
	$itemtype = 'http://schema.org/WebPage';
} elseif(is_singular('post')){
	$itemtype = 'http://schema.org/Article';
} elseif (is_search()){
	$itemtype = 'http://schema.org/SearchResultsPage';
} elseif (is_tax() || is_category()){
	$itemtype = 'http://schema.org/CollectionPage';
//Schema for About page, Contact page and CPTs
//Uncomment and replace with your pages' IDs / custom post type name
/*
} elseif (is_page('Your about page ID or slug')){
	$itemtype = 'http://schema.org/AboutPage';
} elseif (is_page('Your contact page ID or slug')){
	$itemtype = 'http://schema.org/ContactPage';
} elseif (is_singular('Your Custom Post Type')){
	$itemtype = 'suitable itemtype';
*/
} else {
	$itemtype = 'http://schema.org/WebPage';
}
?>