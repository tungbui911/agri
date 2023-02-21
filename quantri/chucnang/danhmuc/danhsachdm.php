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

    $sql =" SELECT * FROM category ORDER BY id ASC LIMIT $perRow,$rowPerPage " ;
    $result = $conn->query($sql);
    
    $totalRows = mysqli_num_rows(mysqli_query( $conn,"SELECT * FROM category"));
    $totalPage = ceil($totalRows/$rowPerPage);

    $listPage="";
    for($i=1;$i<=$totalPage;$i++){
        if($page==$i){
            $listPage.='<li class="active"><a href="quantri.php?page_layout=danhsachdm&page='.$i.'"> '.$i.'</a> </li>';
        }
        else{
            $listPage.='<li><a href="quantri.php?page_layout=danhsachdm&page='.$i.'">'.$i.'</a></li>';
        }
    }
?>
<div class="row">
    <ol class="breadcrumb">
        <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li class="active"></li>
    </ol>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Quản lý danh mục</h1>
    </div>
</div><!--/.row-->


<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">

            <div class="panel-body" style="position: relative;">
                <a href="./quantri.php?page_layout=themdm" class="btn btn-primary" style="margin: 10px 0 20px 0; position: absolute;">Thêm danh mục mới</a>
                <table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-sort-name="name" data-sort-order="desc">
                    <thead>
                        <tr>						        
                            <th data-sortable="true">ID</th>
                            <th data-sortable="true">Tên danh mục</th>
                            <th data-sortable="true">Sửa</th>
                            <th data-sortable="true">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while($row = $result->fetch_assoc()){
                        ?>
                        <tr>
                            <td data-checkbox="true"><?php echo $row["id"]; ?> </td>
                            <td data-checkbox="true"><a href="./quantri.php?page_layout=suadm&id_dm=<?php echo $row['id']; ?>"><?php echo $row["name"]; ?></a></td>						        
                            <td>
                                <a href="./quantri.php?page_layout=suadm&id_dm=<?php echo $row['id']; ?>"><span><svg class="glyph stroked brush" style="width: 20px;height: 20px;"><use xlink:href="#stroked-brush"/></svg></span></a>
                            </td>
                            <td>
                                <a onclick="return xoa();" href="http://localhost/PJ2/quantri/chucnang/danhmuc/xoadm.php?id_dm=<?php echo $row["id"]; ?>"><span><svg class="glyph stroked cancel" style="width: 20px;height: 20px;"><use xlink:href="#stroked-cancel"/></svg></span></a>
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
                <ul class="pagination" style="float: right;">
                            <?php
                            echo $listPage;
                            ?>
                </ul>
            </div>
        </div>
    </div>
</div><!--/.row-->	
<script>
    function xoa(){
        var conf= confirm("Ban co chac chan muon xoa danh muc nay khong?");
        return conf;
    }
</script>