<?php

session_start();
?>

<?php

require('header.php')

?>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark nav2" style="height: 45px">
        <div class="container">
                <div class="navbar-collapse">
                    <ul class="navbar-nav">
                        <li>
                            <a href="trangchu.html" class="nav-link">TRANG CHỦ</a>
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
    <section class="bg-light text-dark" style="padding-top: 5px;">
        <div class="container">
            <div class="row">
                <nav style="margin-top: 20px;">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="trangchu.html">Trang chủ</a></li>
                      <li class="breadcrumb-item active" aria-current="page" a href="#">Đăng nhập</a></li>
                    </ol>
                  </nav>
                <div class="col-md-6">
                      <div class="row">
                        <h6 class="text-center">Đăng nhập tài khoản</h6>
                        <?php
                        if (isset($_GET['error'])) {
                            if($_GET['error'] == 'wrongpassword') {
                                echo '<p class="error-msg"> Wrong password!</p>';
                            }
                            else if ($_GET['error'] == 'nouser') {
                                echo '<p class="error-msg"> Username is not exists!</p>';


                            }
                            echo '';



                            
                            
                        }
                        else if (isset($_GET['login'])) {
                            if($_GET['login'] == 'success') {
                                echo '<p class="success-msg"> Login successful!</p>';

                            }
                        }

                        ?>

                        <form action="includes/login.inc.php" method="post">
                            <div class="form-group">
                              <label for="username" class="mb-2 mt-1">Tên đăng nhập:</label>
                              <input type="text" class="form-control" name="username" id="username" placeholder="Nhập tên đăng nhập">
                            </div>
                            <div class="form-group">
                              <label for="password" class="mb-2 mt-3">Mật khẩu:</label>
                              <input type="password" class="form-control" name="password" id="password" placeholder="Nhập mật khẩu">
                            </div>
                            <div class="row mt-3 mb-2">
                                <a href="#">Quên mật khẩu?</a>
                            </div>
                            <button type="submit" name="login-submit" class="btn btn-primary" >Đăng nhập</button>
                          </form>
                          
                      </div>
                </div>
                <div class="col-md-6">
                    <h6 class="text-center">Bản chưa có tài khoản</h6>
                    Đăng ký tài khoản để mua hàng nhanh hơn. Theo dõi đơn đặt hàng, vận chuyển.<br>
                    Cập nhật các tin tức sự kiện và các chương trình giảm giá của chúng tôi.
                </div>
            </div>
        </div>
    </section>

    <?php


require('footer.php')

?>