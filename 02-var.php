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
    ?>
</body>

</html>