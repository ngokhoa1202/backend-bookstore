<?php


// Regex 
$password_regex = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{7,}$/"; 
$phone_regex = "/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/";
$username_regex = "/^[A-Za-z][A-Za-z0-9]{5,20}$/";



if (isset($_POST['signup-submit'])) {
    
    
    require 'dbh.inc.php';
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
   


    if (empty($username) || empty($email) || empty($phone) || empty($password)) {
        header("Location: ../signup.php?error=emptyfields&username=".$username."&email=".$email."&phone=".$phone);
        exit();
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match($username_regex, $username)  && !preg_match($phone_regex, $phone)) {
        header("Location: ../signup.php?error=invalidfields");
        exit();

    }

    else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match($username_regex, $username)  ) {
        header("Location: ../signup.php?error=invalidusernamemail&phone=".$phone);
        exit();

    }
    else if ( !preg_match($username_regex, $username)  && !preg_match($phone_regex, $phone)) {
        header("Location: ../signup.php?error=invalidusernamephone&email=".$email);
        exit();

    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)  && !preg_match($phone_regex, $phone)) {
        header("Location: ../signup.php?error=invalidemailphone&username=".$username);
        exit();
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../signup.php?error=invalidemail&username=".$username."&phone=".$phone);
        exit();

    }
    else if (!preg_match($username_regex, $username)) {
        header("Location: ../signup.php?error=invalidusername&email=".$email."&phone=".$phone);
        exit();

    }

    else if (!preg_match($phone_regex, $phone)) {
        header("Location: ../signup.php?error=invalidphone&username=".$username."&email=".$email);
        exit();

    }
    else if (!preg_match($password_regex, $password)) {
        header("Location: ../signup.php?error=invalidpassword&username=".$username."&email=".$email."&phone".$phone);
        exit();
    }
    else {
        $sql = "SELECT username FROM users WHERE username = ?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../signup.php?error=sqlerror");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "s", $username );
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0) {
                header("Location: ../signup.php?error=usertaken&email=".$email."&phone=".$phone);
                exit();
            }
            else {
                $sql = "INSERT INTO users (username,email,phone,password) 
                                    VALUES (?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../signup.php?error=sqlerror");
                    exit();
                }
                else {
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);


                    mysqli_stmt_bind_param($stmt, "ssss", $username, $email, $phone, $hashedPwd);
                    mysqli_stmt_execute($stmt);

                    header("Location: ../signup.php?signup=success");
                    exit();
                }

            }
        }
    }


    mysqli_stmt_close($stmt);
    mysqli_close($conn);


}

else {
    header("Location: ../signup.php");
    exit();
}


?>