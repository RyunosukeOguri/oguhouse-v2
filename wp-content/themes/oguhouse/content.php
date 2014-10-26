<?php
 /**
  * content.php
  *
  */
?>

<div id="content" class="contents">
	<div class="col-md-12 view view--white">
		<div class="row">
			<section class="view-inner">
				<h1 class="h1">Topics</h1>
				<div class="topic-field row">
					<ul>
						<?php echo get_posts_topic(3, "pc"); ?>
					</ul>
				</div>
			</section>
		</div>
	</div>
	<div class="col-md-12 view view--glay">
		<div class="row">
			<section class="col-md-6">
				<h1 class="h1">New article</h1>
				<div class="news_feed">
				  <!-- new article [] -->
			    <h3 class="h3 new-post-title"><i class="fa fa-star i-orange i-left"></i>最近の投稿</h3>
			    <ul class="nav side--nav">
			      <?php
			        get_new_posts(10);
			      ?>
			    </ul>
				</div>
			</section>
		</div>
	</div>
</div><!-- #content -->
