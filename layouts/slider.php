<?php 

	global $post, $section; 

?>

<div class="slider layout">
	<ul>

		<?php foreach ($section['slides'] as $slide) { ?>

			<li class="slide">

				<?php if ($slide['page_link']) { ?>
					<a href="<?php echo $slide['page_link']; ?>">
				<?php } ?>

					<div class="photo layout-field">
						<img src="<?php echo $slide['photo']['sizes']['large']; ?>" />
					</div>

					<div class="caption">
						<div class="short-title layout-field">
							<?php echo $slide['short_title']; ?>
						</div>
						<div class="text layout-field">
							<?php echo $slide['text']; ?>
						</div>

						<?php if ($slide['page_link']) { ?>
							<div class="button layout-field">
								<button><?php echo $slide['button_text']; ?></button>
							</div>
						<?php } ?>

					</div>

				<?php if ($slide['page_link']) { ?>
					</a>
				<?php } ?>

			</li>

		<?php } ?>

	</ul>
</div>
