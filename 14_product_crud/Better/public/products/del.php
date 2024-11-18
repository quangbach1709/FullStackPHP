<?php

/** @var \PDO */
require_once '../../database.php';

$id = $_POST['id'] ?? null;
if (!$id) {
    header('Location: index.php');
    exit;
}
//echo '<pre>';
//var_dump($id);
//echo '</pre>';

$pdo->prepare('DELETE FROM products WHERE id = :id')->execute(['id' => $id]);
header('Location: index.php');