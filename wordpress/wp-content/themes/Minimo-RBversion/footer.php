	<footer>
		<div class="container">
			<div class="row">
				<div class="footer_div col-sm-9">
					<a href="<?php the_permalink( $post = 56 ); ?>" class="footer_a">Terms and conditions</a>
					<a href="<?php the_permalink( $post = 57 ); ?>" class="footer_a">Privacy</a>
				</div>
				<div class="col-sm-3 row" style="text-align: center;">
					<p class="col-sm-4" style="font-family: playfair_display_regular;">Follow</p>
					<div class="col-sm-8">
						<a href="#" class="footer_a">
							<img src="wp-content/themes/Minimo-RBversion/assets/images/facebook-dark.png">
						</a>
						<a href="#" class="footer_a">
							<img src="wp-content/themes/Minimo-RBversion/assets/images/twitter-dark.png">
						</a>
						<a href="#" class="footer_a">
							<img src="wp-content/themes/Minimo-RBversion/assets/images/instagram.png">
						</a>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<script type="text/javascript">
		$('.icon').click(function(){
			$(this)
			.toggleClass('menu')
			.toggleClass('close');
		})
	</script>
	<?php wp_footer(); ?>
</body>
</html>