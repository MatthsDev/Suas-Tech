<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/sessao.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech-Suas - Atendimento</title>
    <!-- Inclua o jQuery antes de qualquer outro script que dependa dele -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="/Suas-Tech/cadunico/css/atend/style_tela.css">

</head>

<body>
    <div class="img">
        <h1 class="titulo-com-imagem">
            <img class="titulo-com-imagem" src="../img/h1-atendimento.svg" alt="Titulocomimagem">
        </h1>
    </div>
<div class="container">
    <div class="barramedia">

        <div id="listar"></div>

        <div id="listar_ultimas"></div>

    </div>
    <div class="yt">
        <div id="player"></div>
    </div>
</div>


    <script src="/Suas-Tech/cadunico/views/atendimento/js/custom.js"></script>

    <!--AJAX PARA LISTAR OS DADOS -->
    <script type="text/javascript">
        $(document).ready(function () {
            // Função para obter as últimas senhas e atualizar dinamicamente a lista
            function obterUltimasSenhas() {
                $.ajax({
                    url: "/Suas-Tech/cadunico/views/atendimento/ajax/listar_tela.php",
                    method: "post",
                    dataType: "html",
                    success: function (result) {
                        $('#listar').html(result);
                    },
                });
            }

            // Chamar a função para obter as últimas senhas ao carregar a página
            obterUltimasSenhas();

            // Atualizar a lista a cada 1 segundo (1000 milissegundos)
            setInterval(obterUltimasSenhas, 1000);
        });
    </script>

    <!--AJAX PARA LISTAR OS DADOS -->
    <script type="text/javascript">
        $(document).ready(function () {
            // Função para obter as últimas senhas e atualizar dinamicamente a lista
            function obterUltimasSenhas() {
                $.ajax({
                    url: "/Suas-Tech/cadunico/views/atendimento/ajax/listar_ultimas.php",
                    method: "post",
                    dataType: "html",
                    success: function (result) {
                        $('#listar_ultimas').html(result);
                    },
                });
            }

            // Chamar a função para obter as últimas senhas ao carregar a página
            obterUltimasSenhas();

            // Atualizar a lista a cada 1 segundo (1000 milissegundos)
            setInterval(obterUltimasSenhas, 1000);
        });
    </script>
<script>
// IDs dos seus vídeos do YouTube
var videoIds = ['k2PpvT9MzkY', 'EQGtKQQX0ho'];

// Carregar a API do YouTube
var tag = document.createElement('script');
tag.src = 'https://www.youtube.com/iframe_api';
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

// Variável para armazenar o objeto do player
var player;

// Função chamada quando a API do YouTube estiver pronta
function onYouTubeIframeAPIReady() {
    player = new YT.Player('player', {
        height: '315',
        width: '560',
        playerVars: {
            'autoplay': 1,  // Iniciar a reprodução automática
            'controls': 0,  // Ocultar os controles do player
            'showinfo': 0,  // Ocultar informações do vídeo
            'rel': 0       // Desativar vídeos sugeridos ao final
        },
        events: {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange
        }
    });
}

// Função chamada quando o player estiver pronto
function onPlayerReady(event) {
    // Iniciar a reprodução do primeiro vídeo
    event.target.loadVideoById(videoIds[0]);
    event.target.setVolume(20);
}

// Função chamada quando o estado do player for alterado
function onPlayerStateChange(event) {
    // Verificar se o vídeo atual chegou ao fim
    if (event.data === YT.PlayerState.ENDED) {
        // Reproduzir o próximo vídeo na sequência
        playNextVideo();
        event.target.setVolume(20);
    }
}

// Função para reproduzir o próximo vídeo na sequência
function playNextVideo() {
    var currentIndex = videoIds.indexOf(player.getVideoData().video_id);
    var nextIndex = (currentIndex + 1) % videoIds.length;
    player.loadVideoById(videoIds[nextIndex]);
}

</script>
</body>

</html>