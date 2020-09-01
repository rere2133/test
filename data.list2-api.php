<?php

require __DIR__ . '/parts/__connect_db.php';

// $perPageData = 5; //每頁有幾筆資料
$perPageData = 5;

$output = [
    'totalRows' => 0,
    'totalPages' => 0,
    'page' => 0,
    'row' => [],
];


$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

$t_qul = "SELECT COUNT(1) FROM `address_book`";
$output['totalRows'] = $totalRows = $pdo->query($t_qul)->fetch(PDO::FETCH_NUM)[0];
// exit;
$output['totalPages'] = $totalPages = ceil($totalRows / $perPageData);
//ceil() 函數向上捨入為最接近的整數。

if ($totalRows > 0) {
    if ($page < 1) $page = 1;
    if ($page > $totalPages) $page = $totalPages;
    $output['page'] = $page;

    $sql = sprintf("SELECT * FROM `address_book` ORDER BY `address_book`.`sid` ASC LIMIT %s,%s", ($page - 1) * $perPageData, $perPageData);
    $stmt = $pdo->query($sql);
    $output['rows'] = $stmt->fetchAll();
}
echo json_encode($output, JSON_UNESCAPED_UNICODE);
