<?php include 'connect.php'; 
	 session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Giao thông</title>
	<link rel="stylesheet" type="text/css" href="source/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="source/css/login.css">

</head>
<body>
<?php
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($conn,$_POST['username']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
      
      $sql = "SELECT id,trangthai FROM thanhvien WHERE taikhoan = '$myusername' and matkhau = '$mypassword'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['trangthai'];
      $count = mysqli_num_rows($result);
      $_SESSION['id_tv'] = $row["id"];

		
      if($count == 1) {
         $_SESSION['login_user'] = $myusername;
         if($active == 1 ){
         	    header("location: admin.php");
         }else{
         	    header("location: index.php");

         }
      }else {
         $error = "Your Login Name or Password is invalid";
      }
      echo $error;
   }
   ?>
	    <div class="wrapper fadeInDown">
      <div id="formContent">
        <!-- Tabs Titles -->
    
        <!-- Icon -->
        <div class="fadeIn first">
          <img style="width:50px !important" src="source/img/logo_login.jpeg" height="52px" id="icon" alt="User Icon" />
        </div>
    
        <!-- Login Form -->
        <form action = "" method = "post"	>
          <input type="text" id="login" class="fadeIn second" name="username" placeholder="Tài khoản" required="required">
          <input type="password" id="password" class="fadeIn third" name="password" placeholder="Mật khẩu" required="required">
          <input type="submit" name="login" class="fadeIn fourth" value="Đăng nhập">
        </form>
    
        <!-- Remind Passowrd -->
        <div id="formFooter">
          <a class="underlineHover" href="register.php">Tạo tài khoản?</a>
        </div>
    
      </div>
    </div>

	<script src="source/js/bootstrap.js"></script>
	<script src="source/js/jquery.js"></script>

</body>
</html>