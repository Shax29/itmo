	
	
    <?php
require('../config.php');
?> 
    
  <?php
    $_POST[preference] = ('Выберите вкус,Банан,Ваниль,Шоколад');
	$preference = explode(",", $_POST[preference]);
    foreach($preference as $_POST[preference]) {}
	
	$_POST[sostav] = ('\r\n    Калорийность     120 ккал;\r\n    Протеины     20 г;\r\n    Углеводы     9 г;\r\n    Сахар     2 г;\r\n    Жиры     1 г;\r\n    Холестерин     35 мг;\r\n    Кальций     80 мг;\r\n    Натрий     55 мг;\r\n');
    $sostav = explode(";", $_POST[sostav]);
    foreach($sostav as $_POST[sostav]) {}

	?>
  
      <div class='row_center'>
      
    <div class='large-12-center'>
          
      <div class='large-8_katalog'>
     
      <!-- <ul class='breadcrumbs'>
      <li><a href='../index.php' rel='home'> Главная </a></li>
	  <li class='sport_eat_breadcrumbs'><a href='../sport_eat.php' rel='sport_eat'> Спортивное питание </a></li>
      <li class='geiner_breadcrumbs'><a href='../sport_eat/protein.php?category=Протеин' rel='sport_eat'> Протеин </a></li>
      <li>  MuscleTech, Premium Whey Protein Plus  </li>
      </ul> -->
      
      <ul class='breadcrumbs'>
      <li><a href='../index.php' rel='home'> Главная </a></li>
	  <li><a href='../sport_eat.php' rel='sport_eat'> Спортивное питание </a></li>
      <li><a href='../sport_eat/protein.php?category=Протеин' rel='sport_eat'> Протеин </a></li>
      <li>  MuscleTech, Premium Whey Protein Plus  </li>
      </ul>
      
   <form action='' method='post' class='tovary_week_form' id='sort'>  
   <div class='product_conteiner'> 
     <?php 
 
 
$sql_tov="SELECT * FROM tovary WHERE photo='157.jpeg'";
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
     <img src='../photos/157.jpeg' name='photo' title='$tov[manuf], $tov[nazv]' alt='$tov[manuf], $tov[nazv]'/>
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
   
    if ($kol_sklad[$i]==0) {
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
    
     </div>
    
     </form>
     
       <!-- Комментарии к товару -->
       
       <!--<form method='post' action='../templates/comment.php'>-->
       
       <form method='post' action=''>
        
        <div class='review'>
          
          <?php
         
          
              $sql="SELECT * FROM tovary WHERE id='$_GET[items]'";
              $rez=mysql_query($sql);
              $tov=mysql_fetch_array($rez);

          ?>
          
          
          
          <?php

         //Удаление отзыва

              if($_GET[del_otzyv]) {

	          $sql="DELETE FROM otzyv WHERE id_otzyv=$_GET[del_otzyv]";	
	          mysql_query($sql);
              echo "<script>location.replace('/products/$tov[manuf]_$tov[nazv]_$tov[mass].php?items=$_GET[items]');</script>";

              }


          ?>
          
          
          <?php

        //Редактирование отзыва

             if($_POST[edit_comment]) {
                
             $sql="UPDATE otzyv SET name='$_POST[edit_username]',comment='$_POST[edit_comment]',advantage='$_POST[edit_advantage]',disadvantage='$_POST[edit_disadvantage]' WHERE id_otzyv='$_GET[edit_otzyv]'";
             mysql_query($sql);
             echo "<script>location.replace('/products/$tov[manuf]_$tov[nazv]_$tov[mass].php?items=$_GET[items]');</script>";

              }


          ?>
          
          
          
          <h4> Отзыв о <? echo $tov[manuf] .' '. $tov[nazv]; ?> </h4>
          
          <!-- <form method='get' action=''> -->
            
              <?php
              
              $sql="SELECT * FROM otzyv WHERE id_tovar='$_GET[items]'";
              $rez=mysql_query($sql);
              $count_otzyv=mysql_num_rows($rez);
              
              if ($count_otzyv=='')  {
              
              echo "<div class='rev-area'>";
              echo 'Отзывов о товаре пока никто не оставил';
              echo "</div>";
              
              } else { 
                
             
              
              if ($_SESSION[admin]) {
              
              
              if (!$_GET[edit_otzyv]) {
              
                  while ($otzyv=mysql_fetch_array($rez)) { 
                   
                     $otzyv[date] = date('d.m.Y',strtotime($otzyv[date]));  
             
                  echo "<div class='rev-area'>";
              
             echo "<span style='font-size:12px;'> $otzyv[name], $otzyv[date] г. </span> 
                <span style='float:right; font-size:14px;'> <a href='?items=$_GET[items]&edit_otzyv=$otzyv[id_otzyv]'> Редактировать </a> / <a href='?items=$_GET[items]&del_otzyv=$otzyv[id_otzyv]'> Удалить </a> </span>"; 
                
              
              echo "<div class='rev-area-text'>
                
                <span> Достоинства: </span>
                <br>$otzyv[advantage]
              
              </div>
              

              
              <div class='rev-area-text'>
                
                <span> Недостатки: </span>
                <br>$otzyv[disadvantage]
              
              </div>
            
            
              
              <div class='rev-area-text'>
                
                <span> Комментарий: </span>
                <br>$otzyv[comment]
              
              </div>";
              
            
            echo "</div>";
                  
                  
                }
              
            }  if ($_GET[edit_otzyv]) {
            
                 $sql="SELECT * FROM otzyv WHERE id_otzyv='$_GET[edit_otzyv]'";
                 $rez=mysql_query($sql);
                  while ($edit_otzyv=mysql_fetch_array($rez)) {
                  
                  
                  echo "<div class='rev-area'>";
                          
                  echo "<div class='username inp-area'>
                  <label> Имя: <span class='important'>*</span> </label>
                  <input type='text' name='edit_username' value='$edit_otzyv[name]' />  
                  </div>
                  
                  <div class='advantage_item inp-area'>
                  <label> Достоинства: <span class='important'>*</span> </label>
                  <textarea name='edit_advantage'> $edit_otzyv[advantage] </textarea>  
                  </div>
            
                  <div class='disadvantage_item inp-area'>
                  <label> Недостатки: <span class='important'>*</span> </label>
                  <textarea name='edit_disadvantage'> $edit_otzyv[disadvantage] </textarea>  
                  </div>  
            
                  <div class='comment_item inp-area'>
                  <label> Комментарий: <span class='important'>*</span> </label>
                  <textarea name='edit_comment'> $edit_otzyv[comment] </textarea> 
                  </div>
            
                  <div class='comment_item inp-area'>  
                  <input type='submit' name='edit_otzyv' class='add_comment' value='Редактировать' />
                  <a href='/products/$tov[manuf]_$tov[nazv]_$tov[mass].php?items=$_GET[items]'> Назад </a> 
                  </div>";
                          
                  echo "</div>";        
                          
                      }
               
                  
                }
                  
             } else if (!$_SESSION[admin]) {
                
                  //echo "<div class='rev-area'>";  
                  
                while ($otzyv=mysql_fetch_array($rez)) { 
                  
                echo "<div class='rev-area'>
              
                <span style='font-size:12px;'> $otzyv[name], $otzyv[date] г. </span>
                
                <div class='rev-area-text'>
                
                   <span> Достоинства: </span>
                   <br>$otzyv[advantage]
              
                </div>
              
 
                <div class='rev-area-text'>
                
                  <span> Недостатки: </span>
                  <br>$otzyv[disadvantage]
              
                </div>
               
            
              
                <div class='rev-area-text'>
                
                  <span> Комментарий: </span>
                  <br>$otzyv[comment]
              
                </div>
              
            
                </div>";
                  
                
              }
                  
                  // echo "</div>";
                  
            }      
              
         } 
                  
            

            ?>
            
          <!-- </form> -->
          
          <!-- </div> -->
          
          
          
          <?php

$date = date('Y-m-d');

if($_POST['add_comment']) {
  
$sql="INSERT INTO otzyv (id_tovar, comment, advantage, disadvantage, name, date) VALUES ('$_GET[items]', '$_POST[comment]', '$_POST[advantage]', '$_POST[disadvantage]', '$_POST[username]', '$date')";
$rez=mysql_query($sql); 
echo "<script>location.replace('/products/$tov[manuf]_$tov[nazv]_$tov[mass].php?items=$_GET[items]');</script>";

}

      ?>
                  
                  
          <div class='comment'>
          
         <!-- <h4> Оставить отзыв </h4> -->
          
         <!-- <form method='get' action=''> -->
            
          <?php
          
if (!$_GET[edit_otzyv]) {
  
echo "<h4> Оставить отзыв </h4>";
          

if (!$_SESSION[name]) {
            
         echo "<div class='username inp-area'>
            <label> Имя: <span class='important'>*</span></label>
            <input type='text' name='username' for='username' id='username' />   
          </div>"; 
} else {
  
         echo "<div class='username inp-area'>
            <label> Имя: <span class='important'>*</span></label>
            <input type='text' name='username' value='$_SESSION[name]' />  
          </div>"; 
}


echo "<div class='advantage_item inp-area'>
            <label> Достоинства: <span class='important'>*</span> </label>
            <textarea name='advantage' for='advantage' id='advantage'> </textarea>  
          </div>
          
            <div id='error_advantage'></div>
            
          <div class='disadvantage_item inp-area'>
            <label> Недостатки: <span class='important'>*</span> </label>
            <textarea name='disadvantage' for='disadvantage' id='disadvantage'> </textarea>  
          </div>  
          
            <div id='error_disadvantage'></div>
            
          <div class='comment_item inp-area'>
            <label> Комментарий: <span class='important'>*</span> </label>
            <textarea name='comment' for='comment' id='comment'> </textarea> 
          </div>
            
            <div id='error_comment'></div>
            
           <div class='comment_item inp-area'> 
            <input name='add_com' type='hidden' value='no' id='add_com'>
            <input type='submit' name='add_comment' class='add_comment' id='add_comment' value='Добавить' />  
          </div>";
  
              echo "<div id='success_comment'></div>";
           
         }

          ?>  
                     
     
          </div>
  
      </div> 
           
   </form>  
   
 </div> 
 
      <div class='large-4-right-menu'>
     
            <?php
require('../templates/right_menu.php');
?> 
     </div>
   
      
 </div> 
  
</div>  

	