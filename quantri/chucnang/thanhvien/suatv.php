<?php 
    require('./ketnoi.php');
    $id=$_GET['id'];
    $sql =" SELECT id, fullname, email, phone_number, address, role_id FROM user WHERE id='$id'" ;
    $result = $conn->query($sql);
    $row=mysqli_fetch_array($result);

    if(isset($_POST['submit'])){
        $name = $_POST['name'];//title
        $email = $_POST['email'];//price
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        //$role = $_POST['role'];
        $pass1 = $_POST['pass1'];
        $pass2 = $_POST['pass2'];

        if($pass1!=$pass2){ 
            echo '<span style="color: red;">Xác nhận mật khẩu chưa đúng, xin điền lại</span>';
        }else{             
            if($_POST['role']=='unselect'){
                 echo'<span style="color: red;">chua chon vai tro</span>';
            }else{
                $role = $_POST['role'];      
                if(isset($name)&&isset($email)&&isset($phone)&&
                    isset($address)&&isset($role)&&isset($pass1))
                {  
                    // update product                   
                    $sql ="UPDATE  user SET                                 
                                            fullname='$name',
                                            email='$email',
                                            phone_number='$phone',
                                            address='$address',
                                            password='$pass1',
                                            role_id= '$role'
                                            WHERE id='$id'
                                            ";
                    $conn->query($sql);

                    header('location: http://localhost/PJ2/quantri/quantri.php?page_layout=danhsachtv');
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
        <h1 class="page-header">Sửa thông tin thành viên</h1>
    </div>
</div>
<!--/.row-->


<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">Sửa thông tin thành viên</div>
            <div class="panel-body">

                <form method="post" enctype="multipart/form-data" role="form">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Họ và tên</label>
                            <input type="text" class="form-control" name="name" value="<?php if(isset($_POST['name'])){
                                echo $_POST['name'];
                            }else{
                                echo $row['fullname'];
                            } ?>" required="">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" value="<?php if(isset($_POST['email'])){
                                echo $_POST['email'];
                            }else{
                                echo $row['email'];
                            } ?>" required="">
                        </div>

                        <div class="form-group">
                            <label>SĐT</label>
                            <input type="tel" class="form-control" name="phone" value="<?php if(isset($_POST['ten_sp'])){
                                echo $_POST['phone'];
                            }else{
                                echo $row['phone_number'];
                            } ?>" required="">
                        </div>

                        <div class="form-group">
                            <label>Địa chỉ</label>
                            <input type="text" class="form-control" name="address" value="<?php if(isset($_POST['address'])){
                                echo $_POST['address'];
                            }else{
                                echo $row['address'];
                            } ?>" required="">
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
                                $sql =" SELECT * FROM role ORDER BY id ASC" ;
                                $result1 = $conn->query($sql);
                                while ($row1 = mysqli_fetch_array($result1)) {
                                ?>
                                    <option value="<?php echo $row1['id'];?>"><?php echo $row1['name'];?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary" name="submit">Sửa</button>
                    <button type="reset" class="btn btn-default" name="reset">Làm mới</button>
                    
                </form>
            </div>
        </div>
    </div><!-- /.col-->
</div><!-- /.row -->