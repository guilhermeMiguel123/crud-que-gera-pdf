<?php
include 'db.php';

$id = $_POST['id'];
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$telefone = $_POST['telefone'];

if ($id) {
    $stmt = $pdo->prepare("UPDATE pessoas SET nome = ?, cpf = ?, telefone = ? WHERE id = ?");
    $stmt->execute([$nome, $cpf, $telefone, $id]);
}

header("Location: index.php");
exit;
