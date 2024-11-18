<?php
/** @var $pdo \PDO */
require_once "../../randomString.php";//goi file function.php vao de su dung ham randomString
require_once '../../database.php';//goi file database.php vao de su dung bien pdo va lien ket voi database

$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: index.php');
    exit;
}
$statement = $pdo->prepare('SELECT * FROM products WHERE id = :id');
$statement->bindValue(':id', $id);
$statement->execute();
$product = $statement->fetch(PDO::FETCH_ASSOC);//dung de lay ra 1 ban ghi trong bang


$errors = [];

$title = $product['title'];
$description = $product['description'];
$price = $product['price'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    require_once '../../validate_product.php';
    if (empty($errors)) {

        $statement = $pdo->prepare("UPDATE products SET title = :title, image = :image, description = :description, price = :price WHERE id = :id");
        $statement->bindValue(':title', $title);
        $statement->bindValue(':image', $imagePath);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':id', $id);

        $statement->execute();
        header('Location: index.php');
    }

}

?>

<?php include_once '../../views/partials/header.php' ?>
<body>
<a href="index.php" class="btn btn-secondary">Go back to products</a>
<h1>Edit Product <?php echo $product['title'] ?></h1>

<?php include_once '../../views/products/form.php' ?>
</body>
</html>