<?php
  
    include('conecta.php');

    $nome = $_POST["nome"];
    $senha = $_POST["senha"];
    $adm = 1;
          
    $sql = "SELECT COUNT(*) FROM clientes WHERE nome = :elemento and senha = :cu and adm=$adm";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':elemento', $nome);
    $stmt->bindParam(':cu', $senha);

    // Executando a consulta
    $stmt->execute();

    // Obtendo o resultado
    $resultado = $stmt->fetchColumn();

    // Verificando se o elemento já existe no banco de dados
    if ($resultado > 0 AND $adm = 1) {
        header("Location: adminpage.php");
    } else {
        echo "<script language='javascript'>";
            echo "alert('E-mail e/ou senha errado(s)')";
            echo "</script>";
            header("Location: loginAdmin.php");
    }
                
?>