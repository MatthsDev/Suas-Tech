<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<table width="650px" border="1">

<tr class="titulo" >

    <th class="cabecalho">CÓDIGO FAMILIAR</th>
    <th class="cabecalho">NOME</th>
    <th class="cabecalho">NIS</th>
    <th class="cabecalho">NOME MÃE</th>
    <th class="cabecalho">DATA ATUALIZAÇÃO</th>
    <th class="cabecalho">DATA DE NASCIMENTO</th>
    <th class="cabecalho">ENDEREÇO</th>
    <th class="check">
                <label class="urg">
                        <input type="checkbox" id="selecionarTodos">
                    <span class="checkmark"></span>
                </label>
            </th>
</tr>

    <?php
if (!isset($_GET['ano_select'])) {
} else {
    $sql_cod = $conn->real_escape_string($_GET['ano_select']);
    $sqli_cod = $conn->real_escape_string($_GET['localidade']);
    $sql_dados = "SELECT * FROM tbl_tudo WHERE dat_atual_fam LIKE '%$sql_cod%' AND nom_localidade_fam LIKE '%$sqli_cod%' AND cod_parentesco_rf_pessoa = 1";
    $sql_query = $conn->query($sql_dados) or die("ERRO ao consultar !" . $conn - error);

    if ($sql_query->num_rows == 0) {
        ?>
    <tr class="resultado">
    <td colspan="7">Nenhum resultado encontrado...</td>
    </tr>
        <?php
} else {

        while ($dados = $sql_query->fetch_assoc()) {
            ?>
        <tr class="resultado">
            <td class="resultado"><?php echo $dados['cod_familiar_fam']; ?></td>
            <td class="resultado"><?php echo $dados['nom_pessoa']; ?></td>
            <td class="resultado"><?php echo $dados['num_nis_pessoa_atual']; ?></td>
            <td class="resultado"><?php echo $dados['nom_completo_mae_pessoa']; ?></td>
            <td class="resultado"><?php echo $dados['dat_atual_fam']; ?></td>
            <td class="resultado"><?php echo $dados['dta_nasc_pessoa']; ?></td>
            <td class="resultado"><?php
//construindo o endereço
            $tipo_logradouro = $dados["nom_tip_logradouro_fam"];
            $nom_logradouro_fam = $dados["nom_logradouro_fam"];
            $num_logradouro_fam = $dados["num_logradouro_fam"];
            if ($num_logradouro_fam == "") {
                $num_logradouro = "S/N";
            } else {
                $num_logradouro = $dados["num_logradouro_fam"];
            }
            $nom_localidade_fam = $dados["nom_localidade_fam"];
            $nom_titulo_logradouro_fam = $dados["nom_titulo_logradouro_fam"];
            if ($nom_titulo_logradouro_fam == "") {
                $nom_tit = "";
            } else {
                $nom_tit = $dados["nom_titulo_logradouro_fam"];
            }
            $txt_referencia_local_fam = $dados["txt_referencia_local_fam"];
            if ($txt_referencia_local_fam == "") {
                $referencia = "SEM REFERÊNCIA";
            } else {
                $referencia = $dados["txt_referencia_local_fam"];
            }

            $endereco_conpleto = $tipo_logradouro . " " . $nom_tit . " " . $nom_logradouro_fam . ", " . $num_logradouro . " - " . $nom_localidade_fam . ", " . $referencia;

            echo $endereco_conpleto;?></td>
            <td class="check">
                <label class="urg">
                        <input type="checkbox" name="excluir[]" value="<?php echo $dados['num_nis_pessoa_atual']; ?>">
                    <span class="checkmark"></span>
                </label>
            </td>
        </tr>
<?php
}
    }
}?>
</table>

    <script>
        document.getElementById('selecionarTodos').addEventListener('click', function (){
            // Obter todos os checkboxes na tabela
            var checkBoxes = document.querySelectorAll('input[name="excluir[]"]')

            checkBoxes.forEach(function(checkbox){
                checkbox.checked = document.getElementById('selecionarTodos').checked
            })
        })
    </script>