<?php
/**
 * Template Name:      Biblioteca Enigmas
 * Theme URI:          https://github.com/gcamarenaprog/bibliotecaenigmas
 * Description Theme:  Sahifa theme personalized for bibliotecaenigmas.com website!
 * Author:             Guillermo Camarena
 * Author URL:         http://gcamarenaprog.com
 * Path:               /library/framework/blocks/taxonomy/
 * File name:          description.php
 * Description:        This file shows description and details of the genres in taxonomy file.
 * Date:               15-03-2026
 */

// Get genre image
$term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
$filename = $term->slug . '.jpg';
$imageUrl = get_template_directory_uri() . '/library/images/genres/' . $filename;

if ($term->slug == 'books') {
    $title = 'Biblioteca';
} else {
    $title = $term->slug;
}
?>

<!-- Title /-->
<section>
    <div class="tb-head">
        <h1>= <?php echo $term->name; ?> =</h1>
    </div>
</section>

<!-- Welcome and advise /-->
<section>
    <div class="tb-box">

        <!-- Image /-->
        <section>
            <div class="tb-tax-image">
                <img width="624" height="422" src="<?php echo $imageUrl; ?>" alt="<?php echo $term->name; ?>">
            </div>
        </section>

        <!-- Description /-->
        <section>
            <div class="entry mt10">
                <hr>
                <?php echo category_description();

                if ($term->slug == 'canal-infinito') {
                  get_template_part('library/framework/blocks/book/descriptions/description-canal-infinito');
                }
                ?>
            </div>
        </section>

        <!-- Books collections descriptions /-->
        <?php

        if ($term->slug == 'atlas-de-lo-extraordinario') {
            require_once(get_template_directory() . '/library/framework/blocks/book/descriptions/atlas-de-lo-extraordinario.php');
        }
        if ($term->slug == 'biblioteca-basica-espacio-y-tiempo') {
            require_once(get_template_directory() . '/library/framework/blocks/book/descriptions/biblioteca-basica-espacio-y-tiempo.php');
        }
        if ($term->slug == 'investigacion-abierta') {
            require_once(get_template_directory() . '/library/framework/blocks/book/descriptions/investigacion-abierta.php');
        }
        if ($term->slug == 'duda-semanal') {
            require_once(get_template_directory() . '/library/framework/blocks/book/descriptions/duda-semanal.php');
        }
        if ($term->slug == 'coleccion-nigel-blundell') {
          require_once(get_template_directory() . '/library/framework/blocks/book/descriptions/description-books-collection-nigel-blundell.php');
        }
        ?>

        <div class="tb-advice">
            <p>Las referencias bibliográficas son de índole investigativo, histórico, documentativo e informativo,
                de ser otro tipo se señalará explícitamente.</p>
        </div>

    </div>
</section>

<div class="clear"></div>