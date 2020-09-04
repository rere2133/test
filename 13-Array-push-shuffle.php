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

        shuffle($ar);
        print_r($ar);
        // print_r($ar);
        // print_r(shuffle($ar));
        ?>
    </pre>
</body>

</html>