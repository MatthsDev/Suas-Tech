<?php
    require_once("conexao.php");
    session_start();

    if(empty($_POST['usuario']) || empty($_POST['senha'])){
        header("location:../index.php");
    }

    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $res = $pdo->prepare("SELECT * from usuarios where usuario = :usuario and senha = :senha ");
    $res->bindValue(":usuario", $usuario);
    $res->bindValue(":senha", $senha);
    $res->execute();

    $dados = $res->fetchAll(PDO::FETCH_ASSOC);
    $linhas = count($dados);

    if($linhas > 0){
        $_SESSION['nome_usuario'] = $dados[0]['nome'];
        $_SESSION['user_usuario'] = $dados[0]['usuario'];
        $_SESSION['nivel_usuario'] = $dados[0]['nivel'];
    } else {
        echo "<script language='javascript'>window.alert('Dados Incorretos!!'); </script>";
        echo "<script language='javascript'>window.location='../index.php'; </script>";
    }
    ?>

    <?php
    if(isset($_SESSION['nivel_usuario']) && $_SESSION['nivel_usuario'] == 'admin'){
        echo '<a href="../painel-adm/adm-view.php">Ir para o Painel de Admin</a>';
    } elseif(isset($_SESSION['nivel_usuario']) && $_SESSION['nivel_usuario'] == 'usuario'){
        echo '<a href="../painel-usuario/user-painel.php">Ir para o Painel de Usuário</a>';
    }
    ?>
