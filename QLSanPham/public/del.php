<?php
$id = $_GET['id'];
$jsonData = file_get_contents('../data.json');
$listSanPham = json_decode($jsonData, true);

// Xóa sản phẩm khỏi danh sách
$listSanPham = array_filter($listSanPham, function ($item) use ($id) {
    return $item['id'] != $id;
});

// Ghi lại dữ liệu vào file JSON
file_put_contents('../data.json', json_encode($listSanPham, JSON_PRETTY_PRINT));

// Redirect to the home page
header("Location: index.php");
exit;
?>
