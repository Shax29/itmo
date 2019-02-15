	
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
        
    
  </head>
  <body>
  <?php
    $_POST[preference] = ('Выберите вкус,Шоколад,Банан');
	$preference = explode(",", $_POST[preference]);
    foreach($preference as $_POST[preference]) {}
	
	$_POST[sostav] = ('Креатин моногидрат	 3000 мг;
L-лейцин;');
    $sostav = explode(";", $_POST[sostav]);
    foreach($sostav as $_POST[sostav]) {}

	?>
  
      <div class='row_center'>
      
    <div class='large-12-center'>
          
      <div class='large-8_katalog'>
     
      <ul class='breadcrumbs'>
      <li><a href='../index.php' rel='home'> Главная </a></li>
	  <li class='sport_eat_breadcrumbs'><a href='../sport_eat.php' rel='sport_eat'> Спортивное питание </a></li>
      <li class='geiner_breadcrumbs'><a href='../sport_eat/geiner.php' rel='sport_eat'> Гейнер </a></li>
      <li>  PhD Nutrition, Growth Factor Mass  </li>
      </ul>
   <form action='' method='post' class='tovary_week_form' id='sort'>  
   <div class='product_conteiner'> 
     <?php 
 
 $sql_tov='SELECT * FROM tovary WHERE photo=''';
 $rez_tov=mysql_query($sql_tov);
 while($tov=mysql_fetch_array($rez_tov)) {  
     
   
     
     echo "<div class='big_photo'>.
     <img src='../photos/0.jpeg' name='photo' title='PhD Nutrition, Growth Factor Mass' alt='PhD Nutrition, Growth Factor Mass'/>
     </div>";
     
    echo "<div class='product_info'>
     
     <div class='product_title'>
     <span class='title_name' name='title'> PhD Nutrition, Growth Factor Mass </span> <span class='tovar_of_the_week'> Товар недели! </span>
     <br> <span class='title_and_mass' name='title_and_mass'> Гейнер, 4050 гр. (24) </span>  
     
     </div>
     
     <div class='product_mini_descript'> 
     
     Growth Factor Mass фирмы PhD - это уникальная формула роста мышечной массы, не имеющая себе равных на рынке спортивного питания. Имея в своем составе 57 гр. ультрачистого протеина, и 76 гр. 
      
     </div>
     
     <div class='product_price'>
	 
          <span class='new_price' name='new_price'> Цена со скидкой: 6500 руб. </span>
     <br> <span class='old_price' name='old_price'> Старая цена: 7200 руб. </span>
     
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
      <input type='text' value='1' name='kol[$_POST[id]]' size='5'/>
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

$svoistva = ('Выберите вкус,Шоколад,Банан');
$preference = explode(",", $svoistva);

echo "<select name='preference[$_POST[id]]'>";
foreach($preference as $_POST[preference])
    {
        echo "<option value='$_POST[preference]'>$_POST[preference]</option>";
    }
	  
echo "</select>";
echo "</div>";
		
     
     
    echo "<div class='product_button'>
    
	<a href='?submit_buy=$_POST[id]'> <button class='buy-product-button' type='submit' name='submit_buy' value='$_POST[id]'>
     <img src='../img/cart.png'/ width='22' height='25'> Купить
     </button> </a>
      
     </div>";
     
     
     
     
    
     echo "<div class='product_descript'>"; 
     
     
     echo "<p style='text-align: justify;'>

    <strong style='font-size:14px;'>Growth Factor Mass</strong>

    <span style='font-size:14px;'> - Growth Factor Mass фирмы PhD - это уникальная формула роста мышечной массы, не имеющая себе равных на рынке спортивного питания. Имея в своем составе 57 гр. ультрачистого протеина, и 76 гр. продвинутой углеводной матрицы с многоэтапным усвоением, Growth Factor Mass является компиляцией наиболее современных и эффективно работающих компонентов системы наращивания мышц. Прирост солидной мускулатуры, увеличение взрывной силы, повышение уровня тестостерона - вот основные результаты регулярного приема этого передового гейнера.

Каждая порция Growth Factor Mass включает в себя 5 гр. мощной двухкомпонентной креатиновой смеси. Давно доказано, что дополнительный прием креатина способствует значительному увеличению рабочих весов, позволяя поднимать больше и качаться дольше. Моногидрат и глюконат креатина в составе этого гейнера позволяет вам прибалять вес на штанге буквально каждую тренировку!

Состав гейнера Growth Factor Mass дополнительно обогащен 2,25 гр. лейцина. Особо хотим отметить, что это не просто лейцин, содержащийся в белковой матрице продукта, а ДОПОЛНИТЕЛЬНО добавленный, с ускоренным сроком усвоения, оказывающим серьезное влияние на скорость набора мышечной массы.

Сдержащийся в гейнере Growth Factor Mass цинк, позволяет поднять уровень тестостерона в организме на новый уровень. Издавна цинк известен своими фантастическими свойствами для повышения выработки тестостерона. Регулярное употребление этого минерала позволяет атлету наращивать чистые мышцы без малейшей примеси жировых отложений.

Growth Factor Mass имеет в составе D-аспаргиновую кислоту, по 1,5 гр. на каждую выпитую порцию. Эта кислота чрезвычайно популярна в среде бодибилдеров, так как обладает свойством ускорять рост тканей и повышает либидо.

Гейнер Growth Factor Mass включает в себя мощнейший антикатаболический комплекс, состоящий из 1,5 гр. HMB  и 1,5 гр. бета-аланина. Эти вещества позволяют снизить катаболизм, разрушающий мышцы.

Так же содержа в своем составе также AAKG, ВСАА, таурин, магнезию и витамин В6, Growth Factor Mass по праву занимает лидирующие места среди других продуктов спортивного питания. Попробуйте этот гейнер, и у ваших мышц не останется иного выхода, как расти и расти! </span>

 
    
    <br></br>
    <strong> Состав и кол-во питательных веществ в одной порции:(24) </strong>
    
    </p>";
    
$sos = ('Креатин моногидрат	 3000 мг;
L-лейцин;');
$sostav = explode(";", $sos);

echo "<ul>";
foreach($sostav as $_POST[sostav])
    {
        echo "<li>$_POST[sostav]</li>";
    }

echo "</ul>";


echo "<p style='text-align: justify;'>

<strong style='font-size:16px;'>

    Ингредиенты:

</strong>

<span style='font-size:14px;'>  5 компонентный углеводный комплекс (52%) (овес, Мальтодекстрин, Декстроза, Palatinose™, фруктоза); 5 компонентный белковый комплекс (33%) (концентрат сывороточного белка, концентрат молочного белка, изолят соевого белка, Гидролизированный протеин пшеницы, изолят сывороточного белка*); какао-порошок, лейцин, бета-Аланин, креатин моногидрат, креатин глюконат, D-аспарагиновая кислота, кальция β-гидрокси-β - метил-Бутират моногидрат (HMB), аргинин AKG, Avena Sativa, BioPerine®, Валин, Iso-лейцин, оксид цинка, оксид магния, витамин В6, глицин, таурин, Подсластитель (Сукралоза), Загустители (Ксантановая камедь, Гуаровая камедь), ароматизатор, натрия хлорид *от молока  </span>

</p>";

echo "<div class='clearer'>"."</div>";
    
     
     
     
     "</div>";
 
     
    echo "<div class='application'>
     
     <strong style='font-size:16px;'> Рекомендации по применению: </strong>
     <span style='font-size:14px;'> Используйте 2 порции Growth Factor Mass™ ежедневно, в любое время в течение дня, чтобы увеличить массу набором калорий. </span> 
     
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
	
	