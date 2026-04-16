<?php
/**
 * Template Name:      Biblioteca Enigmas
 * Theme URI:          https://github.com/gcamarenaprog/bibliotecaenigmas
 * Description Theme:  Sahifa theme personalized for bibliotecaenigmas.com website!
 * Author:             Guillermo Camarena
 * Author URL:         http://gcamarenaprog.com
 * Path:               /library/framework/blocks/blog/single/
 * File name:          navigation.php
 * Description:        This file contains the navigation section of a blog post page.
 * Date:               16-04-2026
 */
?>

<?php
$previousPost = get_previous_post(true);
$nextPost = get_next_post(true);
?>


<section>
  <div class="post-navigation">

    <!--Next post link-->
    <?php if (!empty($nextPost)): ?>
      <div class="post-next">
        <a href="<?php echo get_permalink($nextPost->ID) ?>">
          <?php echo '<span>' . __ti('Next') . '</span>'; ?>
          <?php echo $nextPost->post_title ?>
        </a>
        <br>
      </div>
    <?php endif; ?>

    <!--Previous post link-->
    <?php if (!empty($previousPost)): ?>
      <div class="post-previous">
        <a href="<?php echo get_permalink($previousPost->ID); ?>">
          <?php echo '<span>' . __ti('Previous') . '</span>'; ?>
          <?php echo $previousPost->post_title; ?>
        </a>
        <br>
      </div>
    <?php endif; ?>

  </div>
</section>

