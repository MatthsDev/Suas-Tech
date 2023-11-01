<?php

//referenciando o namespace Dompdf
use Dompdf\Dompdf;

//carregar o Composer
require '../../lib/vendor/autoload.php';

include("../../config/conexao.php");
        $data_atual = date('d, m, Y');
        $ano_atual = date('Y');
    //PEGANDO OS DADOS DO FORMULÁRIO
    // Verifique se o array da sessão existe e obtenha os valores dele
    session_start();
    
    if (isset($_SESSION['dados_conferidos'])) {
        $dados_conferidos = $_SESSION['dados_conferidos'];
        $numero_parecer = $dados_conferidos['numero_parecer'];
        $cod_familiar = $dados_conferidos['cod_familiar'];
        $nom_pessoa = $dados_conferidos['nom_pessoa'];
        $texto_parecer = $dados_conferidos['texto_parecer'];
        $nis_responsavel_formatado = $dados_conferidos['nis_rf'];
        $data_formatada = $dados_conferidos['data_formatada'];
        $endereco_conpleto = $dados_conferidos['endereco_conpleto'];
        $sexo = $dados_conferidos['sexo'];
        $nom_mae_rf = $dados_conferidos['nom_mae_rf'];
        $sexo1 = $dados_conferidos['sexo1'];
        $acao = $dados_conferidos['acao'];
        $parecer_tec = $dados_conferidos['parecer_tec'];
        $data_formatada_at = $dados_conferidos['data_formatada_at'];
        $cpf_formatado = $dados_conferidos['cpf_formatado'];

        }else{
            echo "ERRO no armazenamento dos dados.";
        }


    $smtp = $conn->prepare("INSERT INTO historico_parecer_visita (numero_parecer, cod_familiar, nome, restante, data_atual) VALUES (?,?,?,?,?)");
    $smtp->bind_param("sssss", $numero_parecer, $cod_familiar, $nom_pessoa, $texto_parecer, $data_atual);

    $cod_familiar_formatado = substr_replace(str_pad($cod_familiar, 11, "0", STR_PAD_LEFT), '-', 9, 0);
        if($smtp->execute()){
        
        } else {
            echo "ERRO no envio dos DADOS: " . $smtp->error;
        }
        $smtp->close();
        $conn->close();
        
        // Conteúdo do SVG
        $svg_pacth = '../../img/timbre.svg';
        $svg = file_get_contents($svg_pacth);
            //'<svg width="100" height="100" xmlns="http://www.w3.org/2000/svg"><circle cx="50" cy="50" r="40" stroke="black" stroke-width="3" fill="red" /></svg>';
    //receber os dados do formulário
    $dados_post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
// Verifique se o arquivo foi lido com sucesso
            if ($svg !== false) {
                $conteudo_pdf = "<!DOCTYPE html>";
                $conteudo_pdf .= "<html lang='pt-br'>";
                $conteudo_pdf .= "<head>";
                $conteudo_pdf .= "<meta charset='UTF-8'>";
                $conteudo_pdf .= "<style>";
                $conteudo_pdf .= "body { font-family: DejaVu Sans;}";
                $conteudo_pdf .= "</style>";
                $conteudo_pdf .= "</head>";
                $conteudo_pdf .= "<body>";
                $conteudo_pdf .= "<background-image src='data:image/svg+xml;base64," . base64_encode($svg) . "width='100%' height='100%' alt='Descrição da imagem'>";
                $conteudo_pdf .= "<h1>PARECER TÉCNICO DE VISITA DOMICILIAR</h1><br>";
                $conteudo_pdf .= "Parecer: " . $numero_parecer . "/" . $ano_atual . "<br>";
                $conteudo_pdf .= "<br><br><label>CÓDIGO FAMILIAR: </label>" . $cod_familiar_formatado . "<br>";
                $conteudo_pdf .= "<label>NIS do Responsável pela(o) Unidade Familiar (RUF): </label>" . $nis_responsavel_formatado;
                $conteudo_pdf .= "<br><p style='text-align:justify; text-indent: 50px;'>De acordo com o art. 18 da PORTARIA N° 177, DE 16 DE JUNHO DE 2011 DO MINISTÉRIO DE ESTADO DO DESENVOLVIMENTO SOCIAL E COMBATE À FOME, o município apenas efetuará a exclusão lógica do cadastro da família da base do CadÚnico quando ocorrer *falecimento de toda a família, *recusa da família em prestar informações, *omissões ou prestação de informações inverídicas pela família, *solicitação da família, *decisão judicial ou *não localização da família para atualização ou revisão cadastral, por período igual ou superior a quatro anos contados da inclusão ou da última atualização cadastral.</p>";
                $conteudo_pdf .= "<p style='text-align:justify; text-indent: 50px;'>Foi realizado no dia " . $data_formatada . ", no endereço " . $endereco_conpleto . " declarado por " . $nom_pessoa . ", CPF: " . $cpf_formatado . ", " . $sexo . " " . $nom_mae_rf . ", mas " . $sexo1 . " " . $acao . ". Em busca ativa obteve a seguinte informação " . $parecer_tec . "</p>";
                $conteudo_pdf .= "<br><br><p style='text-align:right;'>São Bento do Una - PE, " . $data_formatada_at . ".</p>";
                $conteudo_pdf .= "<br><p style='text-align:center;'>_____________________________________________________________________________<br> ENTREVISTADOR DO CADASTRO ÚNICO</p><br>";
                $conteudo_pdf .= "<br><p style='text-align:center;'>_____________________________________________________________________________<br> COORDENAÇÃO CADASTRO ÚNICO E BOLSA FAMÍLIA</p>";
                $conteudo_pdf .= "</body>";
                $conteudo_pdf .= "</html>";

                //instanciar e usar a classe dompdf
                $dompdf = new Dompdf();
                $dompdf->loadHtml($conteudo_pdf);
                //(Opcional) Configurar o tamanho e a orientação do papel
                $dompdf->setPaper('A4', 'portrait');
                //Renderize o HTML como PDF
                $dompdf->render();
                //Gerar PDF 
                $dompdf->stream();
        //}else{
            //header("Location: buscarvisita.html");
        //}

            // Redireciona para a página registrar.html após 3 segundos
            echo '<script> setTimeout(function(){ window.location.href = "../../views/buscarvisita.html"; }, 3000); </script>';
        }else{
            echo 'Falha ao ler o arquivo SVG.';
        }
?>
