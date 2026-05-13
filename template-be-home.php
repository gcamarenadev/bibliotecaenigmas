<?php
/**
 * Template Name:     Biblioteca Enigmas - Home Page
 * Theme URI:         https://github.com/gcamarenaprog/bibliotecaenigmas
 * Description Theme: Sahifa theme personalized for bibliotecaenigmas.com website!
 * Author:            Guillermo Camarena
 * Author URL:        http://gcamarenaprog.com
 * Path:              /library/framework/blocks/home/
 * File name:         template-be-home.php
 * Description:       This file shows home page.
 * Date:              15-03-2026
 */
?>

<?php require_once(get_template_directory() . '/header.php'); ?>

  <nav id="crumbs">
    <a href="https://bibliotecaenigmas.com/">
      <span class="fa fa-home" aria-hidden="true"></span>
      Inicio
    </a>
  </nav>
<?php tie_setPostViews() ?>

  <section>

    <!-- Welcome /-->
    <?php get_template_part('library/framework/blocks/home/welcome'); ?>

    <!-- Last on library /-->
    <?php get_template_part('library/framework/blocks/home/last-post-book'); ?>

    <!-- Last on newspaper archives /-->
    <?php get_template_part('library/framework/blocks/home/last-post-multimedia'); ?>

    <!-- Last posts of fortean blog /-->
    <?php get_template_part('library/framework/blocks/home/last-post-fortean-blog'); ?>

    <!-- Last posts of writer blog /-->
    <?php get_template_part('library/framework/blocks/home/last-post-writer-blog'); ?>

    <!-- Last stories of writer blog /-->
    <?php get_template_part('library/framework/blocks/home/last-post-stories-blog'); ?>

    <!-- Blockquote day /-->
    <?php get_template_part('library/framework/blocks/common/blockquote-day'); ?>

    <!-- Buttons /-->
    <?php get_template_part('library/framework/blocks/home/buttons'); ?>

  </section>

<?php get_footer(); ?>