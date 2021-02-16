<?php
include "config.php";
include "components/header.php";
?>



<?php
function ShowBookTable($link)
{



$query = "SELECT * FROM books ORDER BY id DESC";
$result = mysqli_query($link,$query) or die(mysqly_error($link));


for ($date = [];$array = mysqli_fetch_assoc($result);$date[]=$array);

echo '<table class=" container justify-content-center table>
<thead class="thead-dark ">
<th class="   bg-secondary">id</th>
<th class=" bg-secondary">Назва</th>
<th class=" bg-secondary">Клас</th>
<th class=" bg-secondary">Редагувати</th>
<th class=" bg-secondary">Видалити</th>
</tr> </thead>';
foreach ($date as $page) {

echo " <tr>

      <td >{$page['id']}</td>
      <td >{$page['title']}</td>
      <td >{$page['categori']}</td>

     <td class=\"bg-success \"><a class=\"text-dark font-weight-bold d-flex  justify-content-center\" href=\"books_edit.php?id={$page['id']}\">Редагувати</a></td>
	<td class=\"bg-danger\"><a class=\"text-dark font-weight-bold  d-flex  justify-content-center\" href=\" ?delete={$page['id']}\">Видалити</a></td>
      
    </tr>";
}

echo '</table>';

}

//Видалення даних
function DeleteBook($link){
if (isset($_GET['delete'])) {
$id = $_GET['delete'];
$query = "DELETE FROM books WHERE id = $id";
$result = mysqli_query($link,$query) or die(mysqly_error($link));

return true;
}

else
{
return false;
}


}



if (DeleteBook($link)) {
	echo '<div class="mail col-12 d-flex justify-content-center">Книга видалена</div>';
}
if (isset($_GET['aded'])) {
	echo  '<div class="mail col-12 d-flex justify-content-center">Книга створена</div>';
}
if (isset($_GET['update'])) {
	echo  '<div class="mail col-12 d-flex justify-content-center">Книга відредагована</div>';
}

ShowBookTable($link);

?>

<?php include "components/footer.php";?>

