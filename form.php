<?php
include 'db.php';
$nome = $cpf = $telefone = '';
$id = $_GET['id'] ?? null;

if ($id) {
    $stmt = $pdo->prepare("SELECT * FROM pessoas WHERE id = ?");
    $stmt->execute([$id]);
    $pessoa = $stmt->fetch(PDO::FETCH_ASSOC);
    $nome = $pessoa['nome'];
    $cpf = $pessoa['cpf'];
    $telefone = $pessoa['telefone'];
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Formulário</title>
</head>
<body>
    <h1><?= $id ? 'Editar' : 'Adicionar' ?> Pessoa</h1>
    <form action="<?= $id ? 'update.php' : 'insert.php' ?>" method="POST">
        <input type="hidden" name="id" value="<?= $id ?>">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" value="<?= $nome ?>" required><br>
        <label for="cpf">CPF:</label>
        <input type="text" name="cpf" value="<?= $cpf ?>" required><br>
        <label for="telefone">Telefone:</label>
        <input type="text" name="telefone" value="<?= $telefone ?>" required><br>
        <button type="submit">Salvar</button>
    </form>
</body>
</html>
