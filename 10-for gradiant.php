<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>for-loop</title>
    <style>
        td {
            width: 30px;
            height: 30px;
        }
    </style>
</head>

<body>
    <table cellspacing="0" cellpadding="0">
        <?php for ($i = 0; $i <= 255; $i += 1) : ?>
            <tr>
                <?php for ($j = 0; $j <= 255; $j += 1) : ?>

                    <td style="background-color: #<?= sprintf("%'.02X%'.02X%'.02X", $i, 00, $j) ?>"></td>
                <?php endfor ?>
            </tr>
        <?php endfor ?>
    </table>
    <table>
        <?php for ($i = 0; $i <= 255; $i += 17) : ?>
            <tr>
                <?php for ($k = 0; $k <= 255; $k += 17) : ?>
                    <td style="background-color: #<?= sprintf("%'.06X", $i * 65536 + $k) ?>"></td>
                <?php endfor ?>
            </tr>
        <?php endfor ?>
    </table>
    <table class="c-num">
        <?php for ($i = 0; $i <= 255; $i += 17) : ?>
            <tr>
                <?php for ($k = 0; $k <= 255; $k += 17) : ?>
                    <td style="background-color: #<?= sprintf("%'.06X", $i * 256 + $k) ?>"></td>
                <?php endfor ?>
            </tr>
        <?php endfor ?>
    </table>
    <script>
        // color picker
        const colorNumber = document.querySelector('.c-num');
        colorNumber.addEventListener('click', function(e) {
            const t = e.target;
            console.log(t.style.backgroundColor);
        });
        // const table = document.querySelectorAll('table');
        // for(a)
        // table.addEventListener('click', function(e) {
        //     const t = e.target;
        //     console.log(t.style.backgroundColor);
        // });
    </script>


</body>



</html>