<?php
include "../../../config/conexao.php";
session_start(); // Inicie a sessão para acessar as variáveis de sessão

// Verifique o nível do usuário
if (isset($_SESSION['nivel_usuario']) && $_SESSION['nivel_usuario'] === 'admin') {
    // O usuário é um administrador.
    $voltar_link = '../../painel-adm/adm-view.php';
} elseif (isset($_SESSION['nivel_usuario']) && $_SESSION['nivel_usuario'] === 'usuario') {
    // O usuário é um usuário comum.
    $voltar_link = '../../painel-usuario/user-painel.php';
} else {
    // Redirecionar para a página de login ou exibir uma mensagem de erro, pois o nível do usuário não está definido.
    $voltar_link = '../../index.php'; // Altere o link para a página de login
}
// Verifica se o usuário está autenticado como admin ou usuário
if (!isset($_SESSION['nome_usuario']) || ($_SESSION['nivel_usuario'] != 'admin' && $_SESSION['nivel_usuario'] != 'usuario')) {
  header("location:../../index.php");
  exit; // Encerra o script após redirecionar
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechSUAS - Visitas</title>
    <link rel="stylesheet" href="../../css/visitas.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="website icon" type="png" href="../../img/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  </head>
  <body>
    <nav>
      <div class="img">
        <h1 class="titulo-com-imagem">
          <img src="../../img/h1-vistas.svg" alt="Titulocomimagem">
        </h1>
      </div>
      <div class="container">
        <div class="btns">
          <div class="buscarvisitas">
            <button class="menu-button" onclick="location.href='buscarvisita.php';">
              <span class="material-symbols-outlined">
                manage_search
              </span>
              Buscar visitas realizadas
            </button>
          </div>
          <div class="visitas_n">
            <button class="menu-button" onclick="location.href='#';">
              <span class="material-symbols-outlined">
                person_search
              </span>
              Visitas não realizadas
            </button>
          </div>

          <div class="parecer">
            <button class="menu-button" onclick="location.href='registrar.php';">
              <span class="material-symbols-outlined">
                forum
              </span>
              Registrar
            </button>
          </div>

          <div class="voltar">
            <button class="menu-button" onclick="location.href='<?php echo $voltar_link;?>';">
              <span class="fas fa-arrow-left">
              </span>
              Voltar ao menu
            </button>
          </div>
        </div>
        <div class="grafico">
          <canvas id="graficoPizza"></canvas>
        </div>
      </div>
    </nav>
    <?php
//dados totais dos registros de visitas
$sqlr = "SELECT COUNT(*) as total_visitas FROM visitas_feitas";
$result = $pdo->query($sqlr);
$row = $result->fetch(PDO::FETCH_ASSOC);
$totalRegistros = $row['total_visitas'];
$numero_parecer = $totalRegistros;

$sql = "SELECT COUNT(*) as total_fazer FROM tbl_tudo";
?>
    <script>
    // Dados para o gráfico de pizza
    var volaroe = <?php echo $totalRegistros; ?>;
    var data = {
        labels: ['Visitas realizadas', 'Visitas não realizadas'],
        datasets: [{
            data: [volaroe, 100 - volaroe],
            backgroundColor: ['#13294b', '#065f33']
        }]
    };
      // Opções do gráfico (pode ser personalizado conforme necessário)
      var options = {
        responsive: true
      };
      // Crie o gráfico de pizza
      var ctx = document.getElementById('graficoPizza').getContext('2d');
      var myPieChart = new Chart(ctx, {
        type: 'pie',
        data: data,
        options: options
      });
    </script>
  </body>
</html>
