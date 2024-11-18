<?php

// while
//while (true) {
//
//}
// Loop with $counter
//$counter = 0;
//while ($counter < 10) {
//    echo $counter . "<br>";
//    $counter++;
//}
// do - while
//do {
//    echo $counter . "<br>";
//    $counter++;
//} while ($counter < 10);

// for
for ($i = 0; $i < 10; $i++) {
    echo $i . "<br>";
}
// foreach
$fruits = ["Banana", "Apple", "Orange"];
foreach ($fruits as $index => $fruit) {
    echo $index + 1 . " " . $fruit . "<br>";
}
// Iterate Over associative array.
$person = [
    'name' => 'Brad',
    'surname' => 'Traversy',
    'age' => 30,
    'hobbies' => ['Tennis', 'Video Games'],
];
foreach ($person as $key => $value) {
    if (is_array($value)) {//kiem tra xem value co phai la mang hay khong
        echo $key . " " . implode(",", $value) . "<br>";//neu la mang thi chuyen mang thanh chuoi
    } else {
        echo $key . " " . $value . "<br>";
    }

}