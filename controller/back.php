<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';

if(!isset($_SESSION )){
    session_start();
}

$user_name = $_SESSION['user_usuario'];

$sql = $pdo->prepare("SELECT * FROM usuarios WHERE usuario = :user_usuario");
$sql->execute(array(':user_usuario' => $user_name));

if ($sql->rowCount() > 0) {

    $dados = $sql->fetch(PDO::FETCH_ASSOC);
    $id_user = $dados['id'];
    $nome = $dados['nome'];
    $apelido = $dados['apelido'];
    $cpf = $dados['cpf'];
    $setor = $dados['setor'];
    $funcao = $dados['funcao'];
    if ($funcao == 1){
        $func = "Coordenação";
    }elseif($funcao == 2){
        $func = "Tecnico";
    }else{
        $func = null;
    }
    $dtNasc = $dados['dt_nasc'];
    $telefone = $dados['telefone'];
    $email = $dados['email'];
    $cargo = $dados['cargo'];
    $idcargo = $dados['id_cargo'];
    $nivel = $dados['nivel'];
}


if ($setor === 'CRAS - ANTONIO MATIAS') {
    echo '<script>window.location.href = "/Suas-Tech/cras/views/menu-cras-am.php"</script>';
} else if ($setor === 'SUPORTE') {
    echo '<script>window.location.href = "/Suas-Tech/acesso_suporte/index.php"</script>';
} else if ($setor === 'CREAS - GILDO SOARES') {
    echo '<script>window.location.href = "/Suas-Tech/creas/views/menu-creas.php"</script>';
} else if ($setor == 'CADASTRO ÚNICO - SECRETARIS DE ASSISTÊNCIA SOCIAL' && $nivel == 'admin') {
    echo '<script>window.location.href = "/Suas-Tech/cadunico/painel-adm/adm-view.php"</script>';
} else if ($setor == 'CADASTRO ÚNICO - SECRETARIS DE ASSISTÊNCIA SOCIAL' && $nivel == 'usuario') {
    echo '<script>window.location.href = "/Suas-Tech/cadunico/painel-usuario/user-painel.php"</script>';
} else if ($setor == 'COZINHA COMUNITARIA - MARIA NEUMA DA SILVA') {
    echo '<script>window.location.href = "/Suas-Tech/cozinha_comunitaria/menu.php"</script>';
} elseif ($setor == 'CRAS - SANTO AFONSO') {
    echo '<script>window.location.href = "/Suas-Tech/cras/views/menu-cras-st.php"</script>';
} elseif ($setor == 'CONCESSÃO') {
    echo '<script>window.location.href = "/Suas-Tech/concessao/index.php"</script>';
} elseif ($setor == 'ADMINISTRATIVO') {
    echo '<script>window.location.href = "/Suas-Tech/suas/views/adm/menu_adm.php"</script>';
}