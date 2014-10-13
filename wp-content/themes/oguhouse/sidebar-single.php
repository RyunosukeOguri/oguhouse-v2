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

  <!-- new article [] -->
  <aside>
    <h3 class="h3 new-post-title"><i class="fa fa-archive i-green i-left"></i>最新の記事</h3>
      <ul class="nav side--nav">
      <?php
        get_new_posts(10);
      ?>
    </ul>
  </aside>

  <!-- twitter [] -->
  <aside>
  <h3 class="h3 twitter-title"><i class="fa fa-twitter i-blue i-left"></i>Twitter</h3>
    <ul>
      <?php dynamic_sidebar(); ?>
    </ul>
  </aside>

  <!-- tag [] -->
  <aside>
  <h3 class="h3 tags-title"><i class="fa fa-tags i-blown i-left"></i>tags</h3>
  <div class="nav side-tags">
    <?php echo wp_tag_cloud( ['smallest' => '14', 'largest' => '26', 'unit' => 'px'] ); ?>
  </div>
  </aside>

  <!-- category [] -->
  <aside>
  <h3 class="h3 cate-title"><i class="fa fa-asterisk i-wine i-left"></i>Categoris</h3>
  <ul class="nav side-category">
    <?php wp_list_categories('orderby=name&show_count=1&title_li='); ?>
  </ul>
  </aside>

  <!-- banner -->
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
