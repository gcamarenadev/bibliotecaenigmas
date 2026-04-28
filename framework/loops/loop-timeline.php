<?php
/**
 * Template Name:      Biblioteca Enigmas
 * Theme URI:          https://github.com/gcamarenaprog/bibliotecaenigmas
 * Description Theme:  Sahifa theme personalized for bibliotecaenigmas.com website!
 * Author:             Guillermo Camarena
 * Author URL:         http://gcamarenaprog.com
 * Path:               /framework/loops/
 * File name:          loop-timeline.php
 * Description:        This loop timeline file.
 * Date:               16-04-2026
 */

global $post;
?>

<div class="post-listing archive-box mb0">
  <div class="post-inner">
    <div class="timeline-contents timeline-archive pt-30 mt10">

      <?php $timeline_time = ''; ?>
      <?php while (have_posts()) :
      the_post(); ?>

      <?php
      if ((empty($timeline_time) && get_the_time('F, Y')) || (!empty($timeline_time) && $timeline_time != get_the_time('F, Y'))){
      if (!empty($timeline_time)) {
        ?>
        </ul>
        <div class="clear"></div>
      <?php }
      $timeline_time = get_the_time('F, Y');
      ?>

      <!--Timeline date-->
      <h2 class="timeline-head"><?php echo $timeline_time ?></h2>

      <div class="clear"></div>

      <!--List of posts-->
      <ul class="timeline">

        <?php } ?>

        <!--Item-->
        <li <?php tie_post_class('timeline-post'); ?> >
          <div class="timeline-content">

            <!--Date-->
            <span class="timeline-date"><?php echo get_the_time('j F') ?></span>

            <?php $postType = get_post_type(); ?>

            <!--Title-->
            <?php if ($postType == 'post'): ?>

              <!--Title blog-->
              <h2 class="post-box-title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              </h2>

            <?php else : ?>

              <?php
              # Get data from the book
              $fullTitle = get_the_title();
              ?>

              <?php if (str_contains($fullTitle, '|')): ?>

                <?php
                $titleBook = getTitle($fullTitle);
                $subtitleBook = getSubtitle($fullTitle);
                ?>
                <!-- Title /-->
                <h2 class="post-box-title">
                  <a href="<?php the_permalink(); ?>"><?php echo $titleBook; ?></a>
                </h2>

                <h2 class="post-box-title"
                    style="margin-top: -13px; padding: 0; font-size: 12px;">
                  <a href="<?php the_permalink(); ?>"><?php echo $subtitleBook; ?></a>
                </h2>

              <?php else: ?>

                <h2 class="post-box-title">
                  <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h2>
              <?php endif; ?>

            <?php endif; ?>

            <!--If It has post thumbnail-->
            <?php if (function_exists("has_post_thumbnail") && has_post_thumbnail()) : ?>

              <!--Image post-->
              <?php if ($postType == 'post') : ?>

                <?php
                $category = get_the_category();
                $cat_id = $category[0]->cat_ID;
                $categoryParents = get_category_parents($cat_id);

                if (str_contains($categoryParents, 'Blog forteano')) {
                  $tieIcon = 'tie_fortean';
                } else if (str_contains($categoryParents, 'Blog del autor')) {
                  $tieIcon = 'tie_author';
                } else if (str_contains($categoryParents, 'Cuentos del autor')) {
                  $tieIcon = 'tie_story';
                }

                ?>

                <div class="post-thumbnail <?php echo $tieIcon; ?> mr10">
                  <a href="<?php the_permalink(); ?>">

                    <img src="<?php echo tie_thumb_src('tie-medium'); ?>"
                         alt=""
                         class="tie-appear">
                    <span class="fa overlay-icon"></span>
                  </a>
                </div>

                <!--Image book-->
              <?php elseif ($postType == 'book') : ?>

                <?php

                # Get post id
                $postId = $post->ID;

                # Get all genres
                $allGenres = get_the_terms($postId, 'genre');

                # Select icon for Multimedia or Book section
                if ($allGenres) {
                  $parentGenreId = $allGenres[0]->parent;
                  if ($parentGenreId == 1523) {
                    $classCodeTie = 'tie_play';
                  } else {
                    $classCodeTie = 'tie_book';
                  }
                }

                # Check post status
                $checkStatus = get_post_meta($post->ID, 'be_theme_check', true);
                if (!$checkStatus == 'yes') {
                  $classCodeTie = 'tie_check';
                }
                ?>

                <div class=" post-thumbnail mr10  <?php echo $classCodeTie; ?> tie-appear">

                  <!--Image-->
                  <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                    <img src="<?php echo tie_thumb_src('tie-library_widget'); ?>"
                         alt=""
                         class="tie-appear">
                    <span class="fa overlay-icon"></span>
                  </a>

                </div>

              <?php endif; ?>

            <?php endif; ?>

            <!--Excerpt-->
            <div class="entry"><p><?php tie_excerpt() ?></p></div>

            <!--Social and share-->
            <?php if (tie_get_option('archives_socail'))
              get_template_part('framework/parts/share'); ?>

          </div>

          <div class="clear"></div>

        </li>

        <?php endwhile; ?>

      </ul>

      <div class="clear"></div>

    </div>
  </div>
</div>
