<?php

$idUsuario=$_GET["idUsuario"];
$listaProductos = json_decode($_GET['compra']);

$servername = "localhost";
$username = "root";
$password = "funfantic";
$dbName = "funfantic";

$conn = new mysqli($servername, $username, $password, $dbName);
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
$peticionIdPedido = "SELECT MAX(idPedido) from pedidos";
$idPedido = $conn->query($peticionIdPedido);
$idPedido = $idPedido + 1;

$fecha= time();
$fecha= (string) $fecha;

$seguir = true;
foreach($listaProductos as $producto)
    {
            $idProducto = $producto->id;
            $Cantidad = $producto->cantidad;
            $Precio = $producto->precio;
            $sql = "INSERT INTO pedidos (idPedido, idUsuario, Fecha) VALUES ($idPedido, $idUsuario, $fecha)";
            if ($conn->query($sql) === TRUE) {
                $resultado = "Su pedido ha sido procesado.";
            } else {
                $resultado = "Error al procesar su pedido.";
                $sql = "DELETE From pedidos where idPedido=$idPedido";
                $conn->query($sql);
                $seguir = false;
            }
    }
echo json_encode($resultado);
