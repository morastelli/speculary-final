<?php
    include("conecta.php");

    $nome  = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $logado = 0;

    $comando = $pdo->prepare("INSERT INTO clientes(nome,email,senha,logado) VALUES('$nome','$email','$senha',$logado)");
    $resultado = $comando->execute();

    //Para voltar no forms
    header("Location: login.html");
?>

