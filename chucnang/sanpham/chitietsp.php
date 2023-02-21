<?php  
    $id_sp=$_GET['id_sp'];
    $sql = "SELECT * FROM product WHERE id=$id_sp";
    $query = mysqli_query($conn, $sql);
    $row= mysqli_fetch_array($query);
?>

<div id="product">
    <div id="prd-thumb" class="col-md-6 col-sm-12 col-xs-12 text-center">
        <img width="300px" height="200px" src="quantri/anh/<?php 
        $id=$row['id'];
        $sql2 ="SELECT * FROM galery WHERE product_id= '$id'" ;
        $result2 = $conn->query($sql2);
        while($thumnail = $result2->fetch_array()){     
            echo $thumnail['thumbnail'];
        }?>"/>
    </div>
    <div id="prd-intro" class="col-md-6 col-sm-12 col-xs-12">
        <h3><?php echo $row['title']; ?></h3>
        <p id="prd-price"><span class="sl">Giá sản phẩm:</span> <span class="sr">
            <?php 
                $price = $row['price'];
                $discount = $row['discount'];
                $newprice = $price * (100 - $discount) / 100;
                echo $newprice; 
            ?> VNĐ</span></p>
        <p><span class="sl">Khuyến Mại:</span><p>Giảm <?php echo $row['discount']; ?>%</p>
        <a href="chucnang/giohang/themhang.php?id_sp=<?php echo $row['id']; ?>"><button type="button" class="btn btn-danger">đặt mua</button></a>
    </div>
    <div id="prd-details" class="col-md-12 col-sm-12 col-xs-12 text-justify">
        <p>
            <?php echo $row['description']; ?>
        </p>
    </div>
</div>
<?php  
    if(isset($_POST['submit'])){
        $ten=$_POST['ten'];
        $dien_thoai=$_POST['dien_thoai'];
        $binh_luan=$_POST['binh_luan'];
        $ngay_gio=date('Y-m-d H:i:s');

        if(isset($ten)&&isset($dien_thoai)&&isset($binh_luan)){
            $sql="INSERT INTO feedback(firstname,phone_number,note,created_at,status) VALUES('$ten','$dien_thoai',"."'$binh_luan','$ngay_gio','$id_sp')";
            $query=mysqli_query($conn,$sql);
            header('location: index.php?page_layout=chitietsp&id_sp='.$id_sp);
        }
    }
?>
<div id="comment" class="col-md-8 col-sm-9 col-xs-12">
    <h3>Bình luận sản phẩm</h3>
    <form method="post" action="index.php?page_layout=chitietsp&id_sp=<?php echo $id_sp; ?>">
      <div class="form-group">
        <label>Tên</label>
        <input type="text" name="ten" required="" class="form-control" placeholder="Tên">
      </div>
      <div class="form-group">
        <label>Điện thoại</label>
        <input type="text" name="dien_thoai" required="" class="form-control" placeholder="Điện thoại">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Nội dung</label>
        <textarea class="form-control" name="binh_luan" required="" placeholder="Nội Dung"></textarea>
      </div>
      <button type="submit" name="submit" class="btn btn-default">Bình luận</button>
    </form>
</div>
<?php
    if(isset($_GET['page']))
    {
        $page=$_GET['page'];
    }else{
        $page=1;
    }
    $rowPerPage=3;
    $perRow=$page*$rowPerPage-$rowPerPage;
    $sqlbl="SELECT * FROM feedback WHERE status=$id_sp ORDER BY id ASC LIMIT $perRow,$rowPerPage";
    $querybl=mysqli_query($conn,$sqlbl);

    $totalRow=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM feedback WHERE status=$id_sp"));
    $totalPage= ceil($totalRow/$rowPerPage);
    $list_page="";
    for($i=1;$i<=$totalPage;$i++){
        if($page==$i){
            $list_page.='<li class="active"><a href="index.php?page_layout=chitietsp&id_sp='.$id_sp.'&page='.$i.'">'.$i.'</a></li>';
        }else{
            $list_page.='<li><a href="index.php?page_layout=chitietsp&id_sp='.$id_sp.'&page='.$i.'">'.$i.'</a></li>';
        }
    }
    $rowbl=mysqli_num_rows($querybl);
    if($rowbl>0)
    {
?>
<div id="comments" class="col-md-12 col-sm-12 col-xs-12">
    <?php  
        while($row=mysqli_fetch_array($querybl)){
    ?>
    <ul>
        <li class="comm-name"><?php echo $row['firstname']; ?></li>
        <li class="comm-time"><?php echo $row['created_at']; ?></li>
        <li class="comm-details">
            <p>
                <?php echo $row['note']; ?>
            </p>
        </li>
    </ul>
    <?php  
        }
    ?>
</div>
<?php  
    }
?>
<!-- Pagination -->
<div id="pagination" class="col-md-12 col-sm-12 col-xs-12">
    <nav aria-label="Page navigation">
      <ul class="pagination">
        <?php  
        echo $list_page;
        ?>
      </ul>
    </nav>
</div>            
<!-- End Pagination -->   
