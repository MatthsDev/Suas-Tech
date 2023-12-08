<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/sessao.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/cadunico/controller/acesso_user/dados_usuario.php';

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="website icon" type="png" href="../../cadunico/img/logo.png">
    <link rel="stylesheet" href="../css/style-cadast-setores.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="../../cadunico/js/cpfvalid.js"></script>

    <script>
        // Função para buscar os dados do coordenador
        function buscarCoord(cpf){
            $.ajax({
                type: "GET",
                url: "../../controller/salvando_setor.php", //caminho do php que busca os dados
                data: {cpf_coord: cpf},
                sucess: function (response){
                    //Atualiza
                    $("#nomeCoordenador").html(response);
                }
            });
        }

        // Função para preencher o CPF no campo após a busca
        function preencheCPF{
            $("#cpf").val(cpf);
        }

        // Função para buscar automaticamente ao perder o foco no campo
        $(document).ready(function () {
            $("#cpf").blur(function () {
                var cpfCoord = $(this).val();
                buscarCoordenador(cpfCoord);
                preencherCPF(cpfCoord); // Preencher o CPF no campo
            });
        });
        </script>


    <title>Cadastro de setores</title>
</head>
<body>
<div class="img">
    <h1 class="titulo-com-imagem">
        <img class="titulo-com-imagem" src="../img/h1-setores.svg" alt="Titulocomimagem">
    </h1>
</div>
<div class="container">
    <div class="cpf">
            <form>
            <label>CPF da Coordenação: </label>
            <input type="text" name="cpf_coord" onblur="validarCPF(this)" maxlength="14" id="cpf" required>
            <p id="nomeCoordenador"></p>
            </form>
            <?php
        if (isset($_GET['cpf_coord'])) {
            $cpf_coord = $_GET['cpf_coord'];
            $_SESSION['cpf_coord'] = $_GET['cpf_coord'];


            $sql = $pdo->prepare("SELECT * FROM usuarios WHERE cpf = :cpf_coord");
            $sql->execute(array(':cpf_coord' => $cpf_coord));

            if ($sql->rowCount() > 0) {
                $dados = $sql->fetch(PDO::FETCH_ASSOC);
                $nome_coord = $dados['nome'];
                $_SESSION['nome_coord'] = $nome_coord;

                ?><label>Coordenação Responsável: </label> <?php
        ?><p><?php echo $nome_coord; ?></p>

                    <form method="post" action="../../controller/salva_setor.php">
    </div>
    <div class="bloco1">    
        <label>INSTITUIÇÃO: </label>
        <input type="text" name="instituicao" placeholder="Segmento." required>
        <label>NOME DA INSTITUIÇÃO: </label>
        <input type="text" name="nome_instit" placeholder="Digite o nome da instituição." required>
    </div>
    <div class="bloco2">    
        <label>Logradouro: </label>
        <input type="text" name="rua" placeholder="Rua, Avenida, Rodovia." required>
        <label>Número: </label>
        <input type="text" name="num" required>
        <label>Bairro: </label>
        <input type="text" name="bairro" required>
    </div>    
    <div class="bloco3">    
        <label>Código Contrato: </label>
        <input type="text" name="cod_contrato" required>
        <label>Código Institucional: </label>
        <input type="text" name="cod_instit " placeholder="Caso tenha..">
    </div>
    <div class="bloco4">
        <label>Contato: </label>
        <input type="text" name="contato" placeholder="Apenas números." required>
        <label>E-mail Institucional: </label>
        <input type="email" name="emailInstit" required>
    </div>
    <div class="btn">
        <button type="submit">SALVAR</button>
    </div>
        </form>
</div>
    <script src="js/scripts.js"></script>
    <script src="../../cadunico/js/personalise.js"></script>

</body>
</html>
        <?php
} else {
        $nome_coord = "Esse cpf não foi localizado " . $_GET['cpf_coord'] . ". Você pode Cadastrar <a href='../../cadunico/painel-adm/cadastro_user.php'>AQUI</a>";

    }

} else {
    ?> <label>Informe o CPF do responsável pela a unidade.</label> <?php
}

?>