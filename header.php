<!doctype html>
<?php //Define itemtype
include(TEMPLATEPATH."/templates/blocks/meta/head-itemtype.php"); ?>
<html <?php language_attributes(); ?> class="no-js" itemscope itemtype="<?php echo $itemtype ?>">
  <head>
	<?php //Get header meta
	include(TEMPLATEPATH."/templates/blocks/meta/head-meta.php"); ?>
    <?php wp_head();?>
  </head>
  
  <body <?php body_class(); ?>>
    <!--[if lt IE 9]>
    <p class="browsehappy">
      You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.
    </p>
    <![endif]-->
    <div class="o-site-wrap">