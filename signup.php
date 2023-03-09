<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style_trangchu.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">

    <link rel="stylesheet" href="./style.css">
    <title>Sign up</title>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-light nav1">
        <div class="container">
            <a href="trangchu.php" class="navbar-brand">
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
                                <img 
                                    src="images/register.png" alt="register"
                                    style="width: 15px; padding-bottom: 2px;"
                                >
                                <button type="submit" name="logout-submit" class="btn" >Logout</button>
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