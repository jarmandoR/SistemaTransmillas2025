<html>
<head>
    <script>
        function enviar_formulario() {
            let formData = new FormData();

            formData.append("nombre", document.getElementById("param1").value);
            formData.append("documento", document.getElementById("param2").files[0]);
            formData.append("fecha", document.getElementById("param3").value);
            formData.append("idhv", document.getElementById("param4").value);

            fetch("new_documentcli.php", {
                method: "POST",
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                if (data.trim() === "ok") {
                    alert("Documento guardado con éxito");
                    document.getElementById("param1").value = "";
                    document.getElementById("param2").value = "";
                    document.getElementById("param3").value = "";
                    cargar_tabla_documentos();
                } else {
                    alert("Error al guardar el documento");
                }
            })
            .catch(error => console.error("Error:", error));
        }

        function cargar_tabla_documentos() {
            const idhv = document.getElementById("param4").value;
            fetch("llenar_documentos.php?id=" + idhv)
                .then(response => response.text())
                .then(data => {
                    document.getElementById("tabla-documentos").innerHTML = data;
                })
                .catch(error => console.error("Error al recargar la tabla:", error));
        }

        window.onload = function() {
            cargar_tabla_documentos(); // Cargar tabla al abrir la página
        };
    </script>
</head>
<body>
<?php
$fechaactual = date("Y-m-d");
$nivel_acceso = $_SESSION['usuario_rol'];
$id_sedes = $_SESSION['usu_idsede'];

if ($nivel_acceso == 1) {
    if ($param35 != '') {
        $conde2 = "";
    }
} else {
    $param35 = $id_sedes;
}

$FB->titulo_azul1("Documentos de clientes", 9, 0, 7);

$FB->llena_texto("Nombre", 1, 9, $DB, "", "", "", 1, 0);
$FB->llena_texto("Fecha de vencimiento:", 3, 10, $DB, "", "", "", 17, 0);
$FB->llena_texto("Documentos:", 2, 6, $DB, "", "", "", 1, 0);

echo '<input type="hidden" name="param4" id="param4" value="'.$idhojadevida.'">';
echo "<tr><td><button type='button' class='btn btn-success' onclick='enviar_formulario()'>Guardar</button></td></tr>";
?>

<!-- Contenedor para tabla de documentos -->
<div id="tabla-documentos">
    <!-- Aquí se cargará la tabla con JavaScript -->
</div>

</body>
</html>
