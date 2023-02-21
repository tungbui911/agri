<?php
	session_start();
	include_once('../../ketnoi.php');
	if(isset($_SESSION['email'])){
		$id_sp = $_GET['id_sp'];
		$sql = "DELETE FROM galery WHERE id = $id_sp";
		$query = mysqli_query($conn,$sql);
		$sql = "DELETE FROM product WHERE id = $id_sp";
		$query = mysqli_query($conn,$sql);
		header("location: http://localhost/PJ2/quantri/quantri.php?page_layout=danhsachsp");
		
	}else{
		header('location:http://localhost/PJ2/index.php');
	}
?>