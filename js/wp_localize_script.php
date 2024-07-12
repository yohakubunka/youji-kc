<?php
function mytheme_scripts() {

  //PHPの値を参照したいJavaScriptファイル
  wp_enqueue_script( 'mytheme-script', get_template_directory_uri() . '/js/wp_localize_script.js', NULL, '1.0.0', true );

  // get page type
  $page_type = get_page_slug();


  //JavaScriptに渡す値の設定
  wp_localize_script('mytheme-script', 'myValues', array(
    'site_url' => get_site_url(), // site url
    'temp_url' => get_template_directory_uri(), //template url
    'page_type' => $page_type,
    //'post_value' => $_POST,
  ));
}
add_action( 'wp_enqueue_scripts', 'mytheme_scripts' );
?>
