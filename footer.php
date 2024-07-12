<?php wp_footer(); ?>
<?php $theme_options = get_option('theme_option_name');  ?>
<footer class="footer">
  <div class="footer__inner">
    <div class="footer__inner--left">
      <div class="footer-logo">
        <a href="<?= esc_url(home_url('/')); ?>"><img src="<?php echo esc_html(get_theme_mod('footer-logo')) ?>" alt="幼児教育センターロゴ"></a>
      </div>
      <div class="flex-left">
        <div class="location">
          <p>【所在地】</p>
          <!-- 郵便番号 -->
          <p class="address">〒<?= $theme_options['op_1'] ?><br>
            <!-- 住所 -->
            <?= $theme_options['op_2'] ?></p>

          <div class="map-btn">
            <a target=_brank href="<?php echo esc_html(get_theme_mod('access-map')) ?>">
              <p>Google Map</p>
            </a>
          </div>

        </div>
        <div class="access">
          <p>【アクセス方法】</p>
          <p><?php echo nl2br(esc_html(get_theme_mod('access-text'))) ?></p>
        </div>
      </div>
    </div>
    <div class="footer__inner--right">
      <div class="footer-menulist menulist">
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
    </div>
  </div>
  <div class="copyright">Copyright ©︎ 2022 幼児教育センター All rights reserved.</div>
</footer>
</body>

</html>