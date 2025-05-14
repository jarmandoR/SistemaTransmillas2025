<link rel="stylesheet" href="https://cdn.materialdesignicons.com/5.4.55/css/materialdesignicons.min.css">
<style>
    /* Estilos para la franja azul con el título */
    .titulo-barra {
        background-color: #007bff;
        color: white;
        text-align: center;
        padding: 15px;
        font-size: 24px;
        font-weight: bold;
    }

    /* Contenedor del QR */
    .qr-container {
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        margin: 20px 0;
        cursor: pointer;
    }

    /* Imagen QR */
    .qr-container img {
        max-width: 100%;
        height: auto;
        width: 300px;
        transition: transform 0.3s ease-in-out;
    }

    /* Imagen ampliada */
    .qr-expanded {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.8);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 1000;
    }

    .qr-expanded img {
        max-width: 80%;
        max-height: 80%;
        width: auto;
        height: auto;
    }
</style>

<script>
    function toggleQR() {
        var qrOverlay = document.getElementById("qrOverlay");
        qrOverlay.style.display = qrOverlay.style.display === "flex" ? "none" : "flex";
    }
</script>

<?php 
require("login_autentica.php"); 
include("layout.php");

echo '<div class="titulo-barra">Medios de Pago</div>';


?>

<!-- Contenedor del código QR -->
<div class="qr-container" onclick="toggleQR()">
    <img src="images/codigoQRBC.png" alt="Código QR">
</div>

<!-- Overlay para agrandar la imagen -->
<div id="qrOverlay" class="qr-expanded" style="display: none;" onclick="toggleQR()">
    <img src="images/codigoQRBC.png" alt="Código QR">
</div>

<?php
include("footer.php");
?>