<?php include 'header-admin.php'; ?>
<?php include 'sidebar-admin.php'; ?>
	<?php 
		if( isset($_SESSION['id_tv'])){
			$id_tv = $_SESSION['id_tv'];
		}
		if($_GET['id_nvp']){
      $id_nvp = $_GET['id_nvp'];
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
  function get_id_loivp(){
   

  }


   function nhatnguyen(){
    echo "alert('đã lấy được function')";
   
  }


 ?>

        <?php 
           $sql = "SELECT id FROM `bienban` ORDER BY id DESC  LIMIT 1 ";
              $result = mysqli_query($conn, $sql);

              if (mysqli_num_rows($result) > 0) {
                  // output data of each row
                  while($row = mysqli_fetch_assoc($result)) {
                      $id_bienban = $row['id'];
                  }
              } 


        	if(isset($_POST['submit'])){
                get_id_loivp();
        		$ten = $_POST['ten'];

        		$mucphat = $_POST['mucphat'];

     

		        $sql = "INSERT INTO `loivp`(ten,mucphat, idTV,idnvp) VALUES ('$ten',$mucphat,$id_tv,$id_nvp)";

			if ($conn->query($sql) === TRUE) {
           $sql = "SELECT id FROM `loivp` ORDER BY id DESC  LIMIT 1 ";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $id_lastloivp = $row['id'];
        }
    }


    $sql1 = "INSERT INTO bb_loivp(idbb,idloivp) VALUES ($id_bienban,$id_lastloivp)";

if ($conn->query($sql1) === TRUE) {
          echo "<script>alert('Thêm thành công');</script>";
} 
 



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
            	<div class="form-group"><label>Lập Tên lỗi</label>
            		<input required type="text" placeholder="nhập tên lỗi" class="form-control" name="ten">
            	</div>
       
              <!-- /.form-group -->
            </div>
            <div class="col-xs-6">
            	<div class="form-group">
            		<label>Tiền phạt </label>
            		<input required type="text" name="mucphat" class="form-control" placeholder="vui lòng nhập mức phạt" >

            	</div>
            
            	<button type="submit" name="submit" class="btn btn-primary btn-lg">Đăng kí</button>
            	<a href="thanhtoan.php?id=<?= $id_bienban ?>" class="btn btn-danger btn-lg">Xem biên bản</a>







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
