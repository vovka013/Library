<?php include "admin/config.php";?>
<?php include "components/header.php"?>
<main class="page">
<div class="jumbotron container">
<?php


$id = $_GET['id'];
$query = "SELECT * FROM pages WHERE id =$id";
$result = mysqli_query($link,$query) or die(mysqly_error($link));
$page = mysqli_fetch_assoc($result);

if ($page) {
	$title = $page['title'];
	$description = $page['description'];
	$text = $page['text'];

$text = str_replace(array("\r\n", "\r", "\n"), "<br />", $text);

	$show_img = base64_encode($page['img']);

echo"
<div class=\"container\">
 <hr class=\"featurette-divider\">

    <div class=\"row featurette\">
      <div class=\"col-md-6\">
        <h2 class=\"featurette-heading\">".$title."</span></h2>
        <p class=\"lead \">".$description."</p>
      </div> "?>

      <div class="col-md-6">
       <img src="data:image/jpeg;base64,<?php echo $show_img ?>" alt="" width="400px" height="400px">
      </div>
      <?php
 echo    '
<div class="col-md-12"><p class=\"lead \">'.$text.'</p> </div>


</div>
 </div>';
    }


?>

</div>
</main>

<?php include "components/footer.php"?>

