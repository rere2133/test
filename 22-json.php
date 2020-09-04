<?php


$account = [
    'Ming' => [
        'pw' => 'bbb234',
        'nickname' => '小明'
    ],
    'David' => [
        'pw' => '111',
        'nickname' => '大衛'
    ],
];
//用array來模擬資料庫裡的會員資料表

echo json_encode($account, JSON_UNESCAPED_UNICODE);
//json_encode 轉換成json的字串
//JSON_UNESCAPED_UNICODE 可以把解析中文