<?php

// Declaring numbers
$a = 5;
$b = 4;
$c = 1.2;
// Arithmetic operations
echo ($a + $b) * $c . "<br>";

// Assignment with math operators
$a += $b;
// Increment operator
$a++;
++$a;
// Decrement operator
$a--;
--$a;
// Number checking functions
is_float(1.25);
is_numeric("3.45");
// Conversion
$strNumber = "12.5" . "<br>";
$number = (float)$strNumber;
var_dump($number);
echo "<br>";
// Number functions
echo "abs(-15) " . abs(-15) . '<br>'; // tinh gia tri tuyet doi
echo "pow(2,  3) " . pow(2, 3) . '<br>'; // 2^3
echo "sqrt(16) " . sqrt(16) . '<br>';// can bac 2
echo "max(2, 3) " . max(2, 3) . '<br>';// so lon nhat
echo "min(2, 3) " . min(2, 3) . '<br>';// so nho nhat
echo "round(2.4) " . round(2.4) . '<br>';// lam tron
echo "round(2.6) " . round(2.6) . '<br>';// lam tron
echo "floor(2.6) " . floor(2.6) . '<br>';// lam tron xuong
echo "ceil(2.4) " . ceil(2.4) . '<br>';// lam tron len

// Formatting numbers
$number = 12345134134124.124293293;
echo number_format($number, 2, ",", " "); //lam tron so thap phan, phan ngan cach, phan ngan cach 3 chu so

// https://www.php.net/manual/en/ref.math.php
