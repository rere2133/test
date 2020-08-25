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
// 送出的表單有account的欄位
if (isset($_POST['account'])) {
    // 輸入的帳號（$account的key)如果不是空值,且有對應到該陣列
    if (!empty($account[$_POST['account']])) {
        $a = $account[$_POST['account']];
        // 輸入的密碼與對應陣列密碼相同
        if ($_POST['password'] == $a['pw']) {
            $_SESSION['user'] = [
                'account' => $_POST['account'],
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
                <div class="col">
                    <div class="alert alert-info" role="alert">
                        <?= $_SESSION['user']['nickname'] ?>
                        ,hi!<br>

                        <a href="./24-logout.php">登出</a>
                    </div>
                </div>
            </div>
        <?php else : ?>
            <div class="row">
                <div class="col-6">
                    <form method="post">
                        <div class="form-group">
                            <label for="account">Email address</label>
                            <input type="text" class="form-control" id="account" name="account">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" name="checkbox" value="checked">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

            </div>
        <?php endif; ?>
    </div>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>