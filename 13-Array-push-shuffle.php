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
        $ar = [];
        for ($i = 1; $i <= 38; $i++) {
            $ar[] = $i;
        }
        for ($j = 1; $j <= 8; $j++) {
            $ar[5 * $j] = $j;
        }
        shuffle($ar);
        print_r($ar);

        ?>
    </pre>
</body>

</html>