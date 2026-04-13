<?php
require 'conexao.php';

$stmt = $pdo->query("SELECT * FROM avaliacoes ORDER BY data_envio DESC");
$avaliacoes = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Avaliações de Usuários</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Avaliações de Usuários</h1>

    <div class="avaliacoes-container">
        <?php foreach ($avaliacoes as $avaliacao): ?>
            <div class="avaliacao">
                <strong><?= htmlspecialchars($avaliacao['usuario']) ?></strong>
                <div class="estrelas">
                    <?php for ($i = 1; $i <= 5; $i++): ?>
                        <span class="estrela <?= $i <= $avaliacao['nota'] ? 'ativa' : '' ?>">★</span>
                    <?php endfor; ?>
                </div>
                <p><?= htmlspecialchars($avaliacao['comentario']) ?></p>
                <small><?= date('d/m/Y H:i', strtotime($avaliacao['data_envio'])) ?></small>
            </div>
        <?php endforeach; ?>
    </div>

    <h2>Deixe sua Avaliação</h2>
    <form method="POST" action="salvar_avaliacao.php" id="form-avaliacao">
        <input type="text" name="usuario" placeholder="Seu nome" required>

        <div id="seletor-estrelas">
            <?php for ($i = 1; $i <= 5; $i++): ?>
                <span class="estrela" data-valor="<?= $i ?>">★</span>
            <?php endfor; ?>
        </div>
        <input type="hidden" name="nota" id="input-nota" value="0">

        <textarea name="comentario" placeholder="Seu comentário" required></textarea>
        <button type="submit">Enviar Avaliação</button>
    </form>

    <script src="script.js"></script>
</body>
</html>
