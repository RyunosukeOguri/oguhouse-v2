<?php get_header(); ?>
	<div id="main" class="main-colmun">
		<!-- article -->
		<?php while ( have_posts() ) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="entry-content">
			<?php the_content(); ?>
			</div><!-- .entry-content -->
		</article><!-- #post -->
		<?php endwhile; ?>
	</div><!-- main-colmun -->

	<div id="side" class="side-colmun">
		<?php get_sidebar(); ?>
	</div>

<?php get_footer();
