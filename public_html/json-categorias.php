<?php

$servername = "localhost";
$username = "root";
$password = "funfantic";
$dbName = "funfantic";

$conn = new mysqli($servername, $username, $password, $dbName);
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

$peticion = "SELECT * from Categorias";
$resultado = $conn->query($peticion);
$categorias = array();
while($fila=$resultado->fetch_assoc()){
    $categorias[] = $fila;
}

echo json_encode($categorias);
?>