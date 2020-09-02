<?php
require __DIR__ . '/parts/__connect_db.php';

if (!empty($_POST['sid'])) {
    // $sql = "UPDATE `members` SET `mobile`=?,`hash`=?,`nickname`=? WHERE `id`=?";
    $sql = "UPDATE `products` SET `bookname`=?,`category_sid`=?,`price`=? WHERE `sid`=?";
    $stmt = $pdo->prepare($sql);


    $stmt->execute([
        $_POST['bookname'],
        $_POST['category_sid'],
        $_POST['price'],
        $_POST['sid']
    ]);
    if ($stmt->rowCount()) {
        $modified = true;
    }
}

$row = $pdo->query("SELECT * FROM products WHERE sid=2")->fetch();

$c_sql = "SELECT * FROM categories WHERE parent_sid=0 ORDER BY sid DESC";

$cate = $pdo->query($c_sql)->fetchAll();

?>

<?php include __DIR__ . '/parts/__html_head.php'; ?>
<?php include __DIR__ . '/parts/__nav.php'; ?>
<div class="container">
    <?php if (isset($modified)) : ?>
        <div class="alert alert-success" role="alert">
            修改成功
        </div>
    <?php endif ?>
    <form action="" method="post" name="form1">
        <input type="hidden" name="sid" value="2">
        <div class="form-group">
            <label for="bookname">bookname</label>
            <input type="text" class="form-control" id="bookname" name="bookname" value="<?= $row['bookname'] ?>">
        </div>

        <div class="form-group">
            <label for="category_sid2">分類 （後端）</label>
            <select class="form-control" id="category_sid2">
                <?php foreach ($cate as $c) : ?>
                    <option value="<?= $c['sid'] ?>" <?= $row['category_sid'] == $c['sid'] ? 'selected' : '' ?>><?= $c['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="category_sid">分類 （前端）</label>
            <select class="form-control" id="category_sid" name="category_sid" data-val="<?= $row['category_sid'] ?>">
                <?php foreach ($cate as $c) : ?>
                    <option value="<?= $c['sid'] ?>"><?= $c['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="category_sid3">分類 (radio button group)</label><br>
            <?php foreach ($cate as $c) : ?>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="category_sid3" id="cate<?= $c['sid'] ?>" value="<?= $c['sid'] ?>">
                    <label class="form-check-label" for="cate<?= $c['sid'] ?>"><?= $c['name'] ?></label>
                </div>
            <?php endforeach; ?>
        </div>


        <div class="form-group">
            <label for="price">price</label>
            <input type="text" class="form-control" id="price" name="price" value="<?= $row['price'] ?>">
        </div>

        <div class="d-flex justify-content-end">
            <input type="submit" value="修改" class="btn btn-primary">
        </div>

    </form>

    <input type="file" id="file_input" style="display: none">

</div>

<?php include __DIR__ . '/parts/__script.php'; ?>
<script>
    // const file_input = document.querySelector('#file_input');
    // const avatar = document.querySelector('#avatar');

    const $category_sid = document.querySelector('#category_sid');
    let val = $category_sid.getAttribute('data-val');

    $category_sid.value = val;
</script>

<?php include __DIR__ . '/parts/__html_footer.php'; ?>