<?php
$numguia=$_POST['numguia'];
$telefono=$_POST['telefono'];
$tipo=$_POST['tipo'];
$idservi=$_POST['idservi'];
$funcion=$_POST['funcion'];

if ($funcion="enviarAlertaWhat") {
	enviarAlertaWhat($numguia,$telefono,$tipo,$idservi);
}
function enviarAlertaWhat($numguia, $telefono, $tipo, $idservi){
    if (preg_match('/^\d{10}$/', $telefono)) {
        $url = "https://www.transmillas.com/ChatbotTransmillas/alertas.php";

        $data = array(
            "numero_guia" => $numguia,
            "telefono" => $telefono,
            "tipo_alerta" => $tipo,
            "id_guia" => $idservi
        );

        $data_json = json_encode($data);
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $data_json,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: Bearer MiSuperToken123'
            ),
        ));

        $response = curl_exec($curl);

        if ($response === false) {
            $error = curl_error($curl);
            header('Content-Type: application/json');
            echo json_encode(['error' => "Error en la solicitud: $error"]);
        } else {
            $response_data = json_decode($response, true);
            header('Content-Type: application/json');
            echo json_encode($response_data);
        }

        curl_close($curl);
    } else {
        header('Content-Type: application/json');
        echo json_encode(['error' => 'El número de teléfono no tiene el formato correcto']);
    }
}