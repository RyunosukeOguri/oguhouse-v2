<?php
/**
 * The Sidebar
 *
 * @package WordPress
 * @subpackage OGUHOUSE
 * @since OGUHOUSE 2.0
 */
?>

<div class="side-contents">
  <h3 class="h3 new-post-title"><i class="fa fa-archive i-green i-left"></i>最新の記事</h3>
  <ul class="nav side--nav">
    <?php
      get_new_posts(5);
    ?>
  </ul>
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
