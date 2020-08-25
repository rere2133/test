<?php
require __DIR__ . '/parts/__connect_db.php';

$stmt = $pdo->query("SELECT * FROM `address_book` LIMIT 4,3");
echo json_encode(
    $stmt->fetchAll(),
    JSON_UNESCAPED_UNICODE
);
