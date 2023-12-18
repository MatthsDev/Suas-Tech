<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Famílias</title>
    <!-- Inclua o jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>

    <!-- Formulário HTML -->
    <form id="consultaForm">
        <label for="codigo_busca">Buscar Famílias por Código:</label>
        <input type="text" id="codigo_busca" name="codigo_busca" required>
        <button type="button" onclick="consultarFamilias()">Buscar</button>
    </form>

    <!-- Área para exibir o resultado -->
    <div id="resultado"></div>

    <!-- Script AJAX -->
    <script>
        function consultarFamilias() {
            var codigoBusca = $("#codigo_busca").val();

            // Fazer a requisição AJAX
            $.ajax({
                type: "POST",
                url: "../controller/exibir_fam.php", // Arquivo PHP que fará a consulta
                data: { codigo_busca: codigoBusca },
                success: function (response) {
                    $("#resultado").html(response);
                },
                error: function () {
                    $("#resultado").html("Erro ao fazer a requisição AJAX.");
                }
            });
        }
    </script>

</body>

</html>
