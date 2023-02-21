<?php 
    require('./ketnoi.php');
    $sql =" SELECT * FROM role ORDER BY id ASC" ;
    $result = $conn->query($sql);

    if(isset($_POST['submit'])){
        $name = $_POST['fullname'];//title
        $email = $_POST['email'];//price
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        //$role = $_POST['role'];
        $pass1 = $_POST['pass1'];
        $pass2 = $_POST['pass2'];

        $sql="SELECT * FROM  user WHERE email='$email'";
        $query= mysqli_query($conn,$sql);
        $rows= mysqli_num_rows($query);             
        if($rows >0){
        echo '<span style="color: red;">Email đã được sử dụng, xin điền lại</span>';
        } else{

            if($pass1!=$pass2){ 
                $error_anh_sp='<span style="color: red;">Xác nhận mật khẩu chưa đúng, xin điền lại</span>';
            }else{             
                if($_POST['role']=='unselect'){
                    echo '<span style="color: red;">chua chon vai tro</span>';
                }else{
                    $role = $_POST['role'];      
                    if(isset($name)&&isset($email)&&isset($phone)&&
                        isset($address)&&isset($role)&&isset($pass1))
                    {  
                        
                        // insert to user
                        $totalRows = mysqli_num_rows(mysqli_query( $conn,"SELECT * FROM user"));
                        $id=$totalRows+1;
                        $sql ="INSERT INTO user(id, fullname, email, phone_number, address, password, role_id) 
                        values( '$id','$name','$email','$phone','$address','$pass1','$role')" ;
                        $conn->query($sql);
                
                        header('location: http://localhost/PJ2/quantri/quantri.php?page_layout=danhsachtv');
                        }else{
                        echo '<center class="alert alert-danger"> Chưa nhập đủ thông tin</center>';
                    }
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
        <h1 class="page-header">Thêm Thành viên mới</h1>
    </div>
</div>
<!--/.row-->


<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">Thêm Thành viên mới</div>
            <div class="panel-body">

                <form method="post" enctype="multipart/form-data" role="form">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Họ và tên</label>
                            <input type="text" class="form-control" name="fullname" required="">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" required="">
                        </div>

                        <div class="form-group">
                            <label>SĐT</label>
                            <input type="tel" class="form-control" name="phone" value="" required="">
                        </div>

                        <div class="form-group">
                            <label>Địa chỉ</label>
                            <input type="text" class="form-control" name="address" value="Không có" required="">
                        </div>
                    </div>

                    <div class="col-md-4">
                        
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="pass1" required="">
                        </div>

                        <div class="form-group">
                            <label>Confirm password</label>
                            <input type="password" class="form-control" name="pass2" required="">
                        </div>

                        <div class="form-group">
                            <label>Role</label>
                            <select name="role" class="form-control">
                                <option value="unselect" selected>Lựa chọn vai trò</option>
                                <?php
                                while ($row = mysqli_fetch_array($result)) {
                                ?>
                                    <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary" name="submit">Thêm mới</button>
                    <button type="reset" class="btn btn-default" name="reset">Làm mới</button>
                    
                </form>
            </div>
        </div>
    </div><!-- /.col-->
</div><!-- /.row -->