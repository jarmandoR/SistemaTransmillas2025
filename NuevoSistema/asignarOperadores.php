
<?php
// procesar_asignacion.php
require_once 'Database.php';
$config = require 'config.php';

$db = new Database(
    $config['host'],
    $config['dbname'],
    $config['user'],
    $config['password']
);

// Variables necesarias
$param31     = $_POST['param31'] ?? null;
$registros   = $_POST['registros'] ?? 0;
$fechatiempo = date('Y-m-d H:i:s');
$id_usuario  = "523";
$id_nombre   = "Jose Armando Ramirez";

$idsProcesados = [];

// 🔍 Medir SELECT de teléfono
$t0 = microtime(true);
$sql6 = "SELECT usu_celular FROM usuarios WHERE idusuarios = ?";
$stmt = $db->query($sql6, [$param31]);
$row  = $stmt->fetch();
$t1 = microtime(true);
echo "⏱️ SELECT teléfono: " . round($t1 - $t0, 4) . " segundos<br>";

$telefono = $row ? $row['usu_celular'] : null;
$tipo = "20";

// 🔁 Procesar registros
for ($b = 1; $b <= $registros; $b++) {
    $valor = $_POST["asignar_$b"] ?? 0;

    if ($valor == 1) {
        $idser     = $_POST["servicio_$b"];
        $direccion = "Entrega " . $_POST["direccion_$b"];
        $planilla  = $_POST["guia_$b"];
        $idsProcesados[] = $idser;

        // 🔍 UPDATE cuentaspromotor
        $t2 = microtime(true);
        $sql1 = "UPDATE cuentaspromotor SET cue_idoperentrega = ?, cue_fecha = ?, cue_estado = '9' WHERE cue_idservicio = ?";
        $db->query($sql1, [$param31, $fechatiempo, $idser]);
        $t3 = microtime(true);
        echo "⏱️ UPDATE cuentaspromotor: " . round($t3 - $t2, 4) . " segundos<br>";

        // 🔍 UPDATE servicios
        $t4 = microtime(true);
        $sql2 = "UPDATE servicios SET ser_idusuarioguia = ?, ser_idusuarioregistro = ?, ser_fechaguia = ?, ser_estado = '9', ser_visto = 0 WHERE idservicios = ?";
        $db->query($sql2, [$param31, $id_usuario, $fechatiempo, $idser]);
        $t5 = microtime(true);
        echo "⏱️ UPDATE servicios: " . round($t5 - $t4, 4) . " segundos<br>";

        // 🔍 UPDATE guias
        $t6 = microtime(true);
        $sql3 = "UPDATE guias SET gui_encomienda = ?, gui_fechaencomienda = ? WHERE gui_idservicio = ?";
        $db->query($sql3, [$id_nombre, $fechatiempo, $idser]);
        $t7 = microtime(true);
        echo "⏱️ UPDATE guias: " . round($t7 - $t6, 4) . " segundos<br>";

        // 🔍 INSERT seguimientoruta
        $t8 = microtime(true);
        $sql4 = "INSERT INTO seguimientoruta (seg_fecha, seg_idservicio, seg_direccion, seg_tipo, seg_estado, seg_idusuario, seg_guia)
                 VALUES (?, ?, ?, 'Entrega', 'Asignada', ?, ?)";
        $db->query($sql4, [$fechatiempo, $idser, $direccion, $param31, $planilla]);
        $t9 = microtime(true);
        echo "⏱️ INSERT seguimientoruta: " . round($t9 - $t8, 4) . " segundos<br>";
    }
}

// Total general
$t_total = round(($t9 ?? microtime(true)) - $t0, 4);
echo "<br>✅ Tiempo total del proceso: {$t_total} segundos<br>";

echo json_encode([
    'status' => 'success',
    'ids' => $idsProcesados,
]);
