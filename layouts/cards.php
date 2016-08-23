<?php 

	global $post, $section; 

?>

<div class="cards layout">

	<div class="title layout-field">
		<?php echo $section['title']; ?>
	</div>

	<?php foreach ($section['cards'] as $card) { ?>

		<div class="card">

			<?php if ($card['link']) { ?>
				<a href="<?php echo $card['link']->guid; ?>">
			<?php } ?>

				<div class="photo layout-field">
					<img src="<?php echo $card['photo']['sizes']['medium']; ?>" />
				</div>

				<div class="caption">
					<div class="short-title layout-field">
						<?php echo $card['short_title']; ?>
					</div>
					<div class="text layout-field">
						<?php echo $card['text']; ?>
					</div>
				</div>

			<?php if ($card['link']) { ?>
				</a>
			<?php } ?>

		</div>

	<?php } ?>

</div>
