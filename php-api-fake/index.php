<?php 

/**
 * conexion db
 */


class api_fake
{
	public function __construct(){
		header('Access-Control-Allow-Origin: *');
	}

	public function data(){

		$con = new mysqli('localhost','root','','api_data_fake');
		$result = $con->query('SELECT * FROM users');

		// Si el result es mayor a 0 es porque la consulta fue exitosa
		if ($result->num_rows > 0) {
			// Se itera la consulta y se almacena como un array
			while ($row = $result->fetch_assoc() ) {
				$response[] = $row;
			}
			// Se devulve el array iterado
			return $response;
		}else{
			$response = array('api' => 'Sin datos!' );
			return $response;
		}
	}
}

$obj = new api_fake;
$json = $obj->data();
echo json_encode($json);

 












 ?>