<?php
	session_start();
    require('../../ketnoi.php');
    if(isset($_SESSION['email'])){
		$id_dm =$_GET['id_dm'];
        $sql = " DELETE FROM category WHERE id = '$id_dm' ";
        $conn->query($sql);
        header("location: http://localhost/PJ2/quantri/quantri.php?page_layout=danhsachdm");
		
	}else{
		header('location: http://localhost/PJ2/index.php');
	}
    
?>