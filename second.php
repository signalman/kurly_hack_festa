<?php
$host = 'localhost';
$user = 'root';
$pw = '1234';
$dbName = 'customer';
$mysqli = new mysqli($host, $user, $pw, $dbName);

$conn = mysqli_connect("localhost", "root", "1234", "customer");

$keyword = $_POST['keyword'];

$sql = "update user_table set Rec_vi_pr_2 = '".$keyword."' order by id DESC LIMIT 1";

$mysqli->query($sql);
$mysqli->close();

$ret = exec("python3 model.py",$output,$err);


if ($ret == "간식"){
   include 'index_fianl_간식.html';
}

elseif ($ret == "계란"){
    include 'index_final_계란.html';
}
elseif ($ret == "과일"){
    include 'index_final_과일.html';
}
elseif ($ret == "국"){
    include 'index_final_국.html';
}
elseif ($ret == "메인요리"){
    include 'index_final_메인요리.html';
}
elseif ($ret == "면"){
    include 'index_final_면.html';
}
elseif ($ret == "반찬"){
    include 'index_final_반찬.html';
}
elseif ($ret == "샐러드"){
    include 'index_final_샐러드.html';
}
elseif ($ret == "술"){
    include 'index_final_술.html';
}
elseif ($ret == "쌀"){
    include 'index_final_쌀.html';
}
elseif ($ret == "오일"){
    include 'index_final_오일.html';
}
elseif ($ret == "음료"){
    include 'index_final_음료.html';
}
elseif ($ret == "정육"){
    include 'index_final_정육.html';
}
elseif ($ret == "채소"){
    include 'index_final_채소.html';
}
elseif ($ret =="해산물"){
    include 'index_final_해산물.html';
}
?>