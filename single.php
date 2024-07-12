<?php get_header(); ?>
<?php $theme_options = get_option('theme_option_name'); ?>
<?php
$category = get_the_category();
$slug = $category[0]->category_nicename;
?>

<div class="undervisual">
  <?php get_template_part('template-parts/breadcrumb'); ?>
  <div class="undervisual__inner <?= $slug ?>">
    <?php $visual = get_field('course-visual'); ?>
    <img src="<?= $visual ?>" alt="<?php the_title(); ?>">
    <div class="page-title">
      <h2><?php the_title(); ?></h2>
    </div>
  </div>
</div>

<main id="<?= $slug ?>">
  <!-- コース説明 -->
  <section class="section">
    <div class="section__inner">
      <div class="explanation">
        <div class="explanation__inner">
          <div class="title-box rabbit">
            <h2 class="title"><?php the_title(); ?><br class="sp-only">とは？</h2>
          </div>
          <ol>
            <?php
            $items = SCF::get('course-box');
            foreach ($items as $item) : ?>
              <dl class="item">
                <dt class="item__title">
                  <h3 class="medium"><?= $item['course-box_title']; ?></h3>
                </dt>
                <dd class="item__text">
                  <p><?= nl2br($item['course-box_text']); ?></p>
                </dd>
              </dl>
            <?php endforeach; ?>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <!-- コース概要 -->
  <section class="section">
    <div class="section__inner">
      <div class="about">
        <div class="about__title">
          <h2><?php the_title(); ?>　ご案内</h2>
        </div>
        <div class="about__inner">
          <?php for ($i = 0; $i <= 3; $i++) : ?>
            <dl class="item">
              <?php $field = get_field_object("course-guide_" . $i); ?>
              <dt class="item__title">
                <h3 class="number-title"><span><?= $i + 1 ?></span><?= $field["label"]; ?></h3>
              </dt>
              <dd class="item__text"><?= nl2br($field["value"]); ?></dd>
            </dl>
          <?php endfor; ?>
        </div>
        <div class="about__inner">
          <?php $image = get_post_meta($post->ID, 'course-about_pot_1', true); ?>
          <?php if (empty($image)) : ?>
            <div class="about__inner--openings">
              <p>準備中</p>
            </div>
          <?php else : ?>
            <?php for ($i = 0; $i <= 1; $i++) : ?>
              <div class="about__inner--image">
                <?php $image_url = SCF::get('course-about_pot_' . $i); ?>
                <img src="<?= wp_get_attachment_url($image_url); ?>">
              </div>
            <?php endfor; ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </section>
  <?php get_template_part('template-parts/contact-box'); ?>
</main>

<?php get_footer(); ?>