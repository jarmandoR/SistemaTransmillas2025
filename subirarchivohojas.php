<!DOCTYPE html>
<html>
<head>
    <title>Documentos Clientes</title>
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

$FB->titulo_azul1("Documentos clientes", 9, 0, 7);

$FB->llena_texto("Nombre", 1, 9, $DB, "", "", "", 1, 0);
$FB->llena_texto("Fecha de vencimiento:", 3, 10, $DB, "", "", "", 17, 0);
$FB->llena_texto("Documentos:", 2, 6, $DB, "", "", "", 1, 0);

echo '<input type="hidden" name="param4" id="param4" value="'.$idhojadevida.'">';
echo "<tr><td><button type='button' class='btn btn-success' onclick='enviar_formulario()'>Guardar</button></td></tr>";

// Tabla dinámica
echo '<table class="table">';
echo '<thead><tr><th>Nombre</th><th>Fecha de vencimiento</th><th>Documento</th></tr></thead>';
echo '<tbody id="tabla-documentos">';

// Carga inicial de documentos
$sql = "SELECT * FROM doc_hoja_clientes WHERE docl_idhvc = '$idhojadevida'";
$result = $DB->Execute($sql);
while ($row = $result->FetchRow()) {
    $nombre = htmlspecialchars($row["docl_nombre"]);
    $documento = htmlspecialchars($row["docl_documento"]);
    $fecha = htmlspecialchars($row["docl_fecha_venc"]);
    echo "<tr class='text'>";
    echo "<td><strong>$nombre</strong></td>";
    echo "<td>$fecha</td>";
    echo "<td><a href='img_docHVC/$documento' target='_blank'>Ver Documento</a></td>";
    echo "</tr>";
}
echo '</tbody></table>';
?>

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
        alert(data);

        // Recargar documentos si la inserción fue exitosa
        if (data.trim() === "ok") {
            const formData2 = new FormData();
            formData2.append("id_p", document.getElementById("param4").value);

            fetch("recargar_documentos.php", {
                method: "POST",
                body: formData2
            })
            .then(response => response.text())
            .then(html => {
                document.getElementById("tabla-documentos").innerHTML = html;
            });
        }
    })
    .catch(error => console.error("Error:", error));
}
</script>
</body>
</html>

