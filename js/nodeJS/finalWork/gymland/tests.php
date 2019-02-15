<?php //require("../settings.php"); ?>
<?php 
//вывод заголоука с данными о кодировке страницы
//header ('Content-type: text/html; charset=utf-8/');
$db = mysqli_connect("localhost", "cs04501_gl", "dobagi49", "cs04501_gl");
//$db = mysqli_connect("localhost", "cs04501_gymland", "ilyashax", "cs04501_gymland"); 
if($db) { 
  echo 'Успешное подключение';
} else echo 'Error';
$res = $db->query("SELECT * FROM tovary ORDER BY id ASC");

while($rows = mysqli_fetch_assoc($res)){ 
        echo " id = " . $rows['id'] . "\n";
    }

/*while ($row = $res->fetch_assoc()) {
    echo " id = " . $row['id'] . "\n";
}*/

//mysqli_query('SET names utf8')

//$query = "SELECT * FROM tovary";
//$rez = mysqli_query($db, "SELECT * FROM tovary");

/*$sql="SELECT * FROM tovary";
$rez=mysqli_query($sql);
  while($row = mysqli_fetch_array($rez))
{
echo $row['id'];
}

while ($arr1 = mysqli_fetch_array ($rez)) {
              echo "<br>";
          echo $arr1['id'];       
        }
*/

?>
