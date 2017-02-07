<?php
$servername = "localhost";
$username = "root";
$password = "funfantic";
$dbName = "funfantic";

$conn = new mysqli($servername, $username, $password, $dbName);
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

$peticion = "SELECT * from Carrusel";
$resultado = $conn->query($peticion);
$imagenes= array();
while($fila=$resultado->fetch_assoc()){
    $imagenes[] = $fila;
}

        echo json_encode($imagenes);

?>