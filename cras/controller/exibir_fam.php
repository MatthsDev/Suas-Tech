<?php
// Incluir o arquivo de conexão com o banco de dados
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';

// Verificar se o formulário foi submetido
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar se o campo de busca foi preenchido
    if (isset($_POST['codigo_busca'])) {
        $codigoBusca = $_POST['codigo_busca'];

        // Consultar o banco de dados para obter informações da família
        $stmt = $pdo->prepare("SELECT * FROM cras WHERE cod_familiar_fam = ?");
        $stmt->execute([$codigoBusca]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($result) {
            // Exibir os resultados formatados
            echo '<table class="table table-sm mt-3">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">NIS</th>
                            <th scope="col">Parentesco</th>
                            
                        </tr>
                    </thead>
                    <tbody>';

            foreach ($result as $row) {
                echo '<tr>
                        <td>' . $row['nome'] . '</td>
                        <td>' . $row['nis'] . '</td>
                        <td>' . $row['data_nasc'] . '</td>
                    </tr>';
            }

            echo '</tbody></table>';
        } else {
            echo "<p>Nenhuma família encontrada para o código $codigoBusca.</p>";
        }

        // Fechar a conexão PDO
        $pdo = null;
    } else {
        echo "<p>O campo de busca não foi preenchido.</p>";
    }
}
?>
