<?php include 'header-admin.php'; ?>
<?php include 'sidebar-admin.php'; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>Chi tiết công an</h1>
</section>

   <?php 
    if(isset($_GET['id']) && $_GET['id'] >0){
              $id = $_GET['id'];
            }
      $sql = "SELECT * FROM congan where id=".$id;
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {

           ?>
<!-- Main content -->
<section class="content" >
  <div class="row">
    <div class="left-content col-xs-3">
      <img style="  border-radius: 50%;
" src="<?= $row['image'] ?>" height="250px" width="250px"/>
      <div class="thongtin" style="text-align:center">
       
        <h3>Thông tin</h3>
        <p>
          Tên: <?= $row['hoten']; ?>
          <p>Giới tính: <?php 
            if($row['gioi_tinh'] == 1 ){
              echo "nam";
            }else{
              echo "nữ";
            }

           ?>
        </p>
        <p>Địa chỉ: <?= $row['diachi']; ?></p>
      <p>Số điện thoại: <?= $row['sdt'];?></p>

      </div>



    </div>
  <div class="right-content col-xs-9" >
      <!-- Content Wrapper. Contains page content -->
  <div class="constainer">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Các biên bản </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         

          <div class="box">
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Tên</th>
                  <th>Thời gian lập</th>
                  <th>Thời gian kết thúc</th>
                  <th>Địa điểm</th>
                  
                  
                </tr>
                </thead>
                <tbody>
                <?php 
                $sql = "SELECT * FROM bienban where idCA=".$id;
                $result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
                  ?>
                <tr>
                  <td><?= $row['ten'] ?></td>
                  <td><?=  $row['Thoigianlap']; ?>
                
                  </td>
                  <td><?=  $row['Thoigianketthuc']; ?>
                
                  </td>
                
                  <td><?= $row['diadiem']; ?></td>
                  
              
             
                </tr>

                <?php } } ?>
               
                </tbody>
                <tfoot>
                <tr>
                  <th>Tên</th>
                  <th>Thời gian lập</th>
                  <th>Thời gian kết thúc</th>
                  <th>Địa điểm</th>
               
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

    </div>


  </div>




</section>
<?php 

}
}
?>
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
<!-- page script -->
</body>
</html>