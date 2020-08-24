<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array</title>
</head>

<body>
    <pre>
        <?php
        $ar1 = array(1, 3, 5, 7);
        $ar2 = [222, [1, 3, 5, 7, 9]];
        $ar3 = [
            'name' => 'David',
            'age' => 33,
            'date' => [5, 8, 9]
        ];
        print_r($ar1);
        print_r($ar2);
        print_r($ar3);

        var_dump($ar1);
        var_dump($ar2);
        var_dump($ar3);

        $ar4 = $ar3; #複製陣列，新陣列與舊陣列獨立，互不影響。copy值，而非copy參照。
        $ar3['date'][1] = 777;
        print_r($ar3);
        print_r($ar4);
        ?>
    </pre>
</body>

</html>