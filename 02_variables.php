<?php

// What is a variable

// Variable types
$name="bach dz";
$age =20;
// Declare variables

// Print the variables. Explain what is concatenation
echo $name."<br>";
echo $age."<br>";
// Print types of the variables
echo gettype($name)."<br>";
// Print the whole variable
var_dump($name,$age).'<br>';
// Change the value of the variable
$age =false;
// Print type of the variable

// Variable checking functions
is_string($name);
is_int($age);
// Check if variable is defined
isset($name);

// Constants
define("PI",3.14);
echo PI."<br>";
// Using PHP built-in constants
echo SORT_ASC."<br>";
echo PHP_INT_MAX."<br>";