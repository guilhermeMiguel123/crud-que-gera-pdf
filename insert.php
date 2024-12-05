<?php
include 'db.php';
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$telefone = $_POST['telefone'];

$stmt = $pdo->prepare("INSERT INTO pessoas (nome, cpf, telefone) VALUES (?, ?, ?)");
$stmt->execute([$nome, $cpf, $telefone]);
header("Location: index.php");
