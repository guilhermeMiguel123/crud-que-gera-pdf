# CRUD com PDF em PHP

Este projeto implementa um **CRUD simples** em PHP, onde é possível adicionar, editar, excluir e listar pessoas com seus dados (nome, CPF e telefone). O projeto também gera um **PDF** com os dados de cada pessoa de forma individual.

---

## Pré-Requisitos

Antes de rodar o projeto, verifique se você tem as seguintes ferramentas instaladas:

1. **PHP** (versão 7.2 ou superior).
2. **MySQL** (ou qualquer banco de dados de sua preferência).
3. **Servidor Web**:
   - **XAMPP** (recomendado para iniciantes) ou
   - **PHP embutido** (caso prefira configurar manualmente).
4. **Biblioteca FPDF** (para gerar PDFs).
5. **Editor de Código**: Visual Studio Code, Sublime Text ou qualquer editor de sua preferência.

---

## Passos para Configuração

### 1. Instalando o PHP e Servidor Web

#### Usando o XAMPP (Recomendado para Iniciantes)

1. **Baixar e Instalar o XAMPP**:
   - Acesse [XAMPP - Apache Friends](https://www.apachefriends.org/index.html) e baixe a versão compatível com seu sistema operacional.
   - Durante a instalação, escolha os componentes **Apache** e **MySQL**.

2. **Verificar a Instalação**:
   - Após instalar o XAMPP, abra o **XAMPP Control Panel** e inicie os serviços **Apache** e **MySQL**.
   - Abra o navegador e acesse `http://localhost/`. Se a página de boas-vindas do XAMPP aparecer, a instalação foi bem-sucedida.

#### Usando o PHP Embutido

1. **Instalar PHP**:
   - Acesse [PHP Downloads](https://www.php.net/downloads.php) e baixe a versão mais recente.
   - Extraia os arquivos para uma pasta (por exemplo: `C:\php`).

2. **Verificar a Instalação**:
   - Abra o **Prompt de Comando** e digite `php -v` para verificar se o PHP foi instalado corretamente.

3. **Iniciar o Servidor PHP**:
   - Navegue até a pasta do seu projeto e execute:
     ```bash
     php -S localhost:8000
     ```

---

### 2. Configuração do Banco de Dados

1. **Instalar o MySQL**:
   - Caso esteja usando o XAMPP, o MySQL já estará instalado. Caso contrário, baixe o [MySQL Community Server](https://dev.mysql.com/downloads/installer/) e instale-o.

2. **Acessar o MySQL**:
   - Abra o **phpMyAdmin** (se estiver usando XAMPP) em `http://localhost/phpmyadmin/` ou use o terminal com:
     ```bash
     mysql -u root -p
     ```

3. **Criar o Banco de Dados**:
   - Crie o banco de dados `crud_com_pdf_em_php`:
     ```sql
     CREATE DATABASE crud_com_pdf_em_php;
     ```

4. **Criar a Tabela**:
   - No MySQL ou no phpMyAdmin, crie a tabela `pessoas`:
     ```sql
     USE crud_com_pdf_em_php;

     CREATE TABLE pessoas (
         id INT AUTO_INCREMENT PRIMARY KEY,
         nome VARCHAR(100) NOT NULL,
         cpf VARCHAR(14) NOT NULL,
         telefone VARCHAR(15) NOT NULL
     );
     ```

---

### 3. Baixar e Configurar a FPDF

1. **Baixar a FPDF**:
   - Acesse o site [FPDF](http://www.fpdf.org/) e baixe a versão mais recente.
   - Extraia o arquivo ZIP na pasta do seu projeto, em uma pasta chamada `fpdf/`.

---

### 4. Configuração do Projeto

1. **Baixar o Código**:
   - Clone ou baixe os arquivos do projeto para o seu computador.

2. **Configuração do Banco de Dados no Projeto**:
   - Abra o arquivo `db.php` e configure as credenciais do banco de dados:
     ```php
     <?php
     $host = 'localhost';
     $db   = 'crud_com_pdf_em_php';
     $user = 'root';  // ou o usuário do MySQL
     $pass = '';      // se não tiver senha, deixe vazio
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
     ```

---

### 5. Rodando o Projeto

1. **Coloque os Arquivos no Servidor Web**:
   - Se estiver usando o XAMPP, coloque os arquivos do projeto na pasta `htdocs` (geralmente localizada em `C:\xampp\htdocs\`).
   - Se estiver usando o PHP embutido, basta navegar até a pasta do seu projeto no terminal e rodar o comando:
     ```bash
     php -S localhost:8000
     ```

2. **Adicionar Dados**:
   - Acesse `form.php` para adicionar novas pessoas ao banco de dados.

3. **Gerar o PDF**:
   - Acesse a página `index.php` e clique no link **"Gerar PDF"** ao lado de uma pessoa para gerar o PDF com seus dados.

---

### 6. Resumo dos Arquivos

- **`db.php`**: Conexão com o banco de dados.
- **`index.php`**: Página principal que exibe a lista de pessoas.
- **`form.php`**: Formulário para adicionar novas pessoas.
- **`generate_pdf.php`**: Gera o PDF com os dados de uma pessoa específica.

---

### 7. Dicas Importantes

- **Banco de Dados**: Certifique-se de que o banco de dados e a tabela `pessoas` estão criados corretamente.
- **Biblioteca FPDF**: Garanta que a biblioteca FPDF esteja na pasta `fpdf/` do seu projeto.
- **Testar o PDF**: Se não estiver gerando o PDF corretamente, verifique se a imagem da assinatura está no caminho certo.

---

## Contribuição

Se você encontrou algum erro ou deseja sugerir melhorias, sinta-se à vontade para abrir um **issue** ou enviar um **pull request**.

---

## Licença

Este projeto está licenciado sob a [MIT License](LICENSE).


