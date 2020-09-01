<?php
session_start();
// 清掉user資料
unset($_SESSION['admin']);

// session_destroy();//清掉所有session資料


header('Location:data.list.php');
//redirect 轉向
