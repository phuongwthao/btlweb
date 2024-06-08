<?php
session_start(); //start de truy nhap vao cac bien
if(!$_SESSION['auth']){
    header('location:login.php');
}else{
    // lay thong tin nguoi dung tu session
    $userID = $_SESSION["userID"];
    $_SESSION['userID']=$userID;
    $userName = $_SESSION["userName"];
    $_SESSION['userName']=$userName;
    $role = $_SESSION["role"];
    $_SESSION['role']=$role;

    if($role== "admin"){
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>MONSTER</title>
            <link rel="shortcut icon" href="https://img.freepik.com/premium-vector/vector-icon-cute-white-cat-with-big-eyes-sitting-circle_176841-6550.jpg?w=2000" />
        </head>
       
        </html>


        <?php

        include("ContentSource/admin/adminStore.php");
    }
    
}


?>
