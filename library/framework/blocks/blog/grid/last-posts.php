<?php
/**
 *  Template Name:      Biblioteca Enigmas
 *  Theme URI:          https://github.com/gcamarenaprog/bibliotecaenigmas
 *  Description Theme:  Sahifa theme personalized for bibliotecaenigmas.com website!
 *  Author:             Guillermo Camarena
 *  Author URL:         http://gcamarenaprog.com
 *  File name:          last-posts.php
 *  Description:        This file displays the last posts on the grid blog.
 *  Date:               13-05-2026
 */

$term = get_queried_object();
$slug = $term->slug;
$tieIcon = '';
?>

    <section>
        <div class="tb-head">
            <h1>= Últimas publicaciones =</h1>
        </div>
    </section>

    <section>
        <div class="tb-box">

            <!-- Items cards -->
            <div class="row_ test">

                <?php
                if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post(); ?>

                    <?php
                    $category = get_the_category();
                    $categoryId = $category[0]->cat_ID;
                    $parentCategories = get_category_parents($categoryId);

                    if (str_contains($parentCategories, 'Blog forteano')) {
                        $tieIcon = 'tie_fortean';
                    } else if (str_contains($parentCategories, 'Blog del autor')) {
                        $tieIcon = 'tie_author';
                    } else if (str_contains($parentCategories, 'Cuentos del autor')) {
                        $tieIcon = 'tie_story';
                    }

                    ?>

                    <?php $postTitle = get_the_title(); ?>

                    <div class="col_-xxl-4 col_-xl-4 col_-md-4  col_-sm-6 col_xs-12 text-center mb10">
                        <div class="tb-card-blog">

                            <div class="post-thumbnail <?php echo $tieIcon; ?> tb-card-blog-thumbnail tie-appear">
                                <a href="<?php the_permalink(); ?>" rel="bookmark">
                                    <?php the_post_thumbnail(); ?>
                                    <li class="fa overlay-icon tb-card-blog-overlay-icon"></li>
                                </a>
                            </div>

                            <figcaption class="tb-card-blog-text">
                                <a href="<?php the_permalink(); ?>" rel="bookmark"><?php echo $postTitle; ?></a>
                                <span class="tb-card-blog-text-paragraph-end"></span>
                            </figcaption>

                        </div><!--/.tbh-card-item-->
                    </div><!--/.cols-->

                <?php endwhile; ?>

                    <!-- No posts -->
                <?php else : ?>

                    <!-- No more posts /-->
                    <div class="tb-no-more-books">
                        <p>No hay publicaciones.</p>
                    </div>

                <?php endif ?>

                <?php wp_reset_query(); ?>


            </div><!--/.row_-->

        </div><!--/.tb-box-->
    </section>

    <!-- Pagination /-->
<?php if ($wp_query->max_num_pages > 1)
    tie_pagenavi(); ?>

<?php wp_reset_query(); ?>