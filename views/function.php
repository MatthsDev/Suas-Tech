<?php

// CARREGANDO SCRIPTS DE CONEXÃO E CONFIGURAÇÃO DO SISTEMA (BANCO DE DADOS)
include "../config/conexao.php";

// Verifica se o usuário está autenticado como admin ou usuário
if (!isset($_SESSION['nome_usuario']) || ($_SESSION['nivel_usuario'] != 'admin' && $_SESSION['nivel_usuario'] != 'usuario')) {
    header("location:../index.php");
    exit; // Encerra o script após redirecionar
}

// CARREGANDO SESSAO DO USUARIO
session_start();

setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'portuguese');
//formantando a data para um modelo dia mes (nome) e ano para português
$timestampptbr = time();
$data_formatada_at = strftime('%d de %B de %Y', $timestampptbr);

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Obtém o valor enviado via GET com o nome "nis"
    if (isset($_GET["nis"])) {
        $nis = $_GET["nis"];
        // Consulta SQL para buscar informações na tabela com base no Código Familiar
        $sql = $pdo->prepare("SELECT * FROM tbl_tudo WHERE num_nis_pessoa_atual = :nis");
        $sql->bindParam(':nis', $nis, PDO::PARAM_STR);
        $sql->execute();

        // Verifica se a consulta retornou algum resultado
        if ($sql->rowCount() > 0) {
            // Recupera os dados da consulta
            $dados = $sql->fetch(PDO::FETCH_ASSOC);
            $cod_familiar = $dados["cod_familiar_fam"];
            $cod_parentesco_rf_pessoa = $dados['cod_parentesco_rf_pessoa'];

            //Formatando o código familiar
            $cod_familiar = $dados["cod_familiar_fam"];
            $cod_familiar_formatado = substr_replace(str_pad($cod_familiar, 11, "0", STR_PAD_LEFT), '-', 9, 0);
            $nom_pessoa = $dados['nom_pessoa'];
            //Formatando o nis
            $nis_responsavel = $dados["num_nis_pessoa_atual"];
            $nis_responsavel_formatado = substr_replace(str_pad($nis_responsavel, 11, "0", STR_PAD_LEFT), '-', 10, 0);

            //Printando das variáveis
            echo "Código domiciliar ou código familiar: " . $cod_familiar_formatado . "<br>";
            echo "NIS do Responsável pela Unidade Familiar (RUF): " . "<br>";
            echo "Nome: " . $nom_pessoa . "<br>";
            echo "NIS da Pessoa: " . $nis_responsavel_formatado . "<br>";
            echo "Data de Exclusão: " . $data_formatada_at;
            echo "<label for='parecer'>PARECER TECNICO:</label>
            <textarea id='parecer' name='parecer'></textarea>";
            include 'function.php';

        } else {
            echo "não encontrou dados";
        }
    } else {
        echo "A variável 'nis' não foi definida.";
    }
}
$_SESSION['nis'] = array(
    'nis' => $nis_responsavel,
);

if (isset($_SESSION['nis'])) {

    $nis = $_SESSION['nis'];
    $nis_ = $nis['nis'];

    $sql_cod = $conn->real_escape_string($nis_);
    $sql_dados = "SELECT * FROM tbl_tudo WHERE num_nis_pessoa_atual LIKE '%$sql_cod%'";
    $sql_query = $conn->query($sql_dados) or die("ERRO ao consultar !" . $conn - error);

    if ($sql_query->num_rows == 0) {
        echo "Nenhum dado.";
    } else {
        while ($dados = $sql_query->fetch_assoc()) {
            $informe[] = $dados['cod_familiar_fam'];

        }

    }
//echo "Não definido";
}
