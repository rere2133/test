<?php

$a = isset($_GET['a']) ?  intval($_GET['a']) :  0;
$b = isset($_GET['b']) ? intval($_GET['b']) : 0;

printf('{"answer":%s}', $a + $b);



// $a = $_GET['a'] ?? 0;
// $b = $_GET['b'] ?? 0;

// // echo '{"answer":'. ($a+$b). '}';
// printf('{"answer":%s}', $a+$b);
