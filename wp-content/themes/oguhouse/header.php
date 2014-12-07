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
<!-- 	  <div class="full-img">
	    <?php echo get_img_thumbnail("common/backdrop.png", array("width" => "1200", "height" => "629") ); ?>
	  </div>
 -->	<?php endif; ?>
  
<!-- #header -->
<?php if(is_home()){ ?> 
	<header id="header">
<?php }else{ ?>
	<header id="header" class="header-single">
<?php }; ?>

	<div class="site--logo">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<p class="site--logo-title">OGU<i class="fa fa-home"></i>OUSE</p>
			<small>WEB-CREATOR BLOG</small>
		</a>
	</div>
	<div class="header-singin">

	</div>
  <!--グローバルナビ-->
  <div class="nav-hamburger">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle nav-button" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
	  <div class="ncollapse navbar-collapse nav-toggle" style="height: 0px; overflow: hidden;">
			<?php wp_nav_menu( array( 'menu' => 'global_nav', 'menu_class' => 'nav-menu') ); ?>
    </div>
  </div>
  <nav id="primary-navigation" class="site-navigation primary-navigation global-nav" role="navigation">
		<?php wp_nav_menu( array( 'menu' => 'global_nav', 'menu_class' => 'nav-menu' ) ); ?>
	</nav>
	<div class="header--sns">
		<a class="sns-btn-a" target="_blank" href="https://plus.google.com/u/0/115875078341552818583/posts"><i class="fa fa-google-plus-square fa-2x i-left google"></i></a>
		<a class="sns-btn-a" target="_blank" href="https://github.com/RyunosukeOguri"><i class="fa fa-github fa-2x i-left git"></i></a>
		<a class="sns-btn-a" target="_blank" href="https://twitter.com/amagurik2"><i class="fa fa-twitter-square fa-2x i-left twitter"></i></a>
		<a class="sns-btn-a" target="_blank" href="https://www.facebook.com/ryuunosuke.oguri"><i class="fa fa-facebook-square fa-2x i-left facebook"></i></a>
	</div>
</header><!-- #header -->

