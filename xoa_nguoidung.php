<?php 
	include 'connect.php';

	if(isset($_GET['id'])){
		$id = $_GET['id'];
	}

	// sql to delete a record
	$sql = "DELETE FROM thanhvien WHERE id=$id";

	if ($conn->query($sql) === TRUE) {
	    header("location: danhsach_nguoidung.php?delete=success");

	} else {
	    echo "Error deleting record: " . $conn->error;
	}


?>