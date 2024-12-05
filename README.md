Manual para Rodar o Projeto "CRUD com PDF em PHP"
1. Pré-Requisitos
Antes de começar, seu amigo precisa ter algumas ferramentas instaladas no computador:

PHP (se já não estiver instalado).
MySQL (ou qualquer banco de dados que preferir usar).
Servidor Web (pode ser o XAMPP, WAMP, ou apenas PHP embutido).
Biblioteca FPDF (para gerar PDFs).
Editor de Código (como Visual Studio Code, Sublime Text, ou qualquer editor de preferência).
2. Instalando o PHP e o Servidor Web
Usando XAMPP (recomendado para iniciantes):
Baixar e instalar o XAMPP:

Acesse o site do XAMPP e baixe a versão para o seu sistema operacional (Windows, Linux ou macOS).
Durante a instalação, escolha os componentes Apache e MySQL.
Após a instalação, abra o XAMPP Control Panel e inicie os serviços Apache e MySQL.
Verificar a instalação:

Abra o navegador e digite http://localhost/. Se a página de boas-vindas do XAMPP aparecer, a instalação foi bem-sucedida.
Usando o PHP Embutido (se preferir não usar XAMPP):
Instalar o PHP:

Acesse o site oficial do PHP e baixe a versão mais recente.
Extraia os arquivos para uma pasta no seu computador (exemplo: C:\php).
Verificar a instalação:

Abra o prompt de comando (CMD) e digite php -v. Isso deverá exibir a versão do PHP instalada.
Rodar o servidor PHP:

Abra o prompt de comando e vá até a pasta onde está o seu projeto (exemplo: cd C:\caminho\para\seu\projeto).
Execute o comando: php -S localhost:8000.
Isso vai iniciar um servidor embutido em PHP na porta 8000. Agora, você pode acessar o projeto pelo navegador em http://localhost:8000.
3. Instalar e Configurar o Banco de Dados
Instalar o MySQL:

Se você não está usando o XAMPP (que já vem com MySQL), baixe o MySQL Community Server e instale-o.
Acessar o MySQL:

Caso esteja usando o XAMPP, abra o phpMyAdmin em http://localhost/phpmyadmin/.
Se você não estiver usando o XAMPP, acesse o MySQL via terminal com o comando:
css
Copiar código
mysql -u root -p
Criar o Banco de Dados:

No phpMyAdmin, crie um banco de dados chamado crud_com_pdf_em_php.
Se estiver no terminal MySQL, use o seguinte comando:
sql
Copiar código
CREATE DATABASE crud_com_pdf_em_php;
Criar a Tabela:

Com o banco de dados criado, crie a tabela para armazenar os dados das pessoas (nome, CPF, telefone):
sql
Copiar código
USE crud_com_pdf_em_php;

CREATE TABLE pessoas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    cpf VARCHAR(14) NOT NULL,
    telefone VARCHAR(15) NOT NULL
);
4. Baixar e Instalar a Biblioteca FPDF
Baixar a FPDF:

Vá até o site oficial do FPDF e baixe a versão mais recente (o arquivo ZIP).
Instalar a FPDF:

Extraia o conteúdo do arquivo ZIP em uma pasta chamada fpdf dentro do seu projeto.
O caminho deve ser algo como: seu_projeto/fpdf/.
5. Configurar o Projeto
Baixar o Projeto:

Caso seu amigo já tenha o código, basta baixar ou clonar o repositório onde está o projeto.
Configuração do Banco de Dados no Projeto:

Abra o arquivo db.php e configure as credenciais do banco de dados:
php
Copiar código
<?php
$host = 'localhost';
$db   = 'crud_com_pdf_em_php';
$user = 'root';  // ou o usuário do seu MySQL
$pass = '';      // se você não tiver senha, deixe vazio
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>
6. Executando o Projeto
Abrir o Projeto no Navegador:

Se você estiver usando o XAMPP, coloque o projeto na pasta htdocs (por padrão em C:\xampp\htdocs\).
Caso esteja usando o PHP embutido, basta acessar http://localhost:8000 no navegador.
Adicionar Dados:

Acesse form.php e adicione pessoas ao banco de dados.
Gerar o PDF:

Na página principal (index.php), você verá a lista de pessoas.
Clique em "Gerar PDF" ao lado de qualquer pessoa para gerar o PDF com os dados dessa pessoa.
7. Resumo de Comandos e Arquivos
Comandos importantes no MySQL:
Para acessar o MySQL no terminal:

bash
Copiar código
mysql -u root -p
Para criar o banco de dados:

sql
Copiar código
CREATE DATABASE crud_com_pdf_em_php;
Para usar o banco de dados:

sql
Copiar código
USE crud_com_pdf_em_php;
Arquivos principais:
db.php - Configuração de conexão com o banco de dados.
index.php - Página principal que lista as pessoas.
form.php - Página para adicionar novas pessoas.
generate_pdf.php - Gera o PDF com os dados de uma pessoa.
