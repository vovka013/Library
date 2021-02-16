<?php
include "config.php";
include "components/header.php";

$query = "SELECT * FROM mesage ORDER BY id DESC";
$result = mysqli_query($link,$query) or die(mysqly_error($link));


for ($date = [];$array = mysqli_fetch_assoc($result);$date[]=$array);

echo '<table class=" container justify-content-center table>
<thead class="thead-dark ">
<th class="   bg-secondary">id</th>
<th class=" bg-secondary">Ім\'я</th>
<th class=" bg-secondary">Прізвище</th>
<th class="bg-secondary">email</th>
<th class="  bg-secondary">Текст</th>
</tr> </thead>';
foreach ($date as $page) {

echo " <tr>

      <td >{$page['id']}</td>
      <td >{$page['name']}</td>
      <td >{$page['surname']}</td>
      <td >{$page['email']}</td>
      <td >{$page['text']}</td>
      

    </tr>";
}

echo ' </table>';








include "components/footer.php";
?>