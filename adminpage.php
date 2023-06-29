<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Admin</title>
    <link rel="stylesheet" href="estiloadmin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
     <!--ICON NA GUIA-->
     <link rel="icon" href="imagensTelaInicial/logo.png">
</head> 
<img src="imagensCadastro/setaespeculary.jpg" class="seta" onclick="voltar()">
<h2>Painel do Administrador</h2>
<table class="div1" border='solid'>
    <thead>
        <tr>
            <td><b>Nome</b></td>
            <td><b>Email</b></td>
            <td><b>Senha</b></td>
            <td><b>Excluir</b></td>
        </tr>
    </thead>
    <tbody>
        <?php
            // Caso queira pegar entradas forneciadas pelo usuário:
            //$nome = $_POST["nome"];
            //$email = $_POST["email"];
            //$senha = $_POST["senha"];

            include("conecta.php");

            $comando = $pdo->prepare("SELECT * FROM clientes");
            $resultado = $comando->execute();

            while ($linhas = $comando->fetch()) {
                $n = $linhas["nome"];
                $m = $linhas["email"];
                $i = $linhas["senha"];
                $id = $linhas["id"];

                echo
                ("
                    <tr>
                        <td>$n</td>
                        <td>$m</td>
                        <td>$i</td>
                        <td><button class='botao' onclick=\"Deletar($id);\">X</button></td>
                    </tr>
                ");
            }
        ?>
    </tbody>
    <script>
        function Deletar(id){
            window.open("deletar.php?id="+id,"_self")
        }
        </script>
</table>
<script>
    function voltar(){
        window.location.href = 'loginAdmin.php'
    }
</script>