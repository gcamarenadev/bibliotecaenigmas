<?php
/**
 * Template Name:      Biblioteca Enigmas
 * Theme URI:          https://github.com/gcamarenaprog/bibliotecaenigmas
 * Description Theme:  Sahifa theme personalized for bibliotecaenigmas.com website!
 * Author:             Guillermo Camarena
 * Author URL:         http://gcamarenaprog.com
 * Path:               /library/framework/blocks/book/search/
 * File name:          taxonomy-search.php
 * Description:        This file shows taxonomy search page.
 * Date:               16-04-2026
 */
?>

<?php
$taxonomyName = '';
$taxonomy = get_query_var('taxonomyName');
$taxonomyTerms = get_terms($taxonomy);

if ($taxonomy == 'genre') {
    $taxonomyName = 'GÉNERO';

    echo do_shortcode('[wp-datatable id="table" fat="LEVEL"]
  paging: true,
  responsive: true,
  search: true,
  lengthMenu: [ [5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, "Todos"] ],
  columnDefs: [{ "orderable": true, "targets": [0, 1] }],
  language: {
    "search": "Buscar",
    "lengthMenu": "Mostrar _MENU_ géneros",
    "info":           "Mostrando _START_ a _END_ de _TOTAL_ géneros",
    "infoEmpty":      "Mostrando 0 a 0 de 0 géneros",
    "paginate": {
      "first":      "Primera",
      "last":       "Última",
      "next":       "»",
      "previous":   "«"
    },
  },
  [/wp-datatable]');
}

if ($taxonomy == 'writer') {
    $taxonomyName = 'AUTOR';

    echo do_shortcode('[wp-datatable id="table" fat="LEVEL"]
  paging: true,
  responsive: true,
  search: true,
  lengthMenu: [ [5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, "Todos"] ],
  columnDefs: [{ "orderable": true, "targets": [0, 1] }],
  language: {
    "search": "Buscar",
    "lengthMenu": "Mostrar _MENU_ autores",
    "info":           "Mostrando _START_ a _END_ de _TOTAL_ autores",
    "infoEmpty":      "Mostrando 0 a 0 de 0 autores",
    "paginate": {
      "first":      "Primera",
      "last":       "Última",
      "next":       "»",
      "previous":   "«"
    },
  },
  [/wp-datatable]');
}

if ($taxonomy == 'editorial') {
    $taxonomyName = 'EDITORIAL';

    echo do_shortcode('[wp-datatable id="table" fat="LEVEL"]
  paging: true,
  responsive: true,
  search: true,
  lengthMenu: [ [5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, "Todos"] ],
  columnDefs: [{ "orderable": true, "targets": [0, 1] }],
  language: {
    "search": "Buscar",
    "lengthMenu": "Mostrar _MENU_ editoriales",
    "info":           "Mostrando _START_ a _END_ de _TOTAL_ editoriales",
    "infoEmpty":      "Mostrando 0 a 0 de 0 editoriales",
    "paginate": {
      "first":      "Primera",
      "last":       "Última",
      "next":       "»",
      "previous":   "«"
    },
  },
  [/wp-datatable]');
}

$index = 0;
?>

<section>
    <table id="table" class="display compact" style="width:100%">

        <thead>
        <tr>
            <th>#</th>
            <th> <?php echo $taxonomyName; ?> </th>
            <th>LIBROS</th>
        </tr>
        </thead>

        <tbody>
        <?php
        foreach ($taxonomyTerms as $taxTerm) {
            $index++;
            ?>
            <tr>
                <td><?php echo $index ?></td>
                <td>
                    <?php echo '<a href="' . esc_attr(get_term_link($taxTerm, $taxonomy)) . '" title="' . sprintf(__("Ver todos las entradas de %s"), $taxTerm->name) . '" ' . '>' . $taxTerm->name . '</a>'; ?>
                </td>
                <td><?php
                    $taxonomy = $taxTerm->taxonomy;
                    $term = $taxTerm->slug;
                    $total = getTotalsPosts($taxonomy, $term);
                    echo $total;
                    ?></td>
                </td>
            </tr>
        <?php } ?>
        </tbody>

        <tfoot>
        <tr>
            <th>#</th>
            <th> <?php echo $taxonomyName; ?> </th>
            <th>LIBROS</th>
        </tr>
        </tfoot>

    </table>
</section>
