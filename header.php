<!DOCTYPE html>
<html lang="en">
	<?php include dirname(__FILE__) . '/head.php'; ?>
	<body <?php body_class(); ?>>

		<div class="header">
			<div class="uk-grid">
				<div class="uk-width-1-4">
					<a href="<?php bloginfo('siteurl'); ?>">
						<img src="<?php $logo = get_field('header_logo', 'options'); echo $logo['sizes']['medium']; ?>" alt="<?php bloginfo('name'); ?>" />
					</a>
				</div>
				<div class="uk-width-3-4">
					<?php
						wp_nav_menu(array(
							'container' => 'ul',
							'menu_class' => 'menu header',
							'depth' => 2,
							'theme_location' => 'header1'
						));
					?>
				</div>
			</div>
		</div>
