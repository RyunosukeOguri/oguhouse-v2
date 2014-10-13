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
					<ul>
						<?php for($i=1;$i<=10;$i++) : ?>
						<li>
							<div class="col-md-2 date">
								<i class="fa fa-calendar git"></i>
								2014/10/01
							</div>
							<a href="#" class="col-md-6 title">
								<i class="fa fa-caret-right git"></i>
								AWSでサーバー構築してみた</a>
						</li>
					<?php endfor; ?>
					</ul>
				</div>
			</section>
		</div>
	</div>
</div><!-- #content -->
