<?php
global $wpdb;
$query = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}wpdatatable_122");

echo do_shortcode('[wp-datatable id="table" fat="LEVEL"]
  pageLength: -1,
  paging: true,
  responsive: true,
  search: true,
  lengthMenu: [ [3, 5, 10, 20, 30, -1], [3, 5, 10, 20, 30, "Todos"] ],
  layout: {
    "top": {
      "buttons": ["colvis"]
    },
    "topStart":   "pageLength",
    "topEnd":     "search"
  },
  columnDefs: [
    { "orderable": false, "targets": [1] },
    { "targets": [1], visible: false },
  ],
  language: {
    "search":     "Buscar",
    "lengthMenu": "Mostrar _MENU_ libros",
    "info":       "Mostrando _START_ a _END_ de _TOTAL_ libros",
    "infoEmpty":  "Mostrando 0 a 0 de 0 libros",
    "paginate": {
      "first":    "Primera",
      "last":     "Última",
      "next":       "»",
      "previous":   "«"
    },
    "buttons": {
      "colvis":   "Ver columnas"
    },
  },
  [/wp-datatable]');
?>

<script type="text/javascript">
  jQuery(window).on('load', function () {
    let table = new DataTable('#table');
    table.page.len(5).draw();
  });
</script>

<!-- Content /-->
<section>
  <table id="table" class="display compact" style="width:100%">

    <thead>
    <tr>
      <th>VISTO</th>
      <th>NO.</th>
      <th>EP.</th>
      <th>TEMPORADA</th>
      <th>TÍTULO</th>
      <th>DESCRIPCIÓN</th>
      <th>TAMAÑO</th>
      <th>DURACIÓN</th>
    </tr>
    </thead>

    <tbody>

    <?php foreach ($query as $fila): ?>
      <?php

      ?>

      <tr>

        <!-- VISTO /-->
        <td><?php echo $fila->visto; ?></td>

        <!-- NO. /-->
        <td><?php echo $fila->no; ?></td>

        <!-- EP. /-->
        <td><?php echo $fila->ep; ?></td>

        <!-- TEMPORADA /-->
        <td><?php echo $fila->temporada; ?></td>

        <!-- TITULO /-->
        <td><?php echo $fila->titulo; ?></td>

        <!-- DESCRIPCIÓN /-->
        <td><?php echo $fila->descripcion; ?></td>

        <!-- TAMAÑO /-->
        <td><?php echo $fila->tamano; ?></td>

        <!-- DURACIÓN /-->
        <td><?php echo $fila->duracion; ?></td>

      </tr>

    <?php endforeach; ?>

    </tbody>

    <tfoot>
    <tr>
      <th>VISTO</th>
      <th>NO.</th>
      <th>EP.</th>
      <th>TEMPORADA</th>
      <th>TÍTULO</th>
      <th>DESCRIPCIÓN</th>
      <th>TAMAÑO</th>
      <th>DURACIÓN</th>
    </tr>
    </tfoot>

  </table>
</section>


<?php wp_reset_query(); ?>
