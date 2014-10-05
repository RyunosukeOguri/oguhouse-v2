<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage OGUHOUSE
 * @since OGUHOUSE 2.0
 */

get_header(); ?>

	<div id="main" class="main-colmun">
		<?php while ( have_posts() ) : the_post(); ?>
			<div class="entry-content">
				<?php the_content(); ?>
			</div><!-- .entry-content -->
		<?php endwhile; // end of the loop. ?>

		<div class="wp_related_posts">
			<h3 class="related_post_title">関連する記事</h3>
			<div class="child_content">
				<ul>
					<?php get_related_posts(3, "", "pc"); ?>
				</ul>
			</div>
		</div><!-- .wp_related_posts -->

	</div><!-- .main-colmun -->
	<div id="side" class="site-side_ber">
	<?php get_sidebar(); ?>
	</div>

<?php get_footer();
