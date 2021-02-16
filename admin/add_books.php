<?php
include "config.php";
error_reporting(-1);

//Створення форми
function GetContent()
{
	


	$content =  '
<div class="jumbotron d-flex justify-content-center" >
<form method="POST"  class=" mb-3 container row " >

<textarea name="title" id="title" cols="20" rows="5" placeholder="Введіть назву книги" class="form-control "></textarea> <br><br> 
<textarea name="url" id="url" cols="20" rows="5" placeholder="Введіть силку на книгу" class="form-control "></textarea> <br><br> 

<div>
<label><b>Вкажіть для якого класу ця книга:</b><br>
    <input type="radio" id="contactChoice1"
     name="categori" value="4">
    <label for="contactChoice1">Четвертий</label>

    <input type="radio" id="contactChoice2"
     name="categori" value="5">
    <label for="contactChoice2">Пятий</label>

    <input type="radio" id="contactChoice3"
     name="categori" value="6">
    <label for="contactChoice3">Шостий</label>

        <input type="radio" id="contactChoice4"
     name="categori" value="7">
    <label for="contactChoice4">Сьомий</label>

    <input type="radio" id="contactChoice5"
     name="categori" value="8">
    <label for="contactChoice5">Восьмий</label>

    <input type="radio" id="contactChoice6"
     name="categori" value="9">
    <label for="contactChoice6">Девятий</label>

        <input type="radio" id="contactChoice7"
     name="categori" value="10">
    <label for="contactChoice7">Десятий</label>

    <input type="radio" id="contactChoice8"
     name="categori" value="11">
    <label for="contactChoice8">Одинадцятий</label>

    
  </div>
</label>

<input type="submit" name="upload" value="Загрузить"  class="btn btn-primary mt-5 col-12">

</form>
</div>
	' ;

	include "layout.php";
}
//додавання ного запису
function AddBook($link)
{
	if (isset($_POST['upload']))
{

	$title = htmlspecialchars($_POST['title']);

	$url = htmlspecialchars($_POST['url']);
	
	$categori =(integer) htmlspecialchars($_POST['categori']);




	
// echo print_r($link);


	if ( strlen($url)!==0 and strlen($title)!==0 and $categori !==0 )  {

    $title = mysqli_real_escape_string($link,$title);
    $url = mysqli_real_escape_string($link,$url);

		$query = "INSERT INTO books (`title`,`url`,`categori`) VALUES ('$title','$url','$categori')";

        mysqli_query($link,$query) or die(mysqli_error($link));


        header('Location:/admin/books.php?aded=true');
        
       
	}else
	{
		echo 'неправильно введені дані';
	}


	}
}

$info =  AddBook($link);
GetContent($info);


?>


