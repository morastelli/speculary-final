<?php
    include("conecta.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Favoritos</title>
    <!--ICON NA GUIA-->
    <link rel="icon" href="logo.png">
    <link rel="stylesheet" href="estiloCarrinho.css">
</head>
<body>
    <!--LOGO E SETA-->
    <div class="logo">
        <a href="telaInicial.html"><img src="setaespeculary.jpg" class="seta"></a>
        <img src="logoetexto.png" class="logoTamanho">
    </div> 
     <!--TÍTULO-->
     <div class="titulo">
         <h2>Seus Favoritos</h2>
     </div>
        <?php

            $comando = $pdo->prepare("SELECT * FROM produtos WHERE favoritos = 1"); 
            $resultado = $comando->execute();

            while ($linhas = $comando->fetch() )
            {
                $nome = $linhas["nome"]; 
                $preco = $linhas["preco"]; 
                $favoritos = $linhas["favoritos"];     
                $dados_imagem = $linhas["foto"];
                $id_produto = $linhas["id_produto"];
                $i = base64_encode($dados_imagem);   
                
                $pqtd = $pdo->prepare("UPDATE produtos SET preco_final = (preco * quantidade);");
                $final = $pqtd->execute();
                $preco_final = $linhas["preco_final"]; 

                echo
                ("
                    <table>
                    <tr id='prot' class='row1'>
                        <div class='imagem'><td><img style='scale: 90%; margin-left: 15px' src='data:image/jpeg;base64,$i' width='100px'></td></div>
                        <div style='scale: 90%' class='produtos'>    
                        <td style='scale: 90%' class='pricename'>
                        <h4 style='margin-top: 0px; margin-bottom: 0px;'>$nome </h4>
                        <h4 style='margin-top: 0px; margin-bottom: 0px;'>R$$preco</h4>
                        <h5 style='margin-top: 0px; margin-bottom: 0px;'><button class='remover' onclick=\"Deletar($id_produto);\">Remover</button></h5>
                        </td>              
                        </div>
                    </tr>
                    </table>
                ");}
            
                ?>
</body>
<script>
        function Deletar(id_produto)
        {
            window.open("removerfavoritos.php?id_produto="+id_produto,"_self")
        }
</script>
</html>