

<?php 

	class conectar{
		public function conexion(){

			$conexion=mysqli_connect('localhost',
										'u713516042_jose2',
										'Dobarli23@transmillas',
										'u713516042_transmillas2');
			return $conexion;
		}
	}

 ?>



/* class conectar {
    public function conexion() {

	//	include("../../connection/variables.php"); 

		$bd="u713516042_transmillas2"; 
$host="localhost";
$user="u713516042_jose2";
$pass="Dobarli23@transmillas";
$Usu_ses="vive";
$salt = "transmi2344fsdfd"; 

        $conexion = mysqli_connect($host, $user, $pass, $bd);
        return $conexion;
    }
} */
