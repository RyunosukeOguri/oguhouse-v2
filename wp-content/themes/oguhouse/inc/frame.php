<?php
/**
 * frame.php
 *
 */
?>

<div class="frame_wave">

  <!-- Backdrop frame -->
  <div class="frame_backdrop">
    <?php echo get_img_thumbnail("common/frame_wave_clear.png", array("width" => "1024", "height" => "190") ); ?>
  </div>

  <!-- Right frame -->
  <div class="fram-right">
  	<h1 class="h1">OGUHOUSE</h1>
  	<p>
  	It may be seen that tomorrow if I do not understand today<br>
　　　It may be possible tomorrow, even if you can not today
    </p>
  </div>

  <!-- Left frame -->
  <div class="frame-left">
		<?php echo get_img_thumbnail("common/my_photo_01.png", array("width" => "150", "height" => "150", "class" => "img-circle thumb-layout")); ?>
  	<p class="user--name"> Ryunosuke Oguri </p>
  	<p class="user--message">
  		<span>jobs: Web Engineer</span><br>
  		<span>address: Tokyo </span><br>
  		<span>age: 24</span>
  	</p>
  </div>


</div>