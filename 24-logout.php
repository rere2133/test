<?php
session_start();
// 清掉user資料
unset($_SESSION['user']);

// session_destroy();//清掉所有session資料


header('Location:23-login.php');
//redirect 轉向
