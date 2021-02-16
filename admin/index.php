<?php
include "config.php";
include "components/header.php";
//Вивід даних
function ShowPageTable($link)
{



$query = "SELECT id,description,title,img FROM pages ORDER BY id DESC";
$result = mysqli_query($link,$query) or die(mysqly_error($link));


for ($date = [];$array = mysqli_fetch_assoc($result);$date[]=$array);

echo '<table class=" container justify-content-center">
<tr  class="row title_table">
<th class="col-md-3 col-sm-12  d-flex justify-content-center align-items-center bg-secondary">Заголовок</th>
<th class="col-md-5 col-sm-12 d-flex justify-content-center align-items-center bg-secondary">Фотографія</th>
<th class="col-md-2 col-sm-12 d-flex justify-content-center align-items-center bg-secondary">Редагувати</th>
<th class="col-md-2 col-sm-12 d-flex justify-content-center align-items-center bg-secondary">Видалити</th>
</tr>';
foreach ($date as $page) {
$show_img = base64_encode($page['img']);
echo "<tr class=\"row \">
	<td  class=\"col-md-3 col-12 \">{$page['title']}</td>"?>
	<td class="col-md-5 col-12 d-flex justify-content-center align-items-center"><img src="data:image/jpeg;base64,<?php echo $show_img ?>" alt="" width ="300px" height ="300px"></td>
<?php
echo "<td class=\"col-md-2 col-12 bg-success d-flex justify-content-center align-items-center \"><a class=\"text-dark font-weight-bold\" href=\"edit.php?id={$page['id']}\">Редагувати</a></td>
	<td class=\"col-md-2 col-12 bg-danger d-flex justify-content-center align-items-center\"><a class=\"text-dark font-weight-bold\" href=\" ?delete={$page['id']}\">Видалити</a></td>
	</tr>";
}

echo ' </table>';

}
//----------------------------

//Видалення даних
function DeletePage($link)
{
if (isset($_GET['delete'])) {
$id = $_GET['delete'];
$query = "DELETE FROM pages WHERE id = $id";
$result = mysqli_query($link,$query) or die(mysqly_error($link));

return true;
}

else
{
return false;
}
//------------------------

}


if (DeletePage($link)) {
	echo '<div class="mail col-12 d-flex justify-content-center">Запис видалений</div>';
}
if (isset($_GET['aded'])) {
	echo  '<div class="mail col-12 d-flex justify-content-center">Запис створений</div>';
}
if (isset($_GET['update'])) {
	echo  '<div class="mail col-12 d-flex justify-content-center">Запис відредаговано</div>';
}

ShowPageTable($link);

include "components/footer.php";
?>


