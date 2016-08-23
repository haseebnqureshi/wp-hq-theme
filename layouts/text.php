<?php 

	global $post, $section; 

?>

<div class="text layout">

	<div class="title layout-field">
		<?php echo $section['title']; ?>
	</div>

	<div class="text layout-field">
		<?php echo apply_filters('the_content', $section['text']); ?>
	</div>

</div>
