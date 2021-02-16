
<?php include "components/header.php"?>

<?php include "admin/config.php"; ?>
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

    echo '<div class="bg-success d-flex justify-content-center ">
<a href="admin/index.php"><h5 class="text-light">Увійти в адмінку</h5></a>
</div>';

    }else
    {
     echo '<div class="bg-danger d-flex justify-content-center ">
<h5 class="text-light">Неправильно введені дані</h5>
</div>';
    }
}
 

?>
<main class="log_bg">
<div class="container d-flex justify-content-center form_auto">
 <div class="row">
<form method="POST" action="login.php">

  <div class="form-group">
    <label for="exampleInputEmail1">Login</label>
    <input name="login" type="text" class="form-control" placeholder="Login" >
   
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input name="password" type="password" class="form-control" placeholder="password">
  </div>
  <button name="submit" type="submit" class="btn btn-primary">Submit</button>
</form>

</div>
</div>
</main>



<?php include "components/footer.php"?>