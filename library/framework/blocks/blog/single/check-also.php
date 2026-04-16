<?php
/**
 * Template Name:      Biblioteca Enigmas
 * Theme URI:          https://github.com/gcamarenaprog/bibliotecaenigmas
 * Description Theme:  Sahifa theme personalized for bibliotecaenigmas.com website!
 * Author:             Guillermo Camarena
 * Author URL:         http://gcamarenaprog.com
 * Path:               /library/framework/blocks/blog/single/
 * File name:          check-also.php
 * Description:        This file contains the check-also section of a blog post page.
 * Date:               16-04-2026
 */
?>

<?php
global $postId, $post;

$isVisible = null;
$firstPostRelatedToCurrentPost = null;

$currentId = $post->ID;
$currentCategory = wp_get_post_terms($post->ID, 'category', array('fields' => 'slugs'));
$maximumRandomNumber = sizeof($currentCategory);

if ($maximumRandomNumber < 1) {
  $randomNumber = 0;
} else {
  $randomNumber = rand(0, $maximumRandomNumber - 1);
}

$arrayGenresCheckAlso = (array)$currentCategory;
$selectedGenre = $arrayGenresCheckAlso[$randomNumber];

$arguments = array(
  'post_type' => 'post',
  'posts_per_page' => 1,
  'orderby' => 'rand',
  'tax_query' => array(
    array(
      'taxonomy' => 'category',
      'field' => 'slug',
      'terms' => $selectedGenre,
    ),
  ),
);

$query = new WP_Query($arguments);
$index = 0;


if ($query->have_posts()) {
  while ($query->have_posts()) {

    $query->the_post();
    $postId = $query->post->ID;

    // If the selected post is different to current post
    if ($postId != $currentId) {
      $firstPostRelatedToCurrentPost[] = $postId;
      if ($index > 1) {
        break;
      }
      $index++;
    }
  }
}

wp_reset_query();

if ($firstPostRelatedToCurrentPost) {

  $isVisible = true;

  $arguments = array(
    'post_type' => 'post',
    'posts_per_page' => 1,
    'orderby' => 'rand',
    'post__in' => $firstPostRelatedToCurrentPost,
    'tax_query' => array(
      array(
        'taxonomy' => 'category',
        'field' => 'slug',
        'terms' => $selectedGenre,
      ),
    ),
  );

  $query = new WP_query($arguments);
  $index = 0;
} else {
  $isVisible = false;
}

$category = get_the_category();
$cat_id = $category[0]->cat_ID;
$parentCategories = get_category_parents($cat_id);

if (str_contains($parentCategories, 'Blog forteano')) {
  $tieIcon = 'tie_fortean';
} else if (str_contains($parentCategories, 'Blog del autor')) {
  $tieIcon = 'tie_author';
} else if (str_contains($parentCategories, 'Cuentos del autor')) {
  $tieIcon = 'tie_story';
}
?>

<?php if ($isVisible) : ?>

  <section>
    <div id="check-also-box" class="post-listing check-also-<?php echo $check_also_position ?> show-check-also ">
      <a href="#" id="check-also-close"><i class="fa fa-close"></i></a>

      <!-- Title /-->
      <section>
        <div class="block-head">
          <h1>= <?php _eti('Check Also'); ?> =</h1>
        </div>
      </section>

      <!-- Check also post /-->
      <section>
        <?php while ($query->have_posts()) : $query->the_post() ?>

          <div class="row_">

            <div class="col_-xxl-12 col_-xl-12 col_-md-12 col_-sm-12 col_xs-12">
              <div class="tb-blog-check-also">

                <div class="post-thumbnail <?php echo $tieIcon; ?> tb-blog-check-also-thumbnail tie-appear">
                  <a href="<?php the_permalink(); ?>" rel="bookmark">
                    <?php the_post_thumbnail(); ?>
                    <li class="fa overlay-icon tb-card-blog-overlay-icon"></li>
                  </a>
                </div>

                <figcaption class="tb-blog-check-also-title">
                  <a href="<?php the_permalink(); ?>"
                     rel="bookmark"><?php the_title(); ?>
                    <span class='tb-blog-check-also-paragraph-end'></span>
                  </a>
                </figcaption>

              </div><!--/.tbh-card-item-->
            </div><!--/.cols-->

          </div>

        <?php endwhile; ?>
      </section>

    </div>
  </section>

<?php endif; ?>
<?php wp_reset_query(); ?>