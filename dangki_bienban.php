<?php include 'header-admin.php'; ?>



<?php include 'sidebar-admin.php'; ?>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Bước 1
      
      </h1>
    
    </section>
    <?php
      if( isset($_POST['submit'])){
        $hoten = $_POST['hoten'];
        $cmnd = $_POST['cmnd'];
        $gender = $_POST['gender'];
        $diachi = $_POST['diachi'];
        $sdt = $_POST['sdt'];
        $id_tv = $_SESSION['id_tv'];
        $sql = "INSERT INTO nguoivipham(hoten,gioitinh,diachi,sdt,cmnd,id_tv) 
        VALUES('$hoten',$gender,'$diachi','$sdt','$cmnd',$id_tv)";

      if (mysqli_query($conn, $sql)) {
          echo "<script>alert('Thêm người vi phạm thành công');</script>";
      } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }

}


     ?>



    <!-- Main content -->
    <section class="content">
      <form action="" method="post">
      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Nhập thông tin người phạm lỗi</h3>

        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
            <div class="form-group">
              <label>Họ tên</label>
              <input class="form-control" type="text" name="hoten" placeholder="hãy nhập họ tên" required>
            </div>

             <div class="form-group">
              <label>Chứng minh nhân dân</label>
              <input class="form-control" type="text" name="cmnd" placeholder="hãy nhập chứng minh nhân dân" required>
            </div>
  
              <input type="radio" name="gender" value=0> nam
<input type="radio" name="gender" value=1 > nữ
            <button  class="btn btn-lg btn-primary" type="submit" name="submit" >Cập nhật </button>

           

              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            

            <div class="col-md-6">
             <div class="form-group">
              <label>Địa chỉ</label>
              <input class="form-control" type="text" name="diachi" placeholder="hãy nhập địa chỉ" required>
            </div>
             <div class="form-group">
              <label>Số điện thoại </label>
              <input class="form-control" type="text" name="sdt" placeholder="hãy nhập số điện thoại" required>
            </div>
            <a id="button22" class="btn btn-lg btn-primary" href="dangki_bienban2.php" >Tiếp tục bước 2</a>
            </div>
              <!-- /.form-group -->
            
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
      </form>
        <!-- /.box-body -->
        
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
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>
</body>
</html>
