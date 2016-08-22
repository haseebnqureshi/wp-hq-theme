<?php
	
	global $post;

	//if sections aren't built, assuming dead page, redirect to home
	$sections = get_field('page_sections', $post->ID);
	if (empty($sections)) {
		wp_redirect(get_bloginfo('siteurl'));
	}

	get_header();
	
	foreach($sections as $section) {
		global $section;
		$slug = $section['acf_fc_layout'];
		include dirname(__FILE__) . "/layouts/{$slug}.php";
	}

	get_footer();

?>