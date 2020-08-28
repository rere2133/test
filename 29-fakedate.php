<?php
require __DIR__ . '/parts/__connect_db.php';

//TODO: 檢查資料格式
$name = ['陳', '蔡', '依', '林', '俊', '杰'];

for ($i = 1; $i < 20; $i++) {
    shuffle($name);
    $sql = sprintf("INSERT INTO `address_book`( `name`, `mobile`, `email`, `birthday`, `address`, `created_at`) VALUES('%s','0912387444','eoi@test.com','1999-09-09','w9',NOW())", implode('', array_slice($name, 0, 3)));

    $stmt = $pdo->query($sql);
}
