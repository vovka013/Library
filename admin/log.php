
<?php include "config.php"; ?>
<?php

if(isset($_POST['submit']))
{

$query = "SELECT * FROM usser";
$result= mysqli_query($link,$query);
$data = mysqli_fetch_assoc($result);
$login_DB =$data['login'];
$password_DB =$data['password'];

$password =  htmlspecialchars($_POST['password']);
$login = htmlspecialchars($_POST['login']);

  
    if ($password==$password_DB and $login_DB==$login) {

     header('Location:/admin/');

    }
 

   
}
?>