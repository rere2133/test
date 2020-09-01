<?php
require __DIR__ . '/parts/__connect_db.php';
if (!empty($_FILES) && !empty($_FILES['myfile']['name'])) {
    // header('Content-Type: text/plain');
    echo '<pre>';
    var_dump($_FILES);
    echo '</pre>';
    move_uploaded_file(
        $_FILES['myfile']['tmp_name'],
        __DIR__ . '/uploads/' . $_FILES['myfile']['name']
    );
    echo "<img src='./uploads/{$_FILES['myfile']['name']}'>";
    exit;
}
//圖片上傳會先存在暫存，再用move_uploaded_file轉到真正的資料夾
?>
<?php include __DIR__ . '/parts/__html_head.php'; ?>
<?php include __DIR__ . '/parts/__nav.php'; ?>
<div class="container">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="exampleFormControlFile1">Example file input</label>
            <input type="file" class="form-control-file" id="myfile" name="myfile" accept="image/*">
        </div>
        <input class="btn btn-primary" type="submit" value="上傳">
    </form>
</div>
<?php include __DIR__ . '/parts/__script.php'; ?>

<?php include __DIR__ . '/parts/__html_footer.php'; ?>