<?php
$page_title = '資料列表';
$page_name = 'data-list';
require __DIR__ . '/parts/__connect_db.php';

// $perPageData = 5; //每頁有幾筆資料
$perPageData = 5;

$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

$t_qul = "SELECT COUNT(1) FROM `address_book`";
$totalRows = $pdo->query($t_qul)->fetch(PDO::FETCH_NUM)[0];
// exit;
$totalPages = ceil($totalRows / $perPageData);
//ceil() 函數向上捨入為最接近的整數。

// $stmt = $pdo->query("SELECT * FROM `address_book` LIMIT 3,6");
// $rows = $stmt->fetchAll();

$rows = [];
if ($totalRows > 0) {
    // if ($page < 1) $page = 1;
    // if ($page > $totalPages) $page = $totalPages;
    if ($page < 1) {
        header('Location: data-list.php');
        exit;
    };
    if ($page > $totalPages) {
        header('Location: data-list.php?page=' . $totalPages);
        exit;
    };

    $sql = sprintf("SELECT * FROM `address_book` ORDER BY `address_book`.`sid` DESC LIMIT %s,%s", ($page - 1) * $perPageData, $perPageData);
    $stmt = $pdo->query($sql);
    $rows = $stmt->fetchAll();
}

?>

<?php include __DIR__ . '/parts/__html_head.php'; ?>
<?php include __DIR__ . '/parts/__nav.php'; ?>
<div class="container">
    <nav aria-label="Page navigation example">
        <ul class="pagination">

            <li class="page-item"><a class="page-link" href="?page=<?= $page - 1 ?>"><i class="fas fa-arrow-circle-left"></i></a></li>

            <?php for ($i = $page - 3; $i <= $page + 3; $i++) :
                if ($i < 1) continue;
                if ($i > $totalPages) break;
            ?>
                <li class="page-item <?= $i == $page ? 'active' : '' ?>"><a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a></li>
            <?php endfor; ?>

            <li class="page-item"><a class="page-link" href="?page=<?= $page + 1 ?>"> <i class="fas fa-arrow-circle-right"></i></a></li>
        </ul>
    </nav>
    <table class="table table-dark">
        <!-- `sid`,`name`,`mobile`,`email`,`birthday`,`address`,`created_at` -->
        <thead>
            <tr>
                <th scope="col"><i class="fas fa-trash-alt"></i></th>
                <th scope="col"><i class="fas fa-user-times"></i></th>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Mobile</th>
                <th scope="col">Email</th>
                <th scope="col">Birth</th>
                <th scope="col">Add</th>
                <th scope="col"><i class="fas fa-edit"></i></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as $r) : ?>
                <tr>
                    <td><a href="data-delete.php?sid=<?= $r['sid'] ?>" onclick="ifDel(event)" data-sid="<?= $r['sid'] ?>"><i class="fas fa-trash-alt"></i></a></td>
                    <td><a href="javascript:delete_it(<?= $r['sid'] ?>)">
                            <i class="fas fa-user-times"></i>
                        </a></td>
                    <td><?= $r['sid'] ?></td>
                    <td><?= $r['name'] ?></td>
                    <td><?= $r['mobile'] ?></td>
                    <td><?= $r['email'] ?></td>
                    <td><?= $r['birthday'] ?></td>
                    <td><?= $r['address'] ?></td>
                    <td><a href="#"><i class="fas fa-edit"></i></a></td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
</div>


<?php include __DIR__ . '/parts/__script.php'; ?>
<script>
    function ifDel(event) {
        const a = event.currentTarget;
        //target為點選時選到最內層標籤
        console.log(event.target, event.currentTarget);
        const sid = a.getAttribute('data-sid');
        if (!confirm(`是否要刪除編號為 ${sid} 的資料？`)) {
            event.preventDefault(); //取消連往href的設定
        }
    }

    function delete_it(sid) {
        if (confirm(`是否要刪除編號為${sid}的資料？？`)) {
            location.href = 'data-delete.php?sid=' +
                sid;
        }
    }
</script>
<?php include __DIR__ . '/parts/__html_footer.php'; ?>