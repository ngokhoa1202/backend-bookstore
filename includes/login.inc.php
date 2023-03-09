<?php


if (isset($_POST['login-submit'])) {
    
    
    require 'dbh.inc.php';
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (empty($username) || empty($password)) {
        header("Location: ../login.php?error=emptyfields&username=".$username);
        exit();
    }

    else {
        $sql = "SELECT * FROM users WHERE username = ? OR email = ?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../login.php?error=sqlerror");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "ss", $username, $username );
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {

                $passwordCheck = password_verify($password, $row['password']);
                if  ($passwordCheck == false) {
                    header("Location: ../login.php?error=wrongpassword");
                    exit();

                }
                else if ($passwordCheck == true) {
                    session_start();
                    $_SESSION['userId'] = $row['id'];
                    $_SESSION['userUid'] = $row['username'];
                    header("Location: ../trangchu.php?loggedin");
                    exit();
                }
                else {
                    header("Location: ../login.php?error=wrongpassword");
                    exit();
                }
            }
            else {
                header("Location: ../login.php?error=nouser");
                exit();

            }
            

            
        }
    }


    mysqli_stmt_close($stmt);
    mysqli_close($conn);

}


else {
    header("Location: ../login.php");
    exit();


}

?>