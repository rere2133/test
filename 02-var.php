<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    define("MY_CONST", 123);
    echo MY_CONST;

    echo '<br>';
    $a = 10;
    echo $a;
    echo '<br>';
    echo empty($b) ? 'empty' : 'not empty' . '<br>';
    echo !empty($b) . '<br>';
    echo '$a<br>';
    echo "\$a<br>";
    echo "$a<br>";
    $name = "Anna";
    echo "Hello , {$name} 1234 <br>";
    # $c = "hi";
    echo $c ?? 'peter';
    //變數不用宣告，需要＄符號，有大小寫之分
    $n = "name";
    $$n = "Rere";
    // 可使用以變數值為名的變數
    echo '$name<br>';

    $b = "apple";
    echo "Hello,$b<br>";
    // 雙引號包含變數，才能顯示出變數得值
    echo 'Hello,$b<br>';

    $c = "xyz\nabc\"def\'ghi\\";
    $d = 'xyz\nabc\"def\'ghi\\';
    // 單引號跳脫只有\',\\ 有效
    echo "$c<br>";
    echo "$d<br>";
    ?>

</body>

</html>