<?php
$page_title = '登入';
$page_name = 'login';
require __DIR__ . '/parts/__connect_db.php';
?>


<?php include __DIR__ . '/parts/__html_head.php'; ?>
<?php include __DIR__ . '/parts/__nav.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-6">
            <form method="post" name="form1" onsubmit="checkForm(); return false;">
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

</div>


<?php include __DIR__ . '/parts/__script.php'; ?>
<script>
    function checkForm() {
        const fd = new FormData(document.form1);
        fetch('login-api.php', {
                method: 'POST',
                body: fd
            })
            .then(r => r.json())
            .then(obj => {
                console.log(obj);
                if (obj.success) {
                    alert('登入成功');
                    setTimeout(() => {
                        location.href = 'data.list.php';
                    }, 500)
                } else {
                    alert('登入失敗');
                }
            });
    }
</script>

<?php include __DIR__ . '/parts/__html_footer.php'; ?>