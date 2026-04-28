<?php global $post;
/**
 * Template Name:      Biblioteca Enigmas
 * Theme URI:          https://github.com/gcamarenaprog/bibliotecaenigmas
 * Description Theme:  Sahifa theme personalized for bibliotecaenigmas.com website!
 * Author:             Guillermo Camarena
 * Author URL:         http://gcamarenaprog.com
 * Path:               /library/framework/blocks/book/single/
 * File name:          check-also.php
 * Description:        This file shows the check also section of the single book page.
 * Date:               16-04-2026
 */
?>

<?php
global $post_id, $check_also_position;

$isVisibleChekAlso = true;
$currentPostId = $post->ID;
$idsGenresOfCurrentPost = [];
$idsPostsSelected = [];

$noCover = 'https://bibliotecaenigmas.com/wp-content/themes/sahifa/library/images/images/no-book-cover.jpg';
$postId = $post->ID;

# Get all genres
$termsOfCurrentPost = get_the_terms($postId, 'genre');

# Select icon for Multimedia or Book section
if ($termsOfCurrentPost) {
  if (in_array("1523", $termsOfCurrentPost)) {
    $classCodeTie = 'tie_play';
  } else {
    $classCodeTie = 'tie_book';
  }
}

# Check post status for icon
$checkStatus = get_post_meta($post->ID, 'be_theme_check', true);
if (!$checkStatus == 'yes') {
  $classCodeTie = 'tie_check';
}

# Get all genres ids of current post
$idsGenresOfCurrentPost = wp_get_post_terms($post->ID, 'genre', array('fields' => 'ids'));

# If array is empty not continue
if (!empty($idsGenresOfCurrentPost)) {

  # Get total genres of current post
  $totalGenresOfCurrentPost = sizeof($idsGenresOfCurrentPost);

# Get random number between 0 to total genres of current post
  if ($totalGenresOfCurrentPost < 1) {
    $randomNumber = 0;
  } else {
    $randomNumber = rand(0, $totalGenresOfCurrentPost - 1);
  }

# Select random genre id of all genres list
  $selectedGenre = $idsGenresOfCurrentPost[$randomNumber];

# Query of 10 posts with the selected genre
  $args = array(
    'post_type' => 'book',
    'posts_per_page' => 10,
    'tax_query' => array(
      array(
        'taxonomy' => 'genre',
        'field' => 'term_id',
        'terms' => $selectedGenre,
      ),
    ),
  );

  $query = new WP_Query($args);

  while ($query->have_posts()) {
    $query->the_post();
    $postId = $query->post->ID;
    if ($postId != $currentPostId) { // Check if post id selected is not equal to current post id
      $idsPostsSelected[] = $postId;
    }
  }

# Get total posts selected
  $totalIdsPostsSelected = sizeof($idsPostsSelected);

# Get random number between 0 to total posts selected
  if ($totalIdsPostsSelected < 1) {
    $randomNumber = 0;
  } else {
    $isVisibleChekAlso = true; // If ids post select <= 1 is visible check also module
    $randomNumber = rand(0, $totalIdsPostsSelected - 1);
  }

  if (!empty($idsPostsSelected[$randomNumber])) {
    # Select post with random number
    $selectedPost = $idsPostsSelected[$randomNumber];

# Get book or multimedia post data
    $fullTitle = get_the_title($selectedPost);
    $title = getTitle($fullTitle);
    $subtitle = getSubtitle($fullTitle);
    $writer = get_the_taxonomies($selectedPost);
    $writer = cleanWriterTextOfTaxonomies($writer);

# Get thumbnail image url
    $imageUrl = getThumbnailUrl('tie-book', $selectedPost);

# If no exist thumbnail image
    if (!$imageUrl) {
      $imageUrl = $noCover;
    }
  }else {
    $isVisibleChekAlso = false;
  }
}
?>

<?php if ($isVisibleChekAlso): ?>
  <section>
    <div id="check-also-box"
         class=" tb-book-check-also-width post-listing check-also-<?php echo $check_also_position ?> show-check-also">
      <a href="#" id="check-also-close"><i class="fa fa-close"></i></a>

      <!-- Title section /-->
      <section>
        <div class="block-head">
          <h1><?php _eti('Check Also'); ?></h1>
        </div>
      </section>

      <!-- Content /-->
      <section>
        <div class="row_ align_-items-center">
          <div class="col_-12 text-center">

            <article>

              <div class="tb-book-check-also">
                <?php if (function_exists("has_post_thumbnail") && has_post_thumbnail()) : ?>
                  <?php $be_theme_check = get_post_meta($selectedPost, 'be_theme_check', true); ?>

                  <!--/Thumbnail image-->
                  <div class="post-thumbnail tb-book-check-also-thumbnail <?php echo $classCodeTie ?> tie-appear mr0">
                    <a href="<?php the_permalink($selectedPost) ?>" rel="bookmark">
                      <img src="<?php echo $imageUrl; ?>" alt="">
                      <li class="fa overlay-icon"></li>
                    </a>
                  </div>
                <?php endif; ?>

                <!--/Title-->
                <div class="tb-book-check-also-title-book">
                  <a class='tb-book-check-also-title-book-text'
                     href='<?php the_permalink($selectedPost); ?>'
                     rel='bookmark'>
                    <?php echo $title; ?>
                    <span class='tb-book-check-also-paragraph-end'></span>
                  </a>
                </div>

                <!--/Subtitle-->
                <?php if ($subtitle): ?>
                  <div class="tb-book-check-also-subtitle-book">
                    <a class='tb-book-check-also-subtitle-book-text'
                       href='<?php the_permalink($selectedPost); ?>'
                       rel='bookmark'>
                      <?php echo $subtitle; ?>
                      <span class='tb-book-check-also-paragraph-end'></span>
                    </a>
                  </div>
                <?php endif; ?>

              </div>

            </article>

          </div>
        </div>
      </section>

    </div>
  </section>
<?php endif; ?>
<?php //endif; ?>

<?php wp_reset_query(); ?>