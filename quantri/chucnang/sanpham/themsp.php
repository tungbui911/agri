<?php 
    require('./ketnoi.php');
    $sql =" SELECT * FROM category ORDER BY id ASC" ;
    $result = $conn->query($sql);

    if(isset($_POST['submit'])){
        $ten_sp = $_POST['ten_sp'];//title
        $gia_sp = $_POST['gia_sp'];//price
        $bao_hanh = $_POST['bao_hanh'];
        $phu_kien = $_POST['phu_kien'];
        $tinh_trang = $_POST['tinh_trang'];
        $khuyen_mai = $_POST['khuyen_mai'];//discount
        $trang_thai = $_POST['trang_thai'];
        $chi_tiet_sp = $_POST['chi_tiet_sp'];//desc

        if($_FILES['anh_sp']['name']==''){ 
            echo '<span style="color: red;">chua upload anh</span>';
        }else{
            $anh_sp = $_FILES['anh_sp']['name'];//thumbnail
            $tmp=$_FILES['anh_sp']['tmp_name']; 
            if($_POST['id_dm']=='unselect'){
               echo '<span style="color: red;">chua chon danh muc</span>';
    
            }else{
                $id_dm = $_POST['id_dm'];      //category
                if(isset($ten_sp)&&isset($gia_sp)&&isset($khuyen_mai)&&
                    isset($chi_tiet_sp)&&isset($anh_sp)&&isset($id_dm))
                {  
                    move_uploaded_file($tmp,'./anh/'.$anh_sp);
                    // insert to product
                    $totalRows = mysqli_num_rows(mysqli_query( $conn,"SELECT * FROM product"));
                    $id=$totalRows+1;
                    $sql ="INSERT INTO product(id,title,price,discount,description,category_id) 
                    values( '$id','$ten_sp','$gia_sp','$khuyen_mai','$chi_tiet_sp','$id_dm')" ;
                    $conn->query($sql);

                    //insert to galery
                    $sql ="INSERT INTO galery(id,product_id,thumbnail) values( '$id','$id','$anh_sp')" ;
                    $conn->query($sql);
            
                    header('location: http://localhost/PJ2/quantri/quantri.php?page_layout=danhsachsp');
                    }else{
                    echo '<center class="alert alert-danger"> Chưa nhập đủ thông tin</center>';
                }
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
        <h1 class="page-header">Thêm sản phẩm mới</h1>
    </div>
</div>
<!--/.row-->


<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">Thêm sản phẩm mới</div>
            <div class="panel-body">

                <form method="post" enctype="multipart/form-data" role="form">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tên sản phẩm</label>
                            <input type="text" class="form-control" name="ten_sp" required="">
                        </div>
                        <div class="form-group">
                            <label>Giá sản phẩm</label>
                            <input type="text" class="form-control" name="gia_sp" required="">
                        </div>

                        <div class="form-group">
                            <label>Bảo hành</label>
                            <input type="text" class="form-control" name="bao_hanh" value="" required="">
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
                            <label>Ảnh mô tả</label>
                            <input type="file" name="anh_sp">
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Khuyến mãi</label>
                            <input type="text" class="form-control" name="khuyen_mai" value="" required="">
                        </div>
                        <div class="form-group">
                            <label>Còn hàng</label>
                            <input type="text" class="form-control" name="trang_thai" value="Còn hàng" required="">
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
                                    <input type="radio" name="dac_biet" id="optionsRadios2" value=0 checked>Không
                                </label>
                            </div>

                        </div>

                        <div class="form-group">
                            <label>Nhà cung cấp</label>
                            <select name="id_dm" class="form-control">
                                <option value="unselect" selected>Lựa chọn nhà cung cấp</option>
                                <?php
                                while ($row = mysqli_fetch_array($result)) {
                                ?>
                                    <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Thông tin chi tiết sản phẩm</label>
                            <textarea class="form-control" rows="3" name="chi_tiet_sp"></textarea>
                        </div>



                    </div>

                    <button type="submit" class="btn btn-primary" name="submit">Thêm mới</button>
                    <button type="reset" class="btn btn-default" name="reset">Làm mới</button>


                </form>
            </div>
        </div>
    </div><!-- /.col-->
</div><!-- /.row -->