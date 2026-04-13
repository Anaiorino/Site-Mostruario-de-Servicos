<?php
require 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = trim($_POST['usuario']);
    $nota = intval($_POST['nota']);
    $comentario = trim($_POST['comentario']);

    if ($usuario && $nota >= 1 && $nota <= 5 && $comentario) {
        $stmt = $pdo->prepare("INSERT INTO avaliacoes (usuario, nota, comentario) VALUES (?, ?, ?)");
        $stmt->execute([$usuario, $nota, $comentario]);
    }
}

header('Location: index.php');
exit;
