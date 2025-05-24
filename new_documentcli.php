<?php
require("login_autentica.php");
include("declara.php");

$nombre = $_POST["nombre"];
$fecha = $_POST["fecha"];
$id = $_POST["idhv"];
$documento = "";

if (isset($_FILES["documento"]) && is_uploaded_file($_FILES['documento']['tmp_name'])) {
    $nombreArchivo = $_FILES["documento"]["name"];
    $documento = date("Y-m-d-H-i-s") . "-" . $nombreArchivo;
    move_uploaded_file($_FILES['documento']['tmp_name'], "./img_docHVC/" . $documento);
}

$sql2 = "INSERT INTO `doc_hoja_clientes`(`docl_nombre`, `docl_documento`, `docl_idhvc`, `docl_fecha_venc`) 
         VALUES ('$nombre','$documento','$id','$fecha')";
$vinculo = $DB->Executeid($sql2);

echo $vinculo ? "ok" : "No";
?>
