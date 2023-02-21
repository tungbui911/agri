<?php
    if(isset($_POST['submit'])){
        $ten_dm = $_POST['ten_dm'];
        $sql="SELECT * FROM  category WHERE name='$ten_dm'";
            $query= mysqli_query($conn,$sql);
            $rows= mysqli_num_rows($query);             
            if($rows >0){
            echo '<span style="color: red;">Danh mục đã tồn tại, xin điền lại</span>';
            } else {
                if(isset($ten_dm)){
                    $totalRows = mysqli_num_rows(mysqli_query( $conn,"SELECT * FROM category"));
                    $id=$totalRows+1;
                    $sql ="INSERT INTO category(id,name) values( '$id','$ten_dm')" ;
                    $conn->query($sql);
                    header('location: http://localhost/PJ2/quantri/quantri.php?page_layout=danhsachdm');
                }
            }
    }
?>
<div class="row">
    <ol class="breadcrumb">
        <li><a href="#"><svg class="glyph stroked home">
                    <use xlink:href="#stroked-home"></use>
                </svg></a></li>
        <li class="active"></li>
    </ol>
</div>
<!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Thêm mới danh mục</h1>
    </div>
</div>
<!--/.row-->


<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">Thêm mới danh mục</div>
            <div class="panel-body">
                <div class="col-md-12">
                    <form role="form" method="post">
                        <div class="form-group">
                            <label>Tên danh mục</label>
                            <input class="form-control" type="text" required="" name="ten_dm">
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit">Thêm mới</button>
                        <button type="reset" class="btn btn-default">Làm mới</button>
                </div>
                </form>
            </div>
        </div>
    </div><!-- /.col-->
</div><!-- /.row -->