<?php
require("login_autentica.php");
include("layout.php");
$fechaactual = date("Y-m-d");
$id_usuario = $_SESSION['usuario_id'];
include("reordenar2.php");
?>
<script>
            $(function () {
            let activo = true; // Estado inicial activo

            // Habilita el ordenamiento
            $("#drop-items").sortable();
            $("#drop-items").disableSelection();

            // Botón para activar/desactivar
            $("#toggleSortable").click(function () {
                if (activo) {
                    $("#drop-items").sortable("disable"); // Desactivar drag & drop
                    $(this).text("Activar Movimiento");
                } else {
                    $("#drop-items").sortable("enable"); // Activar drag & drop
                    $(this).text("Desactivar Movimiento");
                }
                activo = !activo; // Alternar estado
            });
        });
</script>
