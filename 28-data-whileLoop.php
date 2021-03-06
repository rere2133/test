<?php
$page_title = '資料列表';
require __DIR__ . '/parts/__connect_db.php';

$stmt = $pdo->query("SELECT * FROM `address_book` LIMIT 3,6");

// $rows = $stmt->fetchAll();


?>

<?php include __DIR__ . '/parts/__html_head.php'; ?>
<?php include __DIR__ . '/parts/__nav.php'; ?>
<div class="container">
    <table class="table table-dark">
        <!-- `sid`,`name`,`mobile`,`email`,`birthday`,`address`,`created_at` -->
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Mobile</th>
                <th scope="col">Email</th>
                <th scope="col">Birth</th>
                <th scope="col">Add</th>
                <th scope="col">Created Time</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($r = $stmt->fetch()) : ?>
                <tr>
                    <td><?= $r['sid'] ?></td>
                    <td><?= $r['name'] ?></td>
                    <td><?= $r['mobile'] ?></td>
                    <td><?= $r['email'] ?></td>
                    <td><?= $r['birthday'] ?></td>
                    <td><?= $r['address'] ?></td>
                    <td><?= $r['created_at'] ?></td>
                </tr>
            <?php endwhile; ?>

        </tbody>
    </table>
</div>


<?php include __DIR__ . '/parts/__script.php'; ?>
<?php include __DIR__ . '/parts/__html_footer.php'; ?>