<?php
include "config.php";

//Створення форми
function GetContent($link)
{
	
$id = $_GET['id'];
$query = "SELECT * FROM pages WHERE id =$id";
$result = mysqli_query($link,$query) or die(mysqly_error($link));
$page = mysqli_fetch_assoc($result);

if ($page) {
	$title = $page['title'];
	$description = $page['description'];
	$text = $page['text'];

	$content =  '


<div class="jumbotron d-flex justify-content-center" >
<form method="POST"  class=" mb-3 container row " >

<input type="text" name="title" value = "'.$title.'"  placeholder="type title" class="form-control"><br><br>
<textarea name="description" id="description" cols="30" rows="10" placeholder="type description" class="form-control ">'.$description.'</textarea> <br><br> 
<textarea name="text" id="text" cols="30" rows="10" placeholder="type text" class="form-control ">'.$text.'</textarea> <br><br> 

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
function AddPage($link)
{

	$title = htmlspecialchars($_POST['title']);

	$description = htmlspecialchars($_POST['description']);

	$text = htmlspecialchars($_POST['text']);

	$id = $_GET['id'];


	if ( strlen($title)!==0  and strlen($text)!==0 and strlen($description)!==0)  {

		$query = "UPDATE pages SET title='$title',text='$text',description='$description' WHERE id=$id";
        mysqli_query($link,$query) or die(mysqly_error($link));
         header('Location:/admin/?update=true');
        
        return " Сторінка відредагована";
       
	}
	
}

AddPage($link);
GetContent($link);


?>


