<?php

require_once "../../randomString.php";//goi file function.php vao de su dung ham randomString

try {
    /**   @var $pdo \PDO */ //khai bao bien pdo la mot doi tuong cua lop PDO
    require_once '../../database.php';

    $search = $_GET['search'] ?? '';
    if ($search) {
        $statement = $pdo->prepare('SELECT * FROM products WHERE title LIKE :title ORDER BY create_date DESC');
        $statement->bindValue(':title', "%$search%");//
    } else
        $statement = $pdo->prepare('SELECT * FROM products ORDER BY create_date DESC');

    $statement->execute();
    $products = $statement->fetchAll(PDO::FETCH_ASSOC);//dung de lay tat ca cac ban ghi trong bang
//    echo '<pre>';
//    var_dump($products);
//    echo '</pre>';

//    echo "<pre>";
//    var_dump($_POST);
//    echo "</pre>";

//    echo "<pre>";
//    var_dump($_FILES);
//    echo "</pre>";


    //add data to database
    $title = '';
    $description = '';
    $price = '';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {//kiem tra phuong thuc gui du lieu len server co phai la post hay khong

        require_once '../../validate_product.php';//goi file validate_product.php vao de kiem tra du lieu

        if (empty($errors)) {
            $img = $_FILES['img'] ?? null;
            $imgPath = '';
            if ($img && $img['tmp_name']) {//kiem tra xem co anh duoc upload len server hay khong
                $imgPath = 'images/' . randomString(8) . '/' . $img['name'];
                mkdir(dirname($imgPath));//tao thu muc chua anh
                move_uploaded_file($img['tmp_name'], $imgPath);
            }
//            exit;
            $statement = $pdo->prepare("INSERT INTO products (title, description,image, price, create_date)
            VALUES (:title, :description, :image, :price, :create_date)");
            $statement->bindValue(':title', $title);//dung de gan gia tri cho bien trong cau lenh sql
            $statement->bindValue(':description', $description);
            $statement->bindValue(':image', $imgPath);
            $statement->bindValue(':price', $price);
            $statement->bindValue(':create_date', date('Y-m-d H:i:s'));//dung de lay thoi gian hien tai
            $statement->execute();
            header('Refresh: 0');//tu dong load lai trang sau khi them du lieu
        }
    }


} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
<?php include_once '../../views/partials/header.php' ?>
<body>
<h1>Products CRUD</h1>


<p>
    <!-- Button trigger modal -->
    <a type="button" class="btn btn-primary" id="create" data-bs-toggle="modal"
       data-bs-target="#exampleModal">Create</a>
</p>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form class="modal-content" action="index.php" method="post" enctype="multipart/form-data">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Form Add</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php if (!empty($errors)) : ?>
                    <div class="alert alert-danger">
                        <?php foreach ($errors as $error) : ?>
                            <div><?php echo $error ?></div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                <div class="form-group">
                    <laber>Product Img</laber>
                    <br>
                    <input type="file" name="img" ">
                </div>
                <div class="form-group">
                    <laber>Product Title</laber>
                    <br>
                    <input type="text" name="title" value="<?php echo $title ?>">
                </div>
                <div class="form-group">
                    <laber>Product Description</laber>
                    <br>
                    <input type="text" name="description" value="<?php echo $description ?>">
                </div>
                <div class="form-group">
                    <laber>Product Price</laber>
                    <br>
                    <input type="number" name="price" step=".01" value="<?php echo $price ?>">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
    </div>
</div>

<form class="input-group mb-3">
    <input type="text" class="form-control" placeholder="Search for products" name="search"
           aria-label="Recipient's username"
           aria-describedby="button-addon2" value="<?php echo $search ?>">
    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
</form>

<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Image</th>
        <th scope="col">Title</th>
        <th scope="col">Price</th>
        <th scope="col">Create Date</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($products

             as $i => $product) : ?>
        <tr>
            <th scope="col"><?php echo $i + 1 ?></th>
            <td>
                <img src="<?php echo $product['image'] ?>" alt="<?php echo $product['title'] ?>" class="product-img">
            </td>
            <td><?php echo $product['title'] ?></td>
            <td><?php echo $product['price'] ?></td>
            <td><?php echo $product['create_date'] ?></td>
            <td>
                <a href="edit.php?id=<?php echo $product['id'] ?>" class="btn btn-sm btn-primary">Edit</a>

                <form style="display: inline-block" action="del.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $product['id'] ?>">
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>

        </tr>
    <?php
    endforeach;
    ?>
    </tbody>

</table>
<!-- Optional JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
</body>
</html>