
<?php
// procesar_asignacion.php
 // Asegúrate de que la ruta sea correcta
require_once 'Database.php';
$config = require 'config.php';

$db = new Database(
    $config['host'],
    $config['dbname'],
    $config['user'],
    $config['password']
);

// Variables necesarias que deberías recibir por POST o definir previamente
$param31     = $_POST['param31'] ?? null;
$registros   = $_POST['registros'] ?? 0;
$fechatiempo = date('Y-m-d H:i:s'); // Puedes ajustar esto según tu formato
// $id_usuario  = $_POST['id_usuario'] ?? null;
$id_usuario  = "523";

// $id_nombre   = $_POST['id_nombre'] ?? null;
$id_nombre   = "Jose Armando Ramirez";


$idsProcesados = [];

// Obtener el número de teléfono
$sql6 = "SELECT usu_celular FROM usuarios WHERE idusuarios = ?";
$stmt = $db->query($sql6, [$param31]);
$row  = $stmt->fetch();
$telefono = $row ? $row['usu_celular'] : null;
$tipo = "20";

// Procesar los registros asignados
for ($b = 1; $b <= $registros; $b++) {
    $valor = $_POST["asignar_$b"] ?? 0;

    if ($valor == 1) {
        $idser     = $_POST["servicio_$b"];
        $direccion = "Entrega " . $_POST["direccion_$b"];
        $planilla  = $_POST["guia_$b"];

        $idsProcesados[] = $idser;

        // Actualizar cuentaspromotor
        $sql1 = "UPDATE cuentaspromotor SET cue_idoperentrega = ?, cue_fecha = ?, cue_estado = '9' WHERE cue_idservicio = ?";
        $db->query($sql1, [$param31, $fechatiempo, $idser]);

        // Actualizar servicios
        $sql2 = "UPDATE servicios SET ser_idusuarioguia = ?, ser_idusuarioregistro = ?, ser_fechaguia = ?, ser_estado = '9', ser_visto = 0 WHERE idservicios = ?";
        $db->query($sql2, [$param31, $id_usuario, $fechatiempo, $idser]);

        // Actualizar guías
        $sql3 = "UPDATE guias SET gui_encomienda = ?, gui_fechaencomienda = ? WHERE gui_idservicio = ?";
        $db->query($sql3, [$id_nombre, $fechatiempo, $idser]);

        // Insertar seguimiento
        $sql4 = "INSERT INTO seguimientoruta (seg_fecha, seg_idservicio, seg_direccion, seg_tipo, seg_estado, seg_idusuario, seg_guia)
                 VALUES (?, ?, ?, 'Entrega', 'Asignada', ?, ?)";
        $db->query($sql4, [$fechatiempo, $idser, $direccion, $param31, $planilla]);

        // Aquí podrías llamar a enviarAlertaWhat si lo necesitas
        // enviarAlertaWhat("", "3125215864", $tipo, $idser);
    }
}

// Opcional: devolver respuesta o redirigir
echo json_encode([
    'success' => true,
    'procesados' => $idsProcesados,
]);
