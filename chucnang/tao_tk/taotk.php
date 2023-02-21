<?php  
    include_once '../../cauhinh/ketnoi.php';
    session_start();
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

        

        if($pass1!=$pass2){ 
            echo '<span style="color: red;">Xác nhận mật khẩu chưa đúng, xin điền lại</span>';
        }else{
            
            $sql="SELECT * FROM  user WHERE email='$email'";
            $query= mysqli_query($conn,$sql);
            $rows= mysqli_num_rows($query);             
            if($rows >0){
            echo '<span style="color: red;">Email đã được sử dụng, xin điền lại</span>';
                
            }else{
                $role = 2;      
                if(isset($name)&&isset($email)&&isset($phone)&&
                    isset($address)&&isset($role)&&isset($pass1))
                {  
                    // insert to user
                    $totalRows = mysqli_num_rows(mysqli_query( $conn,"SELECT * FROM user"));
                    $id=$totalRows+1;
                    $sql ="INSERT INTO user(id, fullname, email, phone_number, address, password, role_id) 
                    values( '$id','$name','$email','$phone','$address','$pass1','$role')" ;
                    $conn->query($sql);

                    $_SESSION["email"]=$email;
                    $_SESSION["password"]=$pass1;
                    header('location: http://localhost/PJ2/index.php');
                    }else{
                    echo '<center class="alert alert-danger"> Chưa nhập đủ thông tin</center>';
                
                }  
            }      
        }          
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Thế giới nông sản</title>
        <link href="../../css/bootstrap.min.css" rel="stylesheet">
        <link href="../../css/datepicker3.css" rel="stylesheet">
        <link href="../../css/styles.css" rel="stylesheet">
    </head>

    <body>


<!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Tạo tài khoản  </h1>
    </div>
</div>
<!--/.row-->


<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">Đầy đủ thông tin form bên dưới</div>
            <div class="panel-body">

                <form method="post" enctype="multipart/form-data" role="form">
                    <div class="col-md-3">
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

                    </div>

                    <div class="col-md-3">
                        
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="pass1" required="">
                        </div>

                        <div class="form-group">
                            <label>Confirm password</label>
                            <input type="password" class="form-control" name="pass2" required="">
                        </div>

                        <div class="form-group">
                            <label>Địa chỉ</label>
                            <input type="text" class="form-control" name="address" value="Không có" required="">
                        </div>
                        
                    </div>

                    <button type="submit" class="btn btn-primary" name="submit">Đăng ký</button>
                    <button type="reset" class="btn btn-default" name="reset">Làm mới</button>
                    
                </form>
            </div>
        </div>
    </div><!-- /.col-->
</div><!-- /.row -->
        <script src="../../js/jquery-1.11.1.min.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
        <script src="../../js/chart.min.js"></script>
        <script src="../../js/chart-data.js"></script>
        <script src="../../js/easypiechart.js"></script>
        <script src="../../js/easypiechart-data.js"></script>
        <script src="../../js/bootstrap-datepicker.js"></script>
        <script>
            !function ($) {
                $(document).on("click", "ul.nav li.parent > a > span.icon", function () {
                    $(this).find('em:first').toggleClass("glyphicon-minus");
                });
                $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
            }(window.jQuery);

            $(window).on('resize', function () {
                if ($(window).width() > 768)
                    $('#sidebar-collapse').collapse('show')
            })
            $(window).on('resize', function () {
                if ($(window).width() <= 767)
                    $('#sidebar-collapse').collapse('hide')
            })
        </script>	
    </body>
</html>	