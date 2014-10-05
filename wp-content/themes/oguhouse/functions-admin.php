<?php

// カスタム投稿タイプの追加
function custom_post(){

    //ニュースのカスタム投稿を挿入
    register_post_type( 'news', /* post-type */
        array(
          'labels' => array(
            'name' => __( 'ニュース' ),
            'singular_name' => __( 'ニュース一覧' )
          ),
          'capability_type' => 'post',
          'public' => true,
          'publicly_queryable' => true,
          'show_ui' => true,
          'rewrite' => ["with_front" => false],
          'hierarchical' => true,
          'taxonomies' => array('category', 'post_tag','news'),
          'update_count_callback' => '_update_post_term_count',
          'supports' => array( 'title', 'slug', 'editor', 'author', 'thumbnail', 'excerpt','page-attributes', 'custom-fields' ),
          'has_archive' => true
        )
      );

    //ニュースのカスタム投稿にタグを設定
    // register_taxonomy(
    //     'disc', 
    //     'news', 
    //     array(
    //       'hierarchical' => false, 
    //       'update_count_callback' => '_update_post_term_count',
    //       'label' => 'タグ',
    //       'singular_label' => 'タグ',
    //       'public' => true,
    //       'show_ui' => true
    //     )
    //   );
    
    //ケーススタディのカスタム投稿を挿入
    // $case_labels = array("name" => "ケーススタディ");

    // $args2 = array(
    //     'labels' => $case_labels,
    //     'public' => false,
    //     'publicly_queryable' => true,
    //     'show_ui' => true,
    //     'query_var' => true,
    //     'rewrite' => ["with_front" => false],
    //     'capability_type' => 'post',
    //     'hierarchical' => true,
    //     'taxonomies' => array('category', 'post_tag'),
    //     'supports' => array('title','slug','thumbnail','editor','excerpt','page-attributes'),
    //     'has_archive' => true
    // );

    // register_post_type('casestudy', $args2);
}
add_action("init","custom_post");

//カスタムナビゲーション
register_nav_menus(array('nav' => 'ナビゲーション'));
// ウィジェット
register_sidebar();
/*
 * 画像リサイズプラグイン
 * 使い方
 * 管理画面ツール  >  Regen. Thumbnails > Regenerate All Thumbnails(ボタン) > リサイズ開始
 *
 */
set_post_thumbnail_size(200, 200, true);

/*
 * アイキャッチ画像選択導線を挿入
 */
add_theme_support( 'post-thumbnails' );

//カテゴリー野優先度をID順に
function get_the_category_orderby_id( $categories ) {
    usort( $categories, '_usort_terms_by_ID');
    return $categories;
}
add_filter( 'get_the_categories', 'get_the_category_orderby_id' );


//ヘッダーにメニューの追加
function header_add(){
    global $wp_admin_bar;

    $wp_admin_bar->add_menu( array(
        'id' => 1,
        'title' => '更新用',
        'href' => admin_url("./post.php?post=360&action=edit")
    ));
}
add_action( 'wp_before_admin_bar_render', 'header_add', 1000 );

//ヘッダーのcss
function my_acf_admin_head()
{
  ?>
  <style type="text/css">

  </style>

  <script type="text/javascript">
  (function($){

    /* ... */

  })(jQuery);
  </script>
  <?php
}

add_action('acf/input/admin_head', 'my_acf_admin_head');
