<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech-Suas</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
</head>

<body>
    <h1>CADASTRO BOM-PRATO</h1>
    <form id="formUsuario" action="/Suas-Tech/conzinha_comunitaria/controller/user_control.php" method="POST">
        <label for="cpf">CPF:</label>
        <input type="text" id="cpf" name="cpf" maxlength="14" placeholder="Digite o CPF">

        <br>
        <br>

        <label for="nome">NOME:  </label>
        <input type="text" id="nome" name="nome">

        <br>
        <br>

        <label for="bairro">BAIRRO: </label>
        <input type="text" id="bairro" name="bairro">

        <br>
        <br>

        <label for="log">LOGRADOURO: </label>
        <input type="text" id="log" name="log">

        <br>
        <br>

        <label for="numero">NUMERO: </label>
        <input type="text" id="numero" name="numero">
    </form>

    <script>
        $(document).ready(function () {
            $('#cpf').on('input', function () {
                verificarUsuario();
            });
        });

        function verificarUsuario() {
            var cpf = $('#cpf').val();

            $.ajax({
                url: 'busca_user.php',
                method: 'POST',
                data: { cpf: cpf },
                dataType: 'json',
                success: function (data) {
                    if (data.existeUsuario) {
                        $('#nome').val(data.nome);
                        $('#bairro').val(data.bairro);
                        $('#log').val(data.log);
                        $('#numero').val(data.numero);
                    } else {
                        $('#nome').val('');
                        $('#bairro').val('');
                        $('#log').val('');
                        $('#numero').val('');
                    }
                },
                error: function (xhr, status, error) {
                    console.error("Erro na requisição AJAX:", status, error);
                }
            });
        }
    </script>
</body>

</html>
