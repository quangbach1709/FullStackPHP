<?php
// Đọc dữ liệu từ file JSON
$jsonData = file_get_contents('../data.json');
$listSanPham = json_decode($jsonData, true);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_POST['image'];

    $newSanPham = [
        'id' => count($listSanPham) + 1,
        'name' => $name,
        'price' => $price,
        'image' => $image
    ];
    $listSanPham[] = $newSanPham;

    // Ghi dữ liệu vào file JSON
    $jsonData = json_encode($listSanPham, JSON_PRETTY_PRINT);
    file_put_contents('../data.json', $jsonData);

    // Redirect to the same page to clear POST data
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
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
        <button href="./add.php" type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Thêm mới
        </button>

        <div class="row">
            <div class="col">
                Hinh anh
<!--                <input type="image" src="../views/img/iphone.jpg">-->
            </div>
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
                    <img src="<?php echo $sanPham['image'] ?>" alt="image" width="100px">
                </div>
                <div class="col">
                    <?php echo $sanPham['name'] ?>
                </div>
                <div class="col">
                    <?php echo $sanPham['price'] ?>
                </div>
                <div class="col">
                    <a href="edit.php?id=<?php echo $sanPham['id'] ?>" class="bi bi-pencil-square"></a>
                </div>
                <div class="col">
                    <a href="del.php?id=<?php echo $sanPham['id'] ?>" class="bi bi-trash-fill"></a>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</main>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form class="modal-content" method="post" action="index.php">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>
                    <p>Hinh anh san pham</p>
                    <input class="w-75" id="image" type="file" name="image">
                    <p>Ten San Pham</p>
                    <input class="w-75" id="f-name" type="text" name="name">
                    <p>Gia Thanh</p>
                    <input class="w-75" id="email" type="number" name="price">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Thêm</button>
            </div>
        </form>
    </div>
</div>
<script src="../../node_modules/bootstrap/dist/js/bootstrap.js"></script>
</body>
</html>