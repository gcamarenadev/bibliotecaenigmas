<?php
/**
 * Template Name:      Biblioteca Enigmas
 * Theme URI:          https://github.com/gcamarenaprog/bibliotecaenigmas
 * Description Theme:  Sahifa theme personalized for bibliotecaenigmas.com website!
 * Author:             Guillermo Camarena
 * Author URL:         http://gcamarenaprog.com
 * Path:               /library/framework/blocks/blog/single/
 * File name:          meta.php
 * Description:        This file contains the meta section of a blog post page.
 * Date:               17-02-2026
 */
?>

<section>
  <div class="tb-meta-box">

    <!-- Title /-->
    <h1>= <?php the_title(); ?> =</h1>

    <hr class="tb-meta">

    <!-- Meta /-->
    <p class="post-meta">

      <!-- Date /-->
      <?php tie_get_time() ?>

      <!-- Genres /-->
      <span>
        <i class="fa-solid fa-arrow-down-a-z"></i><?php printf('%1$s', get_the_category_list(', ')); ?>
      </span>

      <!-- Views /-->
      <?php
      $text = __ti('Views');
      echo tie_views($text);
      ?>

    </p>

    <div class="clear"></div>

  </div>
</section>