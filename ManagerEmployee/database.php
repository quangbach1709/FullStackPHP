<?php
$epy = new PDO('mysql:host=localhost;dbname=employees', 'root', '');
$epy->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

