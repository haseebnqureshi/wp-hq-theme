
		<div class="footer">

			<div class="menus section">
				<div class="title">
					Site Navigation
				</div>
				<?php
					wp_nav_menu(array(
						'container' => 'ul',
						'menu_class' => '',
						'depth' => 1,
						'theme_location' => 'footer1'
					));
					wp_nav_menu(array(
						'container' => 'ul',
						'menu_class' => '',
						'depth' => 1,
						'theme_location' => 'footer2'
					));
				?>
			</div>

			<div class="contact section">
				
				<div class="title">
					Contact Us
				</div>
				
				<?php if ($map_embed = get_field('map_embed', 'options')) { ?>
					<div class="map-embed option-field map-wrap">
						<?php echo $map_embed; ?>
					</div>
				<?php } ?>
				
				<?php if ($street_address = get_field('street_address', 'options')) { ?>
					<div class="address">
						<div class="name">
							<?php bloginfo('name'); ?>
						</div>
						<div class="street_address option-field">
							<?php echo $street_address; ?>
						</div>
						<div class="city_state_zip option-field">
							<?php echo get_field('city_state_zip', 'options'); ?>
						</div>
					</div>
				<?php } ?>

				<?php if ($phone = get_field('phone', 'options')) { ?>
					<div class="phone option-field">
						Phone: <?php echo $phone; ?>
					</div>
				<?php } ?>

				<?php if ($email = get_field('email', 'options')) { ?>
					<div class="email option-field">
						Email: <?php echo $email; ?>
					</div>
				<?php } ?>

			</div>

			<?php if ($newsletter_embed = get_field('newsletter_embed', 'options')) { ?>
				<div class="newsletter section">
					<div class="title">
						Get the Newsletter
					</div>
					<div class="newsletter-embed option-field">
						<?php echo $newsletter_embed; ?>
					</div>
				</div>
			<?php } ?>

			<div class="social section">
				<div class="facebook-url option-field">
					<a href="<?php echo get_field('facebook_url', 'options'); ?>">Facebook</a>
				</div>
				<div class="twitter-url option-field">
					<a href="<?php echo get_field('twitter_url', 'options'); ?>">Twitter</a>
				</div>
				<div class="linkedin-url option-field">
					<a href="<?php echo get_field('linkedin_url', 'options'); ?>">LinkedIn</a>
				</div>
				<div class="googleplus-url option-field">
					<a href="<?php echo get_field('googleplus_url', 'options'); ?>">Google+</a>
				</div>
			</div>

			<?php if ($copyright = get_field('copyright', 'options')) { ?>
				<div class="copyright section option-field">
					<?php echo $copyright; ?>
				</div>
			<?php } ?>

		</div>

		<?php wp_footer(); ?>

		<?php echo get_field('code_injection_footer', 'options'); ?>
		
    </body>
</html>