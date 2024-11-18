<?php

// Print current date
echo date("H:i:s d-m-Y") . "<br>";
// Print yesterday
echo date("H:i:s d-m-Y", time() - 60 * 60 * 24) . "<br>";// 60 seconds * 60 minutes * 24 hours
// Different format: https://www.php.net/manual/en/function.date.php
echo date("F j Y, H:i:s") . "<br>";
// Print current timestamp
echo time() . "<br>";
// Parse date: https://www.php.net/manual/en/function.date-parse.php
$parsedDate = date_parse("2020-10-12 09:00:00");
echo "<pre>";
var_dump($parsedDate);
echo "</pre>";

// Parse date from format: https://www.php.net/manual/en/function.date-parse-from-format.php
$dateString = "February 4 2020 12:45:35";
$parsedDate = date_parse_from_format("F j Y H:i:s", $dateString);
echo "<pre>";
var_dump($parsedDate);
echo "</pre>";