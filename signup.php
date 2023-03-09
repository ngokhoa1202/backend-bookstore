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
                      <li class="breadcrumb-item active" aria-current="page" a href="#">Đăng ký</a></li>
                    </ol>
                  </nav>
                <div class="col-md-12">
                      <div class="row">
                        <h6 class="text-center">Đăng ký tài khoản</h6>
                        <?php
                        if (isset($_GET['error'])) {
                            if($_GET['error'] == 'emptyfields') {
                                echo '<p class="error-msg"> Fill in all fields!</p>';
                            }
                            else if ($_GET['error'] == 'usertaken') {
                                echo '<p class="error-msg"> Username is exists!</p>';


                            }
                            
                        }
                        else if (isset($_GET['signup'])) {
                            if($_GET['signup'] == 'success')
                            echo '<p class="success-msg"> Signup successful!</p>';
                        }

                        ?>
                        <div class="container">
                            <form action="includes/signup.inc.php" method="post">
                                <div class="form-row d-flex ">
                                    <div class="form-group col-md-6" style="margin-right: 30px;">
                                        <label for="username" class="mb-2 mt-1">Tên đăng nhập:</label>
                                        <input 
                                            type="text" class="form-control" id="username"
                                            placeholder="Nhập tên đăng nhập"
                                            name="username"
                                        >
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email" class="mb-2 mt-1">Email:</label>
                                        <input 
                                            type="email" class="form-control" id="email"
                                            placeholder="Nhập email"
                                            name="email"

                                        >
                                    </div>
                                </div>

                                <div class="form-row d-flex">
                                    <div class="form-group col-md-6" style="margin-right: 30px;">
                                      <label for="password" class="mb-2 mt-3">Mật khẩu:</label>
                                      <input type="password" class="form-control" id="password"
                                            placeholder="Nhập mật khẩu"
                                            name="password"

                                      >
                                    </div>
                                    <div class="form-group col-md-6">
                                      <label for="phone" class="mb-2 mt-3">Số điện thoại:</label>
                                      <input type="tel" class="form-control" id="phone"
                                            placeholder="Nhập số điện thoại"
                                            name="phone"

                                      >
                                    </div>
                                </div>
                                <button type="submit" name="signup-submit" class="btn btn-primary mt-4">Đăng ký</button>
                            </form>
                          </div>
                          
                          
                      </div>
                </div>

            </div>
        </div>
    </section>

<?php


require('footer.php')

?>