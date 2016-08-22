<head>
	<meta charset="utf-8">
	<meta name="viewport" content="height=device-height,width=device-width,user-scalable=no,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
	<title> <?php 

		$parts = array();
		if (is_category()) {
			$parts[] = single_cat_title('', false);
		} 
		$parts[] = is_home() ? 'Home' : get_the_title();
		$parts[] = get_bloginfo('name');
		$parts[] = get_bloginfo('description');
		echo implode(' - ', $parts); 
	
	?> </title>
	<?php wp_head(); ?>
	<?php echo get_field('code_injection_header', 'options'); ?>
</head>