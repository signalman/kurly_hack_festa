<?php
include 'index.html';

$host = 'localhost';
$user = 'root';
$pw = '1234';
$dbName = 'customer';
$mysqli = new mysqli($host, $user, $pw, $dbName);

if($mysqli){
    echo "MySQL 접속 성공";
}else{
    echo "MySQL 접속 실패";
}

$conn = mysqli_connect("localhost", "root", "1234", "customer");
$email = $_POST['email'];
$name= $_POST['name'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$password = $_POST['password'];
$sql = "insert into cu_table values";
$sql = $sql."('".$email."', '".$name."', '".$gender."', $age, '".$password."')";
$mysqli->query($sql);
$mysqli->close();
?>
