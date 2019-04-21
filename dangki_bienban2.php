<?php include 'header-admin.php'; ?>
<?php include 'sidebar-admin.php'; ?>
	<?php 
		if( isset($_SESSION['id_tv'])){
			$id_tv = $_SESSION['id_tv'];
		}
		$sql = "SELECT id FROM `nguoivipham` ORDER BY id DESC  LIMIT 1 ";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
		    // output data of each row
		    while($row = mysqli_fetch_assoc($result)) {
		        $id_nvp = $row['id'];
		 
		    }
		} else {
		    echo "0 results";
		}


	 ?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Advanced Form Elements
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Advanced Elements</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Select2</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>



        <?php 
        	if(isset($_POST['submit'])){
        		$title = $_POST['title'];

        		$diadiem = $_POST['diadiem'];

        		$maca = $_POST['maca'];

        		$thoigianlap = $_POST['thoigianlap'];

        		$thoigianketthuc = $_POST['thoigianketthuc'];

		        $sql = "INSERT INTO bienban(ten,Thoigianlap,Thoigianketthuc,diadiem,idCA,idTV,idNVP) VALUES (
		        '$title','$thoigianlap','$thoigianketthuc','$diadiem',$maca,$id_tv,$id_nvp)";

			if ($conn->query($sql) === TRUE) {
			    echo "<script>alert('Thêm thành công');</script>";
			} else {
			    echo "Error: " . $sql . "<br>" . $conn->error;
			}


        	}


        ?>








        <form action="" method="post" >
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
            	<div class="form-group"><label>Lập biên Bảng</label>
            		<input type="text" placeholder="nhập tên biên bản" class="form-control" name="title">
            	</div>
            	<div class="form-group"><label>Địa điểm</label>
            		<input type="text" placeholder="nhập địa chỉ" class="form-control" name="diadiem">
            	</div>


              <div class="form-group">
                <label>Chọn mã công an</label>
                <select name="maca" class="form-control select2" style="width: 100%;">
                  <?php
                  	$sql = "SELECT  id, ma FROM congan ";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {

                   ?>
                  <option value="<?php echo $row['id']; ?>"><?php echo $row['ma']; ?></option>
                  <?php 
              }
          } else {
    echo "0 results";
}
              ?>
            
                </select>
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-xs-6">
            	<div class="form-group">
            		<label>Ngày bắt lỗi </label>
            		<input type="date" name="thoigianlap" class="form-control" >

            	</div>
            	<div class="form-group">
            		<label>Hạn </label>
            		<input type="date" name="thoigianketthuc" class="form-control" >

            	</div>
            	<button type="submit" name="submit" class="btn btn-primary btn-lg">Đăng kí</button>
            	<a href="dangki_bienban3.php?id_nvp=<?= $id_nvp ?>" class="btn btn-danger btn-lg">Bước 3</a>







            </div>
            <!-- /.col -->
       
            </div>
            <!-- /.col -->
          </div>
      </form>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
    
      </div>
      <!-- /.box -->

     

  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->



  <script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap  -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS -->
<script src="bower_components/chart.js/Chart.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

</body>
</html>
