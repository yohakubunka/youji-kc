<?php
// ページスラッグ取得 ================================================
function get_page_slug()
{
  global $post;
  $slug = $post->post_name;
  if (is_home() || is_front_page()) {
    $slug = "index";
  }
  if (is_date()) {
    $slug = "date";
  }
  if (is_archive()) {
    $slug = "archive";
  }
  if (is_404()) {
    $slug = "404";
  }
  if (is_category()) {
    $slug = "category";
  }
  if (is_tax()) {
    $slug = "taxonomy";
  }
  if (is_tag()) {
    $slug = "tag";
  }
  if (is_single()) {
    $slug = "single";
  }
  if (is_admin()) {
    $slug = "admin";
  }

  return $slug;
}

// 和暦取得 ================================================
function get_wareki($year, $format = false, $gannen = false)
{
  $gengoList = [
    ['name' => '令和', 'name_short' => 'R', 'year' => 2019],  // 2019-05-01,
    ['name' => '平成', 'name_short' => 'H', 'year' => 1989],  // 1989-01-08,
    ['name' => '昭和', 'name_short' => 'S', 'year' => 1926], // 1926-12-25'
    ['name' => '大正', 'name_short' => 'T', 'year' => 1912], // 1912-07-30
    ['name' => '明治', 'name_short' => 'M', 'year' => 1868], // 1868-01-25
  ];

  $gengo = array();
  foreach ($gengoList as $g) {
    if ($g['year'] <= $year) {
      $gengo = $g;
      break;
    }
  }

  $year = ($year - $gengo['year']) + 1;
  if ($year == 1 && $gannen) {
    $year = '元';
  }

  $out = $gengo['name'] . $year . '年';
  if ($format) {
    $out = $gengo['name_short'] . $year . '年';
  }
  return $out;
}

// 使用しているテンプレートファイル名取得 =======================================================

function get_template_failename()
{
  global $template; // テンプレートファイルのパスを取得
  $temp_name = basename($template); // パスの最後の名前（ファイル名）を取得
  return $temp_name;
}

function get_option_value($op_num)
{
  $theme_options = get_option('theme_option_name'); // Array of All Options
  $out = $theme_options['op_' . $op_num];
  return $out;
}



function get_browser_name()
{
  // 判定するのに小文字にする
  $browser = strtolower($_SERVER['HTTP_USER_AGENT']);

  // ユーザーエージェントの情報を基に判定
  if (strstr($browser, 'edge')) {
    $browser_name = "edge";
  } elseif (strstr($browser, 'trident') || strstr($browser, 'msie')) {
    $browser_name = "ie";
  } elseif (strstr($browser, 'chrome')) {
    $browser_name = "chrome";
  } elseif (strstr($browser, 'firefox')) {
    $browser_name = "firefox";
  } elseif (strstr($browser, 'safari')) {
    $browser_name = "safari";
  } elseif (strstr($browser, 'opera')) {
    $browser_name = "opera";
  } else {
    $browser_name = "other";
  }

  return $browser_name;
}
?>

<?php
// 画像が決まってないsample =====================================================================
function dummy_img($width = "100", $height = "200", $bg = "27709b", $color = "ffffff")
{
  $url = "https://tools.arashichang.com/";
  $url = $url . $width . "x" . $height . "/" . $bg . "/" . $color;
  return $url;
}
?>
<?php
// テーマカスタマイザー
function my_theme_customize_register($wp_customize)
{
  $wp_customize->add_section(
    'main-v',
    [
      'title'           => 'メインビジュアル',
      'priority'        => 1,
      'description' => 'メインビジュアルを設定してください。',
    ]
  );
  $wp_customize->add_setting('pc-mainvisual01');
  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'pc-mainvisual01', array(
    'label' => 'PCのメインビジュアル1', //設定項目のタイトル
    'section' => 'main-v', //追加するセクションのID
    'settings' => 'pc-mainvisual01', //追加する設定項目のID
    'description' => 'PCのメインビジュアル1を設定してください', //設定項目の説明
  )));
  $wp_customize->add_setting('pc-mainvisual02');
  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'pc-mainvisual02', array(
    'label' => 'PCのメインビジュアル2', //設定項目のタイトル
    'section' => 'main-v', //追加するセクションのID
    'settings' => 'pc-mainvisual02', //追加する設定項目のID
    'description' => 'PCのメインビジュアル2を設定してください', //設定項目の説明
  )));
  $wp_customize->add_setting('pc-mainvisual03');
  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'pc-mainvisual03', array(
    'label' => 'PCのメインビジュアル3', //設定項目のタイトル
    'section' => 'main-v', //追加するセクションのID
    'settings' => 'pc-mainvisual03', //追加する設定項目のID
    'description' => 'PCのメインビジュアル3を設定してください', //設定項目の説明
  )));
  $wp_customize->add_setting('pc-mainvisual04');
  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'pc-mainvisual04', array(
    'label' => 'PCのメインビジュアル4', //設定項目のタイトル
    'section' => 'main-v', //追加するセクションのID
    'settings' => 'pc-mainvisual04', //追加する設定項目のID
    'description' => 'PCのメインビジュアル4を設定してください', //設定項目の説明
  )));
  $wp_customize->add_setting('pc-mainvisual05');
  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'pc-mainvisual05', array(
    'label' => 'PCのメインビジュアル5', //設定項目のタイトル
    'section' => 'main-v', //追加するセクションのID
    'settings' => 'pc-mainvisual05', //追加する設定項目のID
    'description' => 'PCのメインビジュアル5を設定してください', //設定項目の説明
  )));
  $wp_customize->add_setting('sp-mainvisual01');
  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'sp-mainvisual01', array(
    'label' => 'スマホのメインビジュアル1', //設定項目のタイトル
    'section' => 'main-v', //追加するセクションのID
    'settings' => 'sp-mainvisual01', //追加する設定項目のID
    'description' => 'SPのメインビジュアル1を設定してください', //設定項目の説明
  )));
  $wp_customize->add_setting('sp-mainvisual02');
  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'sp-mainvisual02', array(
    'label' => 'スマホのメインビジュアル2', //設定項目のタイトル
    'section' => 'main-v', //追加するセクションのID
    'settings' => 'sp-mainvisual02', //追加する設定項目のID
    'description' => 'SPのメインビジュアル2を設定してください', //設定項目の説明
  )));
  $wp_customize->add_setting('sp-mainvisual03');
  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'sp-mainvisual03', array(
    'label' => 'スマホのメインビジュアル3', //設定項目のタイトル
    'section' => 'main-v', //追加するセクションのID
    'settings' => 'sp-mainvisual03', //追加する設定項目のID
    'description' => 'SPのメインビジュアル3を設定してください', //設定項目の説明
  )));
  $wp_customize->add_setting('sp-mainvisual04');
  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'sp-mainvisual04', array(
    'label' => 'スマホのメインビジュアル4', //設定項目のタイトル
    'section' => 'main-v', //追加するセクションのID
    'settings' => 'sp-mainvisual04', //追加する設定項目のID
    'description' => 'SPのメインビジュアル4を設定してください', //設定項目の説明
  )));
  $wp_customize->add_setting('sp-mainvisual05');
  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'sp-mainvisual05', array(
    'label' => 'スマホのメインビジュアル5', //設定項目のタイトル
    'section' => 'main-v', //追加するセクションのID
    'settings' => 'sp-mainvisual05', //追加する設定項目のID
    'description' => 'SPのメインビジュアル5を設定してください', //設定項目の説明
  )));
  $wp_customize->add_setting('header-logo');
  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'header-logo', array(
    'label' => 'ヘッダーロゴ', //設定項目のタイトル
    'section' => 'main-v', //追加するセクションのID
    'settings' => 'header-logo', //追加する設定項目のID
    'description' => 'ヘッダーロゴを設定してください', //設定項目の説明
  )));
  $wp_customize->add_setting('footer-logo');
  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'footer-logo', array(
    'label' => 'フッターロゴ', //設定項目のタイトル
    'section' => 'main-v', //追加するセクションのID
    'settings' => 'footer-logo', //追加する設定項目のID
    'description' => 'フッターロゴを設定してください', //設定項目の説明
  )));
  $wp_customize->add_setting('main-text');
  $wp_customize->add_control(
    //コントロールID
    "main-text",
    [
      // add_settingで設定したID
      'settings'    => 'main-text',
      // カスタマイザー画面で表示するラベル名
      'label'       => 'キャッチコピー',
      // 表示するセクションを指定
      'section'     => 'main-v',
      // フォームの種類を指定
      'type'        => 'textarea'
    ]
  );
  // アクセス
  $wp_customize->add_section(
    'access',
    [
      'title'           => 'アクセス',
      'priority'        => 2,
      'description' => 'アクセス方法・googleMapを設定してください。',
    ]
  );
  // 園での取り組み
  $wp_customize->add_setting('access-text');
  $wp_customize->add_control(
    //コントロールID
    "main-text",
    [
      'settings'    => 'access-text',
      'label'       => 'アクセス方法',
      'section'     => 'access',
      'type'        => 'textarea'
    ]
  );
  $wp_customize->add_setting('access-map');
  $wp_customize->add_control(
    //コントロールID
    "project-title_0",
    [
      'settings'    => 'access-map',
      'label'       => 'Googlemap',
      'section'     => 'access',
      'type'        => 'text'
    ]
  );
}
add_action('customize_register', 'my_theme_customize_register');
?>