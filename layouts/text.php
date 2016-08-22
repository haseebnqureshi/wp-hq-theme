<?php 

	global $post, $section; 

?>

<div>
	<h1><?php echo $section['title']; ?></h1>
	<?php echo apply_filters('the_content', $section['text']); ?>
</div>
