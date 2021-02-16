<?php include "admin/config.php";?>
<?php include "components/header.php"?>
<main class="books_bg">
	<div class="container">
<?php
function GetNavigation($link){

echo '<div class="d-flex justify-content-center">
<div class=" justify-content-center text-white"><h4>Виберіть клас</h4>
<div class=" col-md-12  row  pt-5">
<ul class=" container d-flex justify-content-center">
<li class="nav-link  bg-secondary btn"><a class="text-light" href="?categori=4">4</a></li>
<li class="nav-link  bg-secondary btn"><a class="text-light" href="?categori=5">5</a></li>
<li class="nav-link  bg-secondary btn"><a class="text-light" href="?categori=6">6</a></li>
<li class="nav-link  bg-secondary btn"><a class="text-light" href="?categori=7">7</a></li>
<li class="nav-link  bg-secondary btn"><a class="text-light" href="?categori=8">8</a></li>
<li class="nav-link  bg-secondary btn"><a class="text-light" href="?categori=9">9</a></li>
<li class="nav-link  bg-secondary btn"><a class="text-light" href="?categori=10">10</a></li>
<li class="nav-link  bg-secondary btn"><a class="text-light" href="?categori=11">11</a></li>
</ul></div></div>
</div>
';

if (!empty($_GET['categori']))
{


$categori = $_GET['categori'];
var_dump($categori);
$query = "SELECT * FROM books WHERE categori=$categori ORDER BY id DESC ";
$result = mysqli_query($link,$query) or die(mysqly_error($link));
for ($date = [];$array = mysqli_fetch_assoc($result);$date[]=$array);

echo '<div class="row">';
foreach ($date as $page) {

echo " 
      <div class=\"boks col-md-12 d-flex justify-content-center\"><a class=\"boks_link\" href=\"{$page['url']}\"><h4 class=\"text-white\">{$page['title']}</h4></a></div>
    ";
}

echo '</div>';

}else
{
echo " ";
}

}

GetNavigation($link);

?>


</div>
</main>
<?php include "components/footer.php"?>
