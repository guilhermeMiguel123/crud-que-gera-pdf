<?php
// Incluir a biblioteca FPDF
require('fpdf/fpdf186/fpdf.php');

// Conexão com o banco de dados
include 'db.php';

// Verifica se o ID foi passado pela URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Consulta para obter os dados da pessoa selecionada
    $query = $pdo->prepare("SELECT * FROM pessoas WHERE id = ?");
    $query->execute([$id]);
    $pessoa = $query->fetch(PDO::FETCH_ASSOC);

    if ($pessoa) {
        // Criar o objeto FPDF
        $pdf = new FPDF();
        $pdf->AddPage();

        // Definir a fonte para o título
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->SetTextColor(0, 0, 128); // Cor azul para o título
        $pdf->Cell(200, 10, 'Relatorio de Pessoa', 0, 1, 'C');
        $pdf->Ln(10);  // Adiciona uma linha em branco

        // Estilizando os dados da tabela
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->SetTextColor(255, 255, 255); // Cor branca para o cabeçalho
        $pdf->SetFillColor(0, 0, 128); // Cor de fundo azul para o cabeçalho

        // Cabeçalho da tabela
        $pdf->Cell(60, 10, 'Nome', 1, 0, 'C', true);
        $pdf->Cell(50, 10, 'CPF', 1, 0, 'C', true);
        $pdf->Cell(50, 10, 'Telefone', 1, 1, 'C', true);

        // Definir a fonte para os dados
        $pdf->SetFont('Arial', '', 12);
        $pdf->SetTextColor(0, 0, 0); // Cor preta para os dados

        // Preencher os dados da tabela (somente um registro)
        $pdf->Cell(60, 10, $pessoa['nome'], 1);
        $pdf->Cell(50, 10, $pessoa['cpf'], 1);
        $pdf->Cell(50, 10, $pessoa['telefone'], 1);
        $pdf->Ln(10);

        // Adicionar uma linha de separação
        $pdf->SetLineWidth(0.5);
        $pdf->Line(10, $pdf->GetY(), 200, $pdf->GetY());
        $pdf->Ln(5);

        // Adicionar o rodapé com a assinatura como imagem
        $pdf->SetY(-40);  // Posiciona o cursor 40mm do final da página

        // Defina o caminho da imagem da assinatura (ajuste o caminho para o arquivo da assinatura no seu projeto)
        $assinaturaImagem = 'assinado.png';  // Ajuste conforme o local real da imagem

        // Verifique se o arquivo da imagem existe
        if (file_exists($assinaturaImagem)) {
            // Adicionar a imagem da assinatura
            $pdf->Image($assinaturaImagem, 50, -30, 100);  // Ajuste a posição conforme necessário
        } else {
            $pdf->Cell(0, 10, 'Imagem de assinatura não encontrada', 0, 1, 'C');
        }

        // Saída do PDF para visualização no navegador
        // O 'I' faz com que o PDF seja exibido no navegador
        $pdf->Output('I', 'relatorio_pessoa_'. $pessoa['id'] .'.pdf');
    } else {
        echo "Pessoa não encontrada!";
    }
} else {
    echo "ID não especificado!";
}
?>
