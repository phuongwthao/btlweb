<?php

session_start();
session_unset();
session_destroy();

header('location:login.php');

//ket thuc 1 phien lam viec, chuyen huong den dang nhap
?>