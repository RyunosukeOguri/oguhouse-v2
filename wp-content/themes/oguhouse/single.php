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
			<div id="main-colmun" class="col-xs-12 col-sm-12 col-md-9">
				<section class="row">
				<?php while ( have_posts() ) : the_post(); ?>
					<article class="entry-content">
           <span class="entry-date">投稿日: <?php the_date(); ?></span>
						<h1 class="h1 blog-title"><samp><?php the_title(); ?></samp></h1>
						<div class="blog-category">
							<div class="blog--cate-title"><i class="fa fa-tags i-blown"></i></div>
							 <?php the_category(); ?>
						</div>
						<div class="text-center">
							<div class="max-img"><?php the_post_thumbnail('medium'); ?></div>
						</div>
						<div class="blog-post">
							<?php the_content(); ?>
						</div>
						<div class="comment">
							<?php comment_form([
								'comment_notes_after' => '',
								]); ?>
						</div>
					  <div class="row related_post">
					  	<h3>関連記事</h3>
							<ul class="nav">
								<?php get_related_posts(6, $post->post_name, 'pc'); ?>
							</ul>
						</div>

					</article><!-- .entry-content -->
				<?php endwhile; // end of the loop. ?>
				</section>
			</div><!-- .main-colmun -->
      <!-- sidebar -->
			<?php get_sidebar('single'); ?>

		</div><!-- .row -->
	</div><!-- .container -->
</div><!-- #single-content -->
<?php get_footer(); ?>  <!-- footer.php -->
