<?php
session_start()
//session啟動，每個頁面要用session，都要呼叫這個function

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if (isset($_SESSION['myvar'])) {
        $_SESSION['myvar']++;
    } else {
        $_SESSION['myvar'] = 1;
    }

    echo $_SESSION['myvar'];
    ?>
</body>

</html>