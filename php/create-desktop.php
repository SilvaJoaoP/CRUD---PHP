<?php

require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   
    $CPU = $_POST['CPU'];
    $GPU = $_POST['GPU'];
    $MOBO = $_POST['MOBO'];
    $DDRAM = $_POST['DDRAM'];

    $stmt = $pdo->prepare("INSERT INTO desktops (CPU, GPU, MOBO, DDRAM) VALUES (?, ?, ?, ?)");

    $stmt->execute([$CPU, $GPU, $MOBO, $DDRAM]);

    header('Location: read-desktop.php');
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Desktop</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Bem-vindo ao Sistema de Acolhimento de Desktops</h1>
            <div class="desktop-icon">
            <svg width="100px" height="100px" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
                <g>
                    <rect width="48" height="30" x="8" y="10" fill="#4D4D4D" />
                    <rect width="36" height="22" x="14" y="14" fill="#333" />
                    <rect width="48" height="4" x="8" y="40" fill="#4D4D4D" />
                    <rect width="16" height="2" x="24" y="44" fill="#333" />
                    <rect width="24" height="2" x="20" y="46" fill="#333" />
                    <rect width="16" height="2" x="24" y="48" fill="#333" />
                    <rect width="8" height="2" x="28" y="50" fill="#333" />
                    <rect width="36" height="2" x="14" y="36" fill="#E0E0E0" />
                </g>
            </svg>
        </div>
        <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="read-desktop.php">Listar Desktops</a></li>
                <li><a href="create-desktop.php">Adicionar Desktop</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Adicionar Desktop</h2>
        
        <form id="desktopsheet" method="POST">
        <label for="CPU">CPU:</label>
        <small id="CPUError" class = "error">
        </small>
        
        <input type="text" id="CPU" name="CPU" required>

        <label for="GPU">GPU:</label>
        <small id="GPUError" class = "error">
        </small>
        
        <input type="text" id="GPU" name="GPU" required>

        <label for="MOBO">MoBo:</label>
        <small id="MOBOError" class = "error">
        </small>
        
        <input type="text" id="MOBO" name="MOBO" required>

        <label for="DDRAM">DDRAM:</label>
        <small id="DDRAMError" class = "error">
        </small>
        
        <input type="DDRAM" id="DDRAM" name="DDRAM" required>

        
        <button type="submit">Adicionar</button>
        </form>
    </main>

    <footer>
        <p>&copy; 2024 - Sistema de Acolhimento de Desktops</p>
    </footer>

    <script>
            document.getElementById('desktopsheet').addEventListener('submit', function(event) {
                let cpu = document.getElementById('CPU').value.trim();
                let gpu = document.getElementById('GPU').value.trim();
                let mobo = document.getElementById('MOBO').value.trim();
                let ddram = document.getElementById('DDRAM').value.trim();

                let hasError = false;

                document.querySelectorAll('.error').forEach(error => error.textContent = '');

                if (cpu.length < 5) {
                document.getElementById('CPUError').textContent = 'É necessária uma identificação mais completa da peça';
                hasError = true;
                }

                if (gpu.length < 5) {
                document.getElementById('GPUError').textContent = 'É necessária uma identificação mais completa da peça';
                hasError = true;
                }

                if (mobo.length < 5) {
                document.getElementById('MOBOError').textContent = 'É necessária uma identificação mais completa da peça';
                hasError = true;
                }

                if (ddram.length < 5) {
                document.getElementById('DDRAMError').textContent = 'É necessária uma identificação mais completa da peça';
                hasError = true;
                }

                if (hasError) {
                    event.preventDefault();
                }
            });
    </script>

 
</body>
</html>
