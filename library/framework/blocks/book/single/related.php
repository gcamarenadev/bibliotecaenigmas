<?php
/**
 * Template Name:      Biblioteca Enigmas
 * Theme URI:          https://github.com/gcamarenaprog/bibliotecaenigmas
 * Description Theme:  Sahifa theme personalized for bibliotecaenigmas.com website!
 * Author:             Guillermo Camarena
 * Author URL:         http://gcamarenaprog.com
 * Path:               /library/framework/blocks/book/single/
 * File name:          related.php
 * Description:        This file shows the related section of the single book page.
 * Date:               17-02-2026
 */
?>

<?php
global $post;

$currentPostId = $post->ID;
$arrayNamesGenresCurrentPost = [];
$firstFourPostsIdsRelatedToCurrentPosts = [];
$visibility = '';
$index = 0;

$cover = 'https://bibliotecaenigmas.com/wp-content/themes/sahifa/library/images/images/no-book-cover.jpg';

# Get all genres
$allGenres = get_the_terms($post->ID, 'genre');

# Select icon for Multimedia or Book section
if ($allGenres) {
  if (in_array("1523", $allGenres)) {
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

# Get all genres of current post
$allGenresOfCurrentPost = wp_get_post_terms($post->ID, 'genre', array('fields' => 'slugs'));

# Get total genres of current post
$totalGenresOfCurrentPost = sizeof($allGenresOfCurrentPost);

# Get random number between 0 to total genres of current post
if ($totalGenresOfCurrentPost <= 1) {
  $randomNumber = 0;
} else {
  $randomNumber = rand(0, $totalGenresOfCurrentPost - 1);
}

# Convert string to array
$arrayNamesGenresCurrentPost = (array)$allGenresOfCurrentPost;

if ($arrayNamesGenresCurrentPost != null) {
  $selectedGenre = $arrayNamesGenresCurrentPost[$randomNumber];

  $arguments = array(
      'post_type' => 'book',
      'posts_per_page' => -1,
      'tax_query' => array(
          array(
              'taxonomy' => 'genre',
              'field' => 'slug',
              'terms' => $selectedGenre,
          ),
      ),
  );

  # Get the first four post IDs that are different from the current publication ID
  $query_FirstFourPosts = new WP_Query($arguments);

  if ($query_FirstFourPosts->have_posts()) {
    while ($query_FirstFourPosts->have_posts()) {

      $query_FirstFourPosts->the_post();
      $postId = $query_FirstFourPosts->post->ID;

      if ($postId != $currentPostId) {
        $firstFourPostsIdsRelatedToCurrentPosts[] = $postId;
        if ($index > 4) {
          break;
        }
        $index++;
      }
    }
  }

  wp_reset_query();

  # Get the first four posts related with current post
  if ($firstFourPostsIdsRelatedToCurrentPosts) {
    $visibility = true;
    $arguments = array(
        'post_type' => 'book',
        'posts_per_page' => 4,
        'post__in' => $firstFourPostsIdsRelatedToCurrentPosts,
        'tax_query' => array(
            array(
                'taxonomy' => 'genre',
                'field' => 'slug',
                'terms' => $selectedGenre,
            ),
        ),
    );
    $query_FirstFourPosts = new WP_query($arguments);
  } else {
    $visibility = false;
  }
}
?>

<?php if ($visibility) : ?>

  <!--/Title-->
  <section>
    <div class="tb-head">
      <h1>= Publicaciones relacionadas =</h1>
    </div>
  </section>

  <!--Content-->
  <section>
    <div class="tb-box">
      <div class="row_">

        <?php while ($query_FirstFourPosts->have_posts()) : $query_FirstFourPosts->the_post(); ?>

          <?php
          # Get data from the book
          $fullTitleBook = get_the_title();
          $titleBook = getTitle($fullTitleBook);
          $subtitleBook = getSubtitle($fullTitleBook);
          $writerBook = get_the_taxonomies($post->ID);
          $writerBook = cleanWriterTextOfTaxonomies($writerBook);
          ?>

          <div class="col_-xxl-3 col_-xl-3  col_-md-3 col_-sm-3 col_-3 text-center">

            <article>

              <!--Thumbnail image-->
              <div class="tb-book-related-cover">
                <?php if (function_exists("has_post_thumbnail") && has_post_thumbnail()) : ?>
                  <?php $be_theme_check = get_post_meta($post->ID, 'be_theme_check', true); ?>

                  <div class="post-thumbnail <?php echo $classCodeTie; ?> tie-appear mr0">
                    <a href="<?php the_permalink(); ?>" rel="bookmark">
                      <img src="<?php echo tie_thumb_src('tie-library'); ?>" alt="">
                      <li class="fa overlay-icon"></li>
                    </a>
                  </div>
                <?php endif; ?>
              </div>

              <!--/Title-->
              <div class="tb-book-related-title">
                <a class='tb-book-related-title-text'
                   href='<?php the_permalink(); ?>'
                   rel='bookmark'>
                  <?php echo $titleBook; ?>
                  <span class='tb-book-related-paragraph-end'></span>
                </a>
              </div>

              <!--/Subtitle-->
              <?php if ($subtitleBook): ?>
                <div class="tb-book-related-subtitle">
                  <a class='tb-book-related-subtitle-text'
                     href='<?php the_permalink(); ?>'
                     rel='bookmark'>
                    <?php echo $subtitleBook; ?>
                    <span class='tb-book-related-paragraph-end'></span>
                  </a>
                </div>
              <?php endif; ?>

          </div><!--/.col_-->
        <?php endwhile; ?>

      </div><!--/.row_-->
    </div><!--/.tb-box-->
  </section><!--/Content-->

  <div class="clear"></div>

<?php endif; ?>
<?php wp_reset_query(); ?>