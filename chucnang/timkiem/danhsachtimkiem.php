<?php  
    if(isset($_GET['page'])){
        $page=$_GET['page'];
    }else{
        $page=1;
    }
    $rowPerPage=12;
    $perRow=$page*$rowPerPage-$rowPerPage;

    if(isset($_POST['stext'])){
        $stext=$_POST['stext']; 
    }else{
        $stext=$_GET['stext'];
    }

    $stextNew=trim($stext);
    $arr_stextNew=explode(' ',$stextNew);
    $stextNew= implode('%', $arr_stextNew);
    $stextNew='%'.$stextNew.'%';

    $sql= "SELECT * FROM product WHERE title LIKE ('$stextNew') ORDER BY id ASC LIMIT $perRow,$rowPerPage";
    $query= mysqli_query($conn, $sql);

    $totalRow=mysqli_num_rows(mysqli_query($conn, "SELECT * FROM product WHERE title LIKE ('$stextNew')"));
    $totalPage=ceil($totalRow/$rowPerPage);
    $list_page='';
    for($i=1;$i<=$totalPage;$i++){
        if($page==$i){
            $list_page.= '<li class="active" ><a href="index.php?page_layout=danhsachtimkiem&stext='.$stext.'&page='.$i.'">'.$i.'</a></li>';
        }else{
            $list_page.= '<li><a href="index.php?page_layout=danhsachtimkiem&stext='.$stext.'&page='.$i.'">'.$i.'</a></li>';
        }
    }
?>
<div class="products">
    <h2 class="h2-bar search-bar">kết quả tìm được với từ khóa 
    <span>"<?php echo $stext; ?>"</span></h2>
    <div class="row">
        <?php  
            while($row=mysqli_fetch_array($query)) {
        ?>
        <div class="col-md-3 col-sm-6 product-item text-center">
            <a href="index.php?page_layout=chitietsp&id_sp=<?php echo $row['id']; ?>">
                <img width="120px" height="80px" 
                    src="quantri/anh/<?php 
                    $id=$row['id'];
                    $sql2 ="SELECT * FROM galery WHERE product_id= '$id'" ;
                    $result2 = $conn->query($sql2);
                    while($thumnail = $result2->fetch_array()){     
                        echo $thumnail['thumbnail'];
                    }
                ?>"/>
            </a>
            <h3><a href="index.php?page_layout=chitietsp&id_sp=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></h3>
            <p class="price">
                <?php 
                    $price = $row['price'];
                    $discount = $row['discount'];
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
<!-- Pagination -->
<div id="pagination">
    <nav aria-label="Page navigation">
      <ul class="pagination">
        <?php 
            echo $list_page;
        ?>
      </ul>
    </nav>
</div>            
<!-- End Pagination -->     
           