<?php $theme_options = get_option('theme_option_name'); ?>
<div class="header">
  <div class="header__inner">
    <div class="header__inner--left">
      <div class="header-logo">
        <a href="<?= esc_url(home_url('/')); ?>"><img src="<?php echo esc_html(get_theme_mod('header-logo')) ?>" alt="幼児教育センター"></a>
      </div>
    </div>
    <div class="header__inner--right">
      <div class="tel">
        <a href="tel:">
          <p class="tell-num"><?= $theme_options['op_3'] ?></p>
          <p>【受付時間】平日:<?= $theme_options['op_4'] ?></p>
        </a>
      </div>
      <div class="sns">
        <a target="_brank" href="<?= $theme_options['op_5'] ?>"><img class="insta" src="<?= get_stylesheet_directory_uri(); ?>/images/svg/insta-icon.svg"></a>
      </div>
      <div class="menu">
        <div class="menu__btn">
          <span></span>
          <span></span>
          <span></span>
          <p>MENU</p>
        </div>
      </div>
    </div>
    <div class="inside">
      <nav class="inside__inner">
        <div class="inside__inner--logo">
          <a href="<?= esc_url(home_url('/')); ?>"><img src="<?php echo esc_html(get_theme_mod('header-logo')) ?>" alt="幼児教育センター"></a>
        </div>
        <div class="inside__inner--list menulist">
          <ul>
            <li><a class="innerlink" href="<?= esc_url(home_url('/')); ?>">TOP</a></li>
            <li><a class="innerlink" href="<?= esc_url(home_url('/')); ?> #sec-salut">ごあいさつ</a></li>
            <li><a class="innerlink" href="<?= esc_url(home_url('/')); ?> #sec-news">お知らせ</a></li>
            <li><a class="innerlink" href="<?= esc_url(home_url('/')); ?> #sec-course">コースの紹介</a></li>
          </ul>
          <ul>
            <li><a class="innerlink" href="<?= esc_url(home_url('/')); ?> #sec-voice">保護者の声</a></li>
            <li><a class="innerlink" href="<?= esc_url(home_url('/')); ?> #sec-policy">基本理念</a></li>
            <li><a class="innerlink" href="<?= esc_url(home_url('/')); ?> #sec-logo">ロゴに込めた想い</a></li>
            <li><a class="innerlink" href="<?= esc_url(home_url('/')); ?> #sec-facility">施設案内</a></li>
          </ul>
        </div>
        <div class="inside__inner--contact">
          <div class="tell-banner">
            <a href="tel:">
              <p class="tell-num"><?= $theme_options['op_3'] ?></p>
            </a>
          </div>

          <div class="contact-time">
            <p>【受付時間】平日:<?= $theme_options['op_4'] ?></p>
            <p>授業中は電話がつながらないこともあります。その際は電話サービスにご伝言ください。</p>
          </div>

        </div>
      </nav>
    </div>
  </div>
</div>