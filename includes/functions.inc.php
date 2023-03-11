<?php

function emptyInputSignup($username, $email, $phone, $password) {
    if (empty($username) || empty($email) || empty($phone) || empty($password)) return true;
    else return false;
}

function invalidUsername ($username) {
    //Regex
    $username_regex = "/^[A-Za-z][A-Za-z0-9]{4,20}$/";
    if (!preg_match($username_regex, $username)) return true;
    return false;
}

function invalidPhone ($phone) {
    //Regex
    $phone_regex = "/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/";
    if (!preg_match($phone_regex, $phone)) return true;
    return false;
}

function invalidEmail ($email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) return true;
    return false;
}

function invalidPassword ($password) {
   //Regex
    $password_regex = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{7,}$/";
    if (!preg_match($password_regex, $password)) return true;
    return false;
}

function usernameExists($conn, $username) {
    $sql = "SELECT * FROM users WHERE username = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)) {
        header("Location: ../signup.php?error=sqlerror");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    if($row = mysqli_fetch_assoc($resultData)) {
         return $row;
    }
    else return false;
    mysqli_stmt_close($stmt);

}

function createUser($conn, $username, $email, $phone, $password) {
    $sql = "INSERT INTO  users (username, email, phone, password)
                                 VALUES (?, ? ,?, ?);";

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)) {
        header("Location: ../signup.php?error=sqlerror1");
        exit();
    }
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "ssss", $username, $email, $phone, $hashedPassword);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location: ../signup.php?signup=success");
    exit();

}


?>