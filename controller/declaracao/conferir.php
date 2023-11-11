<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../../style-registrar.css">
        <link rel="website icon" type="png" href="../../img/icon.png">
        <title>Declaração</title>
    </head>

<body>
        <h1>DECLARAÇÃO DO CADASTRO ÚNICO</h1>

        <form method="post" action="con_doc.php">

            <?php
//inicia a sessão
session_start();
// Inclui o arquivo "conexao.php" que deve conter a configuração da conexão com o banco de dados
include "../../config/conexao.php";
ini_set('memory_limit', '256M');

setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'portuguese');

//buscando dados do formulário
if (isset($_POST['buscar_dados']) && !empty($_POST['buscar_dados'])) {
    $opcao = $_POST['buscar_dados'];
    if ($opcao == "cpf_dec") {
        $cpf_dec = $_POST['valorescolhido'];
        //dados da tabela com todos os cadastros
        // Consulta preparada para evitar injeção de SQL
        $sql = $pdo->prepare("SELECT * FROM tbl_tudo WHERE num_cpf_pessoa = :cpf_dec");
        $sql->execute(array(':cpf_dec' => $cpf_dec));

        // Consulta preparada para evitar injeção de SQL
        $sqli = $pdo->prepare("SELECT * FROM folha_pag WHERE rf_cpf = :cpf_dec");
        $sqli->execute(array(':cpf_dec' => $cpf_dec));

        if ($sql->rowCount() > 0 && $sqli->rowCount() > 0) {
            ?>
            <h3>Confira se as informações estão corretas</h3>
            <?php
            $dados = $sql->fetch(PDO::FETCH_ASSOC);
            $dadosf = $sqli->fetch(PDO::FETCH_ASSOC);

            $renba_media = $dados["vlr_renda_media_fam"];
            // Formata o número como moeda brasileira
            $real_br_formatado = number_format($renba_media, 2, ',', '.');

            $cod_familiar = $dados["cod_familiar_fam"];
            $benef1 = $dadosf['pacto'];
            $sexo_pessoa_ = $dados["cod_sexo_pessoa"];
            $dt_atualizacao = $dados['dat_atual_fam'];

            //data criada com formato 'DD de mmmm de YYYY'
            $timestampptbr = time();
            $data_formatada_at = strftime('%d de %B de %Y', $timestampptbr);

            // Supondo que $dt_atualizacao é uma data válida
            $dt_atualizacao = DateTime::createFromFormat('d/m/Y', $dt_atualizacao);
            $data_atual = new DateTime(); // Obtém a data atual

            // Verificar se $dt_atualizacao é uma instância de DateTime
            if ($dt_atualizacao instanceof DateTime) {
                // Calcula a diferença em dias entre a data de atualização e a data atual
                $diferenca = $data_atual->diff($dt_atualizacao)->format('%a');

                if ($diferenca < 730.5) {
                    $status_cadastro = " é importante ressaltar que o cadastro está ATUALIZADO";
                } else {
                    $status_cadastro = " é importante ressaltar que o cadastro está DESATUALIZADO";
                }
            } else {
                // Lida com o erro de formato de data
                echo "Formato de data incorreto!";
            }
            if ($renba_media > 218) {
                $perfil = " Conforme o artigo 5° da lei 14.601 de 19 de junho de 2023, a família não se enquadra no perfil para o Programa Bolsa Família";
            } else {
                $perfil = " Conforme o artigo 5° da lei 14.601 de 19 de junho de 2023, a família se enquadra no perfil para o Programa Bolsa Família";
            }
            if ($sexo_pessoa_ == "1") {
                $sexo = " o Sr. ";
            } else {
                $sexo = " a Sra. ";
            }
            if ($sexo_pessoa_ == "1") {
                $sexoo = " filho de ";
            } else {
                $sexoo = " filha de ";
            }
            if ($sexo_pessoa_ == "1") {
                $sexooo = " inscrito ";
            } else {
                $sexooo = " inscrita ";
            }
            if ($renba_media > 218 && $sqli->rowCount() > 0) {
                $recebendo = ", mas segundo o art 6° da mesma lei a família está em Regra de Proteção.";
            } elseif ($renba_media < 219 && $sqli->rowCount() > 0) {
                $situacao = $dadosf['sitbeneficiario'];
                $recebendo = " e, está com benefício " . $situacao;
            } else {
                $recebendo = ".";
            }

            //Formatando o código familiar
            $cod_familiar_formatado = substr_replace(str_pad($cod_familiar, 11, "0", STR_PAD_LEFT), '-', 9, 0);

            //Formatando o nis
            $nis_responsavel = $dados["num_nis_pessoa_atual"];
            $nis_responsavel_formatado = substr_replace(str_pad($nis_responsavel, 11, "0", STR_PAD_LEFT), '-', 10, 0);

            //Formatando o CPF
            $cpf_table = $dados['num_cpf_pessoa'];
            $cpf_formatando = sprintf('%011s', $cpf_table);
            $cpf_formatado = substr($cpf_formatando, 0, 3) . '.' . substr($cpf_formatando, 3, 3) . '.' . substr($cpf_formatando, 6, 3) . '-' . substr($cpf_formatando, 9, 2);

            $nom_pessoa = $dados["nom_pessoa"];
            $nom_mae_rf = $dados["nom_completo_mae_pessoa"];
            echo "<ul>";
            echo "<li>CPF: ";
            echo $cpf_formatado . "</li><br>";
            echo "NIS: ";
            echo $nis_responsavel_formatado . "<br>";
            echo "Código Familiar: ";
            echo $cod_familiar_formatado . "<br>";
            echo "<li>Nome Completo: ";
            echo $nom_pessoa . "</li><br>";
            echo "Nome Completo da Mãe: ";
            echo $nom_mae_rf . "<br>";
            echo "Renda: R$ " . $real_br_formatado . "<br>";

            // Armazene a variável na sessão
            $_SESSION['dados_conferidos'] = array(
                'cpf_formatado' => $cpf_formatado,
                'nis_responsavel_formatado' => $nis_responsavel_formatado,
                'cod_familiar_formatado' => $cod_familiar_formatado,
                'nom_pessoa' => $nom_pessoa,
                'sexo' => $sexo,
                'nom_pessoa' => $nom_pessoa,
                'sexoo' => $sexoo,
                'nom_mae_rf' => $nom_mae_rf,
                'status_cadastro' => $status_cadastro,
                'real_br_formatado' => $real_br_formatado,
                'sexooo' => $sexooo,
                'perfil' => $perfil,
                'recebendo' => $recebendo,
                'data_formatada_at' => $data_formatada_at,
            );
            ?>
            </ul>
            <br><br><input type="submit" name="btn-ip1" value="Imprimir">
        <?php
} elseif ($sql->rowCount() > 0 && $sqli->rowCount() == 0) {
            echo "<h3>Confira se as informações estão corretas</h3>";

            $dados = $sql->fetch(PDO::FETCH_ASSOC);

            $cod_familiar = $dados["cod_familiar_fam"];
            $sexo_pessoa_ = $dados["cod_sexo_pessoa"];
            $nom_pessoa = $dados["nom_pessoa"];
            $nom_mae_rf = $dados["nom_completo_mae_pessoa"];
            $renba_media = $dados["vlr_renda_media_fam"];
            $dt_atualizacao = $dados['dat_atual_fam'];
            $renba_media = $dados["vlr_renda_media_fam"];

            $cpf_table = $dados['num_cpf_pessoa'];
            $cpf_formatando = sprintf('%011s', $cpf_table);
            $cpf_formatado = substr($cpf_formatando, 0, 3) . '.' . substr($cpf_formatando, 3, 3) . '.' . substr($cpf_formatando, 6, 3) . '-' . substr($cpf_formatando, 9, 2);

            $nis_responsavel = $dados["num_nis_pessoa_atual"];
            $nis_responsavel_formatado = substr_replace(str_pad($nis_responsavel, 11, "0", STR_PAD_LEFT), '-', 10, 0);

            $cod_familiar_formatado = substr_replace(str_pad($cod_familiar, 11, "0", STR_PAD_LEFT), '-', 9, 0);

            $timestampptbr = time();
            $data_formatada_at = strftime('%d de %B de %Y', $timestampptbr);
            $real_br_formatado = number_format($renba_media, 2, ',', '.');

            $dt_atualizacao = DateTime::createFromFormat('d/m/Y', $dt_atualizacao);
            $data_atual = new DateTime();

            if ($dt_atualizacao instanceof DateTime) {
                $diferenca = $data_atual->diff($dt_atualizacao)->format('%a');
                if ($diferenca < 730.5) {
                    $status_cadastro = "ATUALIZADO";
                } else {
                    $status_cadastro = "DESATUALIZADO";
                }
            } else {
                echo "Formato de data incorreto!";
            }
            if ($sexo_pessoa_ == "1") {
                $sexo = " o Sr. ";
            } else {
                $sexo = " a Sra. ";
            }
            if ($sexo_pessoa_ == "1") {
                $sexoo = " filho de ";
            } else {
                $sexoo = " filha de ";
            }
            if ($sexo_pessoa_ == "1") {
                $sexooo = " inscrito ";
            } else {
                $sexooo = " inscrita ";
            }
            if ($renba_media > 218) {
                $perfil = " Conforme o artigo 5° da lei 14.601 de 19 de junho de 2023, a família não se enquadra no perfil para o Programa Bolsa Família.";
            } else {
                $perfil = " Conforme o artigo 5° da lei 14.601 de 19 de junho de 2023, a família se enquadra no perfil para o Programa Bolsa Família";
            }

            echo "CPF: ";
            echo $cpf_formatado . "<br>";
            echo "NIS: ";
            echo $nis_responsavel_formatado . "<br>";
            echo "Código Familiar: ";
            echo $cod_familiar_formatado . "<br>";
            echo "Nome Completo: " . $sexo;
            echo $nom_pessoa . "<br>" . $sexoo;
            echo "Nome Completo da Mãe: ";
            echo $nom_mae_rf . "<br>";
            echo "Status: " . $status_cadastro . "<br>";
            echo "Renda: R$ " . $real_br_formatado . "<br>";
            echo $sexooo . "no Cadastro Único,";
            echo $perfil . "<br>";
            echo $data_formatada_at;

            // Armazene a variável na sessão
            $_SESSION['dados_conferidos'] = array(
                'cpf_formatado' => $cpf_formatado,
                'nis_responsavel_formatado' => $nis_responsavel_formatado,
                'cod_familiar_formatado' => $cod_familiar_formatado,
                'nom_pessoa' => $nom_pessoa,
                'sexo' => $sexo,
                'nom_pessoa' => $nom_pessoa,
                'sexoo' => $sexoo,
                'nom_mae_rf' => $nom_mae_rf,
                'status_cadastro' => $status_cadastro,
                'real_br_formatado' => $real_br_formatado,
                'sexooo' => $sexooo,
                'perfil' => $perfil,
                'data_formatada_at' => $data_formatada_at,
            );

            ?>
            <br><br><input type="submit" name="btn-ip2" value="Imprimir">
        </form>
        <?php
} else {
            ?>
        <form method="post" action="con_doc.php">
            <?php
echo "Não foi encontrado nenhum cadastro em nossa base de dados.<br>";

            $cpf_formatando = sprintf('%011s', $cpf_dec);
            $cpf_formatado = substr($cpf_formatando, 0, 3) . '.' . substr($cpf_formatando, 3, 3) . '.' . substr($cpf_formatando, 6, 3) . '-' . substr($cpf_formatando, 9, 2);

            ?>
            <label>CPF: <?php echo $cpf_formatado; ?></label><br>
            <label>Nome: </label>
            <input type="text" name="nome_dec" placeholder="Digite o nome completo"><br>
            <label>Nome da Mãe: </label>
            <input type="text" name="nome_mae_dec" placeholder="Digite o nome completo"><br>

            <label><input type="radio" name="gender" value="male">
                <span class="circle" style="background-color: dodgerblue;"></span> Homem</label>
            <label><input type="radio" name="gender" value="female">
                <span class="circle" style="background-color: hotpink;"></span> Mulher</label>

            <br><br><input type="submit" name="btn-ip5" value="Imprimir">
        </form>
        <?php
// Armazene a variável na sessão
            $_SESSION['dados_conferidos_s'] = array(
                'cpf_dec' => $cpf_dec,
            );
        }
    } elseif ($opcao == "nis_dec") {
        $nis_dec = $_POST['valorescolhido'];

        //dados da tabela com todos os cadastros
        $sql = $pdo->prepare("SELECT * FROM tbl_tudo WHERE num_nis_pessoa_atual = :nis_dec");
        $sql->execute(array(':nis_dec' => $nis_dec));
        //dados da tabela folha de pagamento
        $sqli = $pdo->prepare("SELECT * FROM folha_pag WHERE rf_nis = :nis_dec");
        $sqli->execute(array(':nis_dec' => $nis_dec));

        if ($sql->rowCount() > 0 && $sqli->rowCount() > 0) {
            echo "<h3>Confira se as informações estão corretas</h3>";

            $dados = $sql->fetch(PDO::FETCH_ASSOC);
            $dadosf = $sqli->fetch(PDO::FETCH_ASSOC);

            $renba_media = $dados["vlr_renda_media_fam"];

            // Formata o número como moeda brasileira
            $real_br_formatado = number_format($renba_media, 2, ',', '.');
            $cod_familiar = $dados["cod_familiar_fam"];
            $benef1 = $dadosf['pacto'];
            $sexo_pessoa_ = $dados["cod_sexo_pessoa"];
            $dt_atualizacao = $dados['dat_atual_fam'];

            //data criada com formato 'DD de mmmm de YYYY'
            $timestampptbr = time();
            $data_formatada_at = strftime('%d de %B de %Y', $timestampptbr);

            // Supondo que $dt_atualizacao é uma data válida
            $dt_atualizacao = DateTime::createFromFormat('d/m/Y', $dt_atualizacao);
            $data_atual = new DateTime(); // Obtém a data atual

            // Verificar se $dt_atualizacao é uma instância de DateTime
            if ($dt_atualizacao instanceof DateTime) {
                // Calcula a diferença em dias entre a data de atualização e a data atual
                $diferenca = $data_atual->diff($dt_atualizacao)->format('%a');

                if ($diferenca < 730.5) {
                    $status_cadastro = "ATUALIZADO";
                } else {
                    $status_cadastro = "DESATUALIZADO";
                }
            } else {
                // Lida com o erro de formato de data
                echo "Formato de data incorreto!";
            }
            if ($renba_media > 218) {
                $perfil = " Conforme o artigo 5° da lei 14.601 de 19 de junho de 2023, a família não se enquadra no perfil para o Programa Bolsa Família";
            } else {
                $perfil = " Conforme o artigo 5° da lei 14.601 de 19 de junho de 2023, a família se enquadra no perfil para o Programa Bolsa Família";
            }
            if ($sexo_pessoa_ == "1") {
                $sexo = " o Sr. ";
            } else {
                $sexo = " a Sra. ";
            }
            if ($sexo_pessoa_ == "1") {
                $sexoo = " filho de ";
            } else {
                $sexoo = " filha de ";
            }
            if ($sexo_pessoa_ == "1") {
                $sexooo = " inscrito ";
            } else {
                $sexooo = " inscrita ";
            }
            if ($renba_media > 218 && $sqli->rowCount() > 0) {
                $recebendo = ", mas segundo o art 6° da mesma lei a família está em Regra de Proteção.";
            } elseif ($renba_media < 219 && $sqli->rowCount() > 0) {
                $situacao = $dadosf['sitbeneficiario'];
                $recebendo = " e, está com benefício " . $situacao;
            } else {
                $recebendo = ".";
            }

            //Formatando o código familiar
            $cod_familiar_formatado = substr_replace(str_pad($cod_familiar, 11, "0", STR_PAD_LEFT), '-', 9, 0);

            //Formatando o nis
            $nis_responsavel = $dados["num_nis_pessoa_atual"];
            $nis_responsavel_formatado = substr_replace(str_pad($nis_responsavel, 11, "0", STR_PAD_LEFT), '-', 10, 0);

            //Formatando o CPF
            $cpf_table = $dados['num_cpf_pessoa'];
            $cpf_formatando = sprintf('%011s', $cpf_table);
            $cpf_formatado = substr($cpf_formatando, 0, 3) . '.' . substr($cpf_formatando, 3, 3) . '.' . substr($cpf_formatando, 6, 3) . '-' . substr($cpf_formatando, 9, 2);

            $nom_pessoa = $dados["nom_pessoa"];
            $nom_mae_rf = $dados["nom_completo_mae_pessoa"];

            echo "CPF: ";
            echo $cpf_formatado . "<br>";
            echo "NIS: ";
            echo $nis_responsavel_formatado . "<br>";
            echo "Código Familiar: ";
            echo $cod_familiar_formatado . "<br>";
            echo "Nome Completo: " . $sexo;
            echo $nom_pessoa . "<br>" . $sexoo;
            echo "Nome Completo da Mãe: ";
            echo $nom_mae_rf . "<br>";
            echo "Status: " . $status_cadastro . "<br>";
            echo "Renda: R$ " . $real_br_formatado . "<br>";
            echo $sexooo . "no Cadastro Único,";
            echo $perfil . $recebendo . "<br>";
            echo $data_formatada_at;

            // Armazene a variável na sessão
            $_SESSION['dados_conferidos'] = array(
                'cpf_formatado' => $cpf_formatado,
                'nis_responsavel_formatado' => $nis_responsavel_formatado,
                'cod_familiar_formatado' => $cod_familiar_formatado,
                'nom_pessoa' => $nom_pessoa,
                'sexo' => $sexo,
                'nom_pessoa' => $nom_pessoa,
                'sexoo' => $sexoo,
                'nom_mae_rf' => $nom_mae_rf,
                'status_cadastro' => $status_cadastro,
                'real_br_formatado' => $real_br_formatado,
                'sexooo' => $sexooo,
                'perfil' => $perfil,
                'recebendo' => $recebendo,
                'data_formatada_at' => $data_formatada_at,
            );

            ?>
        <br><br><input type="submit" name="btn-ip3" value="Imprimir">
        </form>
        <?php
} elseif ($sql->rowCount() > 0 && $sqli->rowCount() == 0) {
            echo "<h3>Confira se as informações estão corretas</h3>";

            $dados = $sql->fetch(PDO::FETCH_ASSOC);

            $cod_familiar = $dados["cod_familiar_fam"];
            $sexo_pessoa_ = $dados["cod_sexo_pessoa"];
            $nom_pessoa = $dados["nom_pessoa"];
            $nom_mae_rf = $dados["nom_completo_mae_pessoa"];
            $renba_media = $dados["vlr_renda_media_fam"];
            $dt_atualizacao = $dados['dat_atual_fam'];
            $renba_media = $dados["vlr_renda_media_fam"];

            $cpf_table = $dados['num_cpf_pessoa'];
            $cpf_formatando = sprintf('%011s', $cpf_table);
            $cpf_formatado = substr($cpf_formatando, 0, 3) . '.' . substr($cpf_formatando, 3, 3) . '.' . substr($cpf_formatando, 6, 3) . '-' . substr($cpf_formatando, 9, 2);

            $nis_responsavel = $dados["num_nis_pessoa_atual"];
            $nis_responsavel_formatado = substr_replace(str_pad($nis_responsavel, 11, "0", STR_PAD_LEFT), '-', 10, 0);

            $cod_familiar_formatado = substr_replace(str_pad($cod_familiar, 11, "0", STR_PAD_LEFT), '-', 9, 0);

            $timestampptbr = time();
            $data_formatada_at = strftime('%d de %B de %Y', $timestampptbr);
            $real_br_formatado = number_format($renba_media, 2, ',', '.');

            $dt_atualizacao = DateTime::createFromFormat('d/m/Y', $dt_atualizacao);
            $data_atual = new DateTime();

            if ($dt_atualizacao instanceof DateTime) {
                $diferenca = $data_atual->diff($dt_atualizacao)->format('%a');
                if ($diferenca < 730.5) {
                    $status_cadastro = "ATUALIZADO";
                } else {
                    $status_cadastro = "DESATUALIZADO";
                }
            } else {
                echo "Formato de data incorreto!";
            }
            if ($sexo_pessoa_ == "1") {
                $sexo = " o Sr. ";
            } else {
                $sexo = " a Sra. ";
            }
            if ($sexo_pessoa_ == "1") {
                $sexoo = " filho de ";
            } else {
                $sexoo = " filha de ";
            }
            if ($sexo_pessoa_ == "1") {
                $sexooo = " inscrito ";
            } else {
                $sexooo = " inscrita ";
            }
            if ($renba_media > 218) {
                $perfil = " Conforme o artigo 5° da lei 14.601 de 19 de junho de 2023, a família não se enquadra no perfil para o Programa Bolsa Família.";
            } else {
                $perfil = " Conforme o artigo 5° da lei 14.601 de 19 de junho de 2023, a família se enquadra no perfil para o Programa Bolsa Família";
            }

            //if($renba_media > 218 && $sqli->rowCount() > 0)
            echo "CPF: ";
            echo $cpf_formatado . "<br>";
            echo "NIS: ";
            echo $nis_responsavel_formatado . "<br>";
            echo "Código Familiar: ";
            echo $cod_familiar_formatado . "<br>";
            echo "Nome Completo: ";
            echo $nom_pessoa . "<br>";
            echo "Nome Completo da Mãe: ";
            echo $nom_mae_rf . "<br>";
            echo "Status: " . $status_cadastro . "<br>";
            echo "Renda: R$ " . $real_br_formatado . "<br>";
            echo $data_formatada_at;

            // Armazene a variável na sessão
            $_SESSION['dados_conferidos'] = array(
                'cpf_formatado' => $cpf_formatado,
                'nis_responsavel_formatado' => $nis_responsavel_formatado,
                'cod_familiar_formatado' => $cod_familiar_formatado,
                'nom_pessoa' => $nom_pessoa,
                'sexo' => $sexo,
                'nom_pessoa' => $nom_pessoa,
                'sexoo' => $sexoo,
                'nom_mae_rf' => $nom_mae_rf,
                'status_cadastro' => $status_cadastro,
                'real_br_formatado' => $real_br_formatado,
                'sexooo' => $sexooo,
                'perfil' => $perfil,
                'data_formatada_at' => $data_formatada_at,
            );

            ?>
        <form>

            <br><br><input type="submit" name="btn-ip4" value="Imprimir">
        </form>
        <?php
} else {
            ?>
        <form method="post" action="con_doc_s.php">
            <?php
echo "Não foi encontrado nenhum cadastro em nossa base de dados.<br>";

        }
    }
} else {
    echo "Não foi encontrado nenhum cadastro em nossa base de dados.";
}
?>
        </form>
    </body>
    </html>