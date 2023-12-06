<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech-Suas</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="js/cpfvalid.js"></script>
</head>
<body>
    <form action="/Suas-Tech/conzinha_comunitaria/controller/user_control.php" method="POST">
        <label>INFORME O CPF DO USUARIO: </label>
        <input type="text" id="cpf" name="cpf" placeholder="Digite o CPF para consultar..." onblur="validarCPF(this)">
    </form>
</body>
</html>