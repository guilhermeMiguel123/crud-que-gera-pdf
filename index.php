<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'db.php'; 

$query = $pdo->query("SELECT * FROM pessoas");
$registros = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>CRUD Simples</title>
</head>
<body>
    <h1>Listagem de Pessoas</h1>
    <a href="form.php">Adicionar Pessoa</a>
    <table border="1">
        <tr>
            <th>Nome</th>
            <th>CPF</th>
            <th>Telefone</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($registros as $registro): ?>
            <tr>
                <td><?= htmlspecialchars($registro['nome']) ?></td>
                <td><?= htmlspecialchars($registro['cpf']) ?></td>
                <td><?= htmlspecialchars($registro['telefone']) ?></td>
                <td>
                    <!-- Link para gerar o PDF da pessoa específica -->
                    <a href="generate_pdf.php?id=<?= $registro['id'] ?>" target="_blank">Gerar PDF</a>
                    <a href="form.php?id=<?= $registro['id'] ?>">Editar</a>
                    <a href="delete.php?id=<?= $registro['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir este registro?')">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
