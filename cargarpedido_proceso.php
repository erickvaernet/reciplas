<?php
require "database.php";

$pedido = $_REQUEST;
$pedido['estado'] = 1;

// Crear pedido
$query = mysqli_prepare($enlace, "INSERT INTO Pedido (Fecha_entrega, Descripcion, Estado_pedido_idEstado_pedido, Cliente_Persona_id_persona) VALUES (?,?,?,?)");
mysqli_stmt_bind_param($query, "ssis", $pedido['fecha_entrega'], $pedido['descripcion'], $pedido['estado'], $pedido['cliente']);
$result = mysqli_stmt_execute($query);
$idPedido = mysqli_stmt_insert_id($query);

// Crear lineas
foreach ($pedido['articulos'] as $articulo) {
    $query = mysqli_prepare($enlace, "INSERT INTO Linea_Pedido (Articulo_IdArt, Pedido_Nro, Cantidad, Precio_Unitario) VALUES (?,?,?,?)");
    mysqli_stmt_bind_param($query, "siss", $articulo['id'], $idPedido, $articulo['cantidad'], $articulo['precio_venta']);
    $result = mysqli_stmt_execute($query);
}

header('Location: pedidos.php');
die();
?>