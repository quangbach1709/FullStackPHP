<?php

// What is class and instance
require_once "Person.php";
require_once "Student.php";


$s = new Student("Bach", "Tong Quang", "123456");
echo "<pre>";
var_dump($s);
echo "</pre>";
//$p = new Person("Bach", "Tong Quang");
////$p->name = "Bach";
////$p->surname = "Tong Quang";
//$p->setAge(20);
//echo "<pre>";
//var_dump($p);
//echo "</pre>";
//echo Person::getCounter();
// Create Person class in Person.php

// Create instance of Person

// Using setter and getter