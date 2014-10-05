<?php

/**
 * >>> css 
 * @cssを読み込んでいます
 * @return void
 */
function my_styles() {
    wp_enqueue_style( 'bootstrap', get_bloginfo( 'template_directory') . '/css/bootstrap.css', array(), null, 'all');
    wp_enqueue_style( 'reset', get_bloginfo( 'template_directory') . '/css/reset.css', array(), null, 'all');
    wp_enqueue_style( 'flexslider', get_bloginfo( 'stylesheet_directory') . '/css/flexslider.css', array(), null, 'all');
    wp_enqueue_style( 'font-awesome', 'http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css', array(), null , 'all');
    wp_enqueue_style( 'style', get_bloginfo( 'stylesheet_directory') . '/style.css', array(), null, 'all');
}
add_action( 'wp_enqueue_scripts', 'my_styles');

/**
 * >>> js
 * @jsを読み込んでいます
 * @return void
 */
function my_scripts() {

    wp_enqueue_script( 'jquery', get_bloginfo( 'stylesheet_directory') . '/js/plugins/jquery-2.1.1.min.js', array(), false, true );
    wp_enqueue_script( 'bootstrap', get_bloginfo( 'template_directory') . '/js/plugins/bootstrap.min.js', array(), false, true );
    wp_enqueue_script( 'jquery.flexslider', get_bloginfo( 'template_directory') . '/js/plugins/jquery.flexslider.js', array(), false, true );
    wp_enqueue_script( 'google_map_api', get_bloginfo( 'template_directory') . '/js/google_map_api.js', array(), false, true );
    wp_enqueue_script( 'tabnav', get_bloginfo( 'template_directory') . '/js/tabnav.js', array(), false, true );
    wp_enqueue_script( 'main', get_bloginfo( 'template_directory') . '/js/main.js', array(), false, true );
}
add_action( 'wp_enqueue_scripts', 'my_scripts');




/**
 * Related Post(関連記事) 
 * @param $per_page = 表示数 | $slug_name = スラッグ名
 * @return void
 *
 */
function get_related_posts($per_page, $slug_name, $device = "pc"){
	global $post;
	//カスタムフィールド：関連記事を取得
	$get_field = get_field('related_post', $post->ID);
	//関連記事の設定がされている場合
	if(!empty($get_field)) {
		$get_posts = $get_field;
	}else{
		//関連記事の設定がされていない場合（ランダムで表示）
		$category = get_category_by_slug($slug_name); //スラッグ名からカテゴリを取得
		$cat_id = $category->cat_ID;									//カテゴリのIDを取得
		$args = [
		 'numberposts'    => $per_page, //表示数
		 'cat'            => $cat_id,		//カテゴリID
		 'orderby'        => 'rand',     //ランダム取得
		]; 

  	$get_posts = 	get_posts($args);//記事の取得(上記のカテゴリIDに該当する)
	}
  foreach( $get_posts as $post ) {
      setup_postdata($post);
      ?>
      <li class="thumbnail">
    		<a href="<?php the_permalink(); ?>">
	    		<div class="thumbnail_cut">
	    			<?php get_thumbnail_orijinal($post->ID, $post->post_name); ?>
	        </div>
	        <p class="child_title"><?php echo string_text($post->post_title,0, textCount_is_device($device) ); ?></p>
				  <p class="child_excerpt"><?php echo string_text($post->post_excerpt,0,36); ?></p>
				</a>
      </li>
      <?php
  }
  wp_reset_postdata();
}


//ajax用件数表示
function all_count_for_ajax($slug_name = "news") {

	if ( $slug_name == "news" ) {
		$page = $_GET['page'];
		if (empty($page)){ 
			$args = [
				'numberposts' => -1,
				'post_type'   => 'news',
			];
			$news = get_posts($args);
		}else{
			$tag_properties = get_term_by('slug', $page, 'post_tag');
			$tag_id = $tag_properties->term_id;
			$condition = "tag_id={$tag_id}&post_type=news&posts_per_page={$per_page}";
			$news = query_posts($condition);			
		}

		$all_page = count($news);
	}else{
		$cat_id = get_category_by_slug($slug_name);
		$cat_id = $cat_id->cat_ID;
		//全件取得
		$args = [
			'posts_per_page' => -1,
			'post_type'      => 'post',
			'cat' 					 => $cat_id,
			'taxonomy'       => 'category',
			'order'          => 'ASC',
		];
		$all_page = count(get_posts($args));
	}

		return $all_page;

}

//子ページ判定
function is_subpage() {
	global $post;                                 // $post には現在の固定ページの情報があります
  if ( is_page() && $post->post_parent ) {      // 現在の固定ページが親ページを持つかどうかをチェックします
         return $post->post_parent;             // 親ページの ID を返します
  } else {                                      // 親ページを持たないので...
         return false;                          // ...false を返します
  };
};



//現在のページのカテゴリーを持つ投稿を取得しメニューを作成
function get_post_categorys_sim($slug_name, $per_page){
	global $post;
	$cat_id = get_category_by_slug($slug_name);
	$cat_id = $cat_id->cat_ID;

	$args = [
		'posts_per_page' => $per_page,
		'post_type'      => 'post',
		'cat' 					 => $cat_id,
		'taxonomy'       => 'category',
		'order'          => 'ASC',
	];

	$posts = get_posts($args);
	return $posts;
	
}


/**
 * サイドバーに表示するバナーとか
 * @return void 
 * @param 第一引数： $args = [ '画像フィールド名' => 'リンクフィールド名' ];
 *        第二引数： $custom_filed_id = カスタムフィールドのID
 *
 */
function get_side_baners($args = [], $custom_filed_id = null){

	foreach ($args as $img => $url) {
	 $get_url = get_field( $url, $custom_filed_id );
	 $get_img = get_field( $img, $custom_filed_id );
	 if( empty($get_url) || empty($get_img) ) { continue; }

   echo "<li>";
	 echo	"<a target=\"_blank\" href=\"". $get_url . "\">";
   echo "<img src=\"" . $get_img . "\" width=\"280\" height=\"120\" alt=\"" . $get_fileds['img'] . "\"/>";
   echo "</a>";
   echo "</li>";
	}
}


// グリッドメニューのタイトル表示も字数をデバイスで変更
function textCount_is_device($device = "pc") {
	if ( $device == "smart" ) {
		return 16;
	} else {
		return 24;
	}
}
/**
 * テキストカット
 * @param $text = 文言(string) 
 *        $offset = 何文字目から処理をするかを指定：初期値0 
 *        $limit = 文字数で何文字表示させるかを指定
 * @return void(string)
 **/
function string_text($text, $offset, $limit) {
	//指定した文字数より多い場合は語尾に...をつける
	if (mb_strlen($text) >= $limit) {
		return mb_substr(strip_tags($text) ,$offset ,$limit).'...';
	}else{
		return mb_substr(strip_tags($text) ,$offset ,$limit);
	}

}
//カテゴリー付きアイキャッチ画像
function get_thumbnail_orijinal($id, $post_name, $img_class = ""){
	
 	if ( get_category_icon($id) != false ) {
 		echo get_category_icon($id);
 	}
  echo get_the_post_thumbnail( $id, 'medium', array( 'class' => $img_class, 'alt' => get_the_title() ) );
}

//カテゴリーアイコンを取得
function get_category_icon($id){
	//カテゴリアイコンカスタムフィールド
	$category = get_the_category($id);
	 
	$cat_id = $category[0]->cat_ID;
	$post_id = 'category_'.$cat_id; 
	   
	$catimg = get_field('catimg',$post_id);
	$img = wp_get_attachment_image_src($catimg, 'full');
 	if ( empty( $img ) ) { return false; }	
	?>
	<div class="category_icon"><img src="<?php echo $img[0]; ?>" width="40" height="40" alt="<?php echo $category->cat_name; ?>" /></div>
	<?php

}

//タグ　クラス名変更（カラー変更）
function get_tag_color($id){
	$tags = get_the_tags($id);
	foreach ($tags as $tag) {
		echo $tag_slug_name = $tag->slug;
		break;
	}
}
//もっと読む
function new_excerpt_more( $more ) {
	return ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">Read More</a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );

//文言の長さ
function custom_excerpt_length( $length ) {
     return 20;	
}	
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

/* favicon */
function blog_favicon() {
  echo '<link rel="shortcut icon" type="image/x-icon" href="'.get_bloginfo('template_url').'/images/common/icmg_favi.ico" />'."\n";
}
add_action('wp_head', 'blog_favicon');

/* web clip icon */
function blog_webclip() {
  echo '<link rel="apple-touch-icon-precomposed" href="' . get_bloginfo('template_url') . '/images/common/webclip.png" />' . "\n";
}
add_action('wp_head', 'blog_webclip');

