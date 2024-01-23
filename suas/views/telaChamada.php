<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="teste_atende/style_atend.css" />
    <link rel="shortcut icon" href="../../cadunico/img/logo.png" type="image/x-icon">
    <script src="../../js/scriptTelaChamada.js"></script>
    <script src="script_chamar.js"></script>
    <title>Tela de Chamadas</title>
</head>
<body>

<p id="mostrar_senha"></p>
<p id="mostrar_nome"></p>
<p id="amostra"></p>

<div id="player" style="padding: right"></div>


<script>
// IDs dos seus vídeos do YouTube
var videoIds = ['M1pFmh8PQqY', 'ONh5m1qH8dg', 'S4I9wO6fD4I', 'y_bwKW6V1lw', 'PX3A7GLtFqM'];

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
