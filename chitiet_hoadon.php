<?php include 'connect.php'; ?>
<?php if(isset($_GET['id'])){
    $id = $_GET['id'];
} 
    if(isset($_GET['total'])){
      $total = $_GET['total'];
    }


?>

<!-- Main content -->
<section class="content"style="    text-align: center " >
  <div class="row">
    <h1>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM </h1>
    <h3>Độc lập - Tự do - Hạnh Phúc </h3>
    <br/>
     <?php 
                $sql = "SELECT n.hoten ,b.id as id ,  b.ten  as tenbienbang , thoigianlap, thoigianketthuc , diadiem ,status , c.ma as ma  , n.cmnd as cmnd
                        FROM bienban b
                            INNER JOIN congan c ON b.idCA = c.id
                            INNER JOIN nguoivipham n ON n.id  = b.idNVP where b.id=$id";
                $result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
                  ?>
      <h1 >Biên Lai</h1>
      <br/>
      <h3>Phiếu nộp tiền phạt</h3>
      <h4>Họ tên: <?= $row['hoten'] ?> đã có hành vi phạm luật giao thông </h4>
      <h4>Số tiền phải nộp là: <?php echo number_format($total); ?> </h4>


      <?}
    }
    ?>

    </div>
  </div>
</section>
<br/>
<br/>
<div style="margin-left:70%">
  Hồ Chí Minh, Ngày .... Tháng .... Năm .....
  <br/><p style="text-align:center">Ký tên</p> 
</div>


