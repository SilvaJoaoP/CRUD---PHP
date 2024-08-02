<?php
require_once 'db.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM desktops WHERE id = ?");
$stmt->execute([$id]);
$desktop = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $CPU = $_POST['CPU'];
    $GPU = $_POST['GPU'];
    $MOBO = $_POST['MOBO'];
    $DDRAM = $_POST['DDRAM'];
    $stmt = $pdo->prepare("UPDATE desktops SET CPU = ?, GPU = ?, MOBO = ?, DDRAM = ? WHERE id = ?");
    $stmt->execute([$CPU, $GPU, $MOBO, $DDRAM, $id]);
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
        <form method="POST">
            <label for="CPU">CPU:</label>
            <input type="text" id="CPU" name="CPU" value="<?= $desktop['CPU'] ?>" required>
            <label for="GPU">GPU:</label>
            <input type="text" id="GPU" name="GPU" value="<?= $desktop['GPU'] ?>" required>
            <label for="MOBO">MoBo:</label>
            <input type="text" id="MOBO" name="MOBO" value="<?= $desktop['MOBO'] ?>" required>
            <label for="DDRAM">DDRAM:</label>
            <input type="text" id="DDRAM" name="DDRAM" value="<?= $desktop['DDRAM'] ?>" required>
            <button type="submit">Atualizar</button>
        </form>
    </main>

    <footer>
        <p>&copy; 2024 - Sistema de Acolhimento de Desktops</p>
    </footer>
</body>
</html>