<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/sessao.php';

// Execute a consulta SQL
$res_todos = $pdo->query("SELECT senger.id, senger.user_id, sen.nome_senha, senger.nome_pess
FROM senhas_geradas AS senger
INNER JOIN senhas AS sen ON sen.id = senger.senha_id
WHERE senger.sits_senha_id = 4
ORDER BY senger.modified DESC
LIMIT 1;");

// Fetch os resultados
$dados_total = $res_todos->fetchAll(PDO::FETCH_ASSOC);

foreach ($dados_total as $row) {
    $id = $row['id'];
    $nome_senha = $row['nome_senha'];
    $user_id = $row['user_id'];
    $nome_pess = $row['nome_pess'];

    // Consulta para obter o guiche associado ao usuário que gerou a senha
    $stmt = $pdo->prepare("SELECT guinche FROM usuarios WHERE id = :user_id");
    $stmt->bindValue(':user_id', $user_id);
    $stmt->execute();
    $guiche_result = $stmt->fetch(PDO::FETCH_ASSOC);
    $guiche = $guiche_result['guinche'];


    echo '
                <div class="senhaAtual">

                    <div id="tudo1" class="row sencham">

                        <div class="nome">
                            <div class="" style="text-align: center;">
                                <span id="senhaAtualNumero">NOME</span>
                            </div>
                            <div class="">
                                <span id="senhaAtualNumero">' . $nome_pess . '</span>
                            </div>
                        </div>
                        <div class="nome">
                            <div class="" style="text-align: center;">
                                <span id="senhaAtualNumero">ATENDIMENTO</span>
                            </div>
                        <div class=""style="text-align: center;">
                            <span id="senhaAtualNumero">CADASTRO ÚNICO</span>
                        </div>
                        </div>
                        <div class="nome">
                            <div class="" style="text-align: center;">
                                <span id="senhaAtualNumero">PRIORIDADE</span>
                            </div>
                            <div class=""style="text-align: center;">
                                <span id="senhaAtualNumero">ZONA RURAL</span>
                            </div>
                        </div> 
                        <div class="senha_guinche">    
                            <div class="senha">
                                <div class="" style="text-align: center;">
                                    <span class="senhaAtualTexto">SENHA</span>
                                </div>
                                <div class  style="text-align: center;">
                                    <span class="senhanum" id="senhaAtualNumero">' . $nome_senha . '</span>
                                </div>
                            </div>
                            <div class="guinche">
                                <div class="" id="nome_sen"  style="text-align: center;">
                                    <div>
                                        <span class="senhaAtualTexto">GUINCHÊ</span>
                                    </div>
                                    <div>
                                        <span class="senhaAtualTexto">' . $guiche . '</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>';
}
