<?php
// Đọc dữ liệu từ file JSON
$jsonData = file_get_contents('../data.json');
$listSanPham = json_decode($jsonData, true);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];

    $newSanPham = [
        'name' => $name,
        'price' => $price
    ];
    $listSanPham[] = $newSanPham;

    // Ghi dữ liệu vào file JSON
    $jsonData = json_encode($listSanPham, JSON_PRETTY_PRINT);
    file_put_contents('../data.json', $jsonData);
}

?>

<?php
include_once "../views/partials/header.php";
?>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Adminstration</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Trang Chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Trang Ngoài</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Thể Loại</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" aria-disabled="true">Tác giả</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<main>
    <div class="container">
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Thêm mới
        </button>

        <div class="row">
            <div class="col">
                Sản phẩm
            </div>
            <div class="col">
                Gia thanh
            </div>
            <div class="col">
                Sửa
            </div>
            <div class="col">
                Xóa
            </div>
        </div>

        <?php
        foreach ($listSanPham as $key => $sanPham) {
            ?>
            <div class="row">
                <div class="col">
                    <?php echo $sanPham['name'] ?>
                </div>
                <div class="col">
                    <?php echo $sanPham['price'] ?>
                </div>
                <div class="col">
                    <i class="bi bi-pencil-square"></i>
                </div>
                <div class="col">
                    <i class="bi bi-trash-fill"></i>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</main>

<?php
include_once "../views/products/form.php";
?>

<script src="../../node_modules/bootstrap/dist/js/bootstrap.js"></script>
</body>
</html>