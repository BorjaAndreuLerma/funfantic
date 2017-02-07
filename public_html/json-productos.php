<?php

$id=$_GET["id"];

$servername = "localhost";
$username = "root";
$password = "funfantic";
$dbName = "funfantic";

$conn = new mysqli($servername, $username, $password, $dbName);
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

$peticion = "SELECT * from Articulos where IdCategoria=$id";
$resultado = $conn->query($peticion);
$articulos = array();
while($fila=$resultado->fetch_assoc()){
    $articulos[] = $fila;
}

echo json_encode($articulos);
?>