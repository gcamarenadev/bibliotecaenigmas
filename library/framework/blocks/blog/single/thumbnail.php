<?php
/**
 * Template Name:      Biblioteca Enigmas
 * Theme URI:          https://github.com/gcamarenaprog/bibliotecaenigmas
 * Description Theme:  Sahifa theme personalized for bibliotecaenigmas.com website!
 * Author:             Guillermo Camarena
 * Author URL:         http://gcamarenaprog.com
 * Path:               /library/framework/blocks/blog/single/
 * File name:          thumbnail.php
 * Description:        This file contains the image section of a blog post page.
 * Date:               14-03-2026
 */

global $get_meta;
$category = get_the_category();
$cat_id = $category[0]->cat_ID;
$categoryParents = get_category_parents($cat_id);

if (str_contains($categoryParents, 'Blog forteano')) {
  $tieIcon = 'tie_fortean';
} else if (str_contains($categoryParents, 'Blog del autor')) {
  $tieIcon = 'tie_author';
} else if (str_contains($categoryParents, 'Cuentos del autor')) {
  $tieIcon = 'tie_story';
}
?>

<section>
  <div class="tb-box">
    <div class="post-thumbnail <?php echo $tieIcon; ?> tb-post-thumbnail tie_article tie-appear">
      <a href="<?php echo tie_thumb_src('tie-large'); ?>" class="fancybox image"
         aria-controls="fancybox-wrap" aria-haspopup="dialog">
        <img src="<?php echo tie_thumb_src('tie-large'); ?>"
             alt="<?php the_title(); ?>"
             width="auto"
             height="auto"
             title="<?php the_title(); ?>"
             class="tie-appear">
        <li class="fa overlay-icon"></li>
      </a>
    </div>
  </div>
</section>