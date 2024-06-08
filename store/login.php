<?php
// kiểm tra nếu có dữ liệu POST gửi đến form đăng nhập
if($_POST){
    include ("config.php"); // tệp tin kết nối với csdl

    //lay dữ liệu từ form
    $username=$_POST['username'];
    $password=$_POST['password'];

    // truy van csdl
    $query="SELECT * FROM users WHERE username='$username' and password='$password'";

    $result=mysqli_query($conn,$query);

    if(mysqli_num_rows($result)==1){ // neu tim thay 1 hang ket qua
        while($row = mysqli_fetch_assoc($result)) {
            if($row["role"] == "admin"){

                $userID = $row["userID"];
                $userName = $row["username"];
                $role = $row["role"];
                
                //luu thong tin nguoi dung vao bien session
                session_start();
                $_SESSION['auth']='true';
                $_SESSION['userID']=$userID;
                $_SESSION['userName']=$userName;
                $_SESSION['role']=$role;
            
                header('location:index.php');
            }
        }
    }else{
        echo "<script> alert('Sai tên đăng nhập hoặc mật khẩu!'); </script>";
    }

}

?>

<html>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ONE SHOP</title>
  <link rel="shortcut icon" href="https://img.freepik.com/premium-vector/vector-icon-cute-white-cat-with-big-eyes-sitting-circle_176841-6550.jpg?w=2000" />
  <link rel="stylesheet" href="Styles/style.css">
</head>
<body class="home">

  <center>
    <div id="box">
      <br><img src="https://img.freepik.com/premium-vector/vector-icon-cute-white-cat-with-big-eyes-sitting-circle_176841-6550.jpg?w=2000" /><br><br><br>
         <!-- //bieu mau dang nhap -->
      <form action="#" method="POST">
          <label for="username" style="font-size:20px";>Username:</label><br>
          <input type="text" id="username" name="username" required><br><br>
          <label for="password" style="font-size:20px";>Password:</label><br>
          <input type="password" id="pword" name="password" required><br>
          <input type="checkbox" onclick="showPass()">Show Password <br><br><br>
          <input type="submit" value="Login" id="subBtn">
        </form>
        <a href="createuser.php"><input type="button" value="Create New Account" id="createBtn"></a>

    </div>
  </center>

</body>
<script>
function showPass() {
  var x = document.getElementById("pword");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

</html>
