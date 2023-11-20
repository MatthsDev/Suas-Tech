<?php
require_once '../../config/sessao.php';
include 'dados_usuario.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nm = $_POST['nome'];
    $ap = $_POST['apelido'];
    
    $tele= $_POST['tele'];
    $email1 = $_POST['email'];
    $cg = $_POST['cargo'];
    $idcg = $_POST['idcargo'];

    $smtp = $conn->prepare("UPDATE usuarios SET nome=?, apelido=?, senha=?, telefone=?, email=?, cargo=?, id_cargo=? WHERE usuario=?");
    $smtp->bind_param("ssssssss", $nm, $ap, $s_hashed, $tele, $email1, $cg, $idcg, $nomeUsuario);

    if ($smtp->execute()) {

        // Atualização bem-sucedida, redirecione para a página de Login
        echo "<script language='javascript'>window.alert('Dados alterados com sucesso.'); </script>";
    exit();
    } else {
        echo "Erro na atualização das informações: " . $smtp->error;
    }

    $smtp->close();

}
