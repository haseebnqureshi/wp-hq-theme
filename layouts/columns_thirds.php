<?php 

	global $post, $section; 

?>

<div class="columns_thirds layout">

	<div class="title layout-field">
		<?php echo $section['title']; ?>
	</div>

	<?php foreach ($section['columns'] as $column) { ?>

		<div class="column">

			<?php if ($column['link']) { ?>
				<a href="<?php echo $column['link']->guid; ?>">
			<?php } ?>

				<?php if ($column['photo']) { ?>
					<div class="photo layout-field">
						<img src="<?php echo $column['photo']['sizes']['medium']; ?>" />
					</div>
				<?php } ?>

				<?php if ($column['short_title']) { ?>
					<div class="short-title layout-field">
						<?php echo $column['short_title']; ?>
					</div>
				<?php } ?>

				<div class="text layout-field">
					<?php echo $column['text']; ?>
				</div>

				<?php if ($column['link'] && $column['button_text']) { ?>
					<div class="button layout-field">
						<button><?php echo $column['button_text']; ?></button>
					</div>
				<?php } ?>

			<?php if ($column['link']) { ?>
				</a>
			<?php } ?>

		</div>

	<?php } ?>

</div>
