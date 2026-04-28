<?php
/**
 * Template Name:      Biblioteca Enigmas
 * Theme URI:          https://github.com/gcamarenaprog/bibliotecaenigmas
 * Description Theme:  Sahifa theme personalized for bibliotecaenigmas.com website!
 * Author:             Guillermo Camarena
 * Author URL:         http://gcamarenaprog.com
 * Path:               /library/framework/blocks/book/single/
 * File name:          thumbnail.php
 * Description:        This file shows the thumbnail section of the single book page.
 * Date:               17-02-2026
 */
?>

<?php
global $post;
$parentGenreId = 0;
$allGenres = '';
$hasThumbnail = false;

$cover = 'https://bibliotecaenigmas.com/wp-content/themes/sahifa/library/images/images/no-book-cover.jpg';
$postId = $post->ID;

# Get all genres
$allGenres = get_the_terms($postId, 'genre');

# Check has thumbnail
$hasThumbnail = (has_post_thumbnail($postId));

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

# Check image status
if ($hasThumbnail) {
  $cover = tie_thumb_src('tie_library');
}

$fullTitle = get_the_title();
$title = getTitle($fullTitle);
$subtitle = getSubtitle($fullTitle);
?>

<section>
  <div class="post-thumbnail tb-book-thumbnail <?php echo $classCodeTie; ?> tie-appear">
    <a href="<?php echo tie_thumb_src('tie_library'); ?>"
       class="fancybox image"
       aria-controls="fancybox-wrap"
       aria-haspopup="dialog">
      <img src="<?php echo $cover ?>"
           title="<?php echo $title ?>"
           class="tie-appear">
      <li class="fa overlay-icon"></li>
    </a>
  </div>
</section>