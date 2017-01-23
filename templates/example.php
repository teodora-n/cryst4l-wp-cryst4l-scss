<?php /*Template name: Example */
get_header();
if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<!-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
Theme settings
-->
<?php 
//Get Address + Microdata
?>
<span itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
    <span itemprop="streetAddress"><?php echo get_option('address_line_1'); ?>, <?php echo get_option('address_line_2'); ?></span>
    <span itemprop="addressLocality"><?php echo get_option('address_town'); ?></span>
    <span itemprop="addressRegion"><?php echo get_option('address_county'); ?></span>
    <span itemprop="postalCode"><?php echo get_option('address_post_code'); ?></span>
</span>

<?php 
//Get Phone Number + Microdata
?>
<span itemprop="telephone"><?php echo get_option('phone_number'); ?></span>

<?php 
//1. Get Email Address + Microdata
//2. Get Email Address, Javascript protected
?>
<a href="mailto:<?php echo get_option('email_address'); ?>" itemprop="email"><?php echo get_option('email_address'); ?></a>
<?php echo hide_email(get_option('email_address')); ?>

<?php 
//Get Google Map
?>
<?php echo get_option('google_map'); ?>

<?php 
//Get Social Links
?>
<?php /*Facebook*/ echo esc_attr( get_option('fb_link') ); ?>
<?php /*Twitter*/ echo esc_attr( get_option('twitter_link') ); ?>
<?php /*Linkedin*/ echo esc_attr( get_option('in_link') ); ?>
<?php /*Google +*/ echo esc_attr( get_option('gplus_link') ); ?>

<!-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
Menus
-->
<?php 
//Get Header Menu + Microdata
cryst4l_menu('main-menu-header', 'nav-menu', 'nav-menu--header'); ?>



<!-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
Utils
-->

<?php 
//Breadcrumbs + Microdata
?>
<?php cryst4l_breadcrumbs(); ?>

<?php 
//1. Basic Pagination
//2. Pagination for CTP - "paged" parameter must be included in your query args
?>
<?php cryst4l_pagination(); ?>
<?php cryst4l_pagination($replace_with_your_query->max_num_pages); ?>

<!-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
Widget areas
-->
<?php /*Main sidebar*/ dynamic_sidebar( 'sidebar' ); ?>
<?php /*Additional sidebar*/ dynamic_sidebar( 'sidebar_2' ); ?>
<?php /*Footer widget area*/ dynamic_sidebar( 'footer_widget_area' ); ?>


<?php
endwhile; endif;
get_sidebar();
get_footer();
?>