<?php get_header(); ?>

<?php
	global $post;
	$sections = (array) get_field('page_sections', $post->ID);	
	foreach($sections as $section) {
		global $section;
		$slug = $section['acf_fc_layout'];
		include dirname(__FILE__) . "/layouts/{$slug}.php";
	}
?>

<?php get_footer(); ?>