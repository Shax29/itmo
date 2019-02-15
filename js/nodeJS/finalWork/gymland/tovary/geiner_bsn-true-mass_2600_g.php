<!-- Подключаем файл с конфигурацией -->
<?php
require("../config.php");
?> 
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gymland - интернет-магазин спортивного питания</title>
    <link rel="stylesheet" href="../css/foundation.css" />
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/style_slaider.css" type="text/css" media="screen"/>
    <link rel="stylesheet" type="text/css" href="../css/global.css"/><!-- Новый Слайдер!-->
    <script src="../js/vendor/modernizr.js"></script>
    
    <!-- Это относится к слайдеру -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
  
    
        
        
        
        
		<script src="../js/jquery-1.7.1.min.js"></script>
		
		
		<script src="../js/jquery-1.4.4.min.js"></script>
	<script src="../js/slides.min.jquery.js"></script>
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
	<link rel="stylesheet" href="../css/global.css">
	
	
    
    <!-- Всплывающие подсказки -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="../js/vtip.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/vtip.css" />
    
    
    
    <!-- Кнопка наверх -->
    <script type="text/javascript" src="../js/button_vverh.js"></script>
    
    
    <!-- Стили и скрипт для кнопки "Корзина" -->
    <link rel="stylesheet" type="text/css" href="css/default.css" />
		<link rel="stylesheet" type="text/css" href="../css/component.css" />
		<script src="../js/modernizr.custom.js"></script>
        <script src="../js/classie.js"></script>
        
        
        <script src="../js/classie.js"></script>
		
        <!-- Стили и скрипт для Форм входа и регистрации -->
        
        <link href="../css/style_form.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <script type="text/javascript" src="../js/my_scripts.js"></script>
        
        <!-- Стили "Товары и описание" -->
        <link href="../css/product.css" rel="stylesheet" type="text/css" />
        
    
  </head>
  <body>
    
   
    
    
   
       <div class="row_center">
    
    
    
    <div class="large-12-center">
       
    
      <div class="large-8_katalog">
     
      <ul class="breadcrumbs">
      <li><a href="../index.php" rel="home"> Главная </a></li>
      <li class="sport_eat_breadcrumbs"><a href="../sport_eat.php" rel="sport_eat"> Спортивное питание </a></li>
      <li class="geiner_breadcrumbs"><a href="../sport_eat/geiner.php" rel="sport_eat"> Гейнеры (Белки+Углеводы) </a></li>
      <li> BSN True Mass, 2600 </li>
      </ul>
   <form action='' method='post' class='tovary_week_form' id="sort">  
   <div class='product_conteiner'> 
     <?php 
 $sql="SELECT * FROM tovary WHERE manuf='BSN' AND nazv='True Mass'";
 $rez=mysql_query($sql);
 $spec_tov=mysql_fetch_array($rez);
 $preference = explode(",", $spec_tov[preference]);
 foreach($preference as $spec_tov[preference]) {}
 $sostav = explode(";", $spec_tov[sostav]);
 foreach($sostav as $spec_tov[sostav]) {}
     
    
     
     echo "<div class='big_photo'>.
     <img src='../photos/$spec_tov[photo]' title='$spec_tov[manuf], $spec_tov[nazv]' alt='$spec_tov[manuf], $spec_tov[nazv]'/>
     </div>";
     
    echo "<div class='product_info'>
     
     <div class='product_title'>
     <span class='title_name'> $spec_tov[manuf], $spec_tov[nazv] </span> <span class='tovar_of_the_week'> Товар недели! </span>
     <br> <span class='title_and_mass'> $spec_tov[category], $spec_tov[mass] гр. (18 порций) </span>  
     
     </div>
     
     <div class='product_mini_descript'> 
     
     $spec_tov[mini_opis] 
      
     </div>
     
     <div class='product_price'>
     
          <span class='new_price'> Цена со скидкой: $spec_tov[cena_sale] руб. </span>
     <br> <span class='old_price'> Старая цена: $spec_tov[cena] руб. </span>
     
     </div>
     
     </div>"; 
     
    echo "<div class='amount_product'>
      
      <span class='minus'>
      <div class='amount_minus_product'>
      <a href='#' class='icon icon-minuss'>
	  -
	  </a>
      </div>
      </span>
      
      <div class='amount_text_product'>
      <input type='text' value='1' size='5'/>
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
echo "<select name='preference'>";
	  
foreach($preference as $spec_tov[preference])
    {
        echo "<option value='$spec_tov[preference]'>$spec_tov[preference]</option>";
    }
echo "</select>";
echo "</div>";
		
     
     
    echo "<div class='product_button'>
    
	 <button class='buy-product-button' type='submit'>
     <img src='../img/cart.png'/ width='22' height='25'> Купить
    </button>
      
     </div>";
     
     
     
     
    
     echo "<div class='product_descript'>"; 
     
     
     echo "<p style='text-align: justify;'>

    <strong style='font-size:14px;'>$spec_tov[nazv]</strong>

    <span style='font-size:14px;'> - $spec_tov[opis] </span>

 
    
    <br></br>
    <strong> Состав и кол-во питательных веществ в одной порции (3 мерные ложки = 145 г): </strong>
    
    </p>";
    
echo "<ul>";

foreach($sostav as $spec_tov[sostav])
    {
        echo "<li>$spec_tov[sostav]</li>";
    }

echo "</ul>";


echo "<p style='text-align: justify;'>

<strong style='font-size:16px;'>

    Ингредиенты:

</strong>

<span style='font-size:14px;'> $spec_tov[ingredients] </span>

</p>";

echo "<div class='clearer'>"."</div>";
    
     
     
     
     "</div>";
 
     
    echo "<div class='application'>
     
     <strong style='font-size:16px;'> Рекомендации по применению: </strong>
     <span style='font-size:14px;'> $spec_tov[sposob_prim] </span> 
     
     </div>";
       
     
    echo "</div>"; 
    ?>  
     </form>
 </div>
 </div>      
   
  
      <div class="large-4-right-menu">
     
            <?php
require("../templates/right_menu.php");
?> 
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
   
<script src="../js/is.mobile.js"></script>
<script src="../js/jquery.maskedinput.min.js"></script>
<script src="../js/formcheck.js"></script>    
   
   
  </body>
</html>
