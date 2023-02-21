<?php  
    ob_start();
    session_start();
    include_once './cauhinh/ketnoi.php';
?>
<html>
    <head><title>Thế Giới Nông Sản</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
        <link href="css/datepicker3.css" rel="stylesheet">
        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <link rel="stylesheet" href="css/style.css">
        <?php
            if(isset($_GET['page_layout'])){
            switch ($_GET['page_layout']) {
                case 'danhsachtimkiem':
                    echo '<link rel="stylesheet" href="css/danhsachtimkiem.css">';
                    break;
                case 'danhsachsp':
                    echo '<link rel="stylesheet" href="css/danhsachsp.css">';
                    break;
                case 'chitietsp':
                    echo '<link rel="stylesheet" href="css/chitietsp.css">';
                    break;
                case 'giohang':
                    echo '<link rel="stylesheet" href="css/giohang.css">';
                    break;              
                case 'muahang':
                    echo '<link rel="stylesheet" href="css/muahang.css">';
                    break;
                case 'hoanthanh':
                    echo '<link rel="stylesheet" href="css/hoanthanh.css">';
                    break;
                }
            }

        ?>
    </head>
    <body>
        <div class="container">
            <!-- Header -->
            <div id="header" class="sticky">
                <div class="row">
                    <!-- search -->
                    <?php  
                        include_once './chucnang/timkiem/timkiem.php';
                    ?>
                    <!-- end search -->
                    <?php  
                        include_once './chucnang/login/login.php';
                    ?>
                    
                </div>
            </div>
            <!-- End Header -->

            <!-- Banner  -->
            <div id="banner">
                <div class="row">           
                    <div id="logo" class="col-md-2 col-sm-12 col-xs-12">
                        <h1>
                            <a href="index.php">
                                <img src="images/logos.png">
                            </a>
                        </h1>
                    </div>
                    <div id="ship" class="col-md-8 col-sm-12 col-xs-12" style="margin-top:45px; padding-left: 150px;">
                        <img src="images/banner.png">
                    </div> 
                    <!-- y-cart -->
                    <?php  
                        include_once './chucnang/giohang/giohangcuaban.php';
                    ?>
                    <!-- end y-cart -->           
                </div>        
            </div>
            <!-- End Banner -->

            <!-- Body -->
            <div id="body">
                <div class="row">
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <?php  
                        include_once './chucnang/sanpham/danhmucsp.php';
                        include_once './chucnang/quangcao/quangcao.php';
                        include_once './chucnang/thongke/thongke.php';
                        ?>
                    </div>
                    <div class="col-md-9 col-sm-12 col-xs-12">
                        <?php  
                        include_once './chucnang/slideshow/slideshow.php';
                        ?>

                        <div id="main">
                            <?php
                            if(isset($_GET['page_layout'])){
                                switch ($_GET['page_layout']) {
                                case 'danhsachtimkiem':
                                    include_once './chucnang/timkiem/danhsachtimkiem.php';
                                    break;
                                case 'danhsachsp':
                                    include_once './chucnang/sanpham/danhsachsp.php';
                                    break;
                                case 'chitietsp':
                                    include_once './chucnang/sanpham/chitietsp.php';
                                    break;
                                case 'giohang':
                                    include_once './chucnang/giohang/giohang.php';
                                    break;
                                case 'muahang':
                                    include_once './chucnang/giohang/muahang.php';
                                    break;
                                case 'hoanthanh':
                                    include_once './chucnang/giohang/hoanthanh.php';
                                    break;
                                }
                            }else{
                                include_once './chucnang/sanpham/sanpham.php';
                            }
                            
                            ?>
                        </div>

                        
                    </div>
                </div>
            </div>  
            <!-- End Body -->

            <!-- Footer -->
            <div id="footer" style="padding-top:0px;">
                <div id="footer-main" class="row" style="border-top-width:0px;">  

                    <div  class="col-md-6 col-sm-6 col-xs-6">
                        <h4>Thế Giới Nông Sản</h4>
                        <p><b>Trụ sở chính:</b> Số 1 Đại Cồ Việt, Hai Bà Trưng, Hà Nội | <b>Hotline</b> 0911 975 710</p> 
                        <p>Bản quyền thuộc Thế Giới Nông Sản</p>
                    </div> 
                    
                    <div  class="col-md-6 col-sm-6 col-xs-6">
                            <div class="row">
                                    <img class="img-thumbnail" src="images/brand1.png">
                                    <img class="img-thumbnail" src="images/brand2.png">
                                    <img class="img-thumbnail" src="images/brand3.png">
  
                            </div>
                    </div>
                </div>
            </div>
            <!-- End Footer -->
        </div>
    </body>
</html>