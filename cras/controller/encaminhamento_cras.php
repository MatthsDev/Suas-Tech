<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/cadunico/controller/acesso_user/dados_usuario.php';

$usuario = $dados['nome'];
$cargo = $dados['cargo'];
$idcargo = $dados['id_cargo'];

setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'portuguese');

// Buscando dados do formulário
if (isset($_POST['buscar_dados']) && !empty($_POST['buscar_dados'])) {
    $opcao = $_POST['buscar_dados'];

    if ($opcao == "cpf_dec") {
        // Dados do formulário
        $cpf_dec = $_POST['valorescolhido_cpf'];
        $texto = $_POST['texto'];
        $local = $_POST['setor'];

        // Consulta preparada para evitar injeção de SQL
        $sql = $pdo->prepare("SELECT * FROM cras WHERE cpf = :cpf_dec");
        $sql->execute(array(':cpf_dec' => $cpf_dec));

        $timestampptbr = time();
        $data = new DateTime();
        $data->setTimestamp($timestampptbr);
        $data_formatada_at = $data->format('d \d\e F \d\e Y');

        if ($sql->rowCount() > 0) {
            $dados = $sql->fetch(PDO::FETCH_ASSOC);
            $nom_pessoa = $dados["nome"];
            // Formatando o CPF
            $cpf_formatando = sprintf('%011s', $cpf_dec);
            $cpf_formatado = substr($cpf_formatando, 0, 3) . '.' . substr($cpf_formatando, 3, 3) . '.' . substr($cpf_formatando, 6, 3) . '-' . substr($cpf_formatando, 9, 2);

            // Define as variáveis com o endereço
            $bairro = $dados['bairro'];
            $logradouro = $dados['logradouro'];
            $numero = $dados['numero'];
            $referencia = $dados['referencia'];
            $enderecoCompleto = $bairro . ", " . $logradouro . "," . " n°  $numero" . "," . " $referencia";

            $conteudo = "<div id='title' style='margin-top: 100px;'> $setor - SÃO BENTO DO UNA</div>";
            $conteudo .= "<br><br><p class='right-align'>São Bento do Una, " . $data_formatada_at . "</p>";
            $conteudo .= "<br><br><p>Assunto: Encaminho " . $nom_pessoa . ", CPF: " . $cpf_formatado . ", reside em " . $enderecoCompleto . ".</p>";
            $conteudo .= "<p>Ao(a) Coordenador(a) do " . $local . ", pelo seguinte motivo: </p>";
            $conteudo .= "<p>" . $texto . "</p>";
            $conteudo .= "<p>Permaneço à disposição para quaisquer esclarecimentos adicionais que se façam necessários.</p>";
            $conteudo .= "<p>Atenciosamente,</p>";
            $conteudo .= "<div class='signature-line'>";
            $conteudo .= $usuario . "<br>";
            $conteudo .= $cargo . "<br>";
            $conteudo .= $idcargo . "<br><br><br>";
            $conteudo .= "<p>_________________________________________________________________________________________________________</p>";
            $conteudo .= "<p>ASSINATURA</p>";
            $conteudo .= "</div>";
            header("Location: print_enc_cras.php?conteudo=" . urlencode($conteudo));
        }
    } elseif ($opcao == "nis_dec") {
        $nis_dec = $_POST['valorescolhido_nis'];
        $texto = $_POST['texto'];
        $local = $_POST['setor'];

        // Consulta preparada para evitar injeção de SQL
        $sql = $pdo->prepare("SELECT * FROM cras WHERE nis = :nis_dec");
        $sql->execute(array(':nis_dec' => $nis_dec));

        $timestampptbr = time();
        $data = new DateTime();
        $data->setTimestamp($timestampptbr);
        $data_formatada_at = $data->format('d \d\e F \d\e Y');

        if ($sql->rowCount() > 0) {
            $dados = $sql->fetch(PDO::FETCH_ASSOC);
            $nom_pessoa = $dados["nom_pessoa"];
            // Define as variáveis com o endereço
            $bairro = $dados['bairro'];
            $logradouro = $dados['logradouro'];
            $numero = $dados['numero'];
            $referencia = $dados['referencia'];
            $enderecoCompleto = $bairro . ", " . $logradouro . "," . " n°  $numero" . "," . " $referencia";

            $conteudo = "<div id='title' style='margin-top: 100px;'> $setor - SÃO BENTO DO UNA</div>";
            $conteudo .= "<br><br><p class='right-align'>São Bento do Una, " . $data_formatada_at . "</p>";
            $conteudo .= "<br><br><p>Assunto: Encaminho " . $nom_pessoa . ", NIS: " . $nis_dec . ", reside em " . $enderecoCompleto . ".</p>";
            $conteudo .= "<p>Ao(a) Coordenador(a) do " . $local . ", pelo seguinte motivo: </p>";
            $conteudo .= "<p>" . $texto . "</p>";
            $conteudo .= "<p>Permaneço à disposição para quaisquer esclarecimentos adicionais que se façam necessários.</p>";
            $conteudo .= "<p>Atenciosamente,</p>";
            $conteudo .= "<div class='signature-line'>";
            $conteudo .= $usuario . "<br>";
            $conteudo .= $cargo . "<br>";
            $conteudo .= $idcargo . "<br><br><br>";
            $conteudo .= "<p>_________________________________________________________________________________________________________</p>";
            $conteudo .= "<p>ASSINATURA</p>";
            $conteudo .= "</div>";
            header("Location: print_enc_cras.php?conteudo=" . urlencode($conteudo));
        }
    } else {
        echo "Opção inválida.";
    }
}
?>
