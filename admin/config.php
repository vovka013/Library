<?php

//DataBase підключення
$host = 'localhost';
$user = 'root';
$pasword = '';
$dbName = 'test';

$link = mysqli_connect($host,$user,$pasword,$dbName);
mysqli_query($link,"SET NAMES 'utf8'");


?>