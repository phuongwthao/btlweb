<?php
    // File xử lý yêu cầu ajax gửi sang để thực hiện cập nhật product
    include("../../config.php");

    $id= $_POST['productId'];
    $proName= $_POST['productname'];
    $proCat= $_POST['productCategory'];
    $proDis= $_POST['productDiscription'];
    $proPrice= $_POST['productPrice'];
    $proImg= $_POST['productImgURL'];

    $sql = "UPDATE `products` SET productName='$proName' , productCategory='$proCat', productDiscription='$proDis', productPrice='$proPrice', productImgSrc='$proImg' WHERE productID = '$id' ";
    $conn->query($sql);
    mysqli_close($conn);
