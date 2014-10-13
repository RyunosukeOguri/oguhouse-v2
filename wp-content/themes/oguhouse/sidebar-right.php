<?php
/**
 * The Sidebar-right
 *
 * @package WordPress
 * @subpackage OGUHOUSE
 * @since OGUHOUSE 2.0
 */
?>

<div class="side-contents">
  <h3 class="h3 nav-title"><i class="fa fa-navicon i-blue i-left"></i>MENU</h3>
  <ul class="nav side--nav">
    <?php
      get_new_posts(10);
    ?>
  </ul>
  <h3 class="h3 twitter-title"><i class="fa fa-twitter i-blue i-left"></i>Twitter</h3>
  <h3 class="h3 tags-title"><i class="fa fa-tags i-glay i-left"></i>tags</h3>
  <?php echo wp_tag_cloud( 'smallest=8&largest=22' ); ?>
  
  <h3 class="h3 tags-title"><i class="fa fa-tags i-glay i-left"></i>Categoris</h3>
  <?php wp_list_categories('orderby=name&show_count=1&feed_image=/images/rss.gif'); ?>

  <ul class="side--banner">
    <?php
      $args = [
        'baner01' => 'baner_link01',
        'baner02' => 'baner_link02',
        'baner03' => 'baner_link03',
      ];
      // get_side_baners($args, 360); 
    ?>
  </ul>
</div>
