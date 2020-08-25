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

echo json_encode($account, JSON_UNESCAPED_UNICODE);
