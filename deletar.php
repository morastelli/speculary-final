<?php
include("conecta.php");
$id = $_GET["id"];
$comando = $pdo->prepare("DELETE FROM clientes WHERE id=$id");
$resultado = $comando->execute();

header("Location: adminpage.php");

?>