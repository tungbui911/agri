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
        <h1 class="page-header">Trang chủ quản trị</h1>
    </div>
</div>
<!--/.row-->

<div class="row">
    <!--
    <div class="col-xs-12 col-md-6 col-lg-3">
        <div class="panel panel-blue panel-widget ">
            <div class="row no-padding">
                <div class="col-sm-3 col-lg-5 widget-left">
                    <svg class="glyph stroked bag">
                        <use xlink:href="#stroked-bag"></use>
                    </svg>
                </div>
                <div class="col-sm-9 col-lg-7 widget-right">
                    <div class="large"><?php 
                        $sql="SELECT * FROM  orders";
                        $query= mysqli_query($conn,$sql);
                        $rows= mysqli_num_rows($query);
                        echo $rows; 
                        //echo "93"
                    ?></div>
                    <div class="text-muted">Đơn hàng</div>
                </div>
            </div>
        </div>
    </div>
    -->
    <div class="col-xs-12 col-md-6 col-lg-3">
        <div class="panel panel-orange panel-widget">
            <div class="row no-padding">
                <div class="col-sm-3 col-lg-5 widget-left">
                    <svg class="glyph stroked empty-message">
                        <use xlink:href="#stroked-empty-message"></use>
                    </svg>
                </div>
                <div class="col-sm-9 col-lg-7 widget-right">
                    <div class="large"><?php 
                        $sql="SELECT * FROM  feedback";
                        $query= mysqli_query($conn,$sql);
                        $rows= mysqli_num_rows($query);
                        echo $rows; 
                        //echo "24"
                    ?></div>
                    <div class="text-muted">Bình luận</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-6 col-lg-3">
        <div class="panel panel-teal panel-widget">
            <div class="row no-padding">
                <div class="col-sm-3 col-lg-5 widget-left">
                    <svg class="glyph stroked male-user">
                        <use xlink:href="#stroked-male-user"></use>
                    </svg>
                </div>
                <div class="col-sm-9 col-lg-7 widget-right">
                    <div class="large"><?php 
                        $sql="SELECT * FROM  user";
                        $query= mysqli_query($conn,$sql);
                        $rows= mysqli_num_rows($query);
                        echo $rows; 
                    ?></div>
                    <div class="text-muted">Thành viên</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-6 col-lg-3">
        <div class="panel panel-red panel-widget">
            <div class="row no-padding">
                <div class="col-sm-3 col-lg-5 widget-left">
                    <svg class="glyph stroked app-window-with-content">
                        <use xlink:href="#stroked-app-window-with-content"></use>
                    </svg>
                </div>
                <div class="col-sm-9 col-lg-7 widget-right">
                    <div class="large"><?php 
                        $sql="SELECT * FROM  product";
                        $query= mysqli_query($conn,$sql);
                        $rows= mysqli_num_rows($query);
                        echo $rows; 
                    ?></div>
                    <div class="text-muted">Sản phẩm</div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">Giới thiệu</div>
            <div class="panel-body">
                <div class="canvas-wrapper">
                    <p>Thế Giới Nông Sản được thành lập vào ngày 11/11/2022, 
                        là website bán các sản phẩm nông sản uy tín, chất lượng với giá cả phải chăng
                        với trụ sở đặt tại Hà Nội.<br />
                        - Cơ sở: Đại học Bách Khoa Hà Nội, Hai Bà Trưng, Hà Nội<br />



                    <br />
                    <p>Đây là hệ thống quản trị của website do nhóm 6 xây dựng và phát triển.</p>
                    <br />
                    <p>Hệ thống quản trị này có các chức năng quản lý sau: <br />
                        - Quản lý Đơn hàng
                        <br />
                        - Quản lý Danh mục sản phẩm
                        <br />
                        - Quản lý Sản phẩm
                        <br />
                        - ...
                    </p>
                    <br />
                    <p>Hệ thống đang trong quá trình hoàn thiện bởi các thành viên Nhóm 6. 
                    <br />
                        Hệ thống vẫn tiếp tục được nâng cấp và cải tiến để cho 
                        khách hàng được trải nghiệm những chức năng tốt nhất của hệ thống.</p>
                    <br />
                    <p>
                        <b>Thế Giới Nông Sản</b>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/.row-->