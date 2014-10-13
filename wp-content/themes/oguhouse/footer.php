<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Oguhouse
 * @since Oguhouse 2.0
 */
?>


		<footer id="footer">
			<div class="to_top">
				<a href="#"><i class="fa fa-arrow-up fa-2x"></i></a>
			</div>
			<div class="f-contents">
				<!-- Site Logo -->
				<div class="site--logo">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<p class="site--logo-title">OGU<i class="fa fa-home"></i>OUSE</p>
						<span>WEB-CREATER BLOG</span>
					</a>
				</div>
				<!-- SNS Icons -->
		  	<ul class="f-sns">  		
					<li class="sns-btn"><a target="_blank" href="https://plus.google.com/u/0/115875078341552818583/posts"><i class="fa fa-google-plus-square fa-2x i-left sns-icon"></i>Google+</a></li>
					<li class="sns-btn"><a target="_blank" href="https://github.com/RyunosukeOguri"><i class="fa fa-github fa-2x i-left sns-icon"></i>GitHub</a></li>
					<li class="sns-btn"><a target="_blank" href="https://twitter.com/amagurik2"><i class="fa fa-twitter-square fa-2x i-left sns-icon"></i>Twitter</a></li>
					<li class="sns-btn"><a target="_blank" href="https://www.facebook.com/ryuunosuke.oguri"><i class="fa fa-facebook-square fa-2x i-left sns-icon"></i>Facebook</a></li>
					<li class="sns-btn"><a target="_blank" href="#"><i class="fa fa-rss-square fa-2x i-left sns-icon"></i>rss</a></li>
   		  </ul>
			  <!-- Global Nav -->
				<nav class="f-nav">
		 			<?php wp_nav_menu( array( 'menu' => 'footer_nav') ); ?>
				</nav>
			</div><!-- Footer-Contents -->

			<!-- Footer-Bottom -->
			<div class="f-bottom">
		  	<small class="copy">Copyright © 2014 OGUHOUSE CO, LTD. All Rights Reserved.</small>
			</div>
		</footer><!-- #colophon -->
	<?php wp_footer(); ?>
</body>
</html>