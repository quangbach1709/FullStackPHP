<!-- public/add.php -->
<?php
include_once "../views/partials/header.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];

    $newSanPham = [
        'id' => count($listSanPham) + 1,
        'name' => $name,
        'price' => $price
    ];
    $listSanPham[] = $newSanPham;
    exit;
    // Ghi dữ liệu vào file JSON
    $jsonData = json_encode($listSanPham, JSON_PRETTY_PRINT);
    file_put_contents('../data.json', $jsonData);
}
?>

<body>
<main class="container">
    <h1>Add Product</h1>
    <?php include "../views/products/form.php"; ?>
    <a href="index.php">Back to Home Page</a>
</main>
<script src="../../node_modules/bootstrap/dist/js/bootstrap.js"></script>
</body>
</html>