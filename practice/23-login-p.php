<?php
session_start();
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
if (isset($_POST['account'])) {
    if (!empty($account[$_POST['account']])) {
        $a = $account[$_POST['account']];
        if ($_POST['password'] == $a['pw']) {
            $_SESSION['user'] = [
                'account' => $a,
                'nickname' => $a['nickname']
            ];
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <?php if (isset($_SESSION['user'])) : ?>
            <div class="row">
                <div class="alert alert-primary" role="alert">
                    <?= $_SESSION['user']['nickname'] ?>, Welcome!
                    <a href="24-logout-p.php">登出</a>

                </div>

            </div>
        <?php else : ?>
            <div class="row">
                <form class="col-6" method="post">
                    <div class="form-group">
                        <label for="account">Account</label>
                        <input type="text" class="form-control" id="account" name="account">

                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        <?php endif; ?>
    </div>





    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>