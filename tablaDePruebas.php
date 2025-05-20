<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<table id="mitabla">
  <thead>
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th>Dirección</th>
      <!-- más columnas -->
    </tr>
  </thead>
  <tbody>
    <?php
      // Aquí va tu ciclo PHP que imprime filas
    ?>
  </tbody>
</table>
<script>
  $(document).ready(function() {
    $('#mitabla').DataTable({
      "pageLength": 10, // cantidad de filas por página
      "language": {
        "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
      }
    });
  });
</script>