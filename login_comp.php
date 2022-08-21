<?
include 'connect.php';
$email = $_POST[email];
$name= $_POST[name];
$gender = $_POST[gender];
$age = $_POST[age];
$password = $_POST[password];
// $regdate = date("YmdHis", time());//날짜 , 시간
// $ip = getenv("REMOTE_AEER"); // ip


//쿼리전송
$query="insert into cu_table(email,name,password,age,gender)
		value('".$email."','".$name."','".$gender."','".$age."','".$password."')";

/*mysql_query("set names utf8",$connect); db한글문서깨질경우 추가*/

mysql_query($connect, $query);
mysql_close; // 전송끝내기
?>