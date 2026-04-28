<?php
/**
 * Template Name:      Biblioteca Enigmas - Search Blog
 * Theme URI:          https://github.com/gcamarenaprog/bibliotecaenigmas
 * Description Theme:  Sahifa theme personalized for bibliotecaenigmas.com website!
 * Author:             Guillermo Camarena
 * Author URL:         http://gcamarenaprog.com
 * Path:               /
 * File name:          search.php
 * Description:        This file calls the search results loop file.
 * Date:               16-04-2026
 */
?>

<?php get_header(); ?>
<?php tie_breadcrumbs(); ?>

  <section>
    <div id="main-content" class="container full-width">

      <!-- Title /-->
      <section>
        <div class="tb-head">
          <h1>
            <?php echo 'Los siguientes resultados contienen el texto buscado: '; ?>
            <b> <?php echo get_search_query(); ?> </b>
          </h1>
        </div>
      </section>

      <!-- Head /-->
      <section>
        <div class="page-head">

          <?php if (have_posts()) : ?>

          <?php else : ?>
            <?php _eti('Nothing Found'); ?>
          <?php endif; ?>

        </div>
      </section>

      <!-- Get loop search results template /-->
      <?php if (have_posts()) : ?>
        <section>
          <?php $loop_layout = tie_get_option('search_layout'); ?>

          <div class="mt30">
            <?php get_template_part('loop'); ?>
          </div>

          <!-- Pagination /-->
          <?php if ($wp_query->max_num_pages > 1)
            tie_pagenavi(); ?>
        </section>

      <?php else : ?>
        <!-- Not search results /-->
        <section>
          <div id="post-0" class="post not-found post-listing">
            <div class="entry">
              <div class="image-crash">
                <img src="https://bibliotecaenigmas.com/wp-content/themes/sahifa/library/images/images/crash.png"
                     alt="" class="tie-appear">
              </div>
              <p
                class="text-center"><?php _eti('Sorry, but nothing matched your search criteria. Please try again with some different keywords.'); ?></p>
            </div>
          </div>
        </section>
      <?php endif; ?>

    </div>
  </section>


<?php get_footer(); ?>