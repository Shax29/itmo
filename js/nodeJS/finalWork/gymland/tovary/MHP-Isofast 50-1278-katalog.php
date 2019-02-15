
    
  <?php
    $_POST[preference] = ('Выберите вкус,Шоколад');
	$preference = explode(",", $_POST[preference]);
    foreach($preference as $_POST[preference]) {}
	
	$_POST[sostav] = ('Калорийность – 224 ккал; \r\nЖиры – 0 г; \r\nХолестерин – 5 мг;\r\nНатрий – 550 мг;\r\nУглеводы – 6 г;\r\n    в т.ч. Волокна – 1 г;\r\n    в т.ч. Сахары – 0 г;\r\nБелки – 50 г; \r\nКальций – 75 мг (8%); \r\nЖелезо – 2 мг (11%);');
    $sostav = explode(";", $_POST[sostav]);
    foreach($sostav as $_POST[sostav]) {}

	?>
  
      <div class='row_center'>
      
    <div class='large-12-center'>
          
      <div class='large-8_katalog'>
     
      <ul class='breadcrumbs'>
      <li><a href='../index.php' rel='home'> Главная </a></li>
	  <li class='sport_eat_breadcrumbs'><a href='../sport_eat.php' rel='sport_eat'> Спортивное питание </a></li>
      <li class='geiner_breadcrumbs'><a href='../sport_eat/protein.php?category=Протеин' rel='sport_eat'> Протеин </a></li>
      <li>  MHP, Isofast 50  </li>
      </ul>
   <form action='' method='post' class='tovary_week_form' id='sort'>  
   <div class='product_conteiner'> 
     <?php 
 
 
$sql_tov="SELECT * FROM tovary WHERE photo='150.jpeg'";
$rez_tov=mysql_query($sql_tov);
while($tov=mysql_fetch_array($rez_tov)) {
     
if ($tov['cena_sale']==0) 
{        
$bonus=$tov['cena']*2/100;
$bonus=ceil($bonus);  
} else if ($tov['cena_sale']!==0) 
{
$bonus=$tov['cena_sale']*2/100;
$bonus=ceil($bonus); 
}

     echo "<div class='big_photo'>.
     <img src='../photos/150.jpeg' name='photo' title='$tov[manuf], $tov[nazv]' alt='$tov[manuf], $tov[nazv]'/>
     </div>";
     
    echo "<div class='product_info'>
     
     <div class='product_title'>
     <span class='title_name' name='title'> $tov[manuf], $tov[nazv] </span> <span class='tovar_of_the_week'> Товар недели! </span>
     <br> <span class='title_and_mass' name='title_and_mass'> $tov[category], $tov[mass] $tov[unit]. </span>  
     
     </div>
     
     <div class='product_mini_descript'> 
     
     $tov[mini_opis] 
      
     </div>
     
     <div class='product_price'>
	 
          <span class='new_price' name='new_price'> Цена со скидкой: $tov[cena_sale] руб. </span>
     <br> <span class='old_price' name='old_price'> Старая цена: $tov[cena] руб. </span>
     <br><span class='bonus_price_tovar' > + $bonus бонусов </span>
     
     </div>
     
     </div>";
     
    echo "<div class='action_product'>
     
    <div class='amount_product'>
      
      <span class='minus'>
      <div class='amount_minus_product'>
      <a href='#' class='icon icon-minuss'>
	  -
	  </a>
      </div>
      </span>
      
      <div class='amount_text_product'>
      <input type='text' value='1' name='kol[$tov[id]]' size='5'/>
      </div>
      
      <span class='plus'>
      <div class='amount_plus_product'> 
      <a href='#' class='icon icon-pluss'>
      +
      </a>
      </div>
      </span>
      
      
     
	  </div>";
      	


echo "<div class='buy_tovar_product'>";


$preference = explode(",", $tov[preference]);

echo "<select name='preference[$tov[id]]'>";
foreach($preference as $tov[preference])
    {
        echo "<option value='$tov[preference]'>$tov[preference]</option>";
    }
	  
echo "</select>";
echo "</div>";  

     
    echo "<div class='product_button'>
    
	<a href='?submit_buy=$tov[id]'> <button class='buy-product-button' type='submit' name='submit_buy' value='$tov[id]'>
     <img src='../img/cart.png'/ width='22' height='25'> Купить
     </button> </a>
      
     </div>";
     
     
echo "</div>";


 /*    СКЛАД!!!!!!    */ 
  
  echo "<div class='product_sklad'>";
  
$sql_sklad="SELECT * FROM sklad WHERE id_tov='$_GET[items]'";
 $rez_sklad=mysql_query($sql_sklad);
  while($sklad=mysql_fetch_array($rez_sklad)) 
  {  

  /*  if ($sklad[product_availability]=='1') {
    $status='В наличии';
    } else $status='Нет в наличии'; */ 
    
$preference_sklad = explode(',', $sklad[preference]);
$kol_sklad = explode(',', $sklad[kol]);  
  
echo "<table class='table_sklad'>";
    
echo "<tr>

<td class='shapka_sklad'> Вкус </td>
<td class='shapka_sklad'> Количество </td>
<td class='shapka_sklad'> Форма выпуска </td>
<td class='shapka_sklad'> Статус </td>

</tr>";    

/*

    foreach($preference_sklad as $sklad[preference])
    foreach($kol_sklad as $sklad[kol])
    {

*/
  
   for ($i=0;$i<count($kol_sklad);$i++) { 
   
    if ($kol_sklad[]==0) {
        $status='Нет в наличии';
        } else $status='В наличии'; 
  
      echo "<tr>
        
        <td class='body_sklad'>$preference_sklad[$i]</td>
        <td class='body_sklad'>$kol_sklad[$i] шт.</td>
        <td class='body_sklad'>$sklad[release_form]</td>
        <td class='body_sklad'>$status</td>
        
      </tr>";
  }
	 
echo "</table>";

  }    
  
  echo "</div>";
     
    
     echo "<div class='product_descript'>"; 
     
     
     echo "<p style='text-align: justify;'>

    <strong style='font-size:14px;'>$tov[nazv]</strong>

    <span style='font-size:14px;'> - $tov[opis] </span>

 
    
    <br></br>
    <strong> Состав и кол-во питательных веществ в одной порции: </strong>
    
    </p>";
    
$sostav = explode(";", $tov[sostav]);

echo "<ul>";
foreach($sostav as $tov[sostav])
    {
        echo "<li>$tov[sostav]</li>";
    }

echo "</ul>"; 


echo "<p style='text-align: justify;'>

<strong style='font-size:16px;'>

    Ингредиенты:

</strong>

<span style='font-size:14px;'> $tov[ingredients] </span>

</p>";

echo "<div class='clearer'>"."</div>";
    
     
     
     
     "</div>";
 
     
    echo "<div class='application'>
     
     <strong style='font-size:16px;'> Рекомендации по применению: </strong>
     <span style='font-size:14px;'> $tov[sposob_prim] </span> 
     
     </div>";
       
     
    echo "</div>"; 
}    
    ?>  
     </form>
 </div>
 </div>      
   
  
      <div class='large-4-right-menu'>
     
            <?php
require('../templates/right_menu.php');
?> 
     </div>
      
       </div>
      
         
      
     </div>
  
	
	