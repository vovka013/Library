<?php
include "config.php";

//Створення форми
function GetContent($link)
{
	
$id = $_GET['id'];
$query = "SELECT * FROM books WHERE id =$id";
$result = mysqli_query($link,$query) or die(mysqly_error($link));
$page = mysqli_fetch_assoc($result);

if ($page) {
	$title = $page['title'];
	$url = $page['url'];


	$content =  '


<div class="jumbotron d-flex justify-content-center" >
<form method="POST"  class=" mb-3 container row " >

<textarea name="title" id="title" cols="20" rows="5" placeholder="type title" class="form-control ">'.$title.'</textarea> <br><br> 
<textarea name="url" id="url" cols="20" rows="5" placeholder="type url" class="form-control ">'.$url.'</textarea> <br><br> 

<div>
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

<input type="submit" name="upload" value="Оновити"  class="btn btn-primary mt-5 col-12">
</form>
</div>
	' ;
}else
{
	$content = "Сторінка відсутня";
}


include "layout.php";

}
//додавання ного запису
function AddBook($link)
{

	$title = htmlspecialchars($_POST['title']);

	$url = htmlspecialchars($_POST['url']);
	$categori = htmlspecialchars($_POST['categori']);


	$id = $_GET['id'];


	if ( strlen($title)!==0  and strlen($url)!==0 and $categori!==0)  {

    $title = mysqli_real_escape_string($link,$title);
    $url = mysqli_real_escape_string($link,$url);
    
		$query = "UPDATE books SET title='$title',url='$url',categori='$categori' WHERE id=$id";
        mysqli_query($link,$query) or die(mysqly_error($link));
         header('Location:/admin/books.php?update=true');
        
        return " Книга відредагована";
       
	}
	
}

AddBook($link);
GetContent($link);


?>


