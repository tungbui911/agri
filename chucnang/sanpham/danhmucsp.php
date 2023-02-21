<?php  
    $sql="SELECT * FROM category ORDER BY id ASC";
    $query= mysqli_query($conn,$sql);
?>

<div id="menu-but" type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
</div>
<div id="menu" class="sidebar collapse navbar-collapse">
    <h2 class="h2-bar">Danh mục sản phẩm</h2>
    <ul>
        <?php  
            while($row=mysqli_fetch_array($query)) {
        ?>
        <li><a href="index.php?page_layout=danhsachsp&id_dm=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></li>
        <?php  
            }
        ?>
    </ul>
</div>