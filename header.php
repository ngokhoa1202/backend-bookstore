
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="./assets/style_trangchu.css">
    <link rel="stylesheet" type="text/css" href="./assets/style.css">

    <style>
        
    </style>
    <title>Trang Chủ</title>
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
                        <span>Hi '.$_SESSION['userUid'].',
                        <form action="includes/logout.inc.php" method="post" style="display:inline-block">
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
</body>
</html>
