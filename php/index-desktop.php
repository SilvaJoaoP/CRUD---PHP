<?php

require_once 'db.php';

$stmt = $pdo->query("SELECT * FROM desktops");

$desktops = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Desktops</title>
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
        <h2>Lista de desktops</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>CPU</th>
                    <th>GPU</th>
                    <th>MoBo</th>
                    <th>DDRAM</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($desktops as $desktop): ?>
                    <tr>
                        <td><?= $desktop['id'] ?></td>
                        <td><?= $desktop['CPU'] ?></td>
                        <td><?= $desktop['GPU'] ?></td>
                        <td><?= $desktop['MOBO'] ?></td>
                        <td><?= $desktop['DDRAM'] ?></td>
                        <td>
                            <a href="read-desktop.php?id=<?= $desktop['id'] ?>">Visualizar</a>
                            <a href="update-desktop.php?id=<?= $desktop['id'] ?>">Editar</a>
                            <a href="delete-desktop.php?id=<?= $desktop['id'] ?>">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>

    <footer>
        <p>&copy; 2024 - Sistema de Acolhimento de Desktops</p>
    </footer>
</body>
</html>
