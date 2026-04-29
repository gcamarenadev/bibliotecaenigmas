<?php

/**
 * Template Name:      Biblioteca Enigmas
 * Theme URI:          https://github.com/gcamarenaprog/bibliotecaenigmas
 * Description Theme:  Sahifa theme personalized for bibliotecaenigmas.com website!
 * Author:             Guillermo Camarena
 * Author URL:         http://gcamarenaprog.com
 * Path:               /library/
 * File name:          library-functions.php
 * Description:        This file contains the theme file paths, custom styles, functions and function registration.
 * Date:               15-03-2026
 */

/**
 * General functions
 * - getTitle()
 * - getSubtitle()
 * - cleanWriterTextOfTaxonomies()
 * - getThumbnailUrl()
 * - getWriterNameWithWriterId()
 *
 * Custom styles functions
 * - enqueueCustomStyles
 * - getStyleSheetDirectoryUrl
 * - enqueueCustomStylesAdmin
 *
 * Custom sidebars functions
 * - register_sidebar
 * - register_sidebar
 *
 * Widgets functions
 * - wp-datatable functions
 *
 * wp-datatable functions
 * - getTotalsPosts
 *
 * Book publication type management functions
 * - setBookPostsColumns
 * - fillBookPostsColumns
 *
 * Sortable columns functions
 * - registerColumnsAsSortable
 * - views_clauses
 * - writer_clause
 * - editorial_clauses
 * - genre_clauses
 *
 * Tiny MCE functions
 * - tiny_mce_add_buttons
 * - tiny_mce_register_buttons
 * - tiny_mce_new_buttons
 */

# Admin files
require_once(get_template_directory() . '/library/admin/add-book.php');
require_once(get_template_directory() . '/library/admin/book.php');

# Widget paths files
require_once(get_template_directory() . '/library/widgets.php');


# ----------------------------------------------------------------------------------------------------------------
# General functions
# ----------------------------------------------------------------------------------------------------------------

/**
 * Get title from the complete title.
 *
 * @param string $titleAndSubtitle
 * @return string
 */
function getTitle(string $titleAndSubtitle): string
{
  $delimiterChar = '|';
  $positionDelimiterChar = strpos($titleAndSubtitle, $delimiterChar);
  if ($positionDelimiterChar) {
    return substr($titleAndSubtitle, 0, $positionDelimiterChar);
  } else {
    return $titleAndSubtitle;
  }
}

/**
 * Get subtitle from the complete title.
 *
 * @param string $titleAndSubtitle
 * @return string|bool
 */
function getSubtitle(string $titleAndSubtitle): string|bool
{
  $delimiterChar = '|';
  $positionDelimiterChar = strpos($titleAndSubtitle, $delimiterChar);
  return $positionDelimiterChar ? substr($titleAndSubtitle, $positionDelimiterChar + 1) : false;
}

/**
 * Clean writer text
 * @param array $writer
 * @return string
 */
function cleanWriterTextOfTaxonomies(array $writer): string
{
  $writer = $writer['writer'];
  $position = strpos($writer, '>');
  $writer = substr($writer, $position + 1);
  return substr($writer, 0, -1);
}

/**
 * @param $size
 * @param $postId
 * @return false|string
 */
function getThumbnailUrl($size = 'tie-small', $postId = false)
{
  global $post;
  if (!$postId) {
    $image_id = get_post_thumbnail_id($post->ID);
  } else {
    $image_id = get_post_thumbnail_id($postId);
  }
  $image_url = wp_get_attachment_image_src($image_id, $size);
  return !empty($image_url[0]) ? $image_url[0] : false;
}

/**
 * @param int $authorId
 * @return array
 */
function getWriterNameWithWriterId(int $authorId): array
{
  global $wpdb;
  return $wpdb->get_results("SELECT befrases_aut_name FROM  {$wpdb->prefix}befrases_aut	WHERE	befrases_aut_id = {$authorId}", ARRAY_A);
}

# ----------------------------------------------------------------------------------------------------------------
# Custom styles functions
# ----------------------------------------------------------------------------------------------------------------

/**
 * Enqueue custom styles
 *
 * @return void
 */
function enqueueCustomStyles(): void
{
  global $template;
  getStyleSheetDirectoryUrl(basename($template));
}

add_action('wp_enqueue_scripts', 'enqueueCustomStyles');

/**
 * Get style sheet directory URL
 *
 * @param $filename
 * @return void
 */
function getStyleSheetDirectoryUrl($filename): void
{
  $url = '';
  if ($filename === 'template-be-home.php') {
    $url = '/library/css/template-be.css';
  }
  if ($filename === 'template-be-books.php') {
    $url = '/library/css/template-be.css';
  }
  if ($filename === 'template-be-books-grid.php') {
    $url = '/library/css/template-be.css';
  }
  if ($filename === 'single-book.php') {
    $url = '/library/css/template-be.css';
  }
  if ($filename === 'single.php') {
    $url = '/library/css/template-be.css';
  }
  if ($filename === 'category.php') {
    $url = '/library/css/template-be.css';
  }
  if ($filename === 'page.php') {
    $url = '/library/css/template-be.css';
  }
  if ($filename === 'search.php') {
    $url = '/library/css/template-be.css';
  }
  if ($filename === 'taxonomy-writer.php') {
    $url = '/library/css/template-be.css';
  }
  if ($filename === 'taxonomy-editorial.php') {
    $url = '/library/css/template-be.css';
  }
  if ($filename === 'taxonomy-genre.php') {
    $url = '/library/css/template-be.css';
  }
  if ($filename === 'template-be-search-fortean-blog.php') {
    $url = '/library/css/template-be.css';
  }
  if ($filename === 'template-be-search-writer-blog.php') {
    $url = '/library/css/template-be.css';
  }
  if ($filename === 'template-be-search-stories-blog.php') {
    $url = '/library/css/template-be.css';
  }
  if ($filename === 'template-be-search-multimedia.php') {
    $url = '/library/css/template-be.css';
  }
  if ($filename === 'template-be-quotes-collection.php') {
    $url = '/library/css/template-be.css';
  }
  if ($filename === 'template-be-search-book.php') {
    $url = '/library/css/template-be.css';
  }
  if ($filename === 'template-sitemap.php') {
    $url = '/library/css/template-be.css';
  }
  if ($filename === 'sidebar-genre.php') {
    $url = '/library/css/template-be.css';
  }
  wp_enqueue_style(
    'custom-style',
    get_stylesheet_directory_uri() . $url,
    array(),
    wp_get_theme()->get('Version')
  );
}

/*function enqueueCustomScripts()
{
  global $template;
  themeslug_enqueue_script(basename($template));
}


add_action( 'wp_enqueue_scripts', 'enqueueCustomScripts' );

function themeslug_enqueue_script($filename)
{
   $url = '';
  if ($filename === 'template-be-search-book.php') {
    $url = '/library/js/datables.js';
  }


  wp_enqueue_style(
    'custom-script',
    get_stylesheet_directory_uri() . $url,
    array(),
    wp_get_theme()->get('Version')
  );
}*/

/**
 * Enqueue custom admin styles
 *
 * @return void
 */
function enqueueCustomStylesAdmin(): void
{
  wp_register_style('custom_wp_admin_css-1', get_template_directory_uri() . '/library/css/template-be-admin.css', false, '1.0.0');
  wp_register_style('custom_wp_admin_css-2', get_template_directory_uri() . '/library/css/bootstrap-grid.min.css', false, '1.0.0');
  wp_enqueue_style('custom_wp_admin_css-1');
  wp_enqueue_style('custom_wp_admin_css-2');
}

add_action('admin_enqueue_scripts', 'enqueueCustomStylesAdmin');

# ----------------------------------------------------------------------------------------------------------------


# ----------------------------------------------------------------------------------------------------------------
# Custom sidebars functions
# ----------------------------------------------------------------------------------------------------------------

/**
 * Register genre taxonomy sidebar
 */
register_sidebar(
  array(
    'name' => 'Sidebar Géneros',
    'id' => 'sidebar-genres',
    'description' => 'The Genres Taxonomy widget area',
    'class' => '',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div></div><!-- .widget /-->',
    'before_title' => '<div class="widget-top"><h4>',
    'after_title' => '</h4><div class="stripe-line"></div></div><div class="widget-container">'
  )
);

/**
 * Register sitemap sidebar
 */
register_sidebar(
  array(
    'name' => 'Sidebar Sitemap',
    'id' => 'sidebar-sitemap',
    'description' => 'The Sitemap Taxonomy widget area',
    'class' => '',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div></div><!-- .widget /-->',
    'before_title' => '<div class="widget-top"><h4>',
    'after_title' => '</h4><div class="stripe-line"></div></div><div class="widget-container">'
  )
);

# ----------------------------------------------------------------------------------------------------------------


# ----------------------------------------------------------------------------------------------------------------
# Widgets functions
# ----------------------------------------------------------------------------------------------------------------

/**
 * Show a most recent, popular or random books list for Books Widget
 *
 * @param int $postsNumber
 * @param bool $thumb
 * @param bool $date
 * @param bool $views
 * @param string $type
 * @return void
 */
function widgetListOfBooks(int $postsNumber = 5, bool $thumb = true, bool $date = true, bool $views = true, string $type = ''): void
{
  global $post;
  $arguments = null;
  $postId = $post->ID;
  $allGenres = get_the_terms($postId, 'genre');

  if (is_array($allGenres)) {
    if ($allGenres[0]->parent == 1523) {

      if ($type == 'popular') {
        $arguments = array(
          'orderby' => 'meta_value_num',
          'post_type' => 'book',
          'meta_key' => 'tie_views',
          'posts_per_page' => $postsNumber,
          'post_status' => 'publish',
          'no_found_rows' => true,
          'ignore_sticky_posts' => true,
          'tax_query' => array(
            array(
              'taxonomy' => 'genre',
              'field' => 'term_id',
              'terms' => array(1523), // Parent ID
              'include_children' => true,      // Set to false to exclude sub-categories
              'operator' => 'IN',
            ),
          ),
        );
      }
      if ($type == 'random') {
        $arguments = array(
          'orderby' => 'rand',
          'post_type' => 'book',
          'meta_key' => 'tie_views',
          'posts_per_page' => $postsNumber,
          'post_status' => 'publish',
          'no_found_rows' => true,
          'ignore_sticky_posts' => true,
          'tax_query' => array(
            array(
              'taxonomy' => 'genre',
              'field' => 'term_id',
              'terms' => array(1523), // Parent ID
              'include_children' => true,      // Set to false to exclude sub-categories
              'operator' => 'IN',
            ),
          ),
        );
      }
      if ($type == 'recent') {
        $arguments = array(
          'orderby' => 'desc',
          'post_type' => 'book',
          'posts_per_page' => $postsNumber,
          'post_status' => 'publish',
          'no_found_rows' => true,
          'ignore_sticky_posts' => true,
          'tax_query' => array(
            array(
              'taxonomy' => 'genre',
              'field' => 'term_id',
              'terms' => array(1523), // Parent ID
              'include_children' => true,      // Set to false to exclude sub-categories
              'operator' => 'IN',
            ),
          ),
        );
      }

    } elseif ($allGenres[0]->parent == 1804) {

      if ($type == 'popular') {
        $arguments = array(
          'orderby' => 'meta_value_num',
          'post_type' => 'book',
          'meta_key' => 'tie_views',
          'posts_per_page' => $postsNumber,
          'post_status' => 'publish',
          'no_found_rows' => true,
          'ignore_sticky_posts' => true,
          'tax_query' => array(
            array(
              'taxonomy' => 'genre',
              'field' => 'term_id',
              'terms' => array(1804), // Parent ID
              'include_children' => true,      // Set to false to exclude sub-categories
              'operator' => 'IN',
            ),
          ),
        );
      }
      if ($type == 'random') {
        $arguments = array(
          'orderby' => 'rand',
          'post_type' => 'book',
          'meta_key' => 'tie_views',
          'posts_per_page' => $postsNumber,
          'post_status' => 'publish',
          'no_found_rows' => true,
          'ignore_sticky_posts' => true,
          'tax_query' => array(
            array(
              'taxonomy' => 'genre',
              'field' => 'term_id',
              'terms' => array(1804), // Parent ID
              'include_children' => true,      // Set to false to exclude sub-categories
              'operator' => 'IN',
            ),
          ),
        );
      }
      if ($type == 'recent') {
        $arguments = array(
          'orderby' => 'desc',
          'post_type' => 'book',
          'posts_per_page' => $postsNumber,
          'post_status' => 'publish',
          'no_found_rows' => true,
          'ignore_sticky_posts' => true,
          'tax_query' => array(
            array(
              'taxonomy' => 'genre',
              'field' => 'term_id',
              'terms' => array(1804), // Parent ID
              'include_children' => true,      // Set to false to exclude sub-categories
              'operator' => 'IN',
            ),
          ),
        );
      }

    }
  } else {

    if ($type == 'popular') {
      $arguments = array(
        'orderby' => 'meta_value_num',
        'post_type' => 'book',
        'meta_key' => 'tie_views',
        'posts_per_page' => $postsNumber,
        'post_status' => 'publish',
        'no_found_rows' => true,
        'ignore_sticky_posts' => true,
      );
    }
    if ($type == 'random') {
      $arguments = array(
        'orderby' => 'rand',
        'post_type' => 'book',
        'meta_key' => 'tie_views',
        'posts_per_page' => $postsNumber,
        'post_status' => 'publish',
        'no_found_rows' => true,
        'ignore_sticky_posts' => true,
      );
    }
    if ($type == 'recent') {
      $arguments = array(
        'orderby' => 'desc',
        'post_type' => 'book',
        'posts_per_page' => $postsNumber,
        'post_status' => 'publish',
        'no_found_rows' => true,
        'ignore_sticky_posts' => true,
      );
    }

  }

  $selectedPosts = new WP_Query($arguments);
  $count = 0;

  if ($selectedPosts->have_posts()) :
    while ($selectedPosts->have_posts()) : $selectedPosts->the_post() ?>

      <?php
      $titleAndSubtitle = get_the_title();
      $title = getTitle($titleAndSubtitle);
      $subtitle = getSubtitle($titleAndSubtitle);
      $postId = $post->ID;
      $allGenres = get_the_terms($postId, 'genre');

      if (is_array($allGenres)) {
        if ($allGenres[0]->parent == 1523) {

          $classCodeTie = 'tie_play';

        } elseif ($allGenres[0]->parent == 1804) {

          $classCodeTie = 'tie_book';

          # Check post status
          $checkStatus = get_post_meta($post->ID, 'be_theme_check', true);
          if (!$checkStatus == 'yes') {
            $classCodeTie = 'tie_check';
          }

        }
      }

      ?>

      <!--/Thumbnail-->
      <?php if (function_exists("has_post_thumbnail") && has_post_thumbnail() && $thumb) : ?>
        <section>
          <div class="post-thumbnail  <?php echo $classCodeTie; ?> tie-appear" style="width: 75px;">
            <a href="<?php echo tie_thumb_src('tie_library'); ?>"
               class="fancybox image"
               aria-controls="fancybox-wrap"
               aria-haspopup="dialog">
              <img src="<?php echo tie_thumb_src('tie-library'); ?>" alt="">
              <li class="fa overlay-icon"></li>
            </a>
          </div>
        </section>
      <?php endif; ?>

      <li <?php tie_post_class(); ?> style="padding-top: 10px;">

        <!-- Title /-->
        <span class="widget-book-title">
            <a href="<?php the_permalink(); ?>" rel="bookmark"><?php echo $title; ?></a>
          </span>

        <!-- Subtitle /-->
        <span class="widget-book-subtitle">
            <a href="<?php the_permalink(); ?>" rel="bookmark"><?php echo $subtitle; ?></a>
          </span>

        <!--/Genres-->
        <span class="post-views-widget widget-book-genres">
          <i class="fa-solid fa-arrow-down-a-z"></i><?php echo get_the_term_list($post->ID, 'genre', '', ', ', ''); ?>
        </span>

        <!-- Date /-->
        <?php if ($date) : ?>
          <span class="widget-book-date">
            <?php tie_get_time(); ?>
          </span>
        <?php endif; ?>

        <br>

        <!-- Views /-->
        <?php if ($views) : ?>
          <span class="post-views-widget widget-book-views">
             <?php echo tie_views();
             echo 'visitas'; ?>
            </span>
        <?php endif; ?>

      </li>

      <?php $count++;
      if ($count < 5): ?>
        <hr style="margin-bottom: 3px !important; margin-top: 3px !important;">
      <?php endif; ?>

    <?php
    endwhile;
  endif;

  wp_reset_query();
}

# ----------------------------------------------------------------------------------------------------------------


# ----------------------------------------------------------------------------------------------------------------
# wp-datatable functions
# ----------------------------------------------------------------------------------------------------------------

/**
 * Returns the number of entries in a category and subcategories.
 *
 * @param $taxonomy_slug
 * @param $term_slug
 * @return void
 */
function getTotalsPosts($taxonomy_slug, $term_slug)
{
  // Get the term object by its slug and taxonomy name
  // The third parameter is the taxonomy name/slug itself
  $term = get_term_by('slug', $term_slug, $taxonomy_slug);

  // Check if a valid term was found and return the count
  if ($term && !is_wp_error($term)) {
    return $term->count;
  } else {
    return 0; // Return 0 if the term is not found
  }

}

# ----------------------------------------------------------------------------------------------------------------


# ----------------------------------------------------------------------------------------------------------------
# Book publication type management functions
# ----------------------------------------------------------------------------------------------------------------

/**
 * Set columns for post type book
 * ---------------------------------------------------------------------------------------------------------------
 */
add_filter('manage_book_posts_columns', 'setBookPostsColumns');

/**
 * Set columns for a post-type book
 *
 * @param $columns
 * @return array
 */
function setBookPostsColumns($columns): array
{
  $columns = array();
  $columns['cb'] = __('cb');
  $columns['titleOfBook'] = __('Título');
  $columns['subtitleOfBook'] = __('Subtítulo');
  $columns['writer'] = __('Autor/es');
  $columns['editorial'] = __('Editorial');
  $columns['genre'] = __('Género/s');
  $columns['year'] = __('Año');
  $columns['country'] = __('País');
  $columns['pages'] = __('Páginas');
  $columns['state'] = __('Estado');
  $columns['extension'] = __('Formato');
  $columns['size'] = __('Tamaño');
  $columns['date'] = __('Fecha');
  $columns['views'] = __('Visitas');
  $columns['check'] = __('Verificado');
  return $columns;
}

/**
 * Fill book posts columns
 * ---------------------------------------------------------------------------------------------------------------
 */
add_action('manage_book_posts_custom_column', 'fillBookPostsColumns', 10, 2);

/**
 * Fill book posts columns
 *
 * @param $columnName
 * @param $postId
 * @return void
 */
function fillBookPostsColumns($columnName, $postId): void
{
  // We get all the values from each post
  $meta = get_post_meta($postId);

  // Each column is traversed and the value is assigned
  switch ($columnName):

    case 'titleOfBook':
      $titleAndSubtitle = get_the_title();
      $title = getTitle($titleAndSubtitle);
      if (!$title) {
        $title = 'No registrado';
      }
      $url = get_admin_url() . 'post.php?post=' . $postId . '&action=edit';
      echo '<a href="' . $url . '" rel="bookmark">' . $title . '</a>';
      break;

    case 'subtitleOfBook':
      $titleAndSubtitle = get_the_title();
      $subtitle = getSubtitle($titleAndSubtitle);
      if (!$subtitle) {
        $subtitle = 'No registrado';
      }
      $url = get_admin_url() . 'post.php?post=' . $postId . '&action=edit';
      echo '<a href="' . $url . '" rel="bookmark">' . $subtitle . '</a>';
      break;

    case 'writer':
      $termList = false;
      if (get_the_terms($postId, 'writer')) {
        $termList = get_the_terms($postId, 'writer');
      }
      $types = '';
      echo '<ul>';
      if ($termList) {
        foreach ($termList as $termSingle) {
          $types .= $termSingle->slug . ', ';
          $typesz = rtrim($types, ', ');
          $url = get_admin_url() . 'edit.php?writer=' . $typesz . '&post_type=book';
          echo '<li><a href="' . $url . '" rel="bookmark">' . $termSingle->name . '</a></li>';
          $types = '';
          $typesz = '';
          $url = '';
        }
      } else {
        echo 'No registrado';
      }
      echo '</ul>';
      break;

    case 'editorial':
      $termList = false;
      if (get_the_terms($postId, 'editorial')) {
        $termList = get_the_terms($postId, 'editorial');
      }
      $types = '';
      echo '<ul>';
      if ($termList) {
        foreach ($termList as $termSingle) {
          $types .= $termSingle->slug . ', ';
          $typesz = rtrim($types, ', ');
          $url = get_admin_url() . 'edit.php?editorial=' . $typesz . '&post_type=book';
          echo '<li><a href="' . $url . '" rel="bookmark">' . $termSingle->name . '</a></li>';
          $types = '';
          $typesz = '';
          $url = '';
        }
      } else {
        echo 'No registrado';
      }
      echo '</ul>';
      break;

    case 'genre':
      $termList = false;
      if (get_the_terms($postId, 'genre')) {
        $termList = get_the_terms($postId, 'genre');
      }
      $types = '';
      echo '<ul>';
      if ($termList) {
        foreach ($termList as $termSingle) {
          $types .= $termSingle->slug . ', ';
          $typesz = rtrim($types, ', ');
          $url = get_admin_url() . 'edit.php?genre=' . $typesz . '&post_type=book';
          echo '<li><a href="' . $url . '" rel="bookmark">' . $termSingle->name . '</a></li>';
          $types = '';
          $typesz = '';
          $url = '';
        }
      } else {
        echo 'No registrado';
      }
      echo '</ul>';
      break;

    case 'year':
      $year = get_post_meta($postId, 'be_theme_year', true);
      if (!$year) {
        $year = 'No registrado';
      }
      echo $year;
      break;

    case 'country':
      $country = get_post_meta($postId, 'be_theme_country', true);
      if (!$country) {
        echo 'No registrado';
      }
      echo $country;
      break;

    case 'pages':
      $pages = get_post_meta($postId, 'be_theme_pages', true);
      if (!$pages) {
        echo 'No registrado';
      } else {
        echo $pages . ' págs.';
      }
      break;

    case 'state':
      $status = get_post_meta($postId, 'be_theme_state', true);
      if (!$status) {
        echo 'No registrado';
      }
      echo $status;
      break;

    case 'kind':
      $metaKind = get_post_meta($postId, 'be_theme_kind', true);
      $typeof = gettype($metaKind);
      if (!$metaKind) {
        echo 'Dato no registrado';
      } else {
        if ($typeof == 'string') {
          echo $metaKind;
        } else {
          $kind = implode(" , ", $metaKind);
          echo $kind;
        }
      }
      break;

    case 'extension':
      $be_theme_file_extension = get_post_meta($postId, 'be_theme_extension', true);
      if (!$be_theme_file_extension || $be_theme_file_extension == '') {
        echo 'No registrado';
      } else {
        $file_extension = implode(" , *.", $be_theme_file_extension);
        echo "*.";
        echo $file_extension;
      }
      break;

    case 'size':
      $size = get_post_meta($postId, 'be_theme_size', true);
      if (!$size) {
        echo 'No disponible';
      } else {
        echo $size;
      }
      break;

    case 'date':
      the_time(get_option('date_format'));
      break;

    case 'views':
      $views = get_post_meta($postId, 'tie_views', true);
      if (!$views) {
        echo 'No disponible';
      } else {
        echo $views;
      }
      break;

    case 'check':
      if (isset($meta['be_theme_check'][0])) {
        if ($meta['be_theme_check'][0] == "yes") {
          echo "Si";
        } else {
          echo "No";
        }
      } else {
        echo "No";
      }
      break;

  endswitch;
}


# --------------------------------------------------------------------------------------------------------------------
# Sortable columns functions
# --------------------------------------------------------------------------------------------------------------------

/**
 * Register columns as sortable
 * ---------------------------------------------------------------------------------------------------------------
 */
add_filter('manage_edit-book_sortable_columns', 'registerColumnsAsSortable');

/**
 * Register columns as sortable
 *
 * @param $columns
 * @return mixed
 */
function registerColumnsAsSortable($columns): mixed
{
  $columns['titleOfBook'] = 'titleOfBook';
  $columns['subtitleOfBook'] = 'subtitleOfBook';
  $columns['views'] = 'views';
  $columns['writer'] = 'writer';
  $columns['editorial'] = 'editorial';
  $columns['genre'] = 'genre';
  $columns['country'] = 'country';
  $columns['state'] = 'state';
  $columns['extension'] = 'extension';
  $columns['check'] = 'check';
  return $columns;
}

/**
 * Sort by quantity for the "Views" column
 * ---------------------------------------------------------------------------------------------------------------
 */
add_action('pre_get_posts', 'views_clauses');

/**
 * Sort alphabetically for "Views" column
 *
 * @param $query
 * @return void
 */
function views_clauses($query): void
{
  if (!is_admin() || !$query->is_main_query()) {
    return;
  }
  if ('views' === $query->get('orderby')) {
    $query->set('orderby', 'meta_value');
    $query->set('meta_key', 'tie_views');
    $query->set('meta_type', 'numeric');
  }
}

/**
 * Sort alphabetically for "Author" column
 * ---------------------------------------------------------------------------------------------------------------
 */
add_filter('posts_clauses', 'writer_clauses', 10, 2);
/**
 * Sort alphabetically for "Author" column
 *
 * @param $clauses
 * @param $wp_query
 * @return mixed
 */
function writer_clauses($clauses, $wp_query): mixed
{
  global $wpdb;
  if (isset($wp_query->query['orderby']) && 'writer' == $wp_query->query['orderby']) {
    $clauses['join'] .= "
        LEFT OUTER JOIN {$wpdb->term_relationships} ON {$wpdb->posts}.ID={$wpdb->term_relationships}.object_id
        LEFT OUTER JOIN {$wpdb->term_taxonomy} USING (term_taxonomy_id)
        LEFT OUTER JOIN {$wpdb->terms} USING (term_id)
        ";
    $clauses['where'] .= " AND (taxonomy = 'writer' OR taxonomy IS NULL)";
    $clauses['groupby'] = "object_id";
    $clauses['orderby'] = "GROUP_CONCAT({$wpdb->terms}.name ORDER BY name ASC) ";
    $clauses['orderby'] .= ('ASC' == strtoupper($wp_query->get('order'))) ? 'ASC' : 'DESC';
  }
  return $clauses;
}

/**
 * Sort alphabetically for "Editorial" column
 * ---------------------------------------------------------------------------------------------------------------
 */
add_filter('posts_clauses', 'editorial_clauses', 10, 2);

/**
 * Sort alphabetically for "Editorial" column
 *
 * @param $clauses
 * @param $wp_query
 * @return mixed
 */
function editorial_clauses($clauses, $wp_query): mixed
{
  global $wpdb;
  if (isset($wp_query->query['orderby']) && 'editorial' == $wp_query->query['orderby']) {
    $clauses['join'] .= "
        LEFT OUTER JOIN {$wpdb->term_relationships} ON {$wpdb->posts}.ID={$wpdb->term_relationships}.object_id
        LEFT OUTER JOIN {$wpdb->term_taxonomy} USING (term_taxonomy_id)
        LEFT OUTER JOIN {$wpdb->terms} USING (term_id)
        ";
    $clauses['where'] .= " AND (taxonomy = 'editorial' OR taxonomy IS NULL)";
    $clauses['groupby'] = "object_id";
    $clauses['orderby'] = "GROUP_CONCAT({$wpdb->terms}.name ORDER BY name ASC) ";
    $clauses['orderby'] .= ('ASC' == strtoupper($wp_query->get('order'))) ? 'ASC' : 'DESC';
  }
  return $clauses;
}

/**
 * Sort alphabetically for "Genre" column
 * ---------------------------------------------------------------------------------------------------------------
 */
add_filter('posts_clauses', 'genre_clauses', 10, 2);

/**
 * Sort alphabetically for "Genre" column.
 *
 * @param $clauses
 * @param $wp_query
 * @return mixed
 */
function genre_clauses($clauses, $wp_query): mixed
{
  global $wpdb;
  if (isset($wp_query->query['orderby']) && 'genre' == $wp_query->query['orderby']) {
    $clauses['join'] .= "
        LEFT OUTER JOIN {$wpdb->term_relationships} ON {$wpdb->posts}.ID={$wpdb->term_relationships}.object_id
        LEFT OUTER JOIN {$wpdb->term_taxonomy} USING (term_taxonomy_id)
        LEFT OUTER JOIN {$wpdb->terms} USING (term_id)
        ";
    $clauses['where'] .= " AND (taxonomy = 'genre' OR taxonomy IS NULL)";
    $clauses['groupby'] = "object_id";
    $clauses['orderby'] = "GROUP_CONCAT({$wpdb->terms}.name ORDER BY name ASC) ";
    $clauses['orderby'] .= ('ASC' == strtoupper($wp_query->get('order'))) ? 'ASC' : 'DESC';
  }
  return $clauses;
}

# --------------------------------------------------------------------------------------------------------------------


# --------------------------------------------------------------------------------------------------------------------
# Tiny MCE functions
# --------------------------------------------------------------------------------------------------------------------
define('JS_PATH_', get_template_directory_uri() . '/library/js/be-tools.js');

/**
 *  Add a custom buttons js script within the administration.
 */
add_action('admin_init', 'be_tools_button');
function be_tools_button()
{

  if (!current_user_can('edit_posts') && !current_user_can('edit_pages')) {
    return;
  }

  if ('true' == get_user_option('rich_editing')) {
    add_filter('mce_external_plugins', 'be_add_tinymce_plugin');
    add_filter('mce_buttons', 'be_register_mce_button');
  }
}

// Declare script for new button
function be_add_tinymce_plugin($plugin_array)
{
  $plugin_array['be_mce_button'] = JS_PATH_;
  return $plugin_array;
}

// Register new button in the editor
function be_register_mce_button($buttons)
{
  array_push($buttons, 'be_mce_button');
  return $buttons;
}

/**
 * Add styles file for customized TinyMCE buttons.
 * @return void
 */
function be_shortcodes_tools_css()
{
  wp_enqueue_style('be-shortcodes-admin-css', get_template_directory_uri() . '/library/js/be-tools.css');
}

add_action('admin_enqueue_scripts', 'be_shortcodes_tools_css');

# ----------------------------------------------------------------------------------------------------------------
