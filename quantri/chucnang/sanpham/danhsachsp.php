<?php
    require('./ketnoi.php');

    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }
    else{
        $page = 1;

    }
    $rowPerPage = 10;
    $perRow =$page*$rowPerPage-$rowPerPage;

    $sql =" SELECT * FROM product ORDER BY id ASC LIMIT $perRow,$rowPerPage " ;
    $result = $conn->query($sql);

    $totalRows = mysqli_num_rows(mysqli_query( $conn,"SELECT * FROM product"));
    $totalPage = ceil($totalRows/$rowPerPage);

    $listPage="";
    for($i=1;$i<=$totalPage;$i++){
        if($page==$i){
            $listPage.='<li class="active"><a href="quantri.php?page_layout=danhsachsp&page='.$i.'"> '.$i.'</a> </li>';
        }
        else{
            $listPage.='<li><a href="quantri.php?page_layout=danhsachsp&page='.$i.'">'.$i.'</a></li>';
        }
    }
?>
<div class="row">
    <ol class="breadcrumb">
        <li><a href="quantri.php"><svg class="glyph stroked home">
                    <use xlink:href="#stroked-home"></use>
                </svg></a></li>
        <li class="active"></li>
    </ol>
</div>
<!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Quản lý sản phẩm</h1>
    </div>
</div>
<!--/.row-->


<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body" style="position: relative;">
                <a href="./quantri.php?page_layout=themsp" class="btn btn-primary" style="margin: 10px 0 20px 0; position: absolute;">Thêm sản phẩm mới</a>
                <table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-sort-name="name" data-sort-order="desc">
                    <thead>
                        <tr>
                            <th data-sortable="true">ID</th>
                            <th data-sortable="true">Tên sản phẩm</th>
                            <th data-sortable="true">Giá</th>
                            <th data-sortable="true">Danh mục</th>
                            <th data-sortable="true">Ảnh mô tả</th>
                            <th data-sortable="true">Sửa</th>
                            <th data-sortable="true">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while($row = $result->fetch_assoc()){
                                
                        ?>
                        <tr style="height: 300px;">
                            <td data-checkbox="true"><?php echo $row['id']?></td> <!--id-->

                            <!--title--><td data-checkbox="true"><a href="./quantri.php?page_layout=suasp&id_sp=<?php echo $row['id'];?>"><?php echo $row['title']?></a></td>
                            
                            <!--price--><td data-checkbox="true"><?php echo $row['price']?></td>
                            
                            <td data-sortable="true"> <!--/category-->
                                <?php 
                                    $id=$row['category_id'];
                                    $sql1 ="SELECT * FROM category WHERE id= '$id'" ;
                                    $result1 = $conn->query($sql1);
                                    while($category = $result1->fetch_array()){
                                        echo $category['name'];
                                    }
                                ?>  
                            </td>
                    
                            <td data-sortable="true"> <!--/thumbnail-->
                            
                                <span class="thumb"><img width="120px" height="80px" src="./anh/<?php 
                                    $id=$row['id'];
                                    $sql2 ="SELECT * FROM galery WHERE product_id= '$id'" ;
                                    $result2 = $conn->query($sql2);
                                    while($thumnail = $result2->fetch_array()){     
                                        echo $thumnail['thumbnail'];
                                    }?>"/>
                                </span>
                            </td>

                            <td><!--sua sp-->
                                <a href="./quantri.php?page_layout=suasp&id_sp=<?php echo $row['id'];?>"><span><svg class="glyph stroked brush" style="width: 20px;height: 20px;">
                                            <use xlink:href="#stroked-brush" />
                                        </svg></span></a>
                            </td>

                            <td><!--xoa sp-->
                            <a onclick="return xoa();" href="http://localhost/PJ2/quantri/chucnang/sanpham/xoasp.php?id_sp=<?php echo $row["id"]; ?>"><span><svg class="glyph stroked cancel" style="width: 20px;height: 20px;"><use xlink:href="#stroked-cancel"/></svg></span></a>
                                
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>

                <!--page-->
                <ul class="pagination" style="float: right;">
                    <?php
                        echo $listPage;
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--/.row-->
<script>
    function xoa(){
        var conf= confirm("Ban co chac chan muon xoa san pham nay khong?");
        return conf;
    }
</script>