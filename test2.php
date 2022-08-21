<?php
// include 'connect.php';
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

$id = $_POST[id];
$user_id= $_POST[user_id];
$name = $_POST[name];
$pw = $_POST[pw];
$memo = $_POST[memo];
$regdate = date("YmdHis", time());//날짜 , 시간
$ip = getenv("REMOTE_AEER"); // ip


//쿼리전송
// $query = "create table customer.board(id varchar(20), user_id varchar(20), name varchar(20), pw varchar(20), memo varchar(20), regdate varchar(20), ip varchar(20));";
$query="insert into board(id,user_id,name,pw,memo,regdate,ip) values ('df','df','df','df','df','ddf','df')";

// mysql_query("set names utf8",$connect);

mysql_query($query,$mysqli);
mysql_close($mysqli); // 전송끝내기
?>