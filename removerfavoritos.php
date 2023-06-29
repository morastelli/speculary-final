<?php
include("conecta.php");
$id_produto = $_GET["id_produto"];
$comando = $pdo->prepare("UPDATE produtos SET favoritos = 0 WHERE id_produto=$id_produto");
$resultado = $comando->execute();

header("Location: favoritos.php");
?>