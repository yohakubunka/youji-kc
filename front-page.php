<?php get_header(); ?>
<?php $theme_options = get_option('theme_option_name'); ?>
<?php get_template_part('template-parts/main-visual'); ?>
<main class="front">
  <!-- ご挨拶 -->
  <section id="sec-salut" class="section pad-canceller">
    <div class="section__inner">
      <div class="salut">
        <div class="salut__inner">
          <h2>ごあいさつ</h2>
          <div class="salut__inner--title">
            <h3>（株）幼児教育センターは、大切なお子様の豊かな未来を見つめて<br class="pc-only">
              <span>「考える力」</span>と<span>「がんばる心」</span>を育む教室です。<br>
              お子様が「楽しみながら」学び 大きく成長できるよう、<br class="pc-only">
              お手伝いをさせて頂きます。
            </h3>
          </div>
          <div class="salut__inner--text">
            <p>
              幼児期・児童期に特化したプログラムと教材そして指導力で、<br>
              誰もが 生まれ持つ「潜在能力」に多くの刺激を与え、 「認知能力」と「非認知能力」 の両方を育ててまいります。<br><br>
              開校して30年余り、 5000人以上もの多くの卒業生を送り出してまいりました。<br>
              卒業生は、 幼児教育センターの指針を胸に世界中に羽ばたいています。
            </p>
            <p>(株)幼児教育センター　<br class="sp-only">代表取締役　斉木輝子</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- お知らせ -->
  <section id="sec-news" class="section">
    <div class="section__inner">
      <div class="news">
        <div class="news__title">
          <h2>お知らせ</h2>
        </div>
        <div class="news__box">
          <div class="news__box--inner">
            <?php
            $args = array(
              'post_type' => 'post'
            );
            $the_query = new WP_Query($args);
            if ($the_query->have_posts()) : ?>
              <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                <article class="article">
                  <div class="article__title flex-left">
                    <p class="article__title--date"><?= get_the_date(); ?></p>
                    <h3><?php the_title(); ?></h3>
                  </div>
                  <div class="article__content">
                    <p><?php the_content(); ?></p>
                  </div>
                </article>
              <?php endwhile; ?>
            <?php else : ?>
              <p>現在、投稿はありません。</p>
            <?php endif;
            wp_reset_postdata(); ?>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- コース -->
  <section id="sec-course" class="section">
    <div class="section__inner">
      <div class="course">
        <div class="course__list">
          <?php
          $course_args = array(
            'post_type' => 'course'
          );
          $course_query = new WP_Query($course_args);
          if ($course_query->have_posts()) : ?>
            <?php while ($course_query->have_posts()) : $course_query->the_post(); ?>
              <article class="coursebox">
                <?php $course = get_field('course_box'); ?>
                <div class="coursebox__inner">
                  <div class="coursebox__inner--title">
                    <h2><?php the_title(); ?></h2>
                    <p><?= nl2br($course['course_subject']); ?></p>
                  </div>
                  <div class="flexcolumn">
                    <div class="coursebox__inner--text">
                      <h3 class="extrabold"><?= $course['course_title']; ?></h3>
                      <p class="cont-txt"><?= nl2br($course['course_text']); ?></p>
                      <!-- タグ出力 -->
                      <ul class="tag-list flex-left">
                        <?php
                        $tag_terms = get_the_terms($post->ID, 'post_tag');
                        foreach ($tag_terms as $tag_term) :
                        ?>
                          <li>
                            <p><?= $tag_term->name ?></p>
                          </li>
                        <?php endforeach; ?>
                      </ul>
                      <!-- タグ出力 -->

                    </div>
                    <div class="coursebox__inner--image">
                      <div class="right-wrap">
                        <img class="window-frame" src="<?= $course['course_pot']; ?>" alt="<?php the_title(); ?>">
                        <div class="link-btn">
                          <?php
                          $value = get_post_meta($post->ID, 'course-ulr', true);
                          $url = get_field('course-ulr');
                          ?>
                          <?php if (empty($value)) : ?>
                            <a href="<?php the_permalink(); ?>">詳しくはこちら</a>
                          <?php else : ?>
                            <a href="<?= $url ?>" target="_blank">詳しくはこちら</a>
                          <?php endif; ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </article>
            <?php endwhile; ?>
          <?php else : ?>
            <p>現在、投稿はありません。</p>
          <?php endif;
          wp_reset_postdata(); ?>
        </div>
      </div>
    </div>
  </section>

  <!-- 保護者の声 -->
  <section id="sec-voice" class="section">
    <div class="section__inner">
      <div class="title-box rabbit">
        <h2 class="title">保護者の声</h2>
      </div>
      <div class="voice">
        <div class="voice__list flexcolumn">
          <?php
          $voise_args = array(
            'post_type' => 'voice'
          );
          $voise_query = new WP_Query($voise_args);
          if ($voise_query->have_posts()) : ?>
            <?php while ($voise_query->have_posts()) : $voise_query->the_post(); ?>
              <article class="voisebox">
                <?php $voise = get_field('voise_box'); ?>
                <div class="voisebox__image">
                  <img src="<?= $voise['voise_image']; ?>" alt="保護者の声">
                </div>
                <div class="voisebox__content">
                  <h3 class="extrabold"><?php the_title(); ?></h3>
                  <p><?= $voise['voise_text']; ?></p>
                </div>
              </article>
            <?php endwhile; ?>
          <?php else : ?>
            <p>現在、投稿はありません。</p>
          <?php endif;
          wp_reset_postdata(); ?>
        </div>
      </div>
    </div>
  </section>

  <!-- 基本理念 -->
  <section id="sec-policy" class="section">
    <div class="section__inner">
      <div class="title-box lion">
        <h2 class="title">基本理念</h2>
      </div>
      <div class="policy">
        <div class="policy__inner">
          <?php $policy = get_field('top_policy'); ?>
          <div class="policy__inner--title">
            <?php for ($i = 0; $i <= 2; $i++) : ?>
              <h3 class="extrabold"><?= $policy['policy-title_' . $i]; ?></h3>
            <?php endfor; ?>
          </div>
          <div class="policy__inner--text">
            <p><?= nl2br($policy['policy-text']); ?></p>
          </div>
          <img class="kids-icon" src="<?= get_stylesheet_directory_uri(); ?>/images/svg/kids.svg" alt="">
          <img class="bird-icon" src="<?= get_stylesheet_directory_uri(); ?>/images/svg/bird.svg" alt="">
        </div>
      </div>
    </div>
  </section>

  <!-- ロゴに込めた想い -->
  <section id="sec-logo" class="section">
    <div class="section__inner">
      <div class="title-box squirrel">
        <h2 class="title">ロゴに<br class="sp-only">込めた想い</h2>
      </div>
      <div class="logo">
        <div class="logo__inner flexcolumn">
          <?php $logo_value = get_field('top_logo'); ?>
          <div class="logo__inner--pot flexcolumn">
            <?php for ($i = 0; $i <= 1; $i++) : ?>
              <img src="<?= $logo_value['logo_pot-' . $i]; ?>" alt="ロゴに込めた想い">
            <?php endfor; ?>
          </div>
          <div class="logo__inner--text">
            <p class="bold"><?= $logo_value['logo_title']; ?></p>
            <p class="medium"><?= nl2br($logo_value['logo_text']); ?></p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 施設案内 -->
  <section id="sec-facility" class="section">
    <div class="section__inner">
      <div class="title-box bear">
        <h2 class="title">施設案内</h2>
      </div>
      <div class="facility">
        <?php $facility_group = SCF::get('top_facility'); ?>
        <?php foreach ($facility_group as $value) :
          $facility_image = wp_get_attachment_image_src($value['facility_pot'], 'large'); ?>
          <div class="facility_box">
            <div class="facility__inner flexcolumn">
              <div class="facility__inner--image left">
                <img src="<?= $facility_image[0]; ?>" alt="<?= $value['facility_title'];  ?>">
              </div>
              <div class="facility__inner--text right">
                <h2><?= $value['facility_title'];  ?></h2>
                <p><?= nl2br($value['facility_text']);  ?></p>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
  <?php get_template_part('template-parts/contact-box'); ?>
</main>
<?php get_footer(); ?>