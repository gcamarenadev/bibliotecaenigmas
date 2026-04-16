<?php
/**
 * Template Name:      Biblioteca Enigmas
 * Theme URI:          https://github.com/gcamarenaprog/bibliotecaenigmas
 * Description Theme:  Sahifa theme personalized for bibliotecaenigmas.com website!
 * Author:             Guillermo Camarena
 * Author URL:         http://gcamarenaprog.com
 * Path:               root
 * File name:          single-book.php
 * Description:        This file shows single book page.
 * Date:               16-02-2026
 */
?>



<?php
$postId = null;
$category = null;
$parentCategoryId = null;
$sidebarHidden = null;
$postId = get_the_ID();

$sidebarHidden = get_post_meta($post->ID, 'be_theme_sidebar');

if (isset($sidebarHidden[0])) {
  $sidebarHidden = $sidebarHidden[0];
}

// Determines the page width if the sidebar is hidden or not.
if ($sidebarHidden == 'yes') {
  $classContent = 'style:"width:100%;"';
} else {
  $classContent = ' class="content" ';
}
?>

<?php get_header(); ?>
<?php tie_breadcrumbs(); ?>
<?php tie_setPostViews(); ?>

<?php if (!have_posts()) : ?>
  <div <?php echo $classContent; ?> >
    <?php get_template_part('framework/parts/not-found'); ?>
  </div>
<?php endif; ?>

<div <?php echo $classContent; ?> >
  <h1><?php echo $parentCategoryId; ?></h1>
  <!-- Meta box -->
  <?php get_template_part('library/framework/blocks/book/single/meta'); ?>

  <!-- Image and data book /-->
  <div class="tb-box">

    <div class="row_ justify_-content-center align_-items-center">

      <!--/Thumbnail-->
      <div class="col_xl-5 col_-lg-5 col_-md-5 col_-sm-5 col_-12 text-center">
        <?php get_template_part('library/framework/blocks/book/single/thumbnail'); ?>
      </div>

      <!--/Data-->
      <div class="col_xl-7 col_-lg-7 col_-md-7 col_-sm-7 col_-12 text-center">
        <?php get_template_part('library/framework/blocks/book/single/data'); ?>
      </div>

    </div>

  </div>

  <!-- Content and share /-->
  <article>
    <div <?php post_class('post-listing'); ?> id="the-post">
      <div class="post-inner">

        <div class="entry">

          <!-- Content /-->
          <article>

            <!-- Sinopsis /-->
            <h1 class="text-center">Sinopsis</h1>

            <!-- Content /-->
            <?php the_content(); ?>

            <!-- Tables /-->
            <?php if ($postId == 24799): ?>

              <!-- La escóbula de la brújula /-->
              <?php get_template_part('library/framework/blocks/book/descriptions/description-escobula-de-la-brujula'); ?>

            <?php elseif ($postId == 19762): ?>

              <!-- Cuarto Milenio /-->
              <?php get_template_part('library/framework/blocks/book/descriptions/description-cuarto-milenio'); ?>

            <?php elseif ($postId == 19774): ?>

              <!-- TVN Chile, OVNI /-->
              <?php get_template_part('library/framework/blocks/book/descriptions/description-tvn-chile-ovni'); ?>

            <?php elseif ($postId == 21667): ?>

              <!-- Arthur C. Clarke - EMM /-->
              <?php get_template_part('library/framework/blocks/book/descriptions/description-arthur-cc-emm'); ?>

            <?php elseif ($postId == 26230): ?>

              <!-- Arthur C. Clarke - EMU /-->
              <?php get_template_part('library/framework/blocks/book/descriptions/description-arthur-cc-emu'); ?>

            <?php elseif ($postId == 26252): ?>

              <!-- Arthur C. Clarke - EMPE /-->
              <?php get_template_part('library/framework/blocks/book/descriptions/description-arthur-cc-empe'); ?>

            <?php elseif ($postId == 26387): ?>

              <!-- Netflix, El enigma extraterrestre /-->
              <?php get_template_part('library/framework/blocks/book/descriptions/description-netflix-el-enigma-extraterrestre'); ?>

            <?php elseif ($postId == 26383): ?>

              <!-- Canal Infinito, Latinoamérica, Historia perdida /-->
              <?php get_template_part('library/framework/blocks/book/descriptions/description-canal-infinito-lhp'); ?>

            <?php elseif ($postId == 21515): ?>

              <!-- Canal Infinito, Latinoamérica, Historia perdida /-->
              <?php get_template_part('library/framework/blocks/book/descriptions/description-canal-infinito-mu'); ?>

            <?php elseif ($postId == 24478): ?>

              <!-- Paradig+ XXI /-->
              <?php get_template_part('library/framework/blocks/book/descriptions/description-paradig+'); ?>

            <?php else: ?>
              <!-- Nothing -->
            <?php endif; ?>


            <!-- Pagination /-->
            <?php wp_link_pages(array('before' => '<div class="page-link">' . __ti('Pages:'), 'after' => '</div>')); ?>

            <!-- Edit link /-->
            <?php edit_post_link(__ti('Edit'), '<span class="edit-link">', '</span>'); ?>

          </article>

        </div>

        <!-- Share /-->
        <?php if ((tie_get_option('share_post') && empty($get_meta["tie_hide_share"][0])) || (!empty($get_meta["tie_hide_share"][0]) && $get_meta["tie_hide_share"][0] == 'no'))
          get_template_part('library/framework/blocks/book/single/share');
        ?>

      </div>
      <div class="clear"></div>
    </div>
  </article>

  <!-- Author /-->
  <?php if ((tie_get_option('post_authorbio') && empty($get_meta["tie_hide_author"][0])) || (isset($get_meta["tie_hide_related"][0]) && $get_meta["tie_hide_author"][0] == 'no')) : ?>
    <?php get_template_part('library/framework/blocks/book/single/author'); ?>
  <?php endif; ?>

  <!-- Navigation /-->
  <?php if (tie_get_option('post_nav')) : ?>
    <?php get_template_part('library/framework/blocks/book/single/navigation'); ?>
  <?php endif; ?>

  <!-- Related books box /-->
  <?php get_template_part('library/framework/blocks/book/single/related'); ?>

  <!-- Check also -->
  <?php get_template_part('library/framework/blocks/book/single/check-also'); ?>


  <div class="clear"></div>
</div><!--/.content-->

<?php if ($sidebarHidden != 'yes') {
  get_sidebar('genres');
} else {
}
?>
<?php get_footer(); ?>


