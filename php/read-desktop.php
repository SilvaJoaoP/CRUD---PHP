<?php

require_once 'db.php';

$id = $_GET['id'];


$stmt = $pdo->prepare("SELECT * FROM desktops WHERE id = ?");

$stmt->execute([$id]);

$desktop = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Desktop</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Bem-vindo ao Sistema de Acolhimento de Desktops</h1>
        <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="index-desktop.php">Listar Desktops</a></li>
                <li><a href="create-desktop.php">Adicionar Desktop</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Detalhes do Desktop</h2>
        <?php if ($desktop): ?>

            <p><strong>ID:</strong> <?= $desktop['id'] ?></p>
            <p><strong>CPU:</strong> <?= $desktop['MOBO'] ?></p>
            <p><strong>GPU:</strong> <?= $desktop['GPU'] ?></p>
            <p><strong>MOBO:</strong> <?= $desktop['MOBO'] ?></p>
            <p><strong>DDRAM:</strong> <?= $desktop['DDRAM'] ?></p>
            <p>
               
                <a href="update-desktop.php?id=<?= $desktop['id'] ?>">Editar</a>
                <a href="delete-desktop.php?id=<?= $desktop['id'] ?>">Excluir</a>
            </p>
        <?php else: ?>
            
            <p>Desktop não encontrado.</p>
        <?php endif; ?>
    </main>

    <footer>
        <p>&copy; 2024 - Sistema de Acolhimento de Desktops</p>
    </footer>
</body>
</html>
