<?php
    $nome = $_POST["nome"];
    $senha = $_POST["senha"];
    $mudaNome = $_POST["nomeDoUser"];

    include("conecta.php");

    $comando = $pdo->prepare("SELECT * FROM clientes WHERE nome='$nome' and senha='$senha'");
    $resultado = $comando->execute();

    $entrar = "n";

    while( $linhas = $comando->fetch()){
        $entrar = "s";
        $logado = 1;
    }

    if($entrar == "s"){
        $comando = $pdo->prepare("UPDATE clientes SET logado=1 WHERE nome='$nome'");
        $resultado = $comando->execute();
        header("Location: telaPerfil.php");
    }
    else {
        header("Location: login.html");
    }
?>