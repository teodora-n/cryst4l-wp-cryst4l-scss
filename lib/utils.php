<?php
/*
	Hide email - javascript protected 
*/
function hide_email($email){ 
	$character_set = '+-.0123456789@ABCDEFGHIJKLMNOPQRSTUVWXYZ_abcdefghijklmnopqrstuvwxyz';
	$key = str_shuffle($character_set); $cipher_text = ''; $id = 'e'.rand(1,999999999);
	for ($i=0;$i<strlen($email);$i+=1) $cipher_text.= $key[strpos($character_set,$email[$i])];
	$script = 'var a="'.$key.'";var b=a.split("").sort().join("");var c="'.$cipher_text.'";var d="";';
	$script.= 'for(var e=0;e<c.length;e++)d+=b.charAt(a.indexOf(c.charAt(e)));';
	$script.= 'document.getElementById("'.$id.'").innerHTML="<a href=\\"mailto:"+d+"\\">"+d+"</a>"';
	$script = "eval(\"".str_replace(array("\\",'"'),array("\\\\",'\"'), $script)."\")"; 
	$script = '<script type="text/javascript">/*<![CDATA[*/'.$script.'/*]]>*/</script>';
	return '<span id="'.$id.'">[Please enable javascript to see this email address]</span>'.$script;
}

/*
	Pagination
*/
global $wp_query;
$big = 999999999;
echo paginate_links( array(
	'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	'format' => '?paged=%#%',
	'current' => max( 1, get_query_var('paged') ),
	'total' => $wp_query->max_num_pages
) );

function cryst4l_pagination($pages = '', $range = 2){  
     $showitems = ($range * 2)+1;  
     global $paged;
     if(empty($paged)) $paged = 1;
     if($pages == ''){
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages){
             $pages = 1;
         }
     }   
     if(1 != $pages){
         echo "<div class='pagination'>";
		 previous_posts_link( 'Previous' );
         for ($i=1; $i <= $pages; $i++){
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class='current pages-item'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive page-pagination-item' >".$i."</a>";
             }
         }
		 next_posts_link( 'Next', $pages );
		 if($paged != $pages){  
      		echo " <a class='last-page' href=" . get_pagenum_link($pages) . "> Last</a>";  
    	}  
		echo "</div>\n";
     }
}

/*
	Breadcrumbs
*/
function cryst4l_breadcrumbs() {
	$url = $_SERVER['REQUEST_URI'];
	$urlArray = explode('/', rtrim($url, '/'));
	$dir = array_shift($urlArray);
	$breadcrumb = '<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a itemprop="url" href="/"><span itemprop="title">Home</span></a></span>';
	foreach($urlArray as $text) {
		$dir .= "/$text";
		$breadcrumb .= '<span class="breadcrumb-'.$text.'" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">&nbsp; &raquo; &nbsp;<a itemprop="url" href="'.$dir.'"><span itemprop="title">' . ucwords(strtr($text, '_-', '  ')) . '</span></a></span>';
	}
	return $breadcrumb;
}

/*
	XML SITEMAP
*/
add_action('init', 'cryst4l_xml_sitemap');
add_action('save_post', 'cryst4l_xml_sitemap');
add_action('post_updated', 'cryst4l_xml_sitemap');

function cryst4l_xml_sitemap() {
  $postsForSitemap = get_posts(array(
    'numberposts' => -1,
    'orderby' => 'modified',
    'post_type'  => array('post','page', 'products'),
    'order'    => 'DESC',
	'meta_key'  => '_smartmeta_xml_sitemap',
	'meta_value' => 'true'
  ));
$sitemap = '<?xml version="1.0" encoding="UTF-8"?>';
$sitemap .= "\n".'<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">'."\n";
  foreach($postsForSitemap as $post) {
    setup_postdata($post);
$postdate = explode(" ", $post->post_modified);
$yesterday  = strtotime( '-1 day' );
$last_week  = strtotime( '-2 days' );
 
if( $postdate > $yesterday ){
        $url = 'hourly';
} elseif( $postdate > $last_week ) {
        $url = 'daily';
} else {
        $url = 'weekly';
} 
$priority = get_post_meta( $post->ID, '_smartmeta_xml_priority', true );  

$sitemap .= "\t".'<url>'."\n".
  "\t\t".'<loc>'. get_permalink($post->ID) .'</loc>'.
  "\n\t\t".'<lastmod>'. $postdate[0] .'</lastmod>'.
  "\n\t\t".'<changefreq>'. $url .'</changefreq>'.
  "\n\t\t".'<priority>'. $priority .'</priority>'.
"\n\t".'</url>'."\n";
  }

  $sitemap .= '</urlset>';

  $fp = fopen(ABSPATH . "sitemap.xml", 'w');
  fwrite($fp, $sitemap);
  fclose($fp);  
}