<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech-Suas</title>
    <!-- Inclua o jQuery antes de qualquer outro script que dependa dele -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>
    <a href="index.php"></a>
    <div id="listar"></div>
    <script src="../../js/custom.js"></script>

    <!--AJAX PARA LISTAR OS DADOS -->
    <script type="text/javascript">
        $(document).ready(function () {
            // Função para obter as últimas senhas e atualizar dinamicamente a lista
            function obterUltimasSenhas() {
                $.ajax({
                    url: "ajax/listar_tela.php",
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

</body>

</html>