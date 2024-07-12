<?php
/**
 * OGP を echo する
 */
function output_ogp()
{
    global $post;

    # デフォルト値（トップページ）
    $og_site_name   = get_bloginfo('name');
    $og_title       = get_bloginfo('name');
    $og_type        = 'website';
    $og_url         = home_url();
    //$og_image       = 'トップページ用の画像URL';
    $og_description = get_bloginfo('description');
    //$fb_app_id      = 'FacebookアプリID';
    $twitter_card   = 'summary';
    //$twitter_site   = '@Twitterアカウント名';

    if (is_singular()) {  # 投稿 or 固定ページ
        $og_type = 'article';
        setup_postdata($post);
        $og_title       = $post->post_title;
        $og_description = mb_substr(get_the_excerpt(), 0, 100);
        $og_url         = get_permalink();
        wp_reset_postdata();

        if (has_post_thumbnail()) {
            $og_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full')[0];
        }
    }

    # トップページ or 投稿 or 固定ページ
    if (is_front_page() || is_home() || is_singular()): ?>
        <meta property="og:title" content="<?php echo esc_attr($og_title); ?>">
        <meta property="og:type" content="<?php echo $og_type; ?>"/>
        <meta property="og:url" content="<?php echo esc_url($og_url); ?>">
        <!--<meta property="og:image" content="<?php //echo esc_url($og_image); ?>">-->
        <meta property="og:description" content="<?php echo esc_attr($og_description); ?>">
        <meta property="og:site_name" content="<?php echo esc_attr($og_site_name); ?>">
        <meta property="og:locale" content="ja_JP">
        <!--<meta property="fb:app_id" content="<?php //echo $fb_app_id; ?>">-->
        <meta name="twitter:card" content="<?php echo $twitter_card; ?>">
        <!--<meta name="twitter:site" content="<?php //echo $twitter_site; ?>">-->
    <?php endif;
}

# <head> 要素に追加
add_action('wp_head', 'output_ogp');
