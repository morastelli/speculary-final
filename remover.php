<?php
include("conecta.php");
$id_produto = $_GET["id_produto"];
$comando = $pdo->prepare("UPDATE produtos SET carrinho = 0 WHERE id_produto=$id_produto");
$resultado = $comando->execute();

header("Location: carrinho.php");
?>