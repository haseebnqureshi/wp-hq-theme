
		<div class="footer">

			<?php if ($copyright = get_field('copyright', 'options')) { ?>
				<div class="copyright">
					<?php echo $copyright; ?>
				</div>
			<?php } ?>

			<?php if ($phone = get_field('phone', 'options')) { ?>
				<div class="phone">
					Phone: <?php echo $phone; ?>
				</div>
			<?php } ?>

			<?php if ($email = get_field('email', 'options')) { ?>
				<div class="email">
					Email: <?php echo $email; ?>
				</div>
			<?php } ?>

			<?php if ($street_address = get_field('street_address', 'options')) { ?>
				<div class="address">
					<div class="street_address">
						<?php echo $street_address; ?>
					</div>
					<div class="city_state_zip">
						<?php echo get_field('city_state_zip', 'options'); ?>
					</div>
				</div>
			<?php } ?>

		</div>

		<?php wp_footer(); ?>

		<?php echo get_field('code_injection_footer', 'options'); ?>
		
    </body>
</html>