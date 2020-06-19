<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ass2_web";
$conn = mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
    die("cannot connect db" . mysqli_connect_error());
}else{
    echo "connect successfully";
}

?>