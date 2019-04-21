<?php 
  include 'connect.php';
 ?>
<!DOCTYPE html>
<html>
<head>
  <title>Giao thông</title>
  <link rel="stylesheet" type="text/css" href="source/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="source/css/login.css">

</head>
<body>
      <div class="wrapper fadeInDown">
      <div id="formContent">
        <!-- Tabs Titles -->
    
        <!-- Icon -->
        <div class="fadeIn first">
          <img style="width:50px !important" src="source/img/logo_login.jpeg" height="52px" id="icon" alt="User Icon" />
        </div>
        <?php 
            if(isset($_POST["dangki"]))
            {
              $name = mysqli_real_escape_string($conn, $_POST['username']);
              $email = mysqli_real_escape_string($conn, $_POST['email']);
              $password = mysqli_real_escape_string($conn, $_POST['password']);
              $repassword = mysqli_real_escape_string($conn, $_POST['repassword']);


              if( $password != $repassword ) {
                echo "<script>alert('nhập mật khẩu lần 2 không trùng khớp');</script>";
              }else
              {
                $sql = "SELECT taikhoan FROM thanhvien WHERE taikhoan='$name'";
                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

                if(mysqli_num_rows($result) == 1)
                {
                   echo "<script>alert('Tài khoản đã tồn tại');</script>";
                }
                else
                {
                   $sql = "SELECT email FROM thanhvien WHERE email='$email'";
                    $result = mysqli_query($conn,$sql);
                    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

                    if(mysqli_num_rows($result) == 1)
                    {
                       echo "<script>alert('email đã tồn tại');</script>";
                    }
                    else
                    {
                      $query = mysqli_query($conn, "INSERT INTO thanhvien (taikhoan, matkhau, email,trangthai)VALUES ('$name', '$password', '$email',1)");
                      if($query){
                        header('location: danhsach_nguoidung.php');
                      }
                      else{
                        echo "<script>alert('Thêm thất bại');</script>";

                      }

                    }
                }
              }
            }



        ?>
        <!-- Login Form -->
        <form method="post" action="">
          <input type="text" id="username" class="fadeIn second" name="username" placeholder="username" required="required">
          <input type="password" id="password" class="fadeIn third" name="password" placeholder="Mật khẩu" required="required">
          <input type="password" id="repassword" class="fadeIn third" name="repassword" placeholder="Nhập lại mật khẩu" required="required">
           <input type="email" id="email" class="fadeIn third" name="email" placeholder="Nhập email" required="required">

          <input name="dangki" type="submit" class="fadeIn fourth" value="Đăng kí">
        </form>
    
        <!-- Remind Passowrd -->
        <div id="formFooter">
          <a class="underlineHover" href="login.php">Đăng nhập?</a>
        </div>
    
      </div>
    </div>

  <script src="source/js/bootstrap.js"></script>
  <script src="source/js/jquery.js"></script>

</body>
</html>