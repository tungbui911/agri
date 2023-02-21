<?php
    require('./ketnoi.php');

    $id=$_GET['id_sp'];
    $sql ="SELECT * FROM product WHERE  id='$id' " ;
    $result = $conn->query($sql);
    $row=mysqli_fetch_array($result);

    if(isset($_POST['submit'])){
        $ten_sp = $_POST['ten_sp'];//title
        $gia_sp = $_POST['gia_sp'];//price
        $bao_hanh = $_POST['bao_hanh'];
        $phu_kien = $_POST['phu_kien'];
        $tinh_trang = $_POST['tinh_trang'];
        $khuyen_mai = $_POST['khuyen_mai'];//discount
        $trang_thai = $_POST['trang_thai'];
        $chi_tiet_sp = $_POST['chi_tiet_sp'];//desc

        //thumbnail
        if($_FILES['anh_sp']['name']==''){
            $anh_sp = $_POST['anh_sp'];
            
        }else{
            $anh_sp = $_FILES['anh_sp']['name'];
            $tmp=$_FILES['anh_sp']['tmp_name'];  
        }
        
        if($_POST['id_dm']=='unselect'){
            echo '<span style="color: red;">chua chon danh muc</span>';

        }else{
            $id_dm = $_POST['id_dm'];      //category
            if(isset($ten_sp)&&isset($gia_sp)&&isset($khuyen_mai)&&
                isset($chi_tiet_sp)&&isset($anh_sp)&&isset($id_dm))
            {  
                move_uploaded_file($tmp,'./anh/'.$anh_sp);

                //update galery
                $sql ="UPDATE  galery SET  thumbnail= '$anh_sp' WHERE id='$id' ";
                $conn->query($sql);

                // update product                   
                $sql ="UPDATE  product SET                                 
                                        title='$ten_sp',
                                        price='$gia_sp',
                                        discount='$khuyen_mai',
                                        description='$chi_tiet_sp',
                                        category_id= '$id_dm'
                                        WHERE id='$id'
                ";
                $conn->query($sql);

                header('location: http://localhost/PJ2/quantri/quantri.php?page_layout=danhsachsp');
                }else{
                echo '<center class="alert alert-danger"> Chưa nhập đủ thông tin</center>';
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
        <h1 class="page-header">Sửa thông tin sản phẩm</h1>
    </div>
</div>
<!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">Sửa thông tin sản phẩm</div>
            <div class="panel-body">

                <form method="post" enctype="multipart/form-data" role="form">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tên sản phẩm</label>
                            <input type="text" class="form-control" name="ten_sp" value="<?php if(isset($_POST['ten_sp'])){
                                echo $_POST['ten_sp'];
                            }else{
                                echo $row['title'];
                            } ?>" required="">
                        </div>

                        <div class="form-group">
                            <label>Giá sản phẩm</label>
                            <input type="text" class="form-control" name="gia_sp" value="<?php if(isset($_POST['ten_sp'])){
                                echo $_POST['gia_sp'];
                            }else{
                                echo $row['price'];
                            } ?>"" required="">
                        </div>

                        <div class="form-group">
                            <label>Bảo hành</label>
                            <input type="text" class="form-control" name="bao_hanh" value="0 tháng" required="">
                        </div>

                        <div class="form-group">
                            <label>Đi kèm</label>
                            <input type="text" class="form-control" name="phu_kien" value="Không có" required="">
                        </div>

                        <div class="form-group">
                            <label>Tình trạng</label>
                            <input type="text" class="form-control" name="tinh_trang" value="Tươi ngon" required="">
                        </div>

                        <div class="form-group">
                            <label>Ảnh mô tả </label>
                            <input type="file" name="anh_sp"><input type="hidden" name="anh_sp" 
                            value="<?php 
                                    $sql1 ="SELECT * FROM galery WHERE  product_id='$id' " ;
                                    $result1 = $conn->query($sql1);
                                    $row1=mysqli_fetch_array($result1);
                                    echo $row1['thumbnail'];
                                    ?>">

                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Khuyến mãi</label>
                            <input type="text" class="form-control" name="khuyen_mai" value="<?php if(isset($_POST['ten_sp'])){
                                echo $_POST['khuyen_mai'];
                            }else{
                                echo $row['discount'];
                            } ?>"" required="">
                        </div>
                        
                        <div class="form-group">
                            <label>Còn hàng</label>
                            <input type="text" class="form-control" name="trang_thai" value="Còn Hàng" required="">
                        </div>
                        
                        <div class="form-group">
                            <label>Sản phẩm đặc biệt</label>
                            
                            <div class="radio">
                                <label>
                                    <input type="radio" name="dac_biet" id="optionsRadios1" value=1>Có
                                </label>
                            </div>

                            <div class="radio">
                                <label>
                                    <input type="radio" name="dac_biet" id="optionsRadios2" value=0>Không
                                </label>
                            </div>

                        </div>

                        <div class="form-group">
                                <label>Danh mục</label>
                                <select name="id_dm" class="form-control">
                                    <option value="unselect" selected>Lựa chọn danh mục</option>
                                    <?php
                                        $sql1 ="SELECT * FROM category " ;
                                        $result1 = $conn->query($sql1);
                                        while ($row1 = mysqli_fetch_array($result1)) {
                                    ?>
                                        <option <?php
                                                    
                                                    if(isset($_POST['id_dm'])&&($_POST['id_dm']==$row1['id'])){
                                                        echo 'selected="selected"';
                                                    }
                                                     else{
                                                        if($row['category_id']==$row1['id']) echo 'selected="selected"';
                                                        
                                                    } 
                                                ?>value="<?php echo $row1['id'];?>"><?php echo $row1['name'];?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                        </div>
                        
                        <div class="form-group">
                            <label>Thông tin chi tiết sản phẩm</label>
                            <textarea class="form-control" rows="3" name="chi_tiet_sp" ><?php echo $row['description'];?></textarea>
                            <script type="text/javascript">
                                CKEDITOR.replace('chi_tiet_sp');
                            </script>
                        </div>


                    </div>

                    <button type="submit" class="btn btn-primary" name="submit">Cập nhật</button>
                    <button type="reset" class="btn btn-default" name="reset">Làm mới</button>


                </form>
            </div>
        </div>
    </div><!-- /.col-->
</div><!-- /.row -->