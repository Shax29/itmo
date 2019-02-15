<?php session_start(); ?>
<!-- Подключаем файл с конфигурацией -->
<?php
require("config.php");
?> 

 <?php
/* Расчёт стоимости доставки */

$oplata=$_POST['oplata'];
$delivery=$_POST['delivery'];
$delivery_city_district_courier=$_POST['delivery_city_district_courier'];
$delivery_city_district_immediately_courier=$_POST['delivery_city_district_immediately_courier'];
$delivery_city_suburb=$_POST['delivery_city_suburb'];
$delivery_city_outlets=$_POST['delivery_city_outlets'];
$ems=$_POST['ems'];

/*
$oplata=$_GET['oplata'];
$delivery=$_GET['delivery'];
$delivery_city_district_courier=$_GET['delivery_city_district_courier'];
$delivery_city_district_immediately_courier=$_GET['delivery_city_district_immediately_courier'];
$delivery_city_suburb=$_GET['delivery_city_suburb'];
$delivery_city_outlets=$_GET['delivery_city_outlets'];
$ems=$_GET['ems'];
*/

// Добавление заказа в базу
//if ($_POST[order]) {
if ($_POST[order]) {

  //if($_POST[delivery]=="immediately_courier" or $_POST[delivery]=="ems" and $_POST[oplata]=="bank_wire") {
  if($_POST[delivery]=="immediately_courier" and $_POST[oplata]=="bank_wire" or $_POST[delivery]=="ems" and $_POST[oplata]=="bank_wire") {

    /* echo "<div class='cart_error'>
  
  Выбранный вами способ оплаты <span class='cart_error_oplata'>Банковский перевод</span> невозможен для способов доставки <span class='cart_error_delivery'> Срочная курьерская доставка </span> и <span class='cart_error_delivery'>EMS Почта России</span>.
  < br/>Пожалуйста выберите любой другой способ доставки.
  
  </div>"; */
    
   /*$error_cart="Выбранный вами способ оплаты <span class='cart_error_oplata'>Банковский перевод</span> невозможен для способов доставки <span class='cart_error_delivery'> Срочная курьерская доставка </span> и <span class='cart_error_delivery'>EMS Почта России</span>.
Пожалуйста выберите любой другой способ доставки.";*/ 
  

  //} else if ($_POST[order]) {	
  
} else {
  
    //if($_POST[delivery]!="immediately_courier" and $_POST[oplata]!="bank_wire" or $_POST[delivery]!="ems" and $_POST[oplata]!="bank_wire") {
  
  //for($i=0; $i<count($_SESSION['cart']); $i++)
  //{
  //$sql="SELECT * FROM tovary WHERE id=".$_SESSION[cart][$i]."";
  //$rez=mysql_query($sql);
  //$tov=mysql_fetch_array($rez);

	
			
if (isset($_POST['delivery'])) {$delivery = $_POST['delivery']; if ($delivery == '') {unset($delivery);}}			
 
if (isset($_POST['oplata'])) {$oplata = $_POST['oplata']; if ($oplata == '') {unset($oplata);}}
if ($_POST[delivery]=="courier"){
if ($_SESSION[total_price]<=5000){
$_SESSION['dostavka']=250;
$_SESSION['delivery']=Курьером;
$_SESSION['district']=$_POST['delivery_city_district_courier'];  
}
if ($_SESSION['total_price']>5000){
$_SESSION['dostavka']='Бесплатно';
$_SESSION['delivery']=Курьером;
$_SESSION['district']=$_POST['delivery_city_district_courier'];   
}
}
/* Срочная доставка курьером */		
if ($_POST[delivery]=="immediately_courier"){
$_SESSION['dostavka']=400;
$_SESSION['delivery']='Срочно курьером';
$_SESSION['district']=$_POST['delivery_city_district_immediately_courier'];   
}	
/* Доставка по Лен. обл. */		
if ($_POST[delivery]=="area"){
$_SESSION['dostavka']=400;
$_SESSION['delivery']='Доставка в ЛО';  
$_SESSION['district']=$_POST['delivery_city_suburb'];   
}	
/* Самовывоз */		
if ($_POST[delivery]=="pickup"){
$_SESSION['dostavka']='Бесплатно';
$_SESSION['delivery']=Самовывоз;  
$_SESSION['district']=$_POST['delivery_city_outlets'];    
}	
/* Доставка в другие города */	
if ($_POST[delivery]=="ems") {
$_SESSION['dostavka']=800;
$_SESSION['delivery']=ЕМС;  
$_SESSION['district']=$_POST['ems'];   
}
 
/* Способы оплаты */  
  
if($_POST[oplata]=="nal") {
$_SESSION['oplata']='Наличными курьеру';
} 

if($_POST[oplata]=="wire") {
$_SESSION['oplata']='Безналичный расчёт'; 
}

if($_POST[oplata]=="yandex") {
$_SESSION['oplata']='Яндекс Деньги'; 
}

if($_POST[oplata]=="webmoney") {
$_SESSION['oplata']='WebMoney'; 
}

if($_POST[oplata]=="bank_wire") {
$_SESSION['oplata']='Банковский перевод'; 
}  
  
  
$_SESSION['itogo_with_delivery']=$_SESSION['total_price']+$_SESSION['dostavka'];
  
  
  
  //$itogo_with_delivery=$_SESSION['total_price']+$_SESSION['dostavka'];
  //$date =date("d.m.Y");
$date =date("Y-m-d");  

  //if (isset($_GET['preference$i'])) {$_SESSION['zakaz_preference'][] = $_GET['preference$i']; if ($_SESSION['zakaz_preference'] == '') {unset($_SESSION['zakaz_preference']);}}

$cost = implode(",", $_SESSION['prices']);  
$quantity = implode(",", $_SESSION['amount']);
$nazv=implode(",", $_SESSION['zakaz_nazv']);
$manuf=implode(",", $_SESSION['zakaz_manuf']);
$category=implode(",", $_SESSION['zakaz_category']);
$preference=implode(",", $_SESSION['properties']);
$unit=implode(",", $_SESSION['zakaz_unit']);
$mass=implode(",", $_SESSION['zakaz_mass']);
$photo=implode(",", $_SESSION['zakaz_photo']);
$id_cart=implode(",", $_SESSION['cart']);
$release_form=implode(",", $_SESSION['release']);  

  //}
  //print_r($_SESSION['zakaz_preference']);
    
    
    $sql="INSERT INTO zakaz (name, phone, address, id_user, id_tovar, stoim, kol, status, date_add, dop_info, manuf, category, oplata, dostavka, delivery, preference, nazv, mass, unit, cost, photo, bonus, bonus_payment_user, release_form) VALUES ('$_POST[name]', '$_POST[phone]', '$_SESSION[district], $_POST[address]', '$_SESSION[id_users]', '$id_cart', '$_SESSION[itogo_with_delivery]', '$quantity', 'Новый', '$date', '$_POST[dop_info]', '$manuf', '$category', '$_SESSION[oplata]', '$_SESSION[dostavka]', '$_SESSION[delivery]', '$preference', '$nazv', '$mass', '$unit', '$cost', '$photo', '$_SESSION[total_bonus]', '$_SESSION[bonus_payment_user]', '$release_form')";
    
  
  //$sql="INSERT INTO zakaz (name, phone, address, id_user, id_tovar, stoim, kol, status, date_add, dop_info, manuf, category, oplata, dostavka, delivery, preference, nazv, mass, unit, cost, photo, bonus, bonus_payment_user, user_bonus, release_form) VALUES ('$_POST[name]', '$_POST[phone]', '$_SESSION[district], $_POST[address]', '$_SESSION[id_users]', '$id_cart', '$_SESSION[itogo_with_delivery]', '$quantity', 'Новый', '$date', '$_POST[dop_info]', '$manuf', '$category', '$_SESSION[oplata]', '$_SESSION[dostavka]', '$_SESSION[delivery]', '$preference', '$nazv', '$mass', '$unit', '$cost', '$photo', '$_SESSION[total_bonus]', '$_SESSION[bonus_payment_user]', '$_SESSION[user_bonus_cart]', '$release_form')";
    

  //$sql="INSERT INTO zakaz (name, phone, address, id_user, stoim, kol, status, date_add, dop_info, manuf, category, oplata, dostavka, delivery, preference, nazv, mass, unit, cost, photo, bonus, bonus_payment_user, user_bonus) VALUES ('$_POST[name]', '$_POST[phone]', '$_SESSION[district], $_POST[address]', '$_SESSION[id_users]', '$_SESSION[itogo_with_delivery]', '$quantity', 'Новый', '$date', '$_POST[dop_info]', '$manuf', '$category', '$_POST[oplata]', '$_SESSION[dostavka]', '$_POST[delivery]', '$preference', '$nazv', '$mass', '$unit', '$cost', '$photo', '$_SESSION[total_bonus]', '$_SESSION[bonus_payment_user]', '$_SESSION[user_bonus]')";  
  
  
  //$sql="INSERT INTO zakaz (name, phone, address, id_user, stoim, kol, status, date_add, dop_info, manuf, category, oplata, dostavka, delivery, preference, nazv, mass, unit, cost, photo, bonus, bonus_payment_user, user_bonus) VALUES ('$_POST[name]', '$_POST[phone]', '$_SESSION[district], $_POST[address]', '$_SESSION[id_users]', '$_SESSION[total_price]', '$quantity', 'Новый', '$date', '$_POST[dop_info]', '$manuf', '$category', '$_POST[oplata]', '$_SESSION[dostavka]', '$_POST[delivery]', '$preference', '$nazv', '$mass', '$unit', '$cost', '$photo', '$_SESSION[total_bonus]', '$_SESSION[bonus_payment_user]', '$_SESSION[user_bonus]')";

  //var_dump($sql); die(); // временно, только чтобы убедиться!
  
  mysql_query($sql);

   echo $_SESSION['user_bonus_after']; 
    
  $sql="UPDATE users SET bonus='$_SESSION[user_bonus_after]' WHERE id_users=$_SESSION[id_users]";    
  mysql_query($sql);
  
/*  ДОБАВЛЕНИЕ ОСТАТКА КОЛИЧЕСТВА ТОВАРА НА СКЛАД  */

  
  /*  

 for($k=0; $k<count($_SESSION['cart']); $k++) {	  

             $sql="SELECT * FROM sklad WHERE id_tov=".$_SESSION[cart][$k].""; 
	         $rez=mysql_query($sql); 
			 
	         while($sklad=mysql_fetch_array($rez)) {

$kol_sklad = explode(",", $sklad['kol']);
$preference_sklad = explode(",", $sklad['preference']);              
               
$preference=implode(",", $_SESSION['properties']);
$quantity = implode(",", $_SESSION['amount']);               
               
               
               
               for($i=0; $i<1; $i++) {
           
               $key = array_search($_SESSION[properties][$k], $preference_sklad);
                 
               $sklad['kol'] = $kol_sklad[$key]; 
                 
               $kol_ostatok = $sklad['kol']-$_SESSION['amount'][$k]; 
             
                    $base_kol = array($key => "$kol_ostatok");

                    $kol_sklad = array_replace($kol_sklad, $base_kol);
                 
                    $kol_sklad = implode(",", $kol_sklad); */ 
                 
                    /* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! 
                 
                    print_r($kol_sklad);  
                 
                    !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
                 /*
                 
                 $sql="UPDATE sklad SET kol='".$kol_sklad[$k]."' WHERE id_tov='".$_SESSION[cart][$k]."'";
                 mysql_query($sql);
                 //var_dump($sql); die();
                  
                 
                 
              } 
               
                            
               
		} 
         

   }  */



  /* if($_SESSION[id_users]) {
  
$sql = "SELECT FROM users WHERE id_users=$_SESSION[is_users]";
$rez = mysql_query($sql);
$user=mysql_fetch_array($rez);
  
$_SESSION['user_bonus'] = $user['bonus'] + $_SESSION['total_bonus'];
 
$sql="INSERT INTO users WHERE id_users=$_SESSION[is_users] (bonus) VALUES ('$_SESSION[user_bonus]')"; 
mysql_query($sql);
 
  }  */
  
  //$sql="SELECT * FROM zakaz ORDER BY id_zakaz DESC";
  //$rez=mysql_query($sql);
  //$zakaz_number=mysql_fetch_array($rez);  
  
	// Постоянная инф-ия
$toadress = "$_POST[email]";
$subject = "Заказ в интернет-магазине спортивного питания Gymland.ru";
$mailcontent = "Спасибо за Ваш заказ. Скоро наш менеджер свяжется с Вами для уточнения деталей заказа. 
\r\n Если Вы зарегистрированный пользователь, то информацию о Вашем заказе можно найти в личном кабинете.
\r\n С уважением, команда <a href='http://gymland.ru'>Gymland.ru</a>";
// Функция отправки почтового сообщения
mail($toadress,$subject,$mailcontent);	
     
  
  echo "<script>location.replace('zakaz.php');</script>"; 
  }
}
?>

  <!-- Создание коротких имён -->
<?php
$amount_goods=$_POST['amount_goods'];
$amount_price=$_POST['amount_price'];



//print_r($_SESSION['release']);


/*  ДОБАВЛЕНИЕ ОСТАТКА КОЛИЧЕСТВА ТОВАРА НА СКЛАД  */

if ($_POST[order]) {


 for($k=0; $k<count($_SESSION['cart']); $k++) {	  

             $sql="SELECT * FROM sklad WHERE id_tov=".$_SESSION[cart][$k].""; 
	         $rez=mysql_query($sql); 
			 
	         while($sklad=mysql_fetch_array($rez)) {

$kol_sklad = explode(",", $sklad['kol']);
$preference_sklad = explode(",", $sklad['preference']);              
               
               //$pr[]=$preference_sklad;

$preference=implode(",", $_SESSION['properties']);
$quantity = implode(",", $_SESSION['amount']);               
               
               //echo "<br />";
               //print_r($kol_sklad);
               //echo "<br />";
               
               //echo "<br />";
               //print_r($preference_sklad);
               //echo "<br />";
               //print_r($_SESSION['properties'][$k]); 
               //$a=$_SESSION['properties'][$k];
               //echo "<br />"; 
               
              
               
               
               //$key = array_search('$_SESSION[properties][$k]', $preference_sklad);
               
               for($i=0; $i<1; $i++) {
           
               $key = array_search($_SESSION[properties][$k], $preference_sklad);
                 //print_r($key);
                 //echo "<br />"; 
                 
               $sklad['kol'] = $kol_sklad[$key];
                 //print_r($sklad['kol']);
                 //echo "<br />";    
                 
               $kol_ostatok = $sklad['kol']-$_SESSION['amount'][$k]; 
                 //print_r($kol_ostatok);
                 //echo "<br />";  
               
  
                 
                 //$base_kol[$key]=$kol_ostatok;
                 
                $base_kol = array($key => "$kol_ostatok");
                 //print_r($base_kol);
                 //echo "<br />"; 
                $kol_sklad = array_replace($kol_sklad, $base_kol);
                 //print_r($kol_sklad); 
                 
                 for ($j=0; $j<count($kol_sklad); $j++) {
                 
                       $summ_kol_sklad=+$kol_sklad[$j];
                   
                       if ($summ_kol_sklad<=0)
                     {
                       $product_availability=0;
                     } else $product_availability=1;                 
                 } 
                 
                 //print_r($base_kol[$key]);
                 //echo "<br />"; 
                 //$kol_sklad[$key] = array_replace($kol_sklad, $base_kol); 
               
                $kol_sklad = implode(",", $kol_sklad);  
                 
                 /* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
                 
                 //print_r($kol_sklad);  
                 //echo "<br />"; 
                 /* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
                 
                 
                 //$sql="UPDATE sklad SET kol='".$kol_sklad[$k]."' WHERE id_tov='".$_SESSION[cart][$k]."'";
                 //mysql_query($sql);
                 //var_dump($sql); die();
                 
              } 
               
                             
               // echo "<br />";
                            
               
			 } 
         
   $sql="UPDATE sklad SET kol='".$kol_sklad."', product_availability='".$product_availability."' WHERE id_tov='".$_SESSION[cart][$k]."'";
   mysql_query($sql);
   
   //var_dump($sql); die();
   //echo $product_availability;
   //print_r($kol_sklad[$k]); 
   
   $sql="UPDATE tovary SET product_availability='".$product_availability."' WHERE id='".$_SESSION[cart][$k]."'";
   mysql_query($sql);
   
   }
  
 
  }

/*  ДОБАВЛЕНИЕ ОСТАТКА КОЛИЧЕСТВА ТОВАРА НА СКЛАД  */


/*

if ($_POST[order]) {	
  
   for($k=0; $k<count($_SESSION['cart']); $k++) {
     
     $sql="UPDATE sklad SET kol='".$kol_sklad[$k]."' WHERE id_tov='".$_SESSION[cart][$k]."'";
     //var_dump($sql); die();
     mysql_query($sql);  
                 
     echo 1;
   }

}

*/


?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gymland - интернет-магазин спортивного питания</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/style_slaider.css" type="text/css" media="screen"/>
    <link rel="stylesheet" type="text/css" href="css/global.css"/><!-- Новый Слайдер!-->
    <script src="js/vendor/modernizr.js"></script>
    
    <!-- Это относится к слайдеру -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
  
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
    
    <script src="../js/vendor/modernizr.js"></script>
        
   
        
    <script src="../js/jquery-1.7.1.min.js"></script>
		
		
    <script src="../js/jquery-1.4.4.min.js"></script>
	<script src="js/slides.min.jquery.js"></script>
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
	<link rel="stylesheet" href="css/global.css">
	
	
    
    <!-- Всплывающие подсказки -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/vtip.js"></script>
    <link rel="stylesheet" type="text/css" href="css/vtip.css" />
    
    
    
    <!-- Кнопка наверх -->
    <script type="text/javascript" src="js/button_vverh.js"></script>
    
    
    <!-- Стили и скрипт для кнопки "Корзина" -->
    <link rel="stylesheet" type="text/css" href="css/default.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<script src="js/modernizr.custom.js"></script>
        <script src="js/classie.js"></script>
        
        
        <script src="js/classie.js"></script>
		
        <!-- Стили и скрипт для Форм входа и регистрации -->
        
        <link href="css/style_form.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <script type="text/javascript" src="js/my_scripts.js"></script>
        
    <!-- Верхнее меню. Стили для блока доставки -->
        
        <link href="css/up_menu.css" rel="stylesheet" type="text/css" />
        
    <!-- Стили для корзины -->
    <link href="css/cart.css" rel="stylesheet" type="text/css" />
 
    
    <script type="text/javascript" src="../js/jquery.maskedinput-1.2.2.js"></script>
    <script type="text/javascript" src="../js/jquery.js"></script>
    <!-- <script src="../js/maskedinput.js"></script>-->
    

    
<script type="text/javascript">

jQuery(function($) {

$.mask.definitions['~']='[+-]';

$('#phone').mask('8 (999) 999-99-99');

});</script>
    
   <!-- <script type="text/javascript">
   jQuery(function($){
   $("#phone").mask("8 (999) 999-99-99");
   });
</script>-->
    
    
  </head>
  <body>
    
   
    
    
   
       <div class="row_center">
    
    
    
    <div class="large-12-center">
       
    
      <div class="large-8_katalog">
     
      <ul class="breadcrumbs">
      <li><a href="index.php" rel="home"> Главная </a></li>
      <li> Корзина </li>
      </ul>
      
     
      
      <h5 align="center" style="font-weight:bold;margin-top:0px;"> Моя корзина </h5>
        
        <?php

if($_POST['order']) {

  //if($_POST[delivery]=="immediately_courier" or $_POST[delivery]=="ems" and $_POST[oplata]=="bank_wire") {
  
if($_POST[delivery]=="immediately_courier" and $_POST[oplata]=="bank_wire" or $_POST[delivery]=="ems" and $_POST[oplata]=="bank_wire") {
   
  echo "<div class='cart_error'>
  
  <span style='font-weight:bold;color:#C02;'>Внимание!</span>
  
  
  <br />Выбранный вами способ оплаты <span style='font-weight:bold;'>Банковский перевод</span> невозможен для способов доставки <span style='font-weight:bold;'> Срочная курьерская доставка </span> и <span style='font-weight:bold;'>EMS Почта России</span>.
  <br />Пожалуйста выберите любой другой способ доставки.
  
  </div>";
  
  }
}

        ?>
        

<!--<div class='cart_error'>
  
  <span style='font-weight:bold;color:#C02;'>Внимание!</span>
  
  
  <br/>Выбранный вами способ оплаты <span style='font-weight:bold;'>Банковский перевод</span> невозможен для способов доставки <span style='font-weight:bold;'> Срочная курьерская доставка </span> и <span style='font-weight:bold;'> EMS Почта России </span>.
  <br/>Пожалуйста выберите любой другой способ доставки.
  
  
</div> -->
        
     
      <form method="get" id="cart" action="cart.php">
        
          
          
      <?php
//print_r($_SESSION['cart']);
//print_r($_SESSION['properties']);

$e=$_SESSION['properties'];
//echo "<br />";
//print_r($e);

for($i=0; $i<count($_SESSION['properties']); $i++)
{
   
  //unset($_SESSION[v]); 
  $e = $_GET["preference$i"];
  //$_SESSION['e'] = $_GET["preference$i"]; 
  $d[] = $e;
  //$d[]=$_SESSION['e'];
  //$_SESSION[v]=$d;
  //echo "<script>location.replace('cart.php');</script>"; 
}



for($i=0; $i<count($_SESSION['cart']); $i++)
{
  
  if(isset($_GET["preference$i"])) {
  echo "<script>location.replace('cart.php');</script>";
  }
  
}



//$_SESSION[vu]=$_SESSION[v];
//echo "<br />";
//print_r($d);
//echo "<br />";
//print_r($_SESSION[v]);
//echo "<br />";
//print_r($_SESSION[vu]);


//if (!empty($d)) {$_SESSION['properties']=$d;}
//else if(empty($d)) {$d=$_SESSION['properties'];}


/* for($i=0; $i<count($_SESSION['properties']); $i++)
{

   $sql="SELECT * FROM tovary WHERE id=".$_SESSION['cart'][$i]."";
   $rez=mysql_query($sql);
   $tovar=mysql_fetch_array($rez);
  
   $preference = explode(",", $tovar[preference]);
   foreach($preference as $vkus) {} 
  
  if ($d!==0) $_SESSION['properties']=$d;
  
  // echo "<input type='hidden' name='preference' />";
  echo "<select name='preference$i' onChange=document.getElementById('cart').submit() id='preference$i'>";

echo "<option value='".$_SESSION['properties'][$i]."' selected='selected'>".$_SESSION['properties'][$i]."</option>";

foreach($preference as $vkus)
    {	
	 	
        echo "<option value='$vkus'>$vkus</option>";
    }
echo "</select>"; 
  
} */


     if ($_SESSION['total_amount'] == 0) {
		 
		 echo "<div class='cart_without_tovary'>";
echo '<p style="font-size:18px; margin-left:25px;" > </br> В настоящей момент Ваша корзина пуста. <a href="katalog.php"> Перейти в каталог.</a>';
	echo "</div>";
	}

      else { echo "<div class='cart_with_tovary'>

       <div class='my_cart'>
       <form action='cart.php' method='get'>
      <table class='my_cart_tovary'>
      <tr>
      <td class='tovar'> Товар </td>
      <td class='name_tovarov'> Название </td>
      <td class='amount_tovarov'> Количество </td>
      <td class='taste_tovarov'> Вкус,объём или размер </td>
      <td class='price_tovarov'> Цена </td>
      <td class='action'> Действие </td>
      </tr>";
      
      
	  session_start();
                       
            
$itogo=0;
for($i=0; $i<count($_SESSION['cart']); $i++)
{
  
	$sql="SELECT * FROM tovary WHERE id=".$_SESSION['cart'][$i]."";
	$rez=mysql_query($sql);
	$tov=mysql_fetch_array($rez);
  
    $preference = explode(",", $tov[preference]);
  

/* Выгружаем доступные вкусы (свойства) товара */ 
  
$sql_sklad="SELECT * FROM sklad WHERE id_tov=".$_SESSION['cart'][$i]."";
$rez_sklad=mysql_query($sql_sklad);  
$sklad=mysql_fetch_array($rez_sklad);
  
$preference_sklad = explode(",", $sklad['preference']);  
$kol_sklad = explode(",", $sklad['kol']);   

 for($k=0; $k<count($preference_sklad); $k++) {
      
    if ($kol_sklad[$k]==0) {
    unset($preference_sklad[$k]);
    }
      
     }   
  
  //print_r($d); 
  
  //if ($d!=="") $_SESSION['properties']=$d;
  // $p = $_GET["preference$i"]; 
  
  //if ($_SESSION['properties']!==0)
  // { 
    
  // $_SESSION['properties'][] = $p;
    
  //  }  
  //$bonus=ceil($bonus);
  
$_GET['x$i'] = trim($_GET['x$i']);                     // Обрезаем пробелы и спецсиволы
$_GET['x$i'] = strip_tags($_GET['x$i']);               // Удаляем HTML и PHP теги
$_GET['x$i'] = mysql_real_escape_string($_GET['x$i']); // Экранируем специальные символы  
$_GET['x$i'] = ceil($_GET['x$i']); // Округляем в большую сторону
$_SESSION['amount'][$i]	= ceil($_SESSION['amount'][$i]);
  
  //$preference = explode(",", $tov[preference]);
  //foreach($preference as $tov[preference]) {}
	
     echo "<tr>";
  echo "<td class='photo_tovarov'><img src='../photos/$tov[photo]' width='60' height='80'></a></td>";
  echo "<td class='name_tovarov_content'><a href='../products/$tov[manuf]-$tov[nazv]-$tov[mass].php'>$tov[nazv], $tov[mass] $tov[unit].</a></td>";
      echo "<td class='amount_tovarov_content'><input type='text' size='1' value='".$_SESSION['amount'][$i]."' name='x$i' maxlength='10'></input></td>";
      echo "<td class='taste_tovarov_content'>"; 
	  
  
  //echo $_SESSION['properties'][$i];


  //foreach($preference as $vkus) {} 
  
  // echo "<input type='hidden' name='preference' />";
  
  if (!empty($e)) {
    
    $_SESSION['properties']=$d; 
    
   echo "<select name='preference$i' onChange=document.getElementById('cart').submit() id='preference$i'>";
    
   echo "<option value='".$d[$i]."' selected='selected'>".$d[$i]."</option>"; 
    
   foreach($preference as $vkus)
  {	
	 	
      echo "<option value='$vkus'>$vkus</option>";
  }
  echo "</select>";   
    
  }
  
  
  
  else if (empty($e)) {
    
  echo "<select name='preference$i' onChange=document.getElementById('cart').submit() id='preference$i'>";  

  echo "<option value='".$_SESSION['properties'][$i]."' selected='selected'>".$_SESSION['properties'][$i]."</option>";
  

    /*
    
  foreach($preference as $vkus)
  {	
	 	
      echo "<option value='$vkus'>$vkus</option>";
  }
  echo "</select>";  
  
    */
    
   foreach($preference_sklad as $preference_tov[preference])
    {
        echo "<option value='$preference_tov[preference]'>$preference_tov[preference]</option>";
    } 
  
  }  
  
    echo "</td>";
	if ($tov[cena_sale]==0){
      
      if($_SESSION[id_users]) {
      
      echo "<td class='price_tovarov_content'> <span class='cena'> ".$_SESSION['prices'][$i]." руб.</span><br><span class='bonus_price_tovar' > + ".$_SESSION['point'][$i]." бонусов </span> </td>";
        
      } else {
      
      echo "<td class='price_tovarov_content'> <span class='cena'> ".$_SESSION['prices'][$i]." руб.</span> </td>";
      }
        
        
        
	} else {
      
      if($_SESSION[id_users]) {
        
      echo "<td class='price_tovarov_content'> <span class='cena_sale'> ".$_SESSION['prices'][$i]." руб.</span> <br> <span class='cena_old'> $tov[cena] руб.</span> <br><span class='bonus_price_tovar' > + ".$_SESSION['point'][$i]." бонусов </span> </td>";
        
      } else {
      
      echo "<td class='price_tovarov_content'> <span class='cena_sale'> ".$_SESSION['prices'][$i]." руб.</span> <br> <span class='cena_old'> $tov[cena] руб.</span> </td>";
      
      }  
        
        
		}
      echo "<td class='deleate'><a href='?del_cart=$i' title='Удалить товар из корзины'> Удалить </a></td>";
	  
	  
      echo "</tr>";
      
  
	  }

        
 
            
            //!!!!!!!!!!!!!!!!!!!!!!!!!!print_r($_SESSION['cart']);

	  
     ?>
        
     <?php 
            
         
        
        if($_SESSION[id_users])
	{
           
	$sql="SELECT * FROM users WHERE id_users='$_SESSION[id_users]'";
	$rez=mysql_query($sql);
	$user=mysql_fetch_array($rez);
               
     $_SESSION['user_bonus'] = $user['bonus'];
       
           if($user['bonus'] !== '0' AND $_SESSION['bonus_payment_user'] == 0) {
        
               
             //if($_SESSION['bonus_payment_user'] = 0) {   
        
    echo "<tr>
    
      <td class='itogo' colspan='2' style='font-size:14px;'> Оплатить бонусами: </td> 
      <td class='clear_cart'><input type='text' size='1' value='' name='bonus_payment_user' maxlength='10' style='margin: 5px 0px 5px 10px;
    width: 100px; font-size: 14px; text-align: center; font-weight: bold;'></td>
      <td class='clear_cart' style='font-size: 14px; font-weight: bold;'>Бонусный счёт:</td>
      <td class='clear_cart' colspan='2' style='font-size: 14px; font-weight: bold;'>  $user[bonus] бонусов </td>  
      
     </tr>";
            
      echo "<tr>
      <td class='itogo'> Итого: </td>
      <td class='itogo_cena'>$_SESSION[total_price] руб. <br> <span class='bonus_price_tovar'> + $_SESSION[total_bonus] бонусов </span> </td> 
      <td class='clear_cart'><input type='submit' class='pereschet_btn' name='pereschet' value='Пересчитать'></td>
      <td class='clear_cart'><a href='?clear_cart=ok' title='Очистить корзину'> Очистить корзину </a></td>
      
      </tr>";
       
             }
                
             else if($_SESSION['bonus_payment_user'] > 0 AND $_SESSION['bonus_payment_user'] <= $user['bonus']) {
                 
                
                    $_SESSION['user_bonus_after'] = $user['bonus'] - $_SESSION['bonus_payment_user'];
                    $_SESSION['user_bonus_cart']=$_SESSION['user_bonus_after']+$_SESSION['total_bonus'];
                      
               //  $_SESSION['total_price']-=$_SESSION['bonus_payment_user'];
               //$_SESSION['total_price']-=$_SESSION['user_bonus_after'];
                
          echo "<tr>
    
      <td class='itogo' colspan='2' style='font-size:14px;'> Оплатить бонусами: </td> 
      <td class='clear_cart'><input type='text' size='1' value='$_SESSION[bonus_payment_user]' name='bonus_payment_user' maxlength='10' style='margin: 5px 0px 5px 10px;width: 100px; font-size: 14px; text-align: center; font-weight: bold;'></td>
      <td class='clear_cart' style='font-size: 14px; font-weight: bold;'>Бонусный счёт:</td>
      <td class='clear_cart' colspan='2' style='font-size: 14px; font-weight: bold;'> 
      <span style=''> $_SESSION[user_bonus_after] бонусов </span> <br> 
      <span style='font-size:12px;color:#C03;'> -$_SESSION[bonus_payment_user] бонусов </span>
      </td>  
      
     </tr>";
                
      echo "<tr>
      <td class='itogo'> Итого: </td>
      <td class='itogo_cena'>$_SESSION[total_price] руб. <br> <span class='bonus_price_tovar'> + $_SESSION[total_bonus] бонусов </span> </td> 
      <td class='clear_cart'><input type='submit' class='pereschet_btn' name='pereschet' value='Пересчитать'></td>
      <td class='clear_cart'><a href='?clear_cart=ok' title='Очистить корзину'> Очистить корзину </a></td>
      <td class='clear_cart' colspan='2'><a href='?clear_bonus=ok' title='Вернуть бонусы'> Вернуть бонусы </a></td>
      
     </tr>";          
                    
              } else if ($_SESSION['bonus_payment_user'] > 0 AND $_SESSION['bonus_payment_user'] > $user['bonus']) {
               
              
      echo "<tr>
    
      <td class='itogo' colspan='2' style='font-size:14px;'> Оплатить бонусами: </td> 
      <td class='clear_cart'><input type='text' size='1' value='' name='bonus_payment_user' maxlength='10' style='margin: 5px 0px 5px 10px;
    width: 100px; font-size: 14px; text-align: center; font-weight: bold;'></td>
      <td class='clear_cart' style='font-size: 14px; font-weight: bold;'>Бонусный счёт:</td>
      <td class='clear_cart' colspan='2' style='font-size: 14px; font-weight: bold;'>  $user[bonus] бонусов </td>  
      
     </tr>"; 
                
     echo "<tr>
      <td class='itogo'> Итого: </td>
      <td class='itogo_cena'>$_SESSION[total_price] руб. <br> <span class='bonus_price_tovar'> + $_SESSION[total_bonus] бонусов </span> </td> 
      <td class='clear_cart'><input type='submit' class='pereschet_btn' name='pereschet' value='Пересчитать'></td>
      <td class='clear_cart'><a href='?clear_cart=ok' title='Очистить корзину'> Очистить корзину </a></td>
      <td class='clear_cart' colspan='2' style='font-weight: bold; color: #C02;'>У вас нет столько бонусов!</td>
      </tr>";
                
               //$_SESSION['bonus_payment_user']=0;
               $_SESSION['total_price']+=0;
                
                // echo "<div style='float:left; border:1px solid; color:#C03;'>
        
                // У вас нет столько бонусов!
        
                // </div>";         
                         
              } else if($_SESSION['bonus_payment_user'] == 0) {
                
        $_SESSION['user_bonus_after'] = $user['bonus'];        
        
      echo "<tr>
      <td class='itogo'> Итого: </td>
      <td class='itogo_cena'>$_SESSION[total_price] руб. <br> <span class='bonus_price_tovar'> + $_SESSION[total_bonus] бонусов </span> </td> 
      <td class='clear_cart'><input type='submit' class='pereschet_btn' name='pereschet' value='Пересчитать'></td>
      <td class='clear_cart'><a href='?clear_cart=ok' title='Очистить корзину'> Очистить корзину </a></td>
      
      </tr>";
       
      }
        
          //} 
          
        } else if (!$_SESSION[id_users]) {
        
      echo "<tr>
      <td class='itogo'> Итого: </td>
      <td class='itogo_cena'>$_SESSION[total_price] руб. </td> 
      <td class='clear_cart'><input type='submit' class='pereschet_btn' name='pereschet' value='Пересчитать'></td>
      <td class='clear_cart'><a href='?clear_cart=ok' title='Очистить корзину'> Очистить корзину </a></td>
      
     </tr>";
          
        }
  
           
           
            
     ?>  
        
   
        
        
     </table>
     </form>
      
      </div>
    
  <?php
            
            
  

/* Очистить корзину */  
     if($_GET[clear_cart])
{
	$_SESSION['cart'] = array();
	$_SESSION['amount'] = array();
	$_SESSION['prices'] = array();
	$_SESSION['result_prices'] = array();
    $_SESSION['properties'] = array();
    $_SESSION['zakaz_category']= array();
    $_SESSION['zakaz_items']= array();	 
    $_SESSION['zakaz_nazv']= array();
    $_SESSION['zakaz_manuf']= array();
    $_SESSION['zakaz_unit']= array();
    $_SESSION['zakaz_mass']= array();
    $_SESSION['zakaz_photo']= array();
    $_SESSION['point']= array();
    $_SESSION['release']= array();
	$_SESSION['total_amount'] = 0;
    $_SESSION['total_price'] = 0;
    $_SESSION['total_bonus'] = 0;
    $_SESSION['bonus_payment_user'] = 0;
	echo "<script>location.replace('../index.php');</script>";
}

/* Пересчитать */ 
            /* if($_GET[pereschet])
{
	for($i=0; $i<count($_SESSION['cart']); $i++)
	{
		$_SESSION['amount'][$i]=ceil($_GET["x$i"]);
	}
 
  // $_SESSION['bonus_payment_user']=$_GET['bonus_payment_user'];
 
  $_SESSION['total_price']-=$_SESSION['bonus_payment_user'];
  

  
	echo "<script>location.replace('cart.php');</script>";
}   */

/* Удалить товар из корзины */    
if(isset($_GET[del_cart]))
{
	for($i=0; $i<count($_SESSION['cart']); $i++)
	{
		if($i!=$_GET[del_cart])
		{
			$mas1[]=$_SESSION['cart'][$i];
			$mas2[]=$_SESSION['amount'][$i];
			$mas3[]=$_SESSION['prices'][$i];
			$mas4[]=$_SESSION['prices'][$i] * $_SESSION['amount'][$i];
			$mas5[]=$_SESSION['properties'][$i];
            $mas6[]=$_SESSION['zakaz_category'][$i];
            $mas7[]=$_SESSION['zakaz_nazv'][$i];
            $mas8[]=$_SESSION['zakaz_manuf'][$i];
            $mas9[]=$_SESSION['zakaz_items'][$i];
            $mas10[]=$_SESSION['zakaz_unit'][$i];
            $mas11[]=$_SESSION['zakaz_mass'][$i];
            $mas12[]=$_SESSION['zakaz_photo'][$i];
            $mas13[]=$_SESSION['point'][$i];
            $mas14[]=$_SESSION['release'][$i];
		}
	}
	$_SESSION['cart']=$mas1;
	$_SESSION['amount']=$mas2;
	$_SESSION['prices']=$mas3;
	$_SESSION['result_prices']=$mas4;
	$_SESSION['properties']=$mas5;
    $_SESSION['zakaz_category']=$mas6;
    $_SESSION['zakaz_nazv']=$mas7;
    $_SESSION['zakaz_manuf']=$mas8;
    $_SESSION['zakaz_items']=$mas9;
    $_SESSION['zakaz_unit']=$mas10;
    $_SESSION['zakaz_mass']=$mas11;
    $_SESSION['zakaz_photo']=$mas12;
    $_SESSION['point']=$mas13;
    $_SESSION['release']=$mas14;
  
  $_SESSION['total_price']-=$_SESSION['bonus_payment_user'];
  //$d=$_SESSION['properties'];
  
	echo "<script>location.replace(cart.html);</script>";
}  
  
            
/* Вернуть бонусы */  
 if($_GET[clear_bonus]) 
    {   
     $_SESSION['bonus_payment_user'] = 0;
     echo "<script>location.replace('cart.php');</script>";     
    } 
 
        
            
            
if (isset($_GET['preference$i'])) {$preference_zakaz = $_GET['preference$i']; if ($preference_zakaz == '') {unset($preference_zakaz);}}	 

            $_SESSION['total_amount']=0;
            $_SESSION['total_price']=0;
            $_SESSION['total_bonus']=0;
            
foreach($_SESSION['amount'] as $_SESSION['kolvo']) {
$_SESSION['total_amount']+=$_SESSION['kolvo'];
}

for($i = 0; $i < sizeof($_SESSION['prices']); $i++)
{
    $_SESSION['result_prices'][$i] = $_SESSION['prices'][$i] * $_SESSION['amount'][$i];
}  
  
foreach($_SESSION['result_prices'] as $_SESSION['stoim']) {
   $_SESSION['total_price']+=$_SESSION['stoim'];

}
 
        
            //if ($_SESSION[id_users]) {            
            
for($i = 0; $i < sizeof($_SESSION['prices']); $i++)
{
  $_SESSION['point'][$i] = ceil($_SESSION['prices'][$i] * 2 / 100) * $_SESSION['amount'][$i];
}  
  
foreach($_SESSION['point'] as $_SESSION['bonus']) {
   $_SESSION['total_bonus']+=$_SESSION['bonus'];
}
   
            //} else if (!$_SESSION[id_users]) {
                 
            //$_SESSION['total_bonus']=0;
            
            //} 
            
            //print_r($_SESSION['total_bonus']);      

            //$_SESSION['bonuses']=$_SESSION['user_bonus']-$_SESSION['bonus_payment_user']+$_SESSION['bonus'];
            
            //print_r($_SESSION['user_bonus_cart']);
            
            //echo $_SESSION['bonus_payment_user'];

            //print_r($_SESSION['zakaz_category']);	 
            //print_r($_SESSION['zakaz_nazv']);
            //print_r($_SESSION['zakaz_manuf']);
            //print_r($_SESSION['zakaz_unit']);
            //print_r($_SESSION['zakaz_mass']);
            //print_r($_SESSION['amount']);
            //print_r($_SESSION['zakaz_photo']);
            
$cost = implode(",", $_SESSION['prices']);             
$quantity = implode(",", $_SESSION['amount']);
$nazv=implode(",", $_SESSION['zakaz_nazv']);
$manuf=implode(",", $_SESSION['zakaz_manuf']);
$category=implode(",", $_SESSION['zakaz_category']);
$preference=implode(",", $_SESSION['properties']);
$unit=implode(",", $_SESSION['zakaz_unit']);
$mass=implode(",", $_SESSION['zakaz_mass']);
$photo=implode(",", $_SESSION['zakaz_photo']);            
$id_cart=implode(",", $_SESSION['cart']);
$release_form=implode(",", $_SESSION['release']);
            
            //echo $quantity; 
            
            
            
if($_SESSION[id_users])
	{
	$sql="SELECT * FROM users WHERE id_users='$_SESSION[id_users]'";
	$rez=mysql_query($sql);
	$user=mysql_fetch_array($rez);
               
     
         if($_SESSION['bonus_payment_user'] > $user['bonus']) {
           
           // $_SESSION['bonus_payment_user']=0; 
            $_SESSION['total_price']+=0;
           
         } else {
         $_SESSION['total_price']-=$_SESSION['bonus_payment_user'];
         }
    }             
            
            
            
  ?> 
  
         
         
  
 <form method="post" class="delivery_method" id="delivery" action="">
     
<div class="delivery">

<script>
var show;
function hidetxt(type){
    param=document.getElementById(type);
    if(param.style.display == "none"){
        if(show) show.style.display = "none";
        param.style.display = "block";
        show = param;
    }else param.style.display = "none";
	
}
</script>


<h6 style="font-weight:bold;margin-top:0px; margin-left:30px;"> Способы доставки: </h6>


 <!--<form method="post" action="" class="delivery_method" id="delivery">-->

 <input type='radio' name="delivery" value='courier' style="cursor:pointer;" onClick='Go()' id="1"/>&nbsp;&nbsp;Курьерская доставка по Санкт-Петербургу
<div style="display:none;" class="courier" id='courier'> 

<span class="payment_delivery_courier">Стоимость доставки: 250 руб., без предоплаты. <br>При заказе товара от 5 000 руб., доставка товара осуществляется бесплатно. </span>
<br><span class="payment_delivery_courier_title">Заказы доставляются курьерской службой. Перед доставкой с вами свяжется сотрудник службы логистики.</span>
<br><select name="delivery_city_district_courier">

<option value="Выберите район города"> Выберите район города </option>
<option value="Адмиралтейский р-он"> Адмиралтейский </option>
<option value="Василеостровский р-он"> Василеостровский </option>
<option value="Выборгский р-он"> Выборгский </option>
<option value="Калининский р-он"> Калининский </option>
<option value="Кировский р-он"> Кировский </option>
<option value="Красногвардейский р-он"> Красногвардейский </option>
<option value="Красносельский р-он"> Красносельский </option>
<option value="Московский р-он"> Московский </option>
<option value="Невский р-он"> Невский </option>
<option value="Петроградский р-он"> Петроградский </option>
<option value="Приморский р-он"> Приморский </option>
<option value="Фрунзенский р-он"> Фрунзенский </option>
<option value="Центральный р-он"> Центральный </option>

</select>
</div>

  <br><input type='radio' name="delivery" value='immediately_courier' style="cursor:pointer;" onClick='Go()' />&nbsp;&nbsp;Срочная курьерская доставка по Санкт-Петербургу
<div style="display:none;" class="immediately_courier" id='immediately_courier'>

<span class="payment_delivery_courier">Стоимость доставки: 400 руб., без предоплаты.  </span>
<br><span class="payment_delivery_courier_title">Заказы доставляются курьерской службой. Перед доставкой с вами свяжется сотрудник службы логистики.</span>
<br> 
<select name="delivery_city_district_immediately_courier">

<option value="Выберите район города"> Выберите район города </option>
<option value="Адмиралтейский р-он"> Адмиралтейский </option>
<option value="Василеостровский р-он"> Василеостровский </option>
<option value="Выборгский р-он"> Выборгский </option>
<option value="Калининский р-он"> Калининский </option>
<option value="Кировский р-он"> Кировский </option>
<option value="Красногвардейский р-он"> Красногвардейский </option>
<option value="Красносельский р-он"> Красносельский </option>
<option value="Московский р-он"> Московский </option>
<option value="Невский р-он"> Невский </option>
<option value="Петроградский р-он"> Петроградский </option>
<option value="Приморский р-он"> Приморский </option>
<option value="Фрунзенский р-он"> Фрунзенский </option>
<option value="Центральный р-он"> Центральный </option>

</select>
</div>

<br><input type='radio' name="delivery" value='area' style="cursor:pointer;" onClick='Go()' />&nbsp;&nbsp;Доставка по Ленинградской области и пригородам Санкт-Петербурга
<div style="display:none;" class="area" id='area'> 

<span class="payment_delivery_courier">Cтоимость доставки в зависимости от населенного пункта.</span>
<br><span class="payment_delivery_courier_title">Заказы доставляются курьерской службой. Сотрудник службы логистики согласует с вами удобное время и дату доставки. <br><br>Пожелания по времени и дате доставки Вы можете оставить в комментариях к заказу ниже на форме <b>"Персональные данные"</b></span>
<br> 

<select name="delivery_city_suburb">

<option value="Выберите населённый пункт"> Выберите населённый пункт </option>
<option value="Всеволожск"> Всеволожск </option>
<option value="Вырица"> Вырица </option>
<option value="Гатчина"> Гатчина </option>
<option value="Горелово"> Горелово </option>
<option value="Зеленогорск"> Зеленогорск </option>
<option value="Кировск"> Кировск </option>
<option value="Колпино"> Колпино </option>
<option value="Коммунар"> Коммунар </option>
<option value="Красное село"> Красное село </option>
<option value="Кронштадт"> Кронштадт </option>
<option value="Ломоносов"> Ломоносов </option>
<option value="Малые колпаны"> Малые колпаны </option>
<option value="Никольское"> Никольское </option>
<option value="Отрадное"> Отрадное </option>
<option value="Новое девяткино"> Новое девяткино </option>
<option value="Павловск"> Павловск </option>
<option value="Петергоф"> Петергоф </option>
<option value="Пушкин"> Пушкин </option>
<option value="Рощино"> Рощино </option>
<option value="Сертолово"> Сертолово </option>
<option value="Сестрорецк"> Сестрорецк </option>
<option value="Стрельна"> Стрельна </option>
<option value="Сосновый бор"> Сосновый бор </option>
<option value="Тосно"> Тосно </option>
<option value="Шушары"> Шушары </option>



</select>


</div>



<br><input type='radio' name="delivery" value='pickup' style="cursor:pointer;" onClick='Go()' />&nbsp;&nbsp;Самовывоз товара из пунктов выдачи  
<div style="display:none;" class="pickup" id='pickup'> 

<span class="payment_delivery_courier">Стоимость доставки: бесплатно., без предоплаты.
<br><span class="payment_delivery_courier_title">Вы можете забрать свой заказ самостоятельно из выбранного Вами пункта. Возможна оплата наличными при получении.</span>
<br>
<select name="delivery_city_outlets">

<option value="Выберите пункт выдачи"> Выберите пункт выдачи </option>
<option value="Северный пр., д.8, корп.1"> Северный пр., д.8, корп.1 </option>
<option value="Дыбенко ул., д.17"> Дыбенко ул., д.17 </option>
<option value="Шлиссельбургский пр., д.5"> Шлиссельбургский пр., д.5 </option>
<option value="Невский пр., д.56"> Невский пр., д.56 </option>
<option value="Луначарского пр, д.17, корп.3"> Луначарского пр, д.17, корп.3 </option>
<option value="Космонавтов пр, д.23"> Космонавтов пр, д.23 </option>
<option value="Московский пр, д.17, корп.1"> Московский пр, д.17, корп.1 </option>
<option value="Савушкина ул, д.10"> Савушкина ул, д.10 </option>
<option value="Маршала Казакова пр, д.88"> Маршала Казакова пр, д.88 </option>


</select>
</div>


<br><input type='radio' name="delivery" value='ems' style="cursor:pointer;" onClick='Go()' />&nbsp; EMS Почта России  
<div style="display:none;" class="ems" id='ems'>

<span class="payment_delivery_courier">Стоимость доставки отобразится ниже, в зависимости от веса посылки и выборе региона доставки. <br>Срок доставки: 3-7 дней в зависимости от региона. </span>
<br><span class="payment_delivery_courier_title">Оплаченный заказ передается курьеру на следующий день. <br><b>Доставка осуществляется только по предварительной оплате!</b></span>
<br>
 
<select name="ems">

	<option value="">Выберите город или регион</option>
	<optgroup label="Города">
			<option value="city_abakan">Абакан</option>
			<option value="city_vanadyr">Анадырь</option>
			<option value="city_anapa">Анапа</option>
			<option value="city_arhangelsk">Архангельск</option>
			<option value="city_astrahan">Астрахань</option>
			<option value="city_barnaul">Барнаул</option>
			<option value="city_belgorod">Белгород</option>
			<option value="city_birobidzhan">Биробиджан</option>
			<option value="city_blagoveshhensk">Благовещенск</option>
			<option value="city_brjansk">Брянск</option>
			<option value="city_velikij-novgorod">Великий Новгород</option>
			<option value="city_vladivostok">Владивосток</option>
			<option value="city_vladikavkaz">Владикавказ</option>
			<option value="city_vladimir">Владимир</option>
			<option value="city_volgograd">Волгоград</option>
			<option value="city_vologda">Вологда</option>
			<option value="city_vorkuta">Воркута</option>
			<option value="city_voronezh">Воронеж</option>
			<option value="city_gorno-altajsk">Горно-Алтайск</option>
			<option value="city_groznyj">Грозный</option>
			<option value="city_dudinka">Дудинка</option>
			<option value="city_ekaterinburg">Екатеринбург</option>
			<option value="city_elizovo">Елизово</option>
			<option value="city_ivanovo">Иваново</option>
			<option value="city_izhevsk">Ижевск</option>
			<option value="city_irkutsk">Иркутск</option>
			<option value="city_ioshkar-ola">Йошкар-Ола</option>
			<option value="city_kazan">Казань</option>
			<option value="city_kaliningrad">Калининград</option>
			<option value="city_kaluga">Калуга</option>
			<option value="city_kemerovo">Кемерово</option>
			<option value="city_kirov">Киров</option>
			<option value="city_kostomuksha">Костомукша</option>
			<option value="city_kostroma">Кострома</option>
			<option value="city_krasnodar">Краснодар</option>
			<option value="city_krasnojarsk">Красноярск</option>
			<option value="city_kurgan">Курган</option>
			<option value="city_kursk">Курск</option>
			<option value="city_kyzyl">Кызыл</option>
			<option value="city_lipeck">Липецк</option>
			<option value="city_magadan">Магадан</option>
			<option value="city_magnitogorsk">Магнитогорск</option>
			<option value="city_majkop">Майкоп</option>
			<option value="city_mahachkala">Махачкала</option>
			<option value="city_mineralnye-vody">Минеральные Воды</option>
			<option value="city_mirnyj">Мирный</option>
			<option value="city_moskva">Москва</option>
			<option value="city_murmansk">Мурманск</option>
			<option value="city_mytishhi">Мытищи</option>
			<option value="city_naberezhnye-chelny">Набережные Челны</option>
			<option value="city_nadym">Надым</option>
			<option value="city_nazran">Назрань</option>
			<option value="city_nalchik">Нальчик</option>
			<option value="city_narjan-mar">Нарьян-Мар</option>
			<option value="city_nerjungri">Нерюнгри</option>
			<option value="city_neftejugansk">Нефтеюганск</option>
			<option value="city_nizhnevartovsk">Нижневартовск</option>
			<option value="city_nizhnij-novgorod">Нижний Новгород</option>
			<option value="city_novokuzneck">Новокузнецк</option>
			<option value="city_novorossijsk">Новороссийск</option>
			<option value="city_novosibirsk">Новосибирск</option>
			<option value="city_novyj-urengoj">Новый Уренгой</option>
			<option value="city_norilsk">Норильск</option>
			<option value="city_nojabrsk">Ноябрьск</option>
			<option value="city--omsk">Омск</option>
			<option value="city_orel">Орел</option>
			<option value="city_orenburg">Оренбург</option>
			<option value="city_penza">Пенза</option>
			<option value="city_perm">Пермь</option>
			<option value="city_petrozavodsk">Петрозаводск</option>
			<option value="city_petropavlovsk-kamchatskij">Петропавловск-Камчатский</option>
			<option value="city_pskov">Псков</option>
			<option value="city_rostov-na-donu">Ростов-на-Дону</option>
			<option value="city_rjazan">Рязань</option>
			<option value="city_salehard">Салехард</option>
			<option value="city_samara">Самара</option>
			<option value="city_sankt-peterburg" selected="">Санкт-Петербург</option>
			<option value="city_saransk">Саранск</option>
			<option value="city_saratov">Саратов</option>
			<option value="city_smolensk">Смоленск</option>
			<option value="city_sochi">Сочи</option>
			<option value="city_stavropol">Ставрополь</option>
			<option value="city_strezhevoj">Стрежевой</option>
			<option value="city_surgut">Сургут</option>
			<option value="city_syktyvkar">Сыктывкар</option>
			<option value="city_tambov">Тамбов</option>
			<option value="city_tver">Тверь</option>
			<option value="city_toljatti">Тольятти</option>
			<option value="city_tomsk">Томск</option>
			<option value="city_tula">Тула</option>
			<option value="city_tynda">Тында</option>
			<option value="city_tjumen">Тюмень</option>
			<option value="city_ulan-udje">Улан-Удэ</option>
			<option value="city_uljanovsk">Ульяновск</option>
			<option value="city_usinsk">Усинск</option>
			<option value="city_ufa">Уфа</option>
			<option value="city_uhta">Ухта</option>
			<option value="city_khabarovsk">Хабаровск</option>
			<option value="city_khanty-mansijsk">Ханты-Мансийск</option>
			<option value="city_kholmsk">Холмск</option>
			<option value="city_cheboksary">Чебоксары</option>
			<option value="city_cheljabinsk">Челябинск</option>
			<option value="city_cherepovec">Череповец</option>
			<option value="city_cherkessk">Черкесск</option>
			<option value="city_chita">Чита</option>
			<option value="city_elista">Элиста</option>
			<option value="city_yuzhno-sahalinsk">Южно-Сахалинск</option>
			<option value="city_yakutsk">Якутск</option>
			<option value="city_yaroslavl">Ярославль</option>
			</optgroup>
	<optgroup label="Регионы">
		<option value="region_altajskij-kraj">Алтайский край</option>
			<option value="region_amurskaja-oblast">Амурская область</option>
			<option value="region_arhangelskaja-oblast">Архангельская область</option>
			<option value="region_astrahanskaja-oblast">Астраханская область</option>
			<option value="region_belgorodskaja-oblast">Белгородская область</option>
			<option value="region_brjanskaja-oblast">Брянская область</option>
			<option value="region_vladimirskaja-oblast">Владимирская область</option>
			<option value="region_volgogradskaja-oblast">Волгоградская область</option>
			<option value="region_vologodskaja-oblast">Вологодская область</option>
			<option value="region_voronezhskaja-oblast">Воронежская область</option>
			<option value="region_evrejskaja-ao">Еврейская АО</option>
			<option value="region_zabajkalskij-kraj">Забайкальский край</option>
			<option value="region_ivanovskaja-oblast">Ивановская область</option>
			<option value="region_irkutskaja-oblast">Иркутская область</option>
			<option value="region_kabardino-balkarskaja-respublika">Кабардино-Балкарская Республика</option>
			<option value="region_kaliningradskaja-oblast">Калининградская область</option>
			<option value="region_kaluzhskaja-oblast">Калужская область</option>
			<option value="region_kamchatskij-kraj">Камчатский край</option>
			<option value="region_karachaevo-cherkesskaja-respublika">Карачаево-Черкесская Республика</option>
			<option value="region_kemerovskaja-oblast">Кемеровская область</option>
			<option value="region_kirovskaja-oblast">Кировская область</option>
			<option value="region_kostromskaja-oblast">Костромская область</option>
			<option value="region_krasnodarskij-kraj">Краснодарский край</option>
			<option value="region_krasnojarskij-kraj">Красноярский край</option>
			<option value="region_kurganskaja-oblast">Курганская область</option>
			<option value="region_kurskaja-oblast">Курская область</option>
			<option value="region_leningradskaja-oblast">Ленинградская область</option>
			<option value="region_lipeckaja-oblast">Липецкая область</option>
			<option value="region_magadanskaja-oblast">Магаданская область</option>
			<option value="region_moskovskaja-oblast">Московская область</option>
			<option value="region_murmanskaja-oblast">Мурманская область</option>
			<option value="region_neneckij-ao">Ненецкий АО</option>
			<option value="region_nizhegorodskaja-oblast">Нижегородская область</option>
			<option value="region_novgorodskaja-oblast">Новгородская область</option>
			<option value="region_novosibirskaja-oblast">Новосибирская область</option>
			<option value="region_omskaja-oblast">Омская область</option>
			<option value="region_orenburgskaja-oblast">Оренбургская область</option>
			<option value="region_orlovskaja-oblast">Орловская область</option>
			<option value="region_penzenskaja-oblast">Пензенская область</option>
			<option value="region_permskij-kraj">Пермский край</option>
			<option value="region_primorskij-kraj">Приморский край</option>
			<option value="region_pskovskaja-oblast">Псковская область</option>
			<option value="region_respublika-adygeja">Республика Адыгея</option>
			<option value="region_respublika-altaj">Республика Алтай</option>
			<option value="region_respublika-bashkortostan">Республика Башкортостан</option>
			<option value="region_respublika-burjatija">Республика Бурятия</option>
			<option value="region_respublika-dagestan">Республика Дагестан</option>
			<option value="region_respublika-ingushetija">Республика Ингушетия</option>
			<option value="region_respublika-kalmykija">Республика Калмыкия</option>
			<option value="region_respublika-karelija">Республика Карелия</option>
			<option value="region_respublika-komi">Республика Коми</option>
			<option value="region_respublika-marij-el">Республика Марий Эл</option>
			<option value="region_respublika-mordovija">Республика Мордовия</option>
			<option value="region_respublika-saha-yakutija">Республика Саха (Якутия)</option>
			<option value="region_respublika-sev.osetija-alanija">Республика Сев.Осетия-Алания</option>
			<option value="region_respublika-tatarstan">Республика Татарстан</option>
			<option value="region_respublika-tyva">Республика Тыва</option>
			<option value="region_respublika-khakasija">Республика Хакасия</option>
			<option value="region_rostovskaja-oblast">Ростовская область</option>
			<option value="region_rjazanskaja-oblast">Рязанская область</option>
			<option value="region_samarskaja-oblast">Самарская область</option>
			<option value="region_saratovskaja-oblast">Саратовская область</option>
			<option value="region_sahalinskaja-oblast">Сахалинская область</option>
			<option value="region_sverdlovskaja-oblast">Свердловская область</option>
			<option value="region_smolenskaja-oblast">Смоленская область</option>
			<option value="region_stavropolskij-kraj">Ставропольский край</option>
			<option value="region_tajmyrskij-ao">Таймырский АО</option>
			<option value="region_tambovskaja-oblast">Тамбовская область</option>
			<option value="region_tverskaja-oblast">Тверская область</option>
			<option value="region_tomskaja-oblast">Томская область</option>
			<option value="region_tulskaja-oblast">Тульская область</option>
			<option value="region_tjumenskaja-oblast">Тюменская область</option>
			<option value="region_udmurtskaja-respublika">Удмуртская Республика</option>
			<option value="region_uljanovskaja-oblast">Ульяновская область</option>
			<option value="region_khabarovskij-kraj">Хабаровский край</option>
			<option value="region_khanty-mansijskij-ao">Ханты-Мансийский АО</option>
			<option value="region_cheljabinskaja-oblast">Челябинская область</option>
			<option value="region_chechenskaja-respublika">Чеченская республика</option>
			<option value="region_chuvashskaja-respublika">Чувашская Республика</option>
			<option value="region_chukotskij-ao">Чукотский АО</option>
			<option value="region_yamalo-neneckij-ao">Ямало-Ненецкий АО</option>
			<option value="region_yaroslavskaja-oblast">Ярославская область</option>
		</optgroup>



</select>



</div>

    
<script>
//нужно задать переменные
var radio1 = document.getElementById('courier');
var radio2 = document.getElementById('immediately_courier');
var radio3 = document.getElementById('area');
var radio4 = document.getElementById('pickup');
var radio5 = document.getElementById('ems');

function display (radio) {
radio.style.display=(radio.previousElementSibling.checked)? 'block': 'none'}

function Go() {
display (radio1);
display (radio2);
display (radio3);
display (radio4);
display (radio5);
}
</script>      
    
          



     
</div>
       



<div class="payment">
<h6 style="font-weight:bold;margin-top:0px; margin-left:30px;"> Способы оплаты: </h6>


<input type='radio' name="oplata" value='nal' style="cursor:pointer;" onClick='Oplata()' />&nbsp;&nbsp;Наличными курьеру 

<!--<div class="delivery_info"> Оплата при получении заказа  </div>-->
<div class="oplata_nal" id='nal' style="display:none">

<span class="payment_delivery_courier">Оплата при получении заказа. </span>


<ul class="sposoby_nal">

<li> Для заказов с доставкой по Санкт-Петербургу </li>
<li> Для самовывозов из пункта выдачи </li>

</ul>
</div>


<br><input type='radio' name="oplata" value='wire' style="cursor:pointer;" onClick='Oplata()' />&nbsp;&nbsp;Безналичный расчёт
<!--<div class="delivery_info"> Оплата на сайте <b>без комиссии</b>.</div>-->
<div class="oplata_wire" id='wire' style="display:none">

<span class="payment_delivery_courier"> Мнгновенная оплата на сайте без комиссии. </span>
<br><span class="payment_delivery_courier_title">Мы принимаем к оплате карты Master Card, Visa и Maestro.</b></span>



</div>


<br><input type='radio' name="oplata" value='yandex' style="cursor:pointer;" onClick='Oplata()' />&nbsp;&nbsp;Яндекс Деньги
<!--<div class="delivery_info">Оплата со своего счета Яндекс Деньги <b>без комиссии</b></div>-->
<div class="oplata_yandexmoney" id='yandex' style="display:none">
<span class="payment_delivery_courier"> Мнгновенная оплата на сайте без комиссии. </span>
<br><span class="payment_delivery_courier_title">Оплата с Вашего счета Яндекс Деньги.</b></span>
</div>


<br><input type='radio' name="oplata" value='webmoney' style="cursor:pointer;" onClick='Oplata()' />&nbsp;&nbsp;WebMoney
<!--<div class="delivery_info">Оплата со своего счета WebMoney <b>без комиссии</b></div>-->
<div class="oplata_webmoney" id='webmoney' style="display:none">
<span class="payment_delivery_courier"> Мнгновенная оплата на сайте без комиссии. </span>
<br><span class="payment_delivery_courier_title">Оплата с Вашего счета WebMoney.</b></span>
</div>


<br><input type='radio' name="oplata" value='bank_wire' style="cursor:pointer;" onClick='Oplata()' />&nbsp;&nbsp;Банковский перевод
<!--<div class="delivery_info">Оплата в любом банке</div>-->
<div class="oplata_bank_wire" id='bank_wire' style="display:none">
<span class="payment_delivery_courier"> Оплатить заказ можно в любом банке. Банки могут взимать комиссию за перевод. </span>
<br><a href="kvitanciya.doc" target="_blank"> Распечатать банковскую квитанцию для оплаты </a>
</div>




<script>
//нужно задать переменные
var radio6 = document.getElementById('nal');
var radio7 = document.getElementById('wire');
var radio8 = document.getElementById('yandex');
var radio9 = document.getElementById('webmoney');
var radio10 = document.getElementById('bank_wire');


function display (radio) {
radio.style.display=(radio.previousElementSibling.checked)? 'block': 'none'}

function Oplata() {
display (radio6);
display (radio7);
display (radio8);
display (radio9);
display (radio10);
}
</script> 




</div>


 

<div class="information">
<h6 style="font-weight:bold;margin-top:0px; margin-left:30px;"> Персональные данные: </h6>

 <?php
            
$_POST['name'] = trim($_POST['name']);                     // Обрезаем пробелы и спецсиволы
$_POST['name'] = strip_tags($_POST['name']);               // Удаляем HTML и PHP теги
$_POST['name'] = mysql_real_escape_string($_POST['name']); // Экранируем специальные символы
            
$_POST['phone'] = trim($_POST['phone']);                     // Обрезаем пробелы и спецсиволы
$_POST['phone'] = strip_tags($_POST['phone']);               // Удаляем HTML и PHP теги
$_POST['phone'] = mysql_real_escape_string($_POST['phone']); // Экранируем специальные символы

$_POST['email'] = trim($_POST['email']);                     // Обрезаем пробелы и спецсиволы
$_POST['email'] = strip_tags($_POST['email']);               // Удаляем HTML и PHP теги
$_POST['email'] = mysql_real_escape_string($_POST['email']); // Экранируем специальные символы

$_POST['address'] = trim($_POST['address']);                     // Обрезаем пробелы и спецсиволы
$_POST['address'] = strip_tags($_POST['address']);               // Удаляем HTML и PHP теги
$_POST['address'] = mysql_real_escape_string($_POST['address']); // Экранируем специальные символы

$_POST['dop_info'] = trim($_POST['dop_info']);                     // Обрезаем пробелы и спецсиволы
$_POST['dop_info'] = strip_tags($_POST['dop_info']);               // Удаляем HTML и PHP теги
$_POST['dop_info'] = mysql_real_escape_string($_POST['dop_info']); // Экранируем специальные символы

            
	if($_SESSION[id_users])
	{
	$sql="SELECT * FROM users WHERE id_users='$_SESSION[id_users]'";
	$rez=mysql_query($sql);
	$lk=mysql_fetch_array($rez);
     

      echo "<div>".
	        "<label>Ваше имя:<span class='important'> * </span></label>".
	        "<input type='text' class='name' name='name' placeholder='' value='$lk[name]' required />".
	   "</div>";
       
      echo "<div>".
	        "<label>Номер телефона:<span class='important'> * </span></label>".
	        "<input type='tel' class='tel' name='phone' id='phone' value='$lk[phone]' required/>".
	   "</div>";
	   
	   echo "<div>".
	        "<label>Email адрес:<span class='important'> * </span></label>".
	        "<input type='email' class='tel' name='email' placeholder='' value='$lk[email]' required/>".
	   "</div>";
       
      //echo "<div>".
      //    "<label>Время доставки:<span class='important' * </span></label>".
      //    "<input type='text' class='delivery_time' name='delivery_time' placeholder='Время доставки'/>".
      //"</div>";
       
       echo "<div>".
	        "<label>Адрес доставки:<span class='important'> * </span></label>".
	        "<input type='text' class='adress' name='address' placeholder='Адрес доставки' required/>".
	   "</div>";
       
       echo "<div>".
       "<label>Дополнительная информация:</label>".
       "<textarea class='dop_info' name='dop_info' placeholder='Дополнительная инф-ия' cols='100' rows='7'></textarea>".
       "</div>";
       
       echo "<p><span class='important'> Внимание! </span> &nbsp;  Поля отмеченные <span class='important'> * </span> обязательны для заполнения.  </p>";
       
      
       echo "<div class='button_cart'>".
         "<input type='submit' name='order' value='Оформить заказ'/>".  
       "</div>";
      
     
	} else {
		
	echo "<div>".
	        "<label>Ваше имя:<span class='important'> * </span></label>".
      "<input type='text' class='name' name='name' placeholder='Ваше имя' required />".
	   "</div>";
       
      echo "<div>".
	        "<label>Номер телефона:<span class='important'> * </span></label>".
        "<input type='tel' class='tel' name='phone' id='phone' placeholder='Номер телефона' required style='opacity:0.75;'/>".
	   "</div>";
	   
	   echo "<div>".
	        "<label>Email адрес:<span class='important'> * </span></label>".
	        "<input type='email' class='tel' name='email' placeholder='Email адрес' required style='opacity:0.75;'/>".
	   "</div>";
       
      // echo "<div>".
      //    "<label>Время доставки:<span class='important' * </span></label>".
      //    "<input type='text' class='delivery_time' name='delivery_time' placeholder='Время доставки'/>".
      //"</div>";
       
       echo "<div>".
	        "<label>Адрес доставки:<span class='important'> * </span></label>".
	        "<input type='text' class='adress' name='address' placeholder='Адрес доставки' required/>".
	   "</div>";
       
       echo "<div>".
       "<label>Дополнительная информация:</label>".
       "<textarea class='dop_info' name='dop_info' placeholder='Дополнительная инф-ия' cols='100' rows='7'></textarea>".
       "</div>";
       
       echo "<p><span class='important'> Внимание! </span> &nbsp;  Поля отмеченные <span class='important'> * </span> обязательны для заполнения.  </p>";
       
      
       echo "<div class='button_cart'>".
      "<input type='submit' name='order' value='Оформить заказ'/>". 
       "</div>";	
		
		}
		
	
       



 echo "</div>";


       
      
      
     echo "</div>";
 
   
   
      }
?>  
 </form>
    </div>  
    
  
   

      <div class="large-4-right-menu">
        
         <?php
require("right_menu.php");
?> 
     
   <!-- <div class="large-4-kachestvo">
     <img src="../img/quality_guarantee.png" width="190" height="115"/>
     </div>
     
      <div class="large-4-delivery">
      
      <div class="povorot">
      <h6 id="povorot_delivery"> При заказе товара от <span> 2 500 рублей. </span> </h6>
      </div>
      
      <img src="../img/dostavka-besplatno-500x500.png" width="230" height="230"/>
      
    
      </div>
     
   <!--  <div class="large-4-sale">
     <h6 align="center"> Узнай о новых акциях первым!  </h6>
     
     
      <form action="#" method="post" class="form_check form_style">
      
      <p class="rline">
        <label class="right_label_form" for="user_mail">Адрес электронной почты:</label>
        <input type="email" class="rfield mailfield email_sale" id="user_mail" name="email_name" value="Email адрес" onFocus="if (this.value == 'Email адрес') this.value = '';"
onblur="if (this.value == '') this.value = 'Email адрес';"/>
      </p>

           
	        <input type="submit" class="btnsubmit" id="sign_up" name="sign_up" value="Подписаться"/>
	   
         
      </form> -->
      
   
    <?php
	
/*

// Создание коротких имён

$email_name = substr(htmlspecialchars(trim($_POST['email_name'])),0, 1000);

$email_name = trim($email_name);                     // Обрезаем пробелы и спецсиволы
$email_name = strip_tags($email_name);               // Удаляем HTML и PHP теги
$email_name = mysql_real_escape_string($email_name); // Экранируем специальные символы
	
	 
	 // если была нажата кнопка "Отправить"
if($_POST['sign_up']) {

if (!preg_match("|^[-0-9a-z_\.]+@[-0-9a-z_^\.]+\.[a-z]{2,6}$|i",$_POST['email_name'])){	
echo "<div style='color:#C03;' class='email_mistake'>"."Неверный формат email адреса. Пожалуйста, введите адрес электронной почты в формате name@example.ru"."</div>";	   
} else {


// Постоянная инф-ия
$toadress = "ilya-shakhomirov@yandex.ru";
$subject = "Пользователь желает получать информацию о новых акциях";
$mailcontent = "Отправляйте мне информацию о новых акциях на" .$email_name;


// Функция отправки почтового сообщения
mail($toadress,$subject,$mailcontent);

// Если не будет работать проверка !!! УБРАТЬ всё начиная с if (preg_match


	echo "<div style='color:#008CBA' class='massage_complete'>"."Теперь Вы подписаны на уведомления о новых акциях!"."</div>";


}
}

	
*/	  
	
?>
      
  <!--  </div>  -->
     
<?php

/* if($usr!=0) {        
        
   echo "<div class='viewed_items'> 
      
      <h6 align='center'> Просмотренные товары </h6>
      
      <table class='items_table'>";

for($i=0; $i<count($item_array) and $i<5; $i++)
  
{
  $sql="SELECT * FROM tovary WHERE id=".$item_array[$i]." ORDER BY id DESC LIMIT 5";
  $rez=mysql_query($sql);
  $items=mysql_fetch_array($rez);
  //print_r($items[id]);
  //krsort($items); 
  //array_reverse($items);
    
           echo "<tr>";
             
            echo "<td class='items_image'> 
            <a href='../products/$items[manuf]_$items[nazv]_$items[mass].php'> <img src='../photos/$items[photo]' width='40px' height='40px' /> </a>
            </td>";
  
             echo "<td class='items_descr'> <a href='../products/$items[manuf]_$items[nazv]_$items[mass].php'> $items[nazv] </a>
               <br> <span>$items[manuf]</span>
               <br> <span>$items[category]</span>
             </td>";
             
           echo "</tr>"; 
}

  echo "<tr class='all_viewed'> <td colspan='2'> <a href='../viewed_items.php'> Все просмотры </a> <td> </tr>";
           
        echo "</table> 
       
      
    </div>";
      
} else {
  echo "<div class='viewed_items'> </div>";
} */
?>      
     
    <!-- <div class="large-4-news">
     <h6> Новости </h6>
     
     <div class="representive_box"> -->
     
<?php
/*   $sql="SELECT * FROM news ORDER BY id_news DESC limit 3";
	$rez=mysql_query($sql);
	while($news=mysql_fetch_array($rez))

	{			   
     echo "<div class='news_bl'>". 
     "<div class='news_date'>
     $news[date_news]
     </div>".
     
     "<a href='../event.php?news=$news[id_news]'>
     $news[nazv_news]
     </a>".
     
     "<div class='news_desk'>
     $news[mini_opis_news]
     </div>".
     
     "</div>";
   }  */
    ?> 
         
    <!--   <a class="all_news_link" href="news.html"> Все новости » </a>
     
     
     </div>
     
     
     
     </div> -->
     
     
     </div>
      
       </div>
      
    
    
  
     
      
      
      
     </div>
     

     
  
      
      
     
    
    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
    <!--
    <div class="large-12-empty columns">
    </div>
    -->
   
  