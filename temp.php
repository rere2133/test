<?php
$page_title = '資料列表';
$page_name = 'data-list';
require __DIR__ . '/parts/__connect_db.php';


?>
<?php include __DIR__ . '/parts/__html_head.php'; ?>
<?php include __DIR__ . '/parts/__navbar.php'; ?>
<div class="container">
    <div class="row">
        <div class="col d-flex justify-content-end">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item ">
                        <a class="page-link" href="?page=">
                            <i class="fas fa-arrow-circle-left"></i>
                        </a>
                    </li>

                    <li class="page-item ">
                        <a class="page-link" href="?page="></a>
                    </li>

                    <li class="page-item ">
                        <a class="page-link" href="?page=">
                            <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </li>
                </ul>
            </nav>

        </div>
    </div>


    <table class="table table-striped">
        <!-- `sid`, `name`, `email`, `mobile`, `birthday`, `address`, `created_at` -->
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">姓名</th>
                <th scope="col">電郵</th>
                <th scope="col">手機</th>
                <th scope="col">生日</th>
                <th scope="col">地址</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>

</div>
<?php include __DIR__ . '/parts/__scripts.php'; ?>
<script>
    const tboday = document.querySelector('tbody');

    const tableRowTpl = (o) => {

        return `
        <tr>
            <td>${o.sid}</td>
            <td>${o.name}</td>
            <td>${o.email}</td>
            <td>${o.mobile}</td>
            <td>${o.birthday}</td>
            <td>${o.address}</td>
        </tr>
        `;
    };

    fetch('data-list2-api.php')
        .then(r => r.json())
        .then(obj => {
            console.log(obj);
            let str = '';
            for (let i of obj.rows) {
                str += tableRowTpl(i);
            }
            tboday.innerHTML = str;
        });
</script>
<?php include __DIR__ . '/parts/__html_foot.php'; ?>