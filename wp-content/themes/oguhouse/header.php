<?php
/**
 * The Header for our theme
 *
 * 
 *
 * @package WordPress
 * @subpackage Oguhouse
 * @since Oguhouse 2.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width,initial-scale=1" >
	<title>
		<?php if(is_home()){ ?> 
			<?php bloginfo('name'); ?> | OGUHOUSE
		<?php }else{ ?>
			<?php wp_title( '| OGUHOUSE', true, 'right' ); ?>
		<?php } ?>
	</title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<script src="http://www.google.com/jsapi/"></script>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="root_path"><?php bloginfo('url'); ?></div>
  <?php if(is_home()) : ?> 
		<!-- frame img -->
	  <div class="full-img">
	    <?php echo get_img_thumbnail("common/backdrop.png", array("width" => "1200", "height" => "629") ); ?>
	  </div>
	<?php endif; ?>
  
<!-- #header -->
<header id="header">
	<div class="site--logo">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<p class="site--logo-title">OGU<i class="fa fa-home"></i>OUSE</p>
			<small>WEB-CREATER BLOG</small>
		</a>
	</div>
	<div class="header-singin">

	</div>
	<div class="header--sns">
		<a class="sns-btn-a" target="_blank" href="https://plus.google.com/u/0/115875078341552818583/posts"><i class="fa fa-google-plus-square fa-2x i-left google"></i></a>
		<a class="sns-btn-a" target="_blank" href="https://github.com/RyunosukeOguri"><i class="fa fa-github fa-2x i-left git"></i></a>
		<a class="sns-btn-a" target="_blank" href="https://twitter.com/amagurik2"><i class="fa fa-twitter-square fa-2x i-left twitter"></i></a>
		<a class="sns-btn-a" target="_blank" href="https://www.facebook.com/ryuunosuke.oguri"><i class="fa fa-facebook-square fa-2x i-left facebook"></i></a>
	</div>
</header><!-- #header -->

