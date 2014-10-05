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
  <ul class="side--nav">
    <?php

    ?>
  </ul>
  <ul class="side--banner">
    <?php
      $args = [
        'baner01' => 'baner_link01',
        'baner02' => 'baner_link02',
        'baner03' => 'baner_link03',
      ];
      get_side_baners($args, 360); 
    ?>
  </ul>
</div>
