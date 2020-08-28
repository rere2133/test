<?php
require __DIR__ . '/parts/__connect_db.php';

header('Content-Type: application/json');

//後端錯誤時顯示的資訊
$output = [
    'success' => false,
    'postData' => $_POST,
    'code' => 0,
    'error' => ''
];
//檢查資料格式
// email_pattern = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
// mobile_pattern = /^09\d{2}-?\d{3}-?\d{3}$/;


if (mb_strlen($_POST['name']) < 2) {
    $output['code'] = 410;
    $output['error'] = '姓名長度要大於2 from api';
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}
if (!preg_match('/^09\d{2}-?\d{3}-?\d{3}$/', $_POST['mobile'])) {
    $output['code'] = 420;
    $output['error'] = '手機號碼格式錯誤 form api';
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}

$sql = "INSERT INTO `address_book`( `name`, `mobile`, `email`, `birthday`, `address`, `created_at`) VALUES(?,?,?,?,?,NOW())";
//MySQL語法一律用雙引號

$stmt = $pdo->prepare($sql);
$stmt->execute([
    $_POST['name'],
    $_POST['mobile'],
    $_POST['email'],
    $_POST['birthday'],
    $_POST['address'],
]);

if ($stmt->rowCount()) {
    $output['success'] = true;
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);
