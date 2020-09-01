<?php
$page_title = '資料列表';
$page_name = 'data-list2';
require __DIR__ . '/parts/__connect_db.php';
?>


<?php include __DIR__ . '/parts/__html_head.php'; ?>
<?php include __DIR__ . '/parts/__nav.php'; ?>
<div class="container">
    <div class="row">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <!-- <li class="page-item">
                    <a class="page-link" href="?page=">
                        <i class="fas fa-arrow-circle-left"></i>
                    </a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="?page=">

                    </a>
                </li>
                <li class="page-item ">
                    <a class="page-link" href="?page=">
                        <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </li> -->
            </ul>
        </nav>
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
                    <th scope="col">
                        <i class="fas fa-edit"></i></th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>

</div>

<?php include __DIR__ . '/parts/__script.php'; ?>
<script>
    const tbody = document.querySelector('tbody');

    let pageData; //?要幹嘛

    const hashHandler = function() {
        let h = parseInt(location.hash.slice(1)) || 1;
        //parseInt 將輸入的字串轉成數字
        if (h < 1) h = 1;
        console.log(`h:${h}`);
        getData(h);
    }
    window.addEventListener('hashchange', hashHandler);
    hashHandler(); //頁面一進來就直接呼叫

    const pageItemTpl = (o) => {
        return `
        <li class="page-item ${o.active}">
            <a class="page-link" href="#${o.page}">${o.page}</a>
        </li>`;
        //href為頁面內的連結
    };
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

    function getData(page = 1) {
        // fetch('data.list2-api.php')
        fetch('data.list2-api.php?page=' + page)
            .then(r => r.json())
            .then(obj => {
                console.log(obj);
                pageData = obj;
                let str = '';
                for (let i of obj.rows) {
                    str += tableRowTpl(i);
                }
                tbody.innerHTML = str;

                str = '';
                for (let i = obj.page - 3; i < obj.page + 3; i++) {
                    if (i < 1) continue;
                    if (i > obj.totalPages) continue;
                    const o = {
                        page: i,
                        active: ''
                    }
                    if (obj.page === i) {
                        o.active = 'active';
                    }
                    str += pageItemTpl(o);
                }
                document.querySelector('.pagination').innerHTML = str;
            });
    }
</script>
<?php include __DIR__ . '/parts/__html_footer.php'; ?>