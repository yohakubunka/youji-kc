<?php $theme_options = get_option('theme_option_name'); ?>
<section class="section contact-box">
  <div class="bg-cover">
    <div class="section__inner">
      <div class="contact">
        <h2>お電話でのお問い合わせ</h2>
        <div class="contact__tel">
          <div class="tell-banner">
            <a href="tel:" class="tell-num">
              <?= $theme_options['op_3'] ?>
            </a>
          </div>
          <p>【受付時間】平日:<?= $theme_options['op_4'] ?><br>授業中は電話がつながらないこともあります。その際は電話サービスにご伝言ください。</p>
        </div>
        <div class="contact__policy">
          <h3 class="medium">個人情報保護方針</h3>
          <p>当サイトの運営に際し、お客様のプライバシーを尊重し個人情報に対して十分な配慮を行うとともに、<br>大切に保護し、適正な管理を行うことに努めております。</p>
        </div>
      </div>
    </div>
  </div>
</section>