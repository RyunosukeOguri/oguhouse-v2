<?php
 /**
  * content.php
  *
  */
?>

<div id="content" class="contents">

	<div id="main-colmun" class="col-xs-12 col-sm-12 col-md-9">
		<div class="col-md-12 view">
				<section>
					<h2 class="h2">Topics</h2>
					<div class="topic-field row">
						<ul>
							<?php echo get_posts_topic(3, "pc"); ?>
						</ul>
					</div>
				</section>
		</div>
		<div class="col-md-12 view">
			<section>
				<h2 class="h2">New article</h2>
				<div class="news_feed">
				  <!-- new article [] -->
			    <ul class="nav side--nav">
			      <?php
			        get_new_posts(10);
			      ?>
			    </ul>
				</div>
			</section>
		</div>
	</div>
	
  <!-- sidebar -->
	<?php get_sidebar('single'); ?>



</div><!-- #content -->
