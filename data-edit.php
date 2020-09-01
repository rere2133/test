<?php
$page_title = '編輯資料';
$page_name = 'data-edit';
require __DIR__ . '/parts/__connect_db.php';
require __DIR__ . '/parts/__admin_required.php';
$sid = isset($_GET['sid']) ? intval($_GET['sid']) : 0;
if (empty($sid)) {
    header("Location:data.list.php");
    exit;
}
$sql = "SELECT * FROM address_book WHERE sid = $sid";
$row = $pdo->query($sql)->fetch();
if (empty($row)) {
    header('Location: data.list.php');
    exit;
}
?>


<?php include __DIR__ . '/parts/__html_head.php'; ?>
<style>
    small.error-msg {
        color: red;
    }
</style>
<?php include __DIR__ . '/parts/__nav.php'; ?>
<div class="container">
    <h2>Insert</h2>

</div>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div id="infobar" class="alert alert-success" role="alert" style="display: none">
                A simple light alert—check it out!
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">編輯資料</h5>
                    <form name="form1" onsubmit="return checkForm();" novalidate>
                        <input type="hidden" name="sid" value="<?= $row['sid'] ?>">
                        <div class="form-group">
                            <label for="name">** Name</label>
                            <input type="text" class="form-control" id="name" name="name" required value="<?= htmlentities($row['name']) ?>">
                            <small class="form-text error-msg"></small>
                        </div>
                        <div class="form-group">
                            <label for="email">** Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?= htmlentities($row['email']) ?>">
                            <small class="form-text error-msg"></small>
                        </div>
                        <div class="form-group">
                            <label for="mobile">** Mobile</label>
                            <input type="tel" class="form-control" id="mobile" name="mobile" value="<?= htmlentities($row['mobile']) ?>" pattern="09\d{2}-?\d{3}-?\d{3}">
                            <small class="form-text error-msg"></small>
                        </div>
                        <div class="form-group">
                            <label for="birthday">Birthday</label>
                            <input type="date" class="form-control" id="birthday" name="birthday" value="<?= htmlentities($row['birthday']) ?>">
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea class="form-control" name="address" id="address" cols="20" rows="2" value="<?= htmlentities($row['address']) ?>"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>

    </div>
</div>


<?php include __DIR__ . '/parts/__script.php'; ?>
<script>
    const email_pattern = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    const mobile_pattern = /^09\d{2}-?\d{3}-?\d{3}$/;
    const $name = document.querySelector('#name');
    const $mobile = document.querySelector('#mobile');
    const $email = document.querySelector('#email');
    const r_fields = [$name, $email, $mobile];
    const infobar = document.querySelector('#infobar');
    const submitBtn = document.querySelector('button[type=submit]');

    function checkForm() {
        let isPass = true;

        r_fields.forEach(el => {
            el.style.borderColor = '#CCCCCC';
            el.nextElementSibling.innerHTML = '';
        });

        submitBtn.style.display = 'none';

        //檢查資料格式
        if ($name.value.length < 2) {
            isPass = false;
            $name.style.borderColor = 'red';
            $name.nextElementSibling.innerHTML = '請填寫正確姓名';
        }
        if (!email_pattern.test($email.value)) {
            isPass = false;
            $email.style.borderColor = 'red';
            $email.nextElementSibling.innerHTML = '請填寫正確格式信箱';
        }
        if (!mobile_pattern.test($mobile.value)) {
            isPass = false;
            $mobile.style.borderColor = 'red';
            $mobile.nextElementSibling.innerHTML = '請填寫正確手機號碼';
        }

        if (isPass) {
            const fd = new FormData(document.form1);
            //FormData是一個沒有外觀的form

            fetch('data-edit-api.php', {
                    method: 'POST',
                    body: fd
                })
                .then(r => r.json())
                .then(obj => {
                    console.log(obj);
                    if (obj.success) {
                        infobar.innerHTML = '新增成功';
                        infobar.className = "alert alert-success";

                        setTimeout(() => {
                            location.href = 'data.list.php';
                        }, 3000)
                    } else {
                        infobar.innerHTML = obj.error || '新增失敗';
                        infobar.className = "alert alert-danger";
                        submitBtn.style.display = 'block';
                    }
                    infobar.style.display = 'block';
                });
        }
        return false;
    }
</script>
<?php include __DIR__ . '/parts/__html_footer.php'; ?>