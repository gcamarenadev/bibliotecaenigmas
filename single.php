<?php
/**
 * Template Name:      Biblioteca Enigmas
 * Theme URI:          https://github.com/gcamarenaprog/bibliotecaenigmas
 * Description Theme:  Sahifa theme personalized for bibliotecaenigmas.com website!
 * Author:             Guillermo Camarena
 * Author URL:         http://gcamarenaprog.com
 * Path:               /
 * File name:          single.php
 * Description:        This file show a single post of blog.
 * Date:               16-04-2026
 */
?>

<?php get_header(); ?>
<?php tie_breadcrumbs(); ?>

<?php if (!have_posts()) : ?>
  <div class="content">
    <?php get_template_part('framework/parts/not-found'); ?>
  </div>
<?php endif; ?>

<?php while (have_posts()) :
  the_post(); ?>

  <?php tie_setPostViews(); ?>

  <?php
  $get_meta = get_post_custom($post->ID);
  if (!empty($get_meta["tie_post_head_cover"][0]))
    $content_width = 660;
  if (!empty($get_meta["tie_sidebar_pos"][0]) && $get_meta["tie_sidebar_pos"][0] == 'full')
    $content_width = 955;
  $do_not_duplicate = array();
  ?>

  <div class="content">

  <section>

    <!--/Meta-->
    <?php get_template_part('library/framework/blocks/blog/single/meta'); ?>

    <!--/Image-->
    <?php get_template_part('library/framework/blocks/blog/single/thumbnail'); ?>

  </section>

  <!--Article-->
  <article class="post-listing" id="the-post">
    <div class="post-inner">

      <!--Entry-->
      <div class="entry">

        <!--/Content-->
        <?php the_content(); ?>

        <!--/Pagination-->
        <?php wp_link_pages(array('before' => '<div class="page-link">' . __ti('Pages:'), 'after' => '</div>')); ?>

        <!--/Edit-->
        <?php edit_post_link(__ti('Edit'), '<span class="edit-link">', '</span>'); ?>

      </div>

      <!--/Share-->
      <?php get_template_part('library/framework/blocks/blog/single/share'); ?>

      <div class="clear"></div>

    </div>

    <?php
    # End of Post action ----------
    do_action('tie_end_of_post');
    ?>

  </article>

  <!--/Author-->
  <?php get_template_part('library/framework/blocks/blog/single/author'); ?>


  <!--/Navigation-->
  <?php if (tie_get_option('post_nav')): ?>
  <?php get_template_part('library/framework/blocks/blog/single/navigation'); ?>

<?php endif; ?>

  <!--/Related-->
  <?php if (tie_get_option('related_position') != 'in')
  get_template_part('library/framework/blocks/blog/single/related'); ?>

  <!--/Check also-->
  <?php get_template_part('library/framework/blocks/blog/single/check-also'); ?>

<?php endwhile; ?>

  </div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>