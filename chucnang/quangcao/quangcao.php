<?php 
	$sql="SELECT * FROM advertisement";
	$query=mysqli_query($conn,$sql);
	$listImg="";
	while ($row=mysqli_fetch_array($query)) {
		$listImg.='<img  alt="anh chua hien thi" style="position: absolute;" class="img-thumbnail" width="275px" height="100px"  src="quantri/anh/'.$row['name'].'"/>';
	}
?>

<div id="banner-l">
    <h2 class="h2-bar">đối tác</h2>
		
	<div id="simple-slideshow" style="position: relative; height: 200px;">
		<?php 
			echo $listImg;
		?>
	</div>
</div>

<script>
			$("#simple-slideshow > img:gt(0)").hide();
			setInterval(function() {
			$('#simple-slideshow > img:first')
			.fadeOut(1000)
			.next()
			.fadeIn(1000)
			.end()
			.appendTo('#simple-slideshow');
			}, 2000);
</script>