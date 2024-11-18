<?php

// Function which prints "Hello I am Zura"
//function hello()
//{
//    echo "Hello I am Bach" . "<br>";
//}
//
//hello();
// Function with argument
function hello($name)
{
    echo "Hello I am $name" . "<br>";
}

hello('Bach');
// Create sum of two functions
//function sum($a, $b)
//{
//    return $a + $b;
//}
//
//echo sum(4, 5);
// Create function to sum all numbers using ...$nums
//function sum(...$nums)//nums la 1 mang chua cac so nguyen
//{
//    $sum = 0;
//    foreach ($nums as $n) {
//        $sum += $n;
//    }
//    return $sum;
//}
//
//echo sum(1, 2, 3, 4, 5);
// Arrow functions
function sum(...$nums)
{
    return array_reduce($nums, fn($carry, $n) => $carry + $n);
    //dung ham array_reduce de tinh tong cua mang nums
}

echo sum(1, 2, 3, 4, 5);