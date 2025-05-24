<?php
require("login_autentica.php");
include("declara.php");

$id_p = $_POST["id_p"];

$sql = "SELECT * FROM doc_hoja_clientes WHERE docl_idhvc = '$id_p'";
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
?>
