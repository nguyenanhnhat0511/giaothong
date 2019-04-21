<?php include 'header-admin.php'; ?>
    <?php include 'sidebar-admin.php'; ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Danh sách công an</h1>
            </section>

             <?php 
              if(isset($_GET['id']) && $_GET['id'] >0){
              $id = $_GET['id'];
            }
                


            if(isset($_POST["submit"]))
            {


            $name = mysqli_real_escape_string($conn, $_POST['username']);
              $ma = mysqli_real_escape_string($conn, $_POST['ma']);
           

              $old = mysqli_real_escape_string($conn, $_POST['tuoi']);
              $gender = mysqli_real_escape_string($conn, $_POST['gender']);
              $address = mysqli_real_escape_string($conn, $_POST['address']);
              $numberphone = mysqli_real_escape_string($conn, $_POST['numberphone']);

              

     
              if( false ) {
                echo "<script>alert('nhập mật khẩu lần 2 không trùng khớp');</script>";
              }else
              {
              
                $query = mysqli_query($conn, "UPDATE `congan` SET 
    `hoten`='$name',
    `gioi_tinh`=$gender,
    `tuoi`=$old,
    `diachi`='$address',
    `sdt`='$numberphone' WHERE id =+ $id ");
                      if($query){
                            echo "<script>alert('đăng kí thành công');</script>";
                      }
                      else{
                        echo "<script>alert('Thêm thất bại');</script>";

                      
                    
                }
              }
              
            }



        ?>


            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <?php

            $sql = "SELECT * FROM congan where id=".$id;
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {

           ?>
                        <form action="" role="form" enctype="multipart/form-data" method="post">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Mã</label>
                                            <input type="text" name="ma" class="form-control" id="" readonly="true" required="true"
                                            value="<?php echo $row['ma']; ?>"
                                            >
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Họ tên</label>
                                            <input type="text" name="username"
                                            value="<?php echo $row['hoten']; ?>" class="form-control" id="" placeholder="Nhập họ tên">
                                        </div>

                                    </div>
                                </div>

                            

                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Địa chỉ</label>
                                            <input type="text" name="address"
                                            value="<?php echo $row['diachi']; ?>" class="form-control" id="" placeholder="Nhập Địa chỉ" required="true">
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Số điện thoại</label>
                                            <input type="text" name="numberphone" class="form-control" value="<?= $row['sdt'] ?>" id="" placeholder="Nhập số điện thoại">
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group">
                                    


                                    <div class="row">
                                        <div class="col-xs-6">
                                            <br/>
                                            
                                            <input type="radio" name="gender" value="1" checked> Nam
                                            <input type="radio" name="gender" value="0"> Nữ
                                            <br>

                                        </div>
                                        <div class="col-xs-6">
                                            <label name="tuoi">Chọn tuổi</label>
                                            <select name="tuoi">
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>
                                                <option value="31">32</option>

                                            </select>
                                        </div>

                                    </div>
                                </div>

                            </div>
                            <!-- /.box-body -->
                            <button name="submit" type="submit" class="btn btn-primary btn-lg">Đăng kí</ </div>
                        </form>
                        <?php 

                    }
                }
                ?>

                        <!-- Control Sidebar -->
                        <aside class="control-sidebar control-sidebar-dark">
                            <!-- Create the tabs -->
                            <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                                <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
                                <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <!-- Home tab content -->
                                <div class="tab-pane" id="control-sidebar-home-tab">
                                    <h3 class="control-sidebar-heading">Recent Activity</h3>
                                    <ul class="control-sidebar-menu">
                                        <li>
                                            <a href="javascript:void(0)">
                                                <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                                                <div class="menu-info">
                                                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                                    <p>Will be 23 on April 24th</p>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <i class="menu-icon fa fa-user bg-yellow"></i>

                                                <div class="menu-info">
                                                    <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                                                    <p>New phone +1(800)555-1234</p>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                                                <div class="menu-info">
                                                    <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                                                    <p>nora@example.com</p>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <i class="menu-icon fa fa-file-code-o bg-green"></i>

                                                <div class="menu-info">
                                                    <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                                                    <p>Execution time 5 seconds</p>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                    <!-- /.control-sidebar-menu -->

                                    <h3 class="control-sidebar-heading">Tasks Progress</h3>
                                    <ul class="control-sidebar-menu">
                                        <li>
                                            <a href="javascript:void(0)">
                                                <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

                                                <div class="progress progress-xxs">
                                                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

                                                <div class="progress progress-xxs">
                                                    <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

                                                <div class="progress progress-xxs">
                                                    <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

                                                <div class="progress progress-xxs">
                                                    <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                    <!-- /.control-sidebar-menu -->

                                </div>
                                <!-- /.tab-pane -->
                                <!-- Stats tab content -->
                                <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
                                
                            </div>
                        </aside>
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
                    <!-- page script -->

                    </body>

                    </html>