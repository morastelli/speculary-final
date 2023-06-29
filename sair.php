<?php 
include("conecta.php");
    $comando = $pdo->prepare("UPDATE clientes SET logado=0");
    $resultadoSair = $comando->execute(); 
    header("Location: telaPerfil.php");
?>