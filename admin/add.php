<?php
include "config.php";
error_reporting(-1);
//Створення форми
function GetContent()
{



	$content =  '
	<div class="jumbotron d-flex justify-content-center" >
<form method="POST" enctype="multipart/form-data" class=" mb-3 container row " >
<input type="text" name="title"  placeholder="Введіть заголовок" class="form-control"><br><br>
<textarea name="description" id="description" cols="30" rows="10" placeholder="Введіть опис" class="form-control "></textarea> <br><br>
<textarea name="text" id="text" cols="30" rows="10" placeholder="Введіть текст" class="form-control "></textarea><br><br> 
 
<div class="custom-file mt-5">
    <input name="img_upload" type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
    <label class="custom-file-label" for="inputGroupFile01">Виберіть фото</label>
  </div>
<input type="submit" name="upload" value="Загрузить"  class="btn btn-primary mt-5 col-12">
</form>
</div>
	' ;

	include "layout.php";
}
//додавання ного запису
function AddPage($link)
{
	if (isset($_POST['upload']))
{
$img_type = substr($_FILES['img_upload']['type'], 0,5);
$img_size = 1024*1024*2; //  2мегабайти

	$title = htmlspecialchars($_POST['title']);

	$description = htmlspecialchars($_POST['description']);

	$text = htmlspecialchars($_POST['text']);




	



	if ( strlen($description)!==0 and strlen($title)!==0 and strlen($text)!==0 and !empty($_FILES['img_upload']['tmp_name']) and $img_type =='image' and $_FILES['img_upload']['size']<=$img_size)  {

	$title = mysqli_real_escape_string($link,$title);
	$description = mysqli_real_escape_string($link,$description);
	$text = mysqli_real_escape_string($link,$text);

      $img =addslashes(file_get_contents($_FILES['img_upload']['tmp_name']));

		$query = "INSERT INTO pages (`title`, `text`, `img`, `description`) VALUES ('$title','$text','$img','$description')";

        mysqli_query($link,$query) or die(mysqly_error($link));


        header('Location:/admin/?aded=true');
        
       
	}else
	{
		echo 'неправильно введені дані';
	}


	}
}

$info =  AddPage($link);
GetContent($info);


?>


