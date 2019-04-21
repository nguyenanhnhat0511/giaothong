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
        $id = 0;
            if(isset($_GET['id']) && $_GET['id'] >0){
              $id = $_GET['id'];
            }


            if(isset($_POST["dangki"]))
            {
              $password = mysqli_real_escape_string($conn, $_POST['password']);
              $repassword = mysqli_real_escape_string($conn, $_POST['repassword']);


              if( $password != $repassword ) {
                echo "<script>alert('nhập mật khẩu lần 2 không trùng khớp');</script>";
              }else
              {

                $sql = "UPDATE thanhvien SET matkhau='$password' WHERE id=$id";

                if ($conn->query($sql) === TRUE) {
                    header('location: danhsach_nguoidung.php?edit=success');
                } else {
                    echo "Error updating record: " . $conn->error;
                }
               
              }
            }



        ?>
        <!-- Login Form -->
        <form method="post" action="">
          <?php

            $sql = "SELECT * FROM thanhvien where id=".$id;
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {

           ?>
          <input type="text" id="username" class="fadeIn second" name="username" placeholder="username" required="required" value="<?= $row['taikhoan'];?>"
          readonly="true"
          >
          <input type="password" id="password" class="fadeIn third" name="password" placeholder="Mật khẩu" required="required">
          <input type="password" id="repassword" class="fadeIn third" name="repassword" placeholder="Nhập lại mật khẩu" required="required">
           <input type="email" id="email" class="fadeIn third" name="email" placeholder="Nhập email" required="required" value="<?= $row['email'];?>"  readonly="true">
           <?php 
         }}
           ?>

          <input name="dangki" type="submit" class="fadeIn fourth" value="Đổi mật khẩu">
        </form>
    
        <!-- Remind Passowrd -->
        <div id="formFooter">
          <a class="underlineHover" href="danhsach_nguoidung.php">Quay về?</a>
        </div>
    
      </div>
    </div>

  <script src="source/js/bootstrap.js"></script>
  <script src="source/js/jquery.js"></script>

</body>
</html>