 <!--PHP-->
 <?php
    include("conecta.php");

    $comando = $pdo->prepare("SELECT * FROM clientes WHERE logado=1");
    $resultado = $comando->execute();

    while ($linhas = $comando->fetch() )
    {
        $nomeUser = $linhas["nome"]; 
        $logado = $linhas['logado'];
        $adm = $linhas['adm'];
    }

    if (empty($logado)) {
        $logado = 0;
    }

    if (empty($adm)) {
        $adm = 0;
    }

    if (empty($nomeUser)) {
        $nomeUser = "Login";
    }

    $nomeUser = strtoupper($nomeUser)[0] . substr($nomeUser, 1);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Speculary</title>
    <!--ICON NA GUIA-->
    <link rel="icon" href="imagensTelaInicial/logo.png">
    <link rel="stylesheet" href="css/telaPerfil.css">
</head>
<body>
    <!--NAVBAR DE CIMA-->
    <nav>
        <h5>Perfil</h5>
    </nav>

    <!--CONTEUDO DO SITE-->
    <main>
        <!--SETOR LOGIN-->
        <div class="login">  
            <?php
                if ($logado == 1){
                    echo"
                    <a href='#'>
                        <img src='imagensTelaPerfil/perfil1.jpg'>
                        <p name='nomeDoUser'> $nomeUser </p><!--EXIBIR NOME DO USUARIO-->
                    </a>
                    <div class='sair'>
                        <img src='imagensTelaPerfil/exit.png' onclick='sair()'>
                    </div>";
                }
                else {
                    echo"
                    <a href='login.html'>
                        <img src='imagensTelaPerfil/perfil1.jpg'>
                        <p name='nomeDoUser'> $nomeUser </p><!--EXIBIR NOME DO USUARIO-->
                    </a>
                    <div class='sair' style='display: none;'>
                        <img src='imagensTelaPerfil/exit.png' onclick='sair()'>
                    </div>";
                }
            ?>
        </div>
        <!--SETOR SOBRE-->
        <div class="sobre" onclick="irSobre()">
            <img src="imagensTelaPerfil/perfil2.jpg">
            <p>Quem somos</p>
        </div>
        <!--SETOR TERMOS-->
        <div class="termos" onclick="irTermos()">
            <img src="imagensTelaPerfil/perfil3.jpg">
            <p>Termos de uso</p>
        </div>
        <!--SETOR PRIVACIDADE-->
        <div class="privacidade" onclick="irPrivacidade()">
            <img src="imagensTelaPerfil/perfil4.jpg">
            <p>Privacidade do usuário</p>
        </div>
        <?php
                if ($adm == 1){
                    echo"
                    <div class='privacidade'>
                        <a onclick='irAdm()'>
                            <img src='imagensTelaPerfil/admin.jpg'>
                            <p>Tela de administrador</p>
                        </a>
                    </div>";
                }
            ?>
    </main>

    <!--NAVBAR DE BAIXO-->
    <footer>
        <div class="navegacao">
            <ul>
                <!--TELA INICIAL-->
                <li class="list">
                    <a href="telaInicial.html">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="text">Início</span>
                    </a>
                </li>
                <!--CATEGORIAS-->
                <li class="list">
                    <a href="categorias.html">
                        <span class="icon">
                            <ion-icon name="grid-outline"></ion-icon>
                        </span>
                        <span class="text">Categorias</span>
                    </a>
                </li>
                <!--FAVORITOS-->
                <li class="list">
                    <a href="favoritos.php">
                        <span class="icon">
                            <ion-icon name="bookmark-outline"></ion-icon>
                        </span>
                        <span class="text">Favoritos</span>
                    </a>
                </li>
                <!--PERFIL-->
                <li class="list active"> <!--LIST ACTIVE DEFINE ONDE A BOLINHA DO NAV COMEÇA-->
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="person-outline"></ion-icon>
                        </span>
                        <span class="text">Perfil</span>
                    </a>
                </li>
                <div class="indicator"></div>
            </ul>
        </div>
    </footer>

    <!--IMPORT DO SCRIPT DA ANIMAÇÃO NAVBAR DE BAIXO-->
    <script src="scriptNav.js"></script>
    <!--IMPORT DOS ÍCONES-->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>