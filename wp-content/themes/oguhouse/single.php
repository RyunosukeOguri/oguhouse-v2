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
<div id="single-content" class="contents">
	<div class="container">
		<div class="row">

<!-- 			<div id="site-left" class="col-xs-4 col-md-4">
				<section class="row">
					<?php get_sidebar(); ?>
				</section>
			</div> -->

			<div id="main-colmun" class="main-col-single col-xs-8 col-sm-8">
				<section class="row">
				<?php while ( have_posts() ) : the_post(); ?>
					<article class="entry-content">
						<h1 class="h1 blog-title"><samp><?php the_title(); ?></samp></h1>
						<div class="blog-category">
							<p class="blog--cate-title">カテゴリー: </p><?php the_category(); ?>
						</div>
						<div class="blog-post">
							<?php the_content(); ?>
						</div>
					</article><!-- .entry-content -->
				<?php endwhile; // end of the loop. ?>
				</section>
				<section class="row related_post">
					<h3>関連記事</h3>
					<ul>
						<?php get_related_posts(6, $post->post_name, 'pc'); ?>
					</ul>
				</section>

			</div><!-- .main-colmun -->

			<div id="site-right" class="col-xs-4 col-md-4">
				<section class="row">
					<?php get_sidebar('single'); ?>
				</section>
			</div>

		</div><!-- .row -->
	</div><!-- .container -->
</div><!-- #single-content -->
<?php get_footer(); ?>  <!-- footer.php -->
