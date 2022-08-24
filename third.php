<?php
// include 'login.html';

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

$keyword = $_POST['keyword'];

$sql = "update user_table set Rec_vi_pr_3 = '".$keyword."' order by id DESC LIMIT 1";
$mysqli->query($sql);
$mysqli->close();
?>