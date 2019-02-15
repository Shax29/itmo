	
	<!-- Подключаем файл с конфигурацией -->
<?php
require('../config.php');
?> 
<!doctype html>
<html class='no-js' lang='en'>
  <head>
    <meta charset='utf-8' />
    <meta name='viewport' content='width=device-width, initial-scale=0.7' />
    <title>Gymland - интернет-магазин спортивного питания</title>
    <link rel='stylesheet' href='../css/foundation.css' />
    <link rel='stylesheet' href='../css/style.css' />
    <link rel='stylesheet' href='../css/style_slaider.css' type='text/css' media='screen'/>
    <link rel='stylesheet' type='text/css' href='../css/global.css'/><!-- Новый Слайдер!-->
    <script src='../js/vendor/modernizr.js'></script>
    
    <!-- Это относится к слайдеру -->
    <script src='http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js'></script>
    <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js'></script>
  
         
		<script src='../js/jquery-1.7.1.min.js'></script>
		
		
		<script src='../js/jquery-1.4.4.min.js'></script>
	<script src='../js/slides.min.jquery.js'></script>
	<script>
		$(function(){
			$('#slides').slides({
				preload: true,
				preloadImage: 'img/loading.gif',
				play: 5000,
				pause: 2500,
				hoverPause: true
			});
		});
	</script>
	<link rel='stylesheet' href='../css/global.css'>
	
	
    
    <!-- Всплывающие подсказки -->
    <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js'></script>
    <script type='text/javascript' src='../js/vtip.js'></script>
    <link rel='stylesheet' type='text/css' href='../css/vtip.css' />
     
    <!-- Кнопка наверх -->
    <script type='text/javascript' src='../js/button_vverh.js'></script>
       
    <!-- Стили и скрипт для кнопки 'Корзина' -->
    <link rel='stylesheet' type='text/css' href='css/default.css' />
		<link rel='stylesheet' type='text/css' href='../css/component.css' />
		<script src='../js/modernizr.custom.js'></script>
        <script src='../js/classie.js'></script>
          
        <script src='../js/classie.js'></script>
		
        <!-- Стили и скрипт для Форм входа и регистрации -->
        
        <link href='../css/style_form.css' rel='stylesheet' type='text/css' />
        <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js'></script>
        <script type='text/javascript' src='../js/my_scripts.js'></script>
        
        <!-- Стили 'Товары и описание' -->
        <link href='../css/product.css' rel='stylesheet' type='text/css' />
        
    
    <!-- <script type="text/javascript">
$(function() {
	$("#add_comment").click(function(){
		var username = $("#username").val();
		var advantage = $("#advantage").val();
        var disadvantage = $("#disadvantage").val();
        var comment = $("#comment").val();
		$.ajax({
			type: "POST",
			url: "templates/comment.php",
          data: {"username": username, "advantage": advantage, "disadvantage": disadvantage, "comment": comment},
			cache: false,						
			success: function(response){
				var messageResp = new Array('Ваш отзыв добавлен','Сообщение не отправлено Ошибка базы данных','Не заполнены обязательные поля');
				var resultStat = messageResp[Number(response)];
				if(response == 0){
					$("#username").val("");
					$("#advantage").val("");
                    $("#disadvantage").val("");
                    $("#comment").val("");
                   $("#success_comment").addClass("messege_complete");
				} 
                else if(response != 0){
                  
                  var username= $("#username").val();
                  var advantage= $("#advantage").val();
                  var disadvantage= $("#user_phone_footer").val();
                  var comment= $("#user_phone_footer").val();
                   $("#success_comment").removeClass("messege_complete");
                  
                  if(username=='') {
                    $("#error_username").text(resultStat).show().delay(1500).fadeOut(800, function() {
                    $("#username").removeClass("error_mail");
                  });
                  
                    $("#username").addClass("error_mail");    
                  } 
                  //$("#user_name_footer").removeClass("error_mail").delay(1500).fadeOut(800);
                  
                  if(advantage=='') {
                    $("#error_advantage").text(resultStat).show().delay(1500).fadeOut(800, function() {
                    $("#advantage").removeClass("error_mail");
                  });
                  
                    $("#advantage").addClass("error_mail");    
                  }
                  
                  
                  if(disadvantage=='') {
                    $("#error_disadvantage").text(resultStat).show().delay(1500).fadeOut(800, function() {
                    $("#disadvantage").removeClass("error_mail");
                  });
                  
                    $("#disadvantage").addClass("error_mail");    
                  }
                  
                  
                  if(comment=='') {
                    $("#error_comment").text(resultStat).show().delay(1500).fadeOut(800, function() {
                    $("#comment").removeClass("error_mail");
                  });
                  
                    $("#comment").addClass("error_mail");    
                  }
                  
				}
                  
				$("#success_comment").text(resultStat).show().delay(1500).fadeOut(800);
				
			}
		});
		return false;
				
	});
});
</script> -->
    
    
  </head>
  <body>
  <?php
    $_POST[preference] = ('Выберите вкус,Нейтральный');
	$preference = explode(",", $_POST[preference]);
    foreach($preference as $_POST[preference]) {}
	
	$_POST[sostav] = ('Калории – 16 ккал;
Белки – 4 г; 
Витамин B6 – 10  мг (500% рекомендуемой суточной нормы);
Аминокислоты:;
L–лейцин – 382 мг;
L–Изолейцин – 216 мг;
L–Валин – 202 мг;
L–лизин – 317 мг; 
L–метионин – 74 мг;
L–фенилаланин – 120  мг; 
L–треонин – 225 мг; 
L–триптофан – 60  мг; 
L–аланин – 170 мг; 
L–аргинин – 83 мг; 
L–аспарагиновая кислота – 373 мг; 
L–Цистин – 87 мг;
L–глутаминовой кислоты – 593 мг; 
L–глицин – 64 мг; 
L–гистидин – 69 мг; 
L–пролина – 193 мг; 
L–серин – 166 мг; 
L–тирозин – 106 мг;');
    $sostav = explode(";", $_POST[sostav]);
    foreach($sostav as $_POST[sostav]) {}

	?>
  
      <div class='row_center'>
      
    <div class='large-12-center'>
          
      <div class='large-8_katalog'>
     
      <ul class='breadcrumbs'>
      <li><a href='../index.php' rel='home'> Главная </a></li>
	  <li><a href='../sport_eat.php' rel='sport_eat'> Спортивное питание </a></li>
      <li><a href='../sport_eat/geiner.php' rel='sport_eat'> Аминокислоты </a></li>
      <li>  Universal Nutrition, Amino 2250  </li>
      </ul>
   <form action='' method='post' class='tovary_week_form' id='sort'>  
   <div class='product_conteiner'> 
     <?php 


 
$sql_tov="SELECT * FROM tovary WHERE photo='145.jpeg'";
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
     <img src='../photos/145.jpeg' name='photo' title='$tov[manuf], $tov[nazv]' alt='$tov[manuf], $tov[nazv]'/>
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


  //$preference = explode(",", $tov[preference]);

echo "<select name='preference[$tov[id]]'>";

for($i=0;$i<1;$i++) {
  
    echo "<option value='$preference[$i]'>$preference[$i]</option>";
  
  } 
  
  /* Выгружаем доступные вкусы (свойства) товара */  
  
$sql_sklad="SELECT * FROM sklad WHERE id_tov='$_GET[items]'";
$rez_sklad=mysql_query($sql_sklad);  
  
$preference_sklad = explode(",", $sklad['preference']);
$kol_sklad = explode(",", $sklad['kol']);
  
while($sklad=mysql_fetch_array($rez_sklad)) 
  {  
  
$preference_sklad = explode(",", $sklad['preference']);
$kol_sklad = explode(",", $sklad['kol']);  
  
for($k=0; $k<count($preference_sklad); $k++) {
  
  if ($kol_sklad[$k]>0) {
  $preference_sklad[$k]=='';
  $pre[]=$preference_sklad[$k];  
  }        

}    
  
  foreach($pre as $preference_tov[preference])
    {
        echo "<option value='$preference_tov[preference]'>$preference_tov[preference]</option>";
    }
    
  
  /*foreach($preference as $tov[preference])
    {
        echo "<option value='$tov[preference]'>$tov[preference]</option>";
    }
    */
	  
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
  
//$sql_sklad="SELECT * FROM sklad WHERE id_tov='$_GET[items]'";
//$rez_sklad=mysql_query($sql_sklad);
//while($sklad=mysql_fetch_array($rez_sklad)) 
  //{  

    // if ($sklad[product_availability]=='1') {
    //$status='В наличии';
    //} else $status='Нет в наличии'; 
    
    //echo $sklad[preference]; 
    
//$preference_sklad = explode(",", $sklad['preference']);
//$kol_sklad = explode(",", $sklad['kol']);  
    //$id_tovar_sklad = explode(",", $sklad['id_tov']);

    /*------------------ Выгрузка товаров, вкуса которых есть на складе -------------------*/
    
/* 

  for($k=0; $k<count($preference_sklad); $k++) {
  
  //echo 1;
  //echo $preference_sklad[$k];
  //echo $kol_sklad[$k];
  
  if ($kol_sklad[$k]>0) {
  $preference_sklad[$k]=='';
  $pre[]=$preference_sklad[$k];  
  }        
  //$pre[]=$preference_sklad[$k]; 
  //print_r($pre);
}  
  
    echo "<select name='preference[$tov[id]]'>";
    
    echo "<option value='Выберите вкус'>Выберите вкус</option>";
    
foreach($pre as $pre_tov[preference])
    {
        echo "<option value='$pre_tov[preference]'>$pre_tov[preference]</option>";
    }
	  
echo "</select>";

*/

 /*----------------------------------------------------------------------------------------*/
    
  //$key = array_search($preference_zakaz[$k], $preference_sklad);
     //print_r($key);
     //echo "<br />";
    
    
echo "<table class='table_sklad'>";
    
echo "<tr>

<td class='shapka_sklad'> Вкус </td>
<td class='shapka_sklad'> Количество </td>
<td class='shapka_sklad'> Форма выпуска </td>
<td class='shapka_sklad'> Статус </td>

</tr>";    

    // foreach($preference_sklad as $sklad[preference])
    //foreach($kol_sklad as $sklad[kol])
    //{
    
    //for ($i=0;$i<count($kol_sklad);$i++) {
      
    //foreach($kol_sklad as $sklad[kol])
    //foreach($preference_sklad as $sklad[preference])
      //echo $sklad[preference][$i];
   

    for ($i=0;$i<count($kol_sklad);$i++) { 
      
      //foreach($kol_sklad as $sklad[kol]) {
      
        if ($kol_sklad[$i]<=0) {
        $kol_sklad[$i]=0;
        $status='Нет в наличии';
        } else $status='В наличии'; 
    
      echo "<tr>";
        
        echo "<td class='body_sklad'>$preference_sklad[$i]</td>";
        echo "<td class='body_sklad'>$kol_sklad[$i] шт.</td>";
        echo "<td class='body_sklad'>$sklad[release_form]</td>";
        echo "<td class='body_sklad'>$status</td>";
          
      echo "</tr>";
      // }   
      
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
       <!-- </form> -->
        
        </form>
        
        <!-- Комментарии к товару -->
        <!-- <form method='post' action='../templates/comment.php'> -->
        <form method='post' action=''>
        <div class='review'>
          
          
          
          <?php

         //Запрос для получения информации о товаре
          
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

 <?php
//$date = date("d.m.Y");
$date = date("Y-m-d");
//$lk[date] = date("d.m.Y",strtotime($lk[date]));

//if($_POST['add_comment']) {
 
//if($_POST['add_com']) {

if($_POST['add_comment']) {
$sql="INSERT INTO otzyv (id_tovar, comment, advantage, disadvantage, name, date) VALUES ('$_GET[items]', '$_POST[comment]', '$_POST[advantage]', '$_POST[disadvantage]', '$_POST[username]', '$date')";
$rez=mysql_query($sql); 
echo "<script>location.replace('/products/$tov[manuf]_$tov[nazv]_$tov[mass].php?items=$_GET[items]');</script>";  
} 

      ?>


          
          
          <h4> Отзыв о <? echo $tov[manuf], $tov[nazv]; ?> </h4>
          
         <!--<form method='post' action=''> --> 
            
              <?php
              
              $sql="SELECT * FROM otzyv WHERE id_tovar='$_GET[items]'";
              $rez=mysql_query($sql);
              $otzyv=mysql_num_rows($rez);
              
              if ($otzyv=='')  {
              
              echo "<div class='rev-area'>";
              echo 'Отзывов о товаре пока никто не оставил';
              echo "</div>";
              
              } else {
                
                //echo "<form method='post' action='templates/comment.php'>";
                
                if ($_SESSION[admin]) {
                  
                  //while ($otzyv=mysql_fetch_array($rez)) { 
                   
                  //$otzyv[date] = date("d.m.Y",strtotime($otzyv[date]));  
            
                  //echo "<div class='rev-area'>";
                  
                   
                   if (!$_GET[edit_otzyv]) {
                     
                     while ($otzyv=mysql_fetch_array($rez)) { 
                   
                     $otzyv[date] = date("d.m.Y",strtotime($otzyv[date])); 
                       
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
                  
                       } if ($_GET[edit_otzyv]) {
                       
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

//echo "</div>";

        ?>
            
         <!-- </form> -->
                  
             
          
     
        
        
        <!-- Комментарии к товару -->
        
        
     
     <?php
//$date = date("d.m.Y");
//$lk[date] = date("d.m.Y",strtotime($lk[date]));


/* $date = date("Y-m-d");
 if($_POST['add_comment']) {
  
$sql="INSERT INTO otzyv (id_tovar, comment, advantage, disadvantage, name, date) VALUES ('$_GET[items]', '$_POST[comment]', '$_POST[advantage]', '$_POST[disadvantage]', '$_POST[username]', '$date')";
$rez=mysql_query($sql); 
echo "<script>location.replace('');</script>";  
} */

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
  
            echo "<div id='error_username'></div>";  
  
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
            
         <!-- </form> -->
            
         
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
  
  
  
  
  
   <script src='js/vendor/jquery.js'></script>
    <script src='js/foundation.min.js'></script>
    <script>
      $(document).foundation();
    </script>
    
   
   <script>
			var buttons7Click = Array.prototype.slice.call( document.querySelectorAll( '#btn-click button' ) ),
				buttons9Click = Array.prototype.slice.call( document.querySelectorAll( 'button.btn-8g' ) ),
				totalКнопкаs7Click = buttons7Click.length,
				totalКнопкаs9Click = buttons9Click.length;

			buttons7Click.forEach( function( el, i ) { el.addEventListener( 'click', activate, false ); } );
			buttons9Click.forEach( function( el, i ) { el.addEventListener( 'click', activate, false ); } );

			function activate() {
				var self = this, activatedClass = 'btn-activated';

				if( classie.has( this, 'btn-7h' ) ) {
					// if it is the first of the two btn-7h then activatedClass = 'btn-error';
					// if it is the second then activatedClass = 'btn-success'
					activatedClass = buttons7Click.indexOf( this ) === totalКнопкаs7Click-2 ? 'btn-error' : 'btn-success';
				}
				else if( classie.has( this, 'btn-8g' ) ) {
					// if it is the first of the two btn-8g then activatedClass = 'btn-success3d';
					// if it is the second then activatedClass = 'btn-error3d'
					activatedClass = buttons9Click.indexOf( this ) === totalКнопкаs9Click-2 ? 'btn-success3d' : 'btn-error3d';
				}

				if( !classie.has( this, activatedClass ) ) {
					classie.add( this, activatedClass );
					setTimeout( function() { classie.remove( self, activatedClass ) }, 1000 );
				}
			}

			document.querySelector( '.btn-7i' ).addEventListener( 'click', function() {
				classie.add( document.querySelector( '#trash-effect' ), 'trash-effect-active' );
			}, false );
		</script>
   
<script src='../js/is.mobile.js'></script>
<script src='../js/jquery.maskedinput.min.js'></script>
<script src='../js/formcheck.js'></script>    
   
   
  </body>
</html>
	
	