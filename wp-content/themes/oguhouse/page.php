<?php get_header(); ?>
	<div class="container">
		<div class="row">
			<div id="main" class="main-colmun">
				<div class="row page-layout">
					<!-- article -->
					<?php while ( have_posts() ) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="entry-content">
						<?php the_content(); ?>
						</div><!-- .entry-content -->
					</article><!-- #post -->
					<?php endwhile; ?>
				</div>
			</div><!-- main-colmun -->
		</div>
	</div>
<!-- 	<div id="side" class="side-colmun">
		<?php get_sidebar(); ?>
	</div> -->

<?php get_footer();
