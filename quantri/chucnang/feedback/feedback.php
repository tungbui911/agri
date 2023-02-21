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

    $sql =" SELECT id, firstname, phone_number, note, status, created_at FROM feedback ORDER BY id ASC LIMIT $perRow,$rowPerPage " ;
    $result = $conn->query($sql);

    $totalRows = mysqli_num_rows(mysqli_query( $conn,"SELECT * FROM feedback"));
    $totalPage = ceil($totalRows/$rowPerPage);

    $listPage="";
    for($i=1;$i<=$totalPage;$i++){
        if($page==$i){
            $listPage.='<li class="active"><a href="quantri.php?page_layout=feedback&page='.$i.'"> '.$i.'</a> </li>';
        }
        else{
            $listPage.='<li><a href="quantri.php?page_layout=feedback&page='.$i.'">'.$i.'</a></li>';
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
        <h1 class="page-header">Quản lý bình luận</h1>
    </div>
</div>
<!--/.row-->


<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body" style="position: relative;">
                <table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-sort-name="name" data-sort-order="desc">
                    <thead>
                        <tr>
                            <th data-sortable="true">ID</th>
                            <th data-sortable="true">Tên người bình luận</th>
                            <th data-sortable="true">SĐT</th>
                            <th data-sortable="true">Nội dung</th>
                            <th data-sortable="true">SP được bình luận</th>
                            <th data-sortable="true">Thời gian</th>
                            <th data-sortable="true">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while($row = $result->fetch_assoc()){
                                
                        ?>
                        <tr style="height: 300px;">
                            <!--id-->
                            <td data-checkbox="true"><?php echo $row['id']?></td> 

                            <!--fullname-->
                            <td data-checkbox="true"><?php echo $row['firstname']?></td>
                            
                            <!--phone number-->
                            <td data-checkbox="true"><?php echo $row['phone_number']?></td> 

                            <!--Note-->
                            <td data-checkbox="true"><?php echo $row['note']?></td>

                            <!--status-->
                            <td data-sortable="true"> 
                                <?php 
                                    $id=$row['status'];
                                    $sql1 ="SELECT * FROM product WHERE id= '$id'" ;
                                    $result1 = $conn->query($sql1);
                                    while($role = $result1->fetch_array()){
                                        echo $role['title'];
                                    }
                                ?>  
                            </td>
                    
                            <!--created time-->          
                            <td data-checkbox="true"><?php echo $row['created_at']?></td> 
                            
                            <!--xoa sp-->               
                            <td>
                                <a onclick="return xoa();" href="http://localhost/PJ2/quantri/chucnang/feedback/xoafeedback.php?id=<?php echo $row["id"]; ?>"><span><svg class="glyph stroked cancel" style="width: 20px;height: 20px;"><use xlink:href="#stroked-cancel"/></svg></span></a>
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
        var conf= confirm("Ban co chac chan muon xoa binh luan nay khong?");
        return conf;
    }
</script>