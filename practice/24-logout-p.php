<?php
session_start();
unset($_SESSION['user']);

header('Location:23-login-p.php');
