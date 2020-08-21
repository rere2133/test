<?php
// $a = $_GET['a'] ?? 0; //php7
$a = isset($_GET['a']) ? $_GET['a'] : 0;
echo $a;
