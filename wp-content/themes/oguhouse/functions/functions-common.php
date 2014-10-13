<?php
/**
* function-common.php
*
*/

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
 * >>> img
 * @imgタグを作成します
 * @param $fileName = string, $optins = array
 * @return void 
 */
function get_img_thumbnail( $fileName = null, $options = [] ) {
	if ( empty($fileName) ) { return false; }
  foreach ( $options as $key => $val) {
  	if ( !empty($val) ) {
  			$opt .= "{$key} = '{$val}'";
  	}
  }
  	if ( array_search('alt', $options) == null ) {
  		$opt .= "alt = ' ' ";
  	}

?>
	<img src="<?php bloginfo('template_directory');?>/img/<?php echo $fileName; ?>" <?php echo $opt; ?> />
<?php
}

/* favicon */
function blog_favicon() {
  echo '<link rel="shortcut icon" type="image/x-icon" href="'.get_bloginfo('template_url').'/images/common/oghouse_favi.ico" />'."\n";
}
add_action('wp_head', 'blog_favicon');

/* web clip icon */
function blog_webclip() {
  echo '<link rel="apple-touch-icon-precomposed" href="' . get_bloginfo('template_url') . '/images/common/webclip.png" />' . "\n";
}
add_action('wp_head', 'blog_webclip');


