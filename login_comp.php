<?php
include 'index.html';
// include 'connect.php';
// echo("<script>location.replace('./index.html');</script>");
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
$email = $_POST['email'];
$name= $_POST['name'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$password = $_POST['password'];

// echo "데이터가 잘 넘어갔다 !555";

$sql = "insert into cu_table values";
$sql = $sql."('".$email."', '".$name."', '".$gender."', $age, '".$password."')";
$mysqli->query($sql);

// echo "데이터가 잘 넘어갔다 !6666";
/*mysql_query("set names utf8",$connect); db한글문서깨질경우 추가*/

mysqli_query($conn, $sql); //전송

// echo "데이터가 잘 넘어갔다!";

mysql_close(); // 전송끝내기

// echo "<A HREF = 'index.html'>안녕</A>";
?>
