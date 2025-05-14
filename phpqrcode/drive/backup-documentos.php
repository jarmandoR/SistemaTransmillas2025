<?php

exit;

require './config/config.php';
require './functions.php';
require '../connection/variables.php';

set_time_limit(0);
//ini_set('memory_limit', '1024M');

$client = new Google\Client();
$client->useApplicationDefaultCredentials();
$client->setScopes([Google\Service\Drive::DRIVE, Google\Service\Drive::DRIVE_FILE]);

$service = new Google\Service\Drive($client);
$database = \DBController\DatabaseFactory::getInstance($host, $bd, $user, $pass);
$log = new MyLogPHP('log-documentos.csv');

$rs = $database->limitSelect(100, 0, "iddocumentos, doc_fecha, doc_nombre, doc_ruta", "documentos", "doc_tabla IN('gastos', 'cajamenor') AND iddocumentos NOT IN(SELECT documento_id FROM drive_archivos WHERE tabla = 'documentos')");
$data = $rs->getResultToArray();
$rs->free();

foreach ($data as $row) {
    $filePath = APPLICATION_BASE_PATH . '/' . $row['doc_ruta'];

    $id = $row['iddocumentos'];
    $newName = 'documentos-' . $id;
    $drivePath = substr($row['doc_fecha'], 0, 10);
    $description = $row['doc_nombre'];

//    if (file_exists($filePath) && filesize($filePath) > 312000) {
//        $log->debug("Ignorar porque es demasiado grande (ID: {$id}): {$filePath}");
//        continue;
//    }

    if (empty($row['doc_ruta']) || !file_exists($filePath)) {
        $log->error("No existe la imagen (ID: {$id})", 'DV');
        $fileID = '';
        $status = 0;
    } else {
        $file = uploadFile($service, $filePath, $newName, $description, $drivePath, DOCUMENT_FOLDER);
        $status = !empty($file);

        if ($status) {
            $fileID = $file->id;
            $log->info("Creado (ID: {$id}): https://drive.google.com/open?id={$file->id}", 'DV');
        } else {
            $fileID = '';
            $log->error("No se pudo subir el archivo a Drive (ID: {$id} - {$file->id})", 'DV');
        }
    }

    $recId = insertDriveRecord($database, $id, 'documentos', $description, $fileID, $status);

    if ($recId) {
        $log->info("Insertado en la base de datos (ID: {$id} - {$fileID})", 'DB');
    } else {
        $log->error("Error al insertar en la base de datos (ID: {$id} - {$fileID})", 'DB');
    }
}