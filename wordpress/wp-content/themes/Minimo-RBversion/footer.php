	<footer>
		<div class="container">
			<div class="row">
				<div class="footer_div col-sm-9">
					<a href="<?php the_permalink( $post = 56 ); ?>" class="footer_a">Terms and conditions</a>
					<a href="<?php the_permalink( $post = 57 ); ?>" class="footer_a">Privacy</a>
				</div>
				<div class="col-sm-3 row" style="text-align: center;">
					<p class="col-lg-4" style="font-family: playfair_display_regular;">Follow</p>
					<div class="col-lg-8">
						<a href="#" class="footer_a">
							<img src="http://localhost/TechLatam_Test/wordpress/wp-content/uploads/2018/09/facebook-dark.png">
						</a>
						<a href="#" class="footer_a">
							<img src="http://localhost/TechLatam_Test/wordpress/wp-content/uploads/2018/09/twitter-dark.png">
						</a>
						<a href="#" class="footer_a">
							<img src="http://localhost/TechLatam_Test/wordpress/wp-content/uploads/2018/09/instagram.png">
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