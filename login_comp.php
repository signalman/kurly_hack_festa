<?php
include 'index.html';

$host = 'localhost';
$user = 'root';
$pw = '1234';
$dbName = 'customer';
$mysqli = new mysqli($host, $user, $pw, $dbName);

// if($mysqli){
//     echo "MySQL 접속 성공";
// }else{
//     echo "MySQL 접속 실패";
// }

$conn = mysqli_connect("localhost", "root", "1234", "customer");
$gender = $_POST['gender'];
$age = $_POST['age'];
$sql = "insert into user_table(gender, age) values ";
$sql = $sql."('".$gender."', '".$age."')";
$mysqli->query($sql);
$mysqli->close();
?>
