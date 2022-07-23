<?php

/**
 * Inclui o arquivo que faz conexão com o MySQL:
 */
require('db.php');

$res = $conn->query("SELECT * FROM produtos");

$listagem = <<<HTML

<table>
    <tr>
        <th>id</td>
        <th>isbn</td>
        <th>titulo</td>
        <th>autor</td>
        <th>preco</td>
        <th>local</td>
    </tr>

HTML;

while ($produto = $res->fetch_assoc()) {

    $listagem .= <<<HTML

    <tr>
        <td>{$produto['id']}</td>
        <td>{$produto['isbn']}</td>
        <td>{$produto['titulo']}</td>
        <td>{$produto['autor']}</td>
        <td>{$produto['preco']}</td>
        <td>{$produto['local']}</td>
    </tr>

HTML;

}

$listagem .= "</table>";

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>READ</title>
</head>

<body>

    <h1>Livretto</h1><small>Sua pior livraria fake</small>
    <hr>
    <a href="create.php">Cadastrar produto</a> &nbsp;|&nbsp;
    <a href="read.php">Todos os produtos</a>
    <hr>
    <?php echo $listagem ?>

</body>

</html>