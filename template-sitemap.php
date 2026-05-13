<?php
  /**
   * Template Name:      Biblioteca Enigmas - Sitemaps Page
   * Theme URI:          https://github.com/gcamarenaprog/bibliotecaenigmas
   * Description Theme:  Sahifa theme personalized for bibliotecaenigmas.com website!
   * Author:             Guillermo Camarena
   * Author URL:         http://gcamarenaprog.com
   * Path:               root
   * File name:          template-sitemap.php
   * Description:        This file show a sitemap book page.
   * Date:               16-03-2026
   */
?>

<?php get_header (); ?>
<?php tie_breadcrumbs (); ?>

<?php $postId = get_the_ID (); ?>


  <div class="content">

    <!-- Title /-->
    <section>
      <div class="tb-head">
        <h1>= <?php the_title (); ?> = </h1>
      </div>
    </section>

    <!-- Content /-->
    <article <?php post_class ('post-listing post'); ?> id="the-post">
      <div class="post-inner ">
        <div class="clear"></div>
        <div class="entry mt20">

          <!-- Entry content /-->
          <?php the_content (); ?>

          <hr>

          <!-- Writers map -->
          <?php if ($postId == 18164) : ?>
            <?php get_template_part ('library/framework/blocks/book/maps/book-writer-map'); ?>
          <?php endif ?>

          <!-- Editorials map -->
          <?php if ($postId === 18165) : ?>
            <?php get_template_part ('library/framework/blocks/book/maps/book-editorial-map'); ?>
          <?php endif ?>

          <!-- Genres map -->
          <?php if ($postId == 18158) : ?>
            <?php get_template_part ('library/framework/blocks/book/maps/book-genre-map'); ?>
          <?php endif ?>

          <!-- Multimedia genres map -->
          <?php if ($postId == 22604) : ?>
            <?php get_template_part ('library/framework/blocks/book/maps/multimedia-map'); ?>
          <?php endif ?>

          <!-- Fortean blog map -->
          <?php if ($postId == 18159) : ?>
            <?php get_template_part ('library/framework/blocks/blog/maps/fortean-blog-map'); ?>
          <?php endif ?>

          <!-- Writer blog map -->
          <?php if ($postId == 21455) : ?>
            <?php get_template_part ('library/framework/blocks/blog/maps/writer-blog-map'); ?>
          <?php endif ?>

          <!-- Stories blog map -->
          <?php if ($postId == 26356) : ?>
            <?php get_template_part ('library/framework/blocks/blog/maps/stories-blog-map'); ?>
          <?php endif ?>
          
          <hr>

        </div><!-- .entry -->
        <div class="clear"></div>
      </div><!-- .post-inner -->
    </article>

    <div class="clear"></div>
  </div><!-- .content -->


<?php get_sidebar ('genres'); ?>
<?php get_footer (); ?>