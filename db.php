<?php 
$servername="localhost";
$username = "root"; // user name of mysql
$password = "" ;// password of mysql
$dbname = "auth_db"; // created database name

$conn = new mysqli($servername  , $username , $password , $dbname );

if ($conn->connect_error) {
    die("connection failed :" . $conn->connect_error);
}

?>