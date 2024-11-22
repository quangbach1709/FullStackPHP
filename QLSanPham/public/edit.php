<?php
include_once "../views/partials/header.php";

// Get the product ID from the query string
$id = $_GET['id'];

// Read the JSON data from the file
$jsonData = file_get_contents('../data.json');
$listSanPham = json_decode($jsonData, true);

if (!$listSanPham) {
    die("Error reading product data.");
}

// Initialize variables
$newListSanPham = [];
$sanPham = null;

// Traverse the original product list
foreach ($listSanPham as $item) {
    if ($item['id'] == $id) {
        $sanPham = $item; // Found the product to edit
    }
    $newListSanPham[] = $item; // Build a new list identical to the original
}

// If the product is not found, handle the error
if (!$sanPham) {
    die("Product not found.");
}

// Handle the form submission to update the product
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];

    // Update the product in the new list
    foreach ($newListSanPham as &$item) {
        if ($item['id'] == $id) {
            $item['name'] = $name;
            $item['price'] = $price;
            break; // Stop updating after finding the product
        }
    }

    // Save the updated new list back to the JSON file
    file_put_contents('../data.json', json_encode($newListSanPham, JSON_PRETTY_PRINT));

    // Redirect to the home page after saving
    header("Location: index.php");
    exit;
}
?>

<body>
<main class="container">
    <h1>Edit Product</h1>
    <?php include "../views/products/form.php"; ?>
    <a href="index.php">Back to Home Page</a>
</main>
<script src="../../node_modules/bootstrap/dist/js/bootstrap.js"></script>
</body>
</html>
