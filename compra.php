<?php
    include("conecta.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="UTF-8">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/estiloCompra.css">
 <!--ICON NA GUIA-->
 <link rel="icon" href="imagensTelaInicial/logo.png">
 <link rel="stylesheet" href="css/estiloQuemsomos.css">
</head>
<body>
   <!--SETA-->
   <a href="carrinho.php"><img src="imagensCadastro/setaespeculary.jpg" class="seta"></a>
<div class="row">
  <div class="col75">
    <div class="container">
      <form>
        <div class="row">
          <div class="col50">
            <h3>Endereço de cobrança</h3>
            <!--NOME-->
            <label for="fname"><i class="fa fa-user"></i> Nome Completo</label>
            <input type="text" id="fname" name="firstname" placeholder="Gabriel H. Wondracek">
            <!--E-MAIL-->
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="gabriel@exemplo.com">
            <!--ENDEREÇO-->
            <label for="adr"><i class="fa fa-address-card-o"></i> Endereço</label>
            <input type="text" id="adr" name="address" placeholder="Av. Juscelino Kubitscheck, 627">
            <!--CIDADE-->
            <label for="city"><i class="fa fa-institution"></i> Cidade</label>
            <input type="text" id="city" name="city" placeholder="Joinville">
            <!--ESTADO-->
            <div class="row">
              <div class="col50">
                <label for="state">Estado</label>
                <input type="text" id="state" name="state" placeholder="SC">
              </div>
            </div>
          </div>

          <div class="col50">
            <h3>Pagamento</h3>
            <!--CARTÕES ACEITOS-->
            <label for="fname">Cartões Aceitos</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
            </div>
            <!--NOME NO CARTÃO-->
            <label for="cname">Nome no Cartão</label>
            <input type="text" id="cname" name="cardname" placeholder="Gabriel Henrique Wondracek">
            <!--NÚMERO NO CARTÃO-->
            <label for="ccnum">Número no Cartão</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
            <!--DATA DE VALIDADE MÊS-->
            <label for="expmonth">Data de validade Mês</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="Setembro">
            <div class="row">
              <!--DATA DE VALIDADE ANO-->
              <div class="col50">
                <label for="expyear">Data de validade Ano</label>
                <input type="text" id="expyear" name="expyear" placeholder="2025">
              </div>
              <!--CVV-->
              <div class="col50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="352">
              </div>
            </div>
          </div>         
        </div>
        <!--ENVIAR NOVIDADES PELO E-MAIL-->
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Me enviar novidades pelo e-mail
        </label>
        <!--SUBMIT-->
        <input type="button" value="Efetuar Pagamento" class="btn" onclick="onClick()">
      </form>
    </div>
  </div>
  <!--CARRINHO-->
  <div class="col_25">
    <div class="container">
      <h4>Carrinho <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> </span></h4>
      <?php 
      $comando = $pdo->prepare("SELECT * FROM produtos WHERE carrinho = 1"); 
      $resultado = $comando->execute();
      while ($linhas = $comando->fetch() ) {
        $nome = $linhas["nome"]; 
                $preco = $linhas["preco"]; 
                $qtd = $linhas["quantidade"];
                $carrinho = $linhas["carrinho"];     
                $dados_imagem = $linhas["foto"];
                $id_produto = $linhas["id_produto"];
                $precototal = $linhas["preco_final"];
                $i = base64_encode($dados_imagem);
      echo("<p><a>$nome</a><a>$qtd</a><span class='price'>$precototal,00</span></p>");
      }?>
      <hr>
    </div>
  </div>
</div>

<!--SCRIPT-->
<script src="script.js"></script>
</body>
</html>