<?php

$url = 'https://jsonplaceholder.typicode.com/users';
// Sample example to get data.
//$resource = curl_init($url);
//curl_setopt($resource, CURLOPT_RETURNTRANSFER, true);//truc nang la lay du lieu ve chu khong hien thi
//$result = curl_exec($resource);
//$info = curl_getinfo($resource);//lay thong tin ve request
//$code = curl_getinfo($resource, CURLINFO_HTTP_CODE);//lay thong tin ve request theo code
//echo $code;
//echo '<pre>';
//var_dump($info);
//echo '</pre>';
//echo $result;
//curl_close($resource);
// Get response status code

// set_opt_array

// Post request
$resource = curl_init();
$user = [
    'name' => 'Quang Bach',
    'username' => 'bachh1124',
    'email' => 'bachh1124@gmail.com'
];
curl_setopt_array($resource, [
    CURLOPT_URL => $url,//ys nghia la gui du lieu den url
    CURLOPT_RETURNTRANSFER => true,//truc nang la lay du lieu ve chu khong hien thi
    CURLOPT_POST => true,//ys nghia la gui du lieu dang post
    CURLOPT_HTTPHEADER => ['content-type: application/json'],//ys nghia la gui du lieu dang json
    CURLOPT_POSTFIELDS => json_encode($user)//ys nghia la gui du lieu dang json

]);
$result = curl_exec($resource);
echo $result;
curl_close($resource);