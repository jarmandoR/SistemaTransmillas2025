<?php
require("login_autentica.php");
include("declara.php");

$id_p = $_GET["id"];

$DB1 = new MySQL(); // Asegúrate de tener la conexión

echo "<table border='1' cellpadding='5' cellspacing='0'>";

echo "<tr class='text'><td>CAMARA DE COMERCIO:</td><td>";
echo $LT->llenadocs3($DB1, "hojadevidacliente", $id_p, 1, 35, 'Ver Imagen');
echo "</td></tr>";

echo "<tr class='text'><td>Rut:</td><td>";
echo $LT->llenadocs3($DB1, "hojadevidacliente", $id_p, 2, 35, 'Ver Imagen');
echo "</td></tr>";

echo "<tr class='text'><td>Poliza:</td><td>";
echo $LT->llenadocs3($DB1, "hojadevidacliente", $id_p, 3, 35, 'Ver Imagen');
echo "</td></tr>";

echo "<tr class='text'><td>Contrato:</td><td>";
echo $LT->llenadocs3($DB1, "hojadevidacliente", $id_p, 4, 35, 'Ver Imagen');
echo "</td></tr>";

echo "<tr class='text'><td>Certificación cuenta bancaria:</td><td>";
echo $LT->llenadocs3($DB1, "hojadevidacliente", $id_p, 5, 35, 'Ver Imagen');
echo "</td></tr>";

echo "<tr class='text'><td>Cédula representante legal:</td><td>";
echo $LT->llenadocs3($DB1, "hojadevidacliente", $id_p, 6, 35, 'Ver Imagen');
echo "</td></tr>";

echo "</table>";
?>
