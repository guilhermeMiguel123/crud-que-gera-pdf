<?php
$host = 'localhost';
$dbname = 'crud_com_pdf_em_php';  
$user = 'root';                   
$password = 'cherry';                   

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}
?>
