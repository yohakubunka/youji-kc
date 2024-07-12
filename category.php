<?php get_header(); ?>
<?php get_template_part('template-parts/breadcrumb'); ?>

<?php $theme_options = get_option('theme_option_name'); ?>

<main id="category">
  <section class="section category-section">
    <div class="section_inner category-section__area">
      <h2>NEWS／COLUMN</h2>
      <div class="category category-section__area--select">

        <div class="category">
          <span class="category__box--title arrow-category"><?= single_cat_title() ?></span>
          <ul class="category__box">
            <?php
            $categories = get_categories();
            $separator = "";
            $output = "";
            if ($categories) {
              foreach ($categories as $category) {
                $output .= '<a href="' . get_category_link($category->term_id) . '"><li>' . $category->cat_name . ' (' . $category->count . ')' . $separator . '</li>' . '</a>';
              }
              echo trim($output, $separator);
            }
            ?>
          </ul>
        </div>

        <div class="archive">
          <span class="category__box--title arrow-archive">アーカイブ</span>
          <ul class="category__box">
            <?php //echo '<li><a href="' . home_url("/news")  . '">' . "All" . '</a></li>';
            ?>
            <?php wp_get_archives('show_post_count=1'); ?>
          </ul>
        </div>

      </div>

      <div class="category-section__area--contents">
        <div class="category">
          <div class="category-area contents-box">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <article>
                  <a href="<?php echo get_permalink(); ?>" class="article">
                    <div class="article__img">
                      <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail(array(368, 240)); ?>
                      <?php else : ?>
                        <img src="<?php echo get_template_directory_uri() ?>/images/top/n_dammy.png">
                      <?php endif; ?>
                    </div>
                    <h4 class="article__title"><?php the_title(); ?></h4>
                    <div class="article__option">
                      <p class="article__option--time">
                        <?php echo get_the_date('Y.m.d'); ?>／
                        </ｐ>
                      <p class="article__option--category">
                        <?php
                        $category = get_the_category();
                        if ($category[0]) {
                          echo '<a href="' . get_category_link($category[0]->term_id) . '">' . $category[0]->cat_name . '</a>';
                        }
                        ?>
                      </p>
                    </div>
                  </a>
                </article>
            <?php endwhile;
            endif;
            ?>
          </div>
          <!-- ページネーション -->
          <?php global $wp_query; ?>
          <div class="pagination pagination-top">
            <?php
            /* ページャーの表示 */
            if ($wp_query->found_posts > 12) {
              if (function_exists('pagination')) :
                pagination($wp_query->max_num_pages, $paged);  //$wp_query ではなく $the_query ないことに注意！
              endif;
            }
            ?>
          </div>
          <!-- ページネーション -->


          <?php wp_reset_postdata(); ?>
        </div>
      </div>
  </section>
  <?php get_template_part('template-parts/index-online'); ?>
</main>

<?php get_footer(); ?>