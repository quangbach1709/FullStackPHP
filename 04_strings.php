<?php

// Create simple string
$name = "bach";
$string = "hello " . $name;
$string2 = "hello $name dz";
echo $string . "<br>";
echo $string2 . "<br>";
// String concatenation
echo "Hello " . " World" . "<br>";
// String functions
$string = "    Hello World      ";
echo "1 - " . strlen($string) . '<br>' . PHP_EOL;// dem so ki tu
echo "2 - " . trim($string) . '<br>' . PHP_EOL;// xoa khoang trang
echo "3 - " . ltrim($string) . '<br>' . PHP_EOL;// xoa khoang trang ben trai
echo "4 - " . rtrim($string) . '<br>' . PHP_EOL;// xoa khoang trang ben phai
echo "5 - " . str_word_count($string) . '<br>' . PHP_EOL;// dem so tu
echo "6 - " . strrev($string) . '<br>' . PHP_EOL;// dao nguoc chuoi
echo "7 - " . strtoupper($string) . '<br>' . PHP_EOL;// viet hoa
echo "8 - " . strtolower($string) . '<br>' . PHP_EOL;// viet thuong
echo "9 - " . ucfirst('hello') . '<br>' . PHP_EOL;// viet hoa chu cai dau
echo "10 - " . lcfirst('HELLO') . '<br>' . PHP_EOL;// viet thuong chu cai dau
echo "11 - " . ucwords('hello world') . '<br>' . PHP_EOL;// viet hoa chu cai dau cua moi tu
echo "12 - " . strpos($string, 'world') . '<br>' . PHP_EOL; // tim vi tri cua chuoi
echo "13 - " . stripos($string, 'world') . '<br>' . PHP_EOL;// tim vi tri cua chuoi khong phan biet chu hoa chu thuong
echo "14 - " . substr($string, 8) . '<br>' . PHP_EOL;// cat chuoi
echo "15 - " . str_replace('World', 'PHP', $string) . '<br>' . PHP_EOL;// thay the chuoi
echo "16 - " . str_ireplace('world', 'PHP', $string) . '<br>' . PHP_EOL;// thay the chuoi khong phan biet chu hoa chu thuong
// Multiline text and line breaks
$longText = "
  Hello, my name is <b>Bach</b>
  I am <b>19</b>,
  I love my mom
";
echo nl2br($longText) . '<br>';// xuong dong khi gap \n
// Multiline text and reserve html tags
$longText = "
  Hello, my name is <b>Zura</b>
  I am <b>27</b>,
  I love my daughter
";
echo "1 - " . $longText . '<br>';
echo "2 - " . nl2br($longText) . '<br>';// xuong dong khi gap \n
echo "3 - " . htmlentities($longText) . '<br>' . PHP_EOL;// hien thi cac ky tu dac biet
echo "4 - " . nl2br(htmlentities($longText)) . '<br>' . PHP_EOL;// hien thi cac ky tu dac biet va xuong dong
echo "5 - " . html_entity_decode(htmlentities($longText)) . '<br>' . PHP_EOL;// hien thi cac ky tu dac biet va xuong dong
echo "6 - " . htmlspecialchars($longText) . '<br>' . PHP_EOL;// hien thi cac ky tu dac biet va xuong dong

// https://www.php.net/manual/en/ref.strings.php