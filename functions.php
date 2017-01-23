<?php
/*
 *  Author: Teodora
 *  (mostly)
 * 
 */

/************* REQUIRED FILES ***************/
require_once( 'lib/admin.php' ); // custom login, styles and scripts + everything admin related
require_once('lib/utils.php'); // XML sitemap, pagination, breadcrumbs
require_once( 'lib/menus.php' ); // menus
require_once( 'lib/widgets.php' ); // sidebars, widget areas, widgets
require_once( 'lib/blog.php' ); // everything blog related
require_once( 'lib/custom-posts.php' ); // custom posts
require_once( 'lib/shortcodes.php' ); // theme shortcodes
require_once('lib/metabox-generator.php'); // custom fields generator  
require_once('lib/metaboxes.php'); // define metaboxes
require_once( 'lib/theme-options.php' ); //theme-options
require_once( 'lib/redirects.php' ); // 301 redirects - based on "301 redirects plugin"
require_once( 'lib/cryst4l.php' ); // everything else
require_once( 'lib/html-minifier.php' ); //Minify html