<?php
$pdo = new PDO('mysql:host=localhost;dbname=products_curd', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


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