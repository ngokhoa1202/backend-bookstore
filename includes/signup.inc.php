<?php
    
    
if (isset($_POST['signup-submit'])) {
   
    require 'dbh.inc.php';
    require 'functions.inc.php'; 
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

     

    if (emptyInputSignup($username, $email, $phone, $password)) {
        header("Location: ../signup.php?error=emptyinput");
        exit();
    }
    else if (invalidUsername($username)) {
        header("Location: ../signup.php?error=invalidUsername");
        exit();

    }

    else if (invalidEmail($email)) {
        header("Location: ../signup.php?error=invaliEmail");
        exit();

    }
    else if (invalidPhone($phone)) {
        header("Location: ../signup.php?error=invalidPhone");
        exit();

    }
    else if (invalidPassword($password)) {
        header("Location: ../signup.php?error=invalidPassword");
        exit();
    }
    else if (usernameExists($conn, $username)) {
        header("Location: ../signup.php?error=usernameExists");
        exit();

    }
   
    else createUser($conn, $username, $email, $phone, $password);

}

else {
    header("Location: ../signup.php");
    exit();
}


?>