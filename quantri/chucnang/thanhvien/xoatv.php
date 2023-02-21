<?php
	session_start();
	include_once('../../ketnoi.php');
	if(isset($_SESSION['email'])){
		$id = $_GET['id'];
		$sql = "DELETE FROM user WHERE id = $id";
		$query = mysqli_query($conn,$sql);
		header("location: http://localhost/PJ2/quantri/quantri.php?page_layout=danhsachtv");
		
	}else{
		header('location:http://localhost/PJ2/index.php');
	}
?>