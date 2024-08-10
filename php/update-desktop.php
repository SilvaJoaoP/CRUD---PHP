<?php
// Inclui o arquivo de conexão com o banco de dados
require_once 'db.php';

// Obtém o ID do desktop a partir da URL usando o método GET
$id = $_GET['id'];

// Prepara a instrução SQL para selecionar o desktop pelo ID
$stmt = $pdo->prepare("SELECT * FROM desktops WHERE id = ?");

// Executa a instrução SQL, passando o ID do desktop como parâmetro
$stmt->execute([$id]);

// Recupera os dados do desktop como um array associativo
$desktop = $stmt->fetch(PDO::FETCH_ASSOC);

// Verifica se o formulário foi submetido através do método POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtém os dados enviados pelo formulário
    $CPU = $_POST['CPU'];
    $GPU = $_POST['GPU'];
    $MOBO = $_POST['MOBO'];
    $DDRAM = $_POST['DDRAM'];

    // Prepara a instrução SQL para atualizar os dados do desktop
    $stmt = $pdo->prepare("UPDATE desktops SET CPU = ?, GPU = ?, MOBO = ?, DDRAM = ? WHERE id = ?");

    // Executa a instrução SQL com os novos dados do formulário
    $stmt->execute([$CPU, $GPU, $MOBO, $DDRAM, $id]);

    // Redireciona para a página de listagem de desktops após a atualização
    header('Location: read-desktop.php');
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Desktop</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Bem-vindo ao Sistema de Acolhimento de Desktops</h1>
        <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="read-desktop.php">Listar Desktops</a></li>
                <li><a href="create-desktop.php">Adicionar Desktop</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Editar desktop</h2>
        <!-- Formulário para editar os dados do desktop -->
        <form method="POST">
            <label for="CPU">CPU:</label>
            <!-- Campo para inserir o nome do desktop -->
            <input type="text" id="CPU" name="CPU" value="<?= $desktop['CPU'] ?>" required>

            <label for="GPU">GPU:</label>
            <!-- Campo para inserir a matrícula do desktop -->
            <input type="text" id="GPU" name="GPU" value="<?= $desktop['GPU'] ?>" required>

            <label for="MOBO">MoBo:</label>
            <!-- Campo para inserir a data de nascimento do desktop -->
            <input type="text" id="MOBO" name="MOBO" value="<?= $desktop['MOBO'] ?>" required>
            
            <label for="DDRAM">DDRAM:</label>
            <!-- Campo para inserir o e-mail do desktop -->
            <input type="DDRAM" id="DDRAM" name="DDRAM" value="<?= $desktop['DDRAM'] ?>" required>
            
            <!-- Botão para submeter o formulário -->
            <button type="submit">Atualizar</button>
        </form>
    </main>

    <footer>
        <p>&copy; 2024 - Sistema de Acolhimento de Desktops</p>
    </footer>
</body>
</html>