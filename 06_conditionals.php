<?php

$age = 20;
$salary = 300000;

// Sample if

// Without circle braces

// Sample if-else

// Difference between == and ===
if ($age == 20) {
    echo "1" . "<br>";
}
$age == 20; // true
$age == '20'; // true

$age === 20; // true
$age === '20'; // false
// if AND

// if OR

// Ternary if
echo $age < 18 ? "Young" : "Old";
// Short ternary
$myAge = $age ?: 18; // if $age is not set, then $myAge = 18
echo $myAge;
// Null coalescing operator
$myName = isset($name) ? $name : 'John';//kiem tra xem bien co ton tai hay khong, neu khong thi gan gia tri mac dinh
$myName = $name ?? 'John';//kiem tra xem bien co ton tai hay khong, neu khong thi gan gia tri mac dinh
// switch
$userRole = 'admin'; // editor, user, admin
switch ($userRole) {
    case 'admin':
        echo 'admin';
        break;
    case 'editor':
        echo 'editor';
        break;
    case 'user':
        echo 'user';
        break;
    default:
        echo 'Invalid role';
}