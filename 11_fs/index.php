<?php
// Magic constants
echo __DIR__ . '<br>';// in ra đường dẫn đến thư mục chứa file
echo __FILE__ . '<br>';// in ra đường dẫn đến file
echo __LINE__ . '<br>';// in ra dòng hiện tại
// Create directory
//mkdir('test');
// Rename directory
//rename('test', 'test2');

// Delete directory
//rmdir('test');

// Read files and folders inside directory
$files = scandir('../');// lấy ra tất cả các file và thư mục trong thư mục hiện tại
echo '<pre>';
var_dump($files);
echo '</pre>';
file_put_contents('test.txt', 'Hello World');// tạo file và ghi nội dung vào file
// file_get_contents, file_put_contents
echo file_get_contents('lorem.txt');// đọc file

// file_get_contents from URL
//$userJson = file_get_contents('https://jsonplaceholder.typicode.com/users');
//echo $userJson;
//$userJson = json_decode($userJson, true);
//echo '<pre>';
//var_dump($userJson);
//echo '</pre>';

file_exists('test.txt');// kiểm tra file có tồn tại hay không
is_dir('test');// kiểm tra thư mục có tồn tại hay không
// https://www.php.net/manual/en/book.filesystem.php
// file_exists
// is_dir
// filemtime
// filesize
// disk_free_space
// file