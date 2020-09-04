<?php
session_start();
echo $_SESSION['myvar'];
  //可從不同頁面看到相同的session，跨頁面的共享資源可用cookie,session,mysql
