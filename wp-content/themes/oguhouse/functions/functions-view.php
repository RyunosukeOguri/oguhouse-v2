<?php

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
      <li class="thumbnail col-xs-6 col-md-4">
    		<a href="<?php the_permalink(); ?>">
	    		<div class="thumbnail_cut">
	    			<?php get_thumbnail_orijinal($post->ID, $post->post_name); ?>
	        </div>
	        <p class="post-title"><?php echo string_text($post->post_title,0, textCount_is_device($device) ); ?></p>
				</a>
      </li>
      <?php
  }
  wp_reset_postdata();
}

function get_posts_topic($per_page, $device = "pc"){
	global $post;
		$args = [
		 'numberposts'    => $per_page, //表示数
		 'orderby'        => 'rand',     //ランダム取得
		]; 

  	$get_posts = 	get_posts($args);//記事の取得(上記のカテゴリIDに該当する)

  foreach( $get_posts as $post ) {
      setup_postdata($post);
      ?>
      <li class="col-xs-6 col-md-4">
    		<a class="thumbnail" href="<?php the_permalink(); ?>">
	    		<div class="thumbnail_cut">
	    			<?php get_thumbnail_orijinal($post->ID, $post->post_name); ?>
	        </div>
	        <p class="post-title"><?php echo string_text($post->post_title,0, textCount_is_device($device) ); ?></p>
				  <p class="post-excerpt"><?php echo string_text($post->post_excerpt,0,36); ?></p>
				</a>
      </li>
      <?php
  }
  wp_reset_postdata();
}

function get_new_posts($per_page) {
	global $post;
	$args = [
		'numberposts' => $per_page,
		'post_type'   => 'post'
	];

	$get_posts = get_posts($args);
	if (empty($get_posts)) { return false; }
	foreach ( $get_posts as $post ) {
	  setup_postdata($post);
		?>
		<li>
			<a href="<?php the_permalink(); ?>">
          <?php get_thumbnail_orijinal($post->ID, $post->post_name, 'medium thumbnail'); ?>
				<p>
				<i class='fa fa-location-arrow i-left'></i>
				<?php echo $post->post_title; ?>
				</p>
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
		return 30;
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
function get_thumbnail_orijinal($id, $post_name, $img_class = "", $size = "medium"){
	
 	// if ( get_category_icon($id) != false ) {
 	// 	echo get_category_icon($id);
 	// }
  echo get_the_post_thumbnail( $id, $size, array( 'class' => $img_class, 'alt' => get_the_title() ) );
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

