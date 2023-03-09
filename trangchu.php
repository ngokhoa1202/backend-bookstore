<?php

session_start();

?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="style_trangchu.css">

    <style>
        .row.gutter-0 {
            margin: 0;
        }
        
        .btn-logout {
            border: none;
            background-color: #fff;
            color: rgba(0, 0, 0, 0.55);
        }

   
    </style>
    <title>Trang Chủ</title>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-light nav1">
        <div class="container">
            <a href="#" class="navbar-brand">
                <img src="images/logo.png" alt="logo" style="width: 200px;">
            </a>
            <div class="navbar-collapse">
                <ul class="navbar-nav">
                    <li>
                        <a href="#" class="nav-link">
                            <img 
                                src="images/hotline.png" alt="hotline"
                                style="width: 15px; padding-bottom: 5px;"
                            >
                            1900 1000
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link">
                            <img 
                                src="images/search.png" alt="search"
                                style="width: 15px; padding-bottom: 2px;"
                            >
                            Tìm kiếm
                        </a>
                    </li>
                    <?php
                    if (!isset($_SESSION['userId'])) {

                       echo '
                       <li>
                        <a href="login.php" class="nav-link">
                            <img 
                                src="images/user.png" alt="user"
                                style="width: 18px; padding-bottom: 2px;" 
                            >
                            Đăng nhập
                        </a>
                    </li>
                    
                    <li>
                        <a href="signup.php" class="nav-link">
                            <img 
                                src="images/register.png" alt="register"
                                style="width: 15px; padding-bottom: 2px;"
                            >
                            Đăng ký
                        </a>
                    </li>
                   
                       
                       
                       ';

                    }

                    else {
                        echo ' <li>
                        <a href="#" class="nav-link">
                            <img 
                            src="images/cart.png" alt="cart"
                            style="width: 15px; padding-bottom: 4px;"
                            >
                            Giỏ hàng
                        </a>
                         </li>
                        <li>
                        <form action="includes/logout.inc.php" method="post">
                            <a href="login.php" class="nav-link">
                                
                                <button type="submit" name="" class="btn-logout" >Logout</button>
                            </a>
                        </form>
                        </li>
                   ';
                    }
                   
                    
                    
                    
                    
                    
                    ?>
                   
                </ul>
            </div>
        </div>
    </nav>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark nav2" style="height: 45px">
        <div class="container">
                <div class="navbar-collapse">
                    <ul class="navbar-nav">
                        <li>
                            <a href="#" class="nav-link">TRANG CHỦ</a>
                        </li>
                        <li>
                            <a href="#" class="nav-link">GIỚI THIỆU</a>
                        </li>
                        <li>
                            <a href="#" class="nav-link">SẢN PHẨM</a>
                        </li>
                        <li>
                            <a href="#" class="nav-link">BẢN ĐỒ</a>
                        </li>
                        <li>
                            <a href="#" class="nav-link">LIÊN HỆ</a>
                        </li>
                    </ul>
                </div>
        </div>
    </nav>
    <div class="row gutter-0 " >
            <img src="images/ads_panel.jpg" alt="advertisement">   
    </div>
    <section class="bg-light text-dark" style="padding-top: 5px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <span style="padding-left: 15px;">DANH MỤC SẢN PHẨM</span>
                            <div class="list-group mt-1">
                                <a href="#" class="list-group-item">Sản phẩm 1</a>
                                <a href="#" class="list-group-item">Sản phẩm 2</a>
                                <a href="#" class="list-group-item">Sản phẩm 3</a>
                                <a href="#" class="list-group-item">Sản phẩm 4</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 hide-on-mobile mt-3">
                            <span style="padding-left: 15px;">SẢN PHẨM NỔI BẬT</span>
                            <div class="card mt-1" style="padding-left: 8px;">
                                    <div class="row">
                                        <div class="col-md-5 mt-2 mb-2">
                                            <img src="images/book1.jpg" alt="book1" href="#" width="90%">
                                        </div>
                                        <div class="col-md-7 mt-3">
                                            <div class="row">
                                                <h5 class="card-title">Harry Potter</h5>
                                            </div>
                                            <div class="row mt-2">
                                                <h6 class="card-subtitle text-muted">190.000đ</h6>
                                            </div>
                                            <div class="btn btn-outline-secondary mt-3">Mua ngay</div>
                                        </div>
                                    </div>
                            </div>
                            <div class="card mt-1" style="padding-left: 8px;">
                                <div class="row">
                                    <div class="col-md-5 mt-2 mb-2">
                                        <img src="images/book1.jpg" alt="book1" href="#" width="90%">
                                    </div>
                                    <div class="col-md-7 mt-3">
                                        <div class="row">
                                            <h5 class="card-title">Harry Potter</h5>
                                        </div>
                                        <div class="row mt-2">
                                            <h6 class="card-subtitle text-muted">190.000đ</h6>
                                        </div>
                                        <div class="btn btn-outline-secondary mt-3">Mua ngay</div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mt-1" style="padding-left: 8px;">
                                <div class="row">
                                    <div class="col-md-5 mt-2 mb-2">
                                        <img src="images/book1.jpg" alt="book1" href="#" width="90%">
                                    </div>
                                    <div class="col-md-7 mt-3">
                                        <div class="row">
                                            <h5 class="card-title">Harry Potter</h5>
                                        </div>
                                        <div class="row mt-2">
                                            <h6 class="card-subtitle text-muted">190.000đ</h6>
                                        </div>
                                        <div class="btn btn-outline-secondary mt-3">Mua ngay</div>
                                    </div>
                                </div>
                            </div>                    
                            <div class="card mt-1" style="padding-left: 8px;">
                                <div class="row">
                                    <div class="col-md-5 mt-2 mb-2">
                                        <img src="images/book1.jpg" alt="book1" href="#" width="90%">
                                    </div>
                                    <div class="col-md-7 mt-3">
                                        <div class="row">
                                            <h5 class="card-title">Harry Potter</h5>
                                        </div>
                                        <div class="row mt-2">
                                            <h6 class="card-subtitle text-muted">190.000đ</h6>
                                        </div>
                                        <div class="btn btn-outline-secondary mt-3">Mua ngay</div>
                                    </div>
                                </div>
                            </div>    
                        </div>                
                    </div>
                </div>
                <div class="col-lg-9 col-md-12">
                    <div class="row mt-3">
                        <h5 style="text-align: center;">SẢN PHẨM MỚI</h5>
                        <div class="col-md  -4">
                            <div class="card text-center mt-3">
                            <img
                                src="images/book2.jpg"
                                class="card-img-top"
                                alt="..."
                                style="padding: 10px;"
                            />
                            <div class="card-body">
                                <h5 class="card-title">
                                Harry Potter và hòn đá phù thủy
                                </h5>
                                <h6 class="card-subtitle mt-2 mb-4 text-muted">
                                Giá: 200.000đ
                                </h6>
                                <a href="#" class="btn btn-outline-dark">Mua Ngay</a>
                            </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card text-center mt-3">
                            <img
                                src="images/book3.jpg"
                                class="card-img-top"
                                alt="..."
                                style="padding: 10px;"
                            />
                            <div class="card-body">
                                <h5 class="card-title">
                                Harry Potter và hòn đá phù thủy
                                </h5>
                                <h6 class="card-subtitle mt-2 mb-4 text-muted">
                                Giá: 200.000đ
                                </h6>
                                <a href="#" class="btn btn-outline-dark">Mua Ngay</a>
                            </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card text-center mt-3">
                            <img
                                src="images/book4.jpg"
                                class="card-img-top"
                                alt="..."
                                style="padding: 10px;"
                            />
                            <div class="card-body">
                                <h5 class="card-title">
                                Harry Potter và hòn đá phù thủy
                                </h5>
                                <h6 class="card-subtitle mt-2 mb-4 text-muted">
                                Giá: 200.000đ
                                </h6>
                                <a href="#" class="btn btn-outline-dark">Mua Ngay</a>
                            </div>
                            </div>
                        </div>
                    </div>
                    <hr class="my_line">
                    <div class="row">
                        <h5 style="text-align: center;">SẢN PHẨM KHUYẾN MÃI</h5>
                        <div class="col-md-4 ">
                            <div class="card text-center mt-3">
                            <img
                                src="images/book2.jpg"
                                class="card-img-top"
                                alt="..."
                                style="padding: 10px;"
                            />
                            <div class="card-body">
                                <h5 class="card-title">
                                Harry Potter và hòn đá phù thủy
                                </h5>
                                <h6 class="card-subtitle mt-2 mb-4 text-muted">
                                Giá: 200.000đ
                                </h6>
                                <a href="#" class="btn btn-outline-dark">Mua Ngay</a>
                            </div>
                            </div>
                        </div>
                        <div class="col-md-4 ">
                            <div class="card text-center mt-3">
                            <img
                                src="images/book3.jpg"
                                class="card-img-top"
                                alt="..."
                                style="padding: 10px;"
                            />
                            <div class="card-body">
                                <h5 class="card-title">
                                Harry Potter và hòn đá phù thủy
                                </h5>
                                <h6 class="card-subtitle mt-2 mb-4 text-muted">
                                Giá: 200.000đ
                                </h6>
                                <a href="#" class="btn btn-outline-dark">Mua Ngay</a>
                            </div>
                            </div>
                        </div>
                        <div class="col-md-4 ">
                            <div class="card text-center mt-3">
                            <img
                                src="images/book4.jpg"
                                class="card-img-top"
                                alt="..."
                                style="padding: 10px;"
                            />
                            <div class="card-body">
                                <h5 class="card-title">
                                Harry Potter và hòn đá phù thủy
                                </h5>
                                <h6 class="card-subtitle mt-2 mb-4 text-muted">
                                Giá: 200.000đ
                                </h6>
                                <a href="#" class="btn btn-outline-dark">Mua Ngay</a>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="p-3 text-dark text-center mt-5" style="background-color: #e4d2ca;">
        <div class="container">
            <h5>Footer Information...</h5>
            <ul class="nav justify-content-center">
              <li class="nav-item">
                <a class="nav-link" href="#" style="color:black;">Link 1</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#" style="color:black;">Link 2</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#" style="color:black;">Link 3</a>
              </li>
            </ul>
        </div>
    </footer>

</body>
</html>