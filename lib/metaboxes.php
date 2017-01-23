<?php 
/*
Define meta boxes below
*/

//Meta title
add_smart_meta_box('cryst4l_meta', array(
'title'     => 'Meta',
'pages'		=> array('post', 'page'),
'context'   => 'normal',
'priority'  => 'high',
'fields'    => array(
array(
'name' => 'Meta title',
'id' => 'meta_title',
'default' => '',
'desc' => 'Meta title',
'type' => 'text',
),
array(
'name' => 'Meta description',
'id' => 'meta_desc',
'default' => '',
'desc' => '',
'type' => 'textarea',
),
//Robots
array(
'name' => 'Meta robots',
'id' => 'meta_robots',
'default' => 'index, follow',
'desc' => '',
'type' => 'text',
),
//XML sitemap
array(
'name' => 'Include in XML sitemap?',
'id' => 'xml_sitemap',
'default' => 'true', 
'desc' => 'Check = include, uncheck = exclude',
'type' => 'checkbox',
),
//XML Sitemap priority
array(
'name' => 'XML Sitemap Priority',
'id' => 'xml_priority',
'default' => '0.2',
'desc' => '',
'type' => 'text',
),
)
));