<?php
include "admin/config.php";

$select = "SELECT * FROM pages";
$result = mysqli_query($link,$select) or die(mysqly_error($link));
$array = mysqli_fetch_assoc($result);



?>
<?php include "components/header.php"?>



<div class="index_bg">


<div class="row ">
<div class=" col-md-9 col-sm-12">
<?php


// визначте, скільки результатів потрібно на одній сторінці
$results_per_page = 5;

// з'ясувати кількість результатів, що зберігаються в базі даних
$sql='SELECT * FROM pages';
$result = mysqli_query($link,$sql);
$number_of_results = mysqli_num_rows($result);
$number_of_results ;
// визначити кількість загальнодоступних сторінок
$number_of_pages = ceil($number_of_results/$results_per_page);

// визначте, на якому номері сторінки відвідувач зараз перебуває
if (!isset($_GET['page'])) {
  $page = 1;
} else {
  $page = $_GET['page'];
}

// визначити початковий номер sql LIMIT для результатів на сторінці відображення
$this_page_first_result = ($page-1)*$results_per_page;

// отримати вибрані результати з бази даних та відобразити їх на сторінці
$sql='SELECT * FROM pages ORDER BY id DESC LIMIT ' . $this_page_first_result . ',' .  $results_per_page ;
$result = mysqli_query($link, $sql);

while($row = mysqli_fetch_assoc($result)) {
$show_img = base64_encode($row['img']);

echo" <hr class=\"featurette-divider\">
    <div class=\"row featurette\">
      <div class=\"col-md-6 text_box\">
        <h2 class=\"featurette-heading\">{$row['title']}</span></h2>
        <p class=\"lead \">{$row['description']}</p>
        <a class=\"text-dark font-weight-bold\" href=\"page.php?id={$row['id']}\">Читати далі... >>> </a>
      </div> "?>

      <div class="col-md-6">
       <img src="data:image/jpeg;base64,<?php echo $show_img ?>" alt="" width="400px" height="400px">
      </div>
      <?php
 echo    '</div>';
    }


echo "<div class=\"d-flex flex-row justify-content-center\">";
// відображення посилань на сторінки
for ($page=1;$page<=$number_of_pages;$page++) {
  echo '<div class="page-item pagination"><a  class="page-link" href="index.php?page=' . $page . '">' . $page . '</a></div>';

}
echo "</div>";

?>
</div>
<!-- //------------------- -->
<div class="col-md-3 col-sm-12">
	<div class="card_link bg-info">
		
		<h5>Наша адреса</h5>
		<div class="bg-light">
		<pre>
Україна,
Рівненська обл.,
село Вербень,
вул. 19 березня,
тел: (09888) 7-12-29
E-mail: biblioteca@meta.ua

МИ ПРАЦЮЄМО:
9:00-18:00 год.
П’ятниця: 9:00 – 17:00 год.
Вихідний день: субота</pre>
		</div>
	</div>
	<div class="card_link bg-info d-flex flex-column align-items-center">
	
		<h5>Вільний доступ</h5>
		<img src="img/wifi.jpg" alt="" width="200px" height="200px">
		<p>До послуг відвідувачів нашої бібліотеки зона вільного wi-fi</p>
		</div>
	
	<div class="card_link bg-info d-flex justify-content-center">
		<a href="https://womo.ua/spisok-ukrayinskoyi-literaturi-shho-chitati-vlitku-uchnyam-5-11-klasiv/">
		<h5>Що читати влітку?</h5>
		<img src="img/riding.jpg" alt="" width="200px" height="200px">
	
		</a>
	</div>

	
</div>
<!-- //------------------- -->
</div>



</div>

<div class="message"><a href="message.php"><img src="img/fe9efa2e670f770a12833f801b8b4387.png" alt="" width="100%" height="100%"></a></div>

<?php include "components/footer.php"?>

