<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>if else</title>
</head>

<body>
    <?php
    if (!empty($_GET['age']) and  $_GET['age'] >= 18) {
    ?>

        <img src="./img/01.jpg" alt="">
        <!-- php裡面嵌入html，這裡的html相當於php的echo -->

    <?php } else { ?>

        <img src="./img/02.jpg" alt="">

    <?php } ?>
    <br>
    <?php if (!empty($_GET['age']) and  $_GET['age'] >= 18) : ?>

        <img src="img/01.jpg" alt="">

    <?php else : ?>

        <img src="img/02.jpg" alt="">

    <?php endif; ?>

</body>

</html>