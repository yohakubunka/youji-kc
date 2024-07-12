<?php get_header(); ?>
<?php get_template_part( 'template-parts/breadcrumb' ); ?>
<div class="archive-top">
  <?php
  if(is_category()):
    $archive_title = single_cat_title('', false).'の記事';
    $archive_description = category_description();
  elseif(is_tag()):
    $archive_title = single_cat_title('', false).'の記事';
    $archive_description = tag_description();
  elseif(is_year()):
    $archive_title = get_the_time("Y年").'の記事';
  elseif(is_month()):
    $archive_title = get_the_time("Y年m月").'の記事';
  elseif(is_day()):
    $archive_title = get_the_time("Y年m月d日").'の記事';
  elseif(is_author()):
    $author_id = get_query_var('author');
    $author_name = get_the_author_meta( 'display_name', $author_id );
    $archive_title = $author_name.'が投稿した記事一覧';
  endif;

  if(!empty($archive_title)):
    echo '<h1>'.$archive_title.'</h1>';
  endif;

  if(!empty($archive_description)):
    echo '<p>'.$archive_description.'</p>';
  endif;
  ?>
</div><!--end archive-top-->
<?php get_footer(); ?>
