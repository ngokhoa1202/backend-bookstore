<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname='bookstore';
$port = '3307';
$conn = mysqli_connect($servername, $username, $password, $dbname, $port);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

?>