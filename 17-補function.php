<?php


//php function不能往外抓變數來使用，
//除非將變數用參數的方式帶入。

$a = 10;

function f($b)
{
    echo $b;
}

f($a);

// or設定匿名函式，並用use，才可把全域變數帶入。
$a = 10;

$f = function () use ($a) {
    echo $a;
};

$f();
