<?php

$connect = mysqli_connect(
    $servername = "localhost",
    $username = "root",
    $password = "",
    $db_name = "dbase",
);
mysqli_set_charset($connect, "utf8");

if(mysqli_connect_error()){
    echo "Falha na conexão: ".mysqli_connect_error();
}