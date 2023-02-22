<?php  
    $sql="SELECT * FROM product";
    $query=mysqli_query($conn,$sql);
?>

<div class="products">
    <h2 class="h2-bar">Sản phẩm</h2>
    <div class="row">
        <?php  
            while ($row=mysqli_fetch_array($query)) {
        ?>
        <div class="col-md-3 col-sm-6 product-item text-center">
            <a href="index.php?page_layout=chitietsp&id_sp=<?php echo $row['id']; ?>"><img width="120px" height="80px" src="quantri/anh/<?php 
                $id=$row['id'];
                $sql2 ="SELECT * FROM galery WHERE product_id= '$id'" ;
                $result2 = $conn->query($sql2);
                while($thumnail = $result2->fetch_array()){     
                    echo $thumnail['thumbnail'];
                }?>"/></a>
            <h3><a href="index.php?page_layout=chitietsp&id_sp=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></h3>
            <?php
                $price = $row['price'];
                $discount = $row['discount'];
                if($discount > 0){
            ?>
                <del><p>
            <?php echo $row['price']; }
                else{echo '<br>';}
            ?></p></del>
            <p class="price">
                <?php 
                    $newprice = $price * (100 - $discount) / 100;
                    echo $newprice; 
                ?> VNĐ
            </p>
        </div>
        <?php
            }
        ?>
    </div>
</div>
