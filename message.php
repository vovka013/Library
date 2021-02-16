<?php include "admin/config.php";?>
<?php include "components/header.php"?>
<?php

if(isset($_POST['submit']))
{
  


$name =  htmlspecialchars($_POST['name']);
$surname = htmlspecialchars($_POST['surname']);
$email = htmlspecialchars($_POST['email']);
$text = htmlspecialchars($_POST['text']);

  
    if (strlen($name)!==0 and strlen($surname)!==0 and strlen($email)!==0 and strlen($text)!==0  ) {
$query = "INSERT INTO `mesage` ( `name`, `surname`, `email`, `text`) VALUES ('$name', '$surname', '$email', '$text');";
mysqli_query($link,$query) or die(mysqli_error($link));

  echo '<div class="bg-success d-flex justify-content-center ">
<h5 class="text-light">Повідомлення Успішно надіслано</h5>
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
<form method="POST" action="message.php">

  <div class="form-group">
    <label >Імя</label>
    <input name="name" type="text" class="form-control" placeholder="Імя" >
   
  </div>
  <div class="form-group">
    <label >Прізвище</label>
    <input name="surname" type="text" class="form-control" placeholder="Прізвище" >
   
  </div>
  <div class="form-group">
    <label >Email</label>
    <input name="email" type="email" class="form-control" placeholder="email" >
   
  </div>
    <div class="form-group">
    <label >Введіть текст</label>
    <textarea name="text" id="text" cols="30" rows="10" placeholder="Введіть текст" class="form-control "></textarea>
  </div>
  
  <button name="submit" type="submit" class="btn btn-primary">Submit</button>
</form>

</div>
</div>
</main>




<?php include "components/footer.php"?>