<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<!-- Стили и скрипт для кнопки "Корзина" -->    
<script src="js/modernizr.custom.js"></script>
<script src="js/classie.js"></script>

<!--<script async src="http://gymland.tmweb.ru/js/bootstrap.min.js"></script>--><!-- Include all compiled plugins (below), or include individual files as needed -->
<!-- SLAIDER -->
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script>
  var owl = $('.owl-carousel-head');
owl.owlCarousel({
    items:1,
    loop:true,
    margin:0,
    autoplay:true,
    autoplayTimeout:3000,
    autoplayHoverPause:true
});
$('.play').on('click',function(){
    owl.trigger('play.owl.autoplay',[1000])
})
$('.stop').on('click',function(){
    owl.trigger('stop.owl.autoplay')
})
</script>

<script>
$(document).ready(function() { 
  
  $('.slider-1').owlCarousel({
    loop:true, //прокручивание элементов по кругу
    margin: 50, //отступы межу элементами
    nav:true, //отобразить элементы управления
    responsive:{
      0:{
        items:1
      }, //при ширине окна < 992 отображать 1 элемент
      992:{
        items:3
      }  //при ширине окна > 992 отображать 3 элемент
    }
  });
  
  $('.slider-2').owlCarousel({
    loop:true, //прокручивание элементов по кругу
    margin: 50, //отступы межу элементами
    nav:true, //отобразить элементы управления
    responsive:{
      0:{
        items:1
      }, //при ширине окна < 992 отображать 1 элемент
      992:{
        items:3
      }  //при ширине окна > 992 отображать 3 элемент
    }
  });
  
  $('.slider-3').owlCarousel({
    loop:true, //прокручивание элементов по кругу
    margin: 50, //отступы межу элементами
    nav:true, //отобразить элементы управления
    responsive:{
      0:{
        items:1
      }, //при ширине окна < 992 отображать 1 элемент
      992:{
        items:3
      }  //при ширине окна > 992 отображать 3 элемент
    }
  });
  
  $('.slider-4').owlCarousel({
    loop:true, //прокручивание элементов по кругу
    margin: 50, //отступы межу элементами
    nav:true, //отобразить элементы управления
    responsive:{
      0:{
        items:1
      }, //при ширине окна < 992 отображать 1 элемент
      992:{
        items:1
      }  //при ширине окна > 992 отображать 3 элемент
    }
  });
});
</script>  

<!-- Кнопка вверх -->
<script src="js/button_vverh.js"></script>

<!-- Счётчик -->
       <!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>-->     
       <script type="text/javascript" >
		$(document).ready(function() {
			$('.minus').click(function () {
				var $input = $(this).parent().find('input');
				var count = parseInt($input.val()) - 1;
				count = count < 1 ? 1 : count;
				$input.val(count);
				$input.change();
				return false;
			});
			$('.plus').click(function () {
				var $input = $(this).parent().find('input');
				$input.val(parseInt($input.val()) + 1);
				$input.change();
				return false;
			});
		});
	</script>

<!-- Скрипт для Форм входа и регистрации -->        
<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>-->
<script type="text/javascript" src="js/my_scripts.js"></script>
<!-- Мобильное меню -->
<!--<script src='https://cdn.jsdelivr.net/mojs/0.265.6/mo.min.js'></script>
<script  src="js/mobile_menu.js"></script>-->
<!--<script src="js/jquery-2.1.1.js"></script>
<script src="js/main.js"></script>
<script src="js/modernizr.js"></script>--> <!-- Modernizr -->

<!-- Маска телефона -->
<script type="text/javascript" src="js/jquery.maskedinput.min.js"></script>
<script>
    $(document).ready(function() {
    $("#phone").mask("+7 (999) 999-99-99");
    //$("#phone").mask("+7(999)999-99-99");  
    $("#phone_cart").mask("+7 (999) 999-99-99");
    $("#phone_account").mask("+7 (999) 999-99-99");  
  });
</script>

 <!-- Проверка форм на заполненность полей -->
<script type="text/javascript" src="js/checkformfields.js"></script>


<!-- Подгрузка контента товаров -->

<!--<script type="text/javascript" src="js/jquery-1.5.1.min.js"></script>-->
<script type="text/javascript">
    $(document).ready(function(){
       $("#imgLoad").hide();  //Скрываем прелоадер
    });
      var num = 4; //чтобы знать с какой записи вытаскивать данные
        $(function() {
           $("#load div").click(function(){ //Выполняем если по кнопке кликнули
           $("#imgLoad").show(); //Показываем прелоадер
           $.ajax({
               url: "../php/load_more.php",
               type: "GET",
               data: {"num": num},
               cache: false,
               success: function(response){
                   if(response == 0){  // смотрим ответ от сервера и выполняем соответствующее действие
                      alert("Больше нет записей");
                      $("#imgLoad").hide();
                      //$("#load").hide();  //Скрываем кнопку
                   }else{
                      $("#content").append(response);
                      num = num + 4;
                      $("#imgLoad").hide();
                      }
                   }
               });
          });
     });
</script>


<script type="text/javascript">
               	
                        var d = document,
                          //itemBox = d.querySelectorAll('.item'), // блок каждого товара
                          itemBox = d.querySelectorAll('.item_box'),
                          cartCont = d.getElementById('cart_content'), // блок вывода данных корзины
                          my_cart = d.getElementById('my_cart'),
                          cartAmount = d.getElementById('amountItems');
                    // Функция кроссбраузерной установка обработчика событий
                    function addEvent(elem, type, handler){
                      if(elem.addEventListener){
                        elem.addEventListener(type, handler, false);
                      } else {
                        elem.attachEvent('on'+type, function(){ handler.call( elem ); });
                      }
                      return false;
                    }
                    // Получаем данные из LocalStorage
                    function getCartData(){
                      return JSON.parse(localStorage.getItem('cart'));
                    }
                    // Записываем данные в LocalStorage
                    function setCartData(o){
                      localStorage.setItem('cart', JSON.stringify(o));
                      return false;
                    }
                    // Добавляем товар в корзину
                    function addToCart(e){
                      this.disabled = true; // блокируем кнопку на время операции с корзиной
                      var cartData = getCartData() || {}, // получаем данные корзины или создаём новый объект, если данных еще нет
                          parentBox = this.parentNode, // родительский элемент кнопки "Добавить в корзину"
                          itemId = this.getAttribute('data-id'), // ID товара
                          itemTitle = this.getAttribute('data-title'), // название товара
                          itemPrice = this.getAttribute('data-price'), // стоимость товара
                          itemPriceOld = this.getAttribute('data-old-price'), // старая стоимость товара
                          itemImg = this.getAttribute('data-img'), // картинка товара
                          itemPreference = document.getElementById('item_preference['+ this.getAttribute('data-id') +']').value,
                          itemKol = document.getElementById('kol['+ this.getAttribute('data-id') +']').value;
                          itemKol = parseInt(itemKol, 10);
                          itemId = parseInt(itemId, 10);
                      if(cartData.hasOwnProperty(itemId)){ // если такой товар уже в корзине, то добавляем +1 к его количеству
                        	cartData[itemId][2] += itemKol;
                      } else { // если товара в корзине еще нет, то добавляем в объект
                        cartData[itemId] = [itemTitle, itemPrice, itemKol, itemImg, itemPriceOld, itemPreference, itemId];
                      }
                      if(!setCartData(cartData)){ // Обновляем данные в LocalStorage
                        this.disabled = false; // разблокируем кнопку после обновления LS
                      }
                      
                      /* var totalItems = '';
                      // если что-то в корзине уже есть, начинаем формировать данные для вывода
                      if(cartData !== null){
                        totalItems = '<table class="shopping_list"><tr><th>Наименование</th><th>Цена</th><th>Кол-во</th></tr>';
                        for(var items in cartData){
                          totalItems += '<tr>';
                          for(var i = 0; i < cartData[items].length; i++){
                            totalItems += '<td>' + cartData[items][i] + '</td>';
                          }
                          totalItems += '</tr>';
                        }
                        totalItems += '</table>';
                        //cartCont.innerHTML = totalItems;
                      } else {
                        // если в корзине пусто, то сигнализируем об этом
                        //cartCont.innerHTML = 'В корзине пусто!';
                      } */
                      
                       var cartValue = getCartData();
                       var amountValue = 0;
                       var amountPrice = 0;
                       for(var items in cartValue){
                         //console.log(cartValue[items]);
                         //console.log(cartValue[items][2]);
                         amountValue += cartValue[items][2];
                         amountPrice += cartValue[items][1] * cartValue[items][2];
                       }  
                       document.getElementById("total_amount_mobile").innerHTML = amountValue;
                       document.getElementById("total_amount").innerHTML = amountValue;
                       document.getElementById("total_price").innerHTML = amountPrice;
                      
                      
               		   var totalCartItems = '';
                       var cartTable = getCartData();
                       if(cartTable !== null){
                       totalCartItems = '<table class="my_cart_tovary"><tr class="title_cart"><td class="tovar"> Товар </td><td class="name_tovarov"> Название </td><td class="amount_tovarov"> Количество </td><td class="taste_tovarov"> Вкус, объём или размер </td><td class="price_tovarov"> Цена </td><td class="action"> Действие </td></tr>';
                        for(var items in cartTable){
                          totalCartItems += '<tr>';
                          //totalCartItems += '<td class="photo_tovarov">' + cartTable[items][3] + '</td>';
                          totalCartItems += '<td class="photo_tovarov"><img src="../photos/'+ cartTable[items][3] +'" width="60" height="80"/></td>';
                          totalCartItems += '<td class="name_tovarov_content"><a href="../products/'+ cartTable[items][0] +'">'+ cartTable[items][0] +' гр. </a></td>';
                          totalCartItems += '<td class="amount_tovarov_content"><div class="amount_cart"><span class="minus"><div class="amount_minus amount_minus_right" data-minus-id="' + cartTable[items][6] + '"><a href="#" class="icon icon-minuss" data-minus-id="' + cartTable[items][6] + '" onclick="minus(' + cartTable[items][6] + ')">–</a></div></span><div class="amount_text" id="amount_text_' + cartTable[items][6] + '"><input type="text" value="' + cartTable[items][2] + '" name="" id="amount[' + cartTable[items][6] + ']" size="5"></div><span class="plus"><div class="amount_plus amount_plus_right" data-plus-id="' + cartTable[items][6] + '"><a href="#" class="icon icon-pluss" data-plus-id="' + cartTable[items][6] + '">+</a></div></span></div></td>';
                          totalCartItems += '<td class="taste_tovarov_content">' + cartTable[items][5] + '</td>';
                          if (cartTable[items][4] !== '0') {
                          totalCartItems += '<td class="price_tovarov_content"> <span class="cena_sale"> ' + cartTable[items][1] + ' руб.</span> <br> <span class="cena_old"> ' + cartTable[items][4] + ' руб.</span> </td>';
                          } else {
                          totalCartItems += '<td class="price_tovarov_content"> <span class="price_tovar_standart"> ' + cartTable[items][1] + ' руб.</span></td>';
                          }
                          totalCartItems += '<td class="delete"><!--<a href="?del_cart='+ cartTable[0] +'" title="Удалить товар из корзины"> Удалить </a>--><!--<button id="delete_item_cart[' + cartTable[items][6] + ']" class="delete_cart_btn">Удалить товар</button>--><span class="del_item" data-id="' + cartTable[items][6] + '">X</span></td>';
                          
                          for(var i = 0; i < cartTable[items].length; i++){
                            //totalCartItems += '<td>' + cartTable[items][i] + '</td>';
                          }
                          totalCartItems += '</tr>';
                        }
                        totalCartItems += '<tr class="footer_cart"><td style="border-left: 1px solid #888;"></td><td></td><td></td><td class="itogo"> Итого: </td><td class="itogo_cena" id="itogo_cena">'+ amountPrice +' руб. </td><td class="clear_cart"><!--<a href="?clear_cart=ok" title="Очистить корзину" id="clear_cart"> Очистить корзину </a>--><button id="clear_cart" class="clear_cart_btn">Очистить корзину</button></td></tr>';
                        totalCartItems += '</table>';
                        my_cart.innerHTML = totalCartItems;
                      } else {
                        // если в корзине пусто, то сигнализируем об этом
                        my_cart.innerHTML = '<p style="font-size:18px;"><br> В настоящей момент Ваша корзина пуста. <a href="../catalog.php"> Перейти в каталог.</a></p>';
                      } 
                                                               
                     return false;
                    }
                      
                      
                    // Устанавливаем обработчик события на каждую кнопку "Добавить в корзину"
                    for(var i = 0; i < itemBox.length; i++){
                      addEvent(itemBox[i].querySelector('.add_item'), 'click', addToCart);
                    }
                     
                      
                      //  var cartItems = JSON.parse(localStorage.getItem('cart'));
					//	var itemsQuantity = cartItems.length;
                    /*  var cartData = getCartData(); // вытаскиваем все данные корзины
                      if(cartData !== null){
                        totalItems = '<table class="shopping_list"><tr><th>Наименование</th><th>Цена</th><th>Кол-во</th></tr>';
                        for(var items in cartData){
                          totalItems += '<tr>';
                          for(var i = 0; i < cartData[items].length; i++){
                            totalItems += '<td>' + cartData[items][i] + '</td>';
                          }
                          totalItems += '</tr>';
                        }
                        totalItems += '</table>';
                       // cartCont.innerHTML = totalItems;
                      } */
                    
                     
                                            
             </script>
             
             <script>
               var cartValue = getCartData();
               var amountValue = 0;
               var amountPrice = 0;
               for(var items in cartValue){
                 console.log(cartValue[items]);
                 console.log(cartValue[items][2]);
                 amountValue += cartValue[items][2];
                 amountPrice += cartValue[items][1] * cartValue[items][2];
               }  
               document.getElementById("total_amount_mobile").innerHTML = amountValue;
               document.getElementById("total_amount").innerHTML = amountValue;
               document.getElementById("total_price").innerHTML = amountPrice;
               
               /*addEvent(d.getElementById('clear_cart'), 'click', function(e){
                    //localStorage.removeItem('cart');
                    localStorage.clear();
                    document.getElementById("total_amount_mobile").innerHTML = 0;
               		document.getElementById("total_amount").innerHTML = 0;
               		document.getElementById("total_price").innerHTML = 0;
                 //amountValue = 0;
                 //amountPrice = 0;
                });*/
             </script> 
             
             
             <script>
               var totalCartItems = ''
               var cartTable = getCartData();
               if(cartTable !== null){
               totalCartItems = '<table class="my_cart_tovary"><tr class="title_cart"><td class="tovar"> Товар </td><td class="name_tovarov"> Название </td><td class="amount_tovarov"> Количество </td><td class="taste_tovarov"> Вкус, объём или размер </td><td class="price_tovarov"> Цена </td><td class="action"> Действие </td></tr>';
                        for(var items in cartTable){
                          totalCartItems += '<tr>';
                          totalCartItems += '<td class="photo_tovarov"><img src="../photos/'+ cartTable[items][3] +'" width="60" height="80"/></td>';
                          totalCartItems += '<td class="name_tovarov_content"><a href="../products/'+ cartTable[items][0] +'">'+ cartTable[items][0] +' гр. </a></td>';
                          totalCartItems += '<td class="amount_tovarov_content"><div class="amount_cart"><span class="minus"><div class="amount_minus amount_minus_right" data-minus-id="' + cartTable[items][6] + '"><a href="#" class="icon icon-minuss" data-minus-id="' + cartTable[items][6] + '" onclick="minus(' + cartTable[items][6] + ')">–</a></div></span><div class="amount_text" id="amount_text_' + cartTable[items][6] + '"><input type="text" value="' + cartTable[items][2] + '" name="" id="amount[' + cartTable[items][6] + ']" size="5"></div><span class="plus"><div class="amount_plus amount_plus_right" data-plus-id="' + cartTable[items][6] + '"><a href="#" class="icon icon-pluss" data-plus-id="' + cartTable[items][6] + '">+</a></div></span></div></td>';
                          totalCartItems += '<td class="taste_tovarov_content">' + cartTable[items][5] + '</td>';
                          if (cartTable[items][4] !== '0') {
                          totalCartItems += '<td class="price_tovarov_content"> <span class="cena_sale"> ' + cartTable[items][1] + ' руб.</span> <br> <span class="cena_old"> ' + cartTable[items][4] + ' руб.</span> </td>';
                          } else {
                          totalCartItems += '<td class="price_tovarov_content"> <span class="price_tovar_standart"> ' + cartTable[items][1] + ' руб.</span></td>';
                          }
                          totalCartItems += '<td class="delete"><!--<a href="?del_cart='+ cartTable[0] +'" title="Удалить товар из корзины"> Удалить </a>--><!--<button id="delete_item_cart[' + cartTable[items][6] + ']" class="delete_cart_btn">Удалить товар</button>--><span class="del_item" data-id="' + cartTable[items][6] + '">X</span></td>';
                          
                          for(var i = 0; i < cartTable[items].length; i++){
                            //totalCartItems += '<td>' + cartTable[items][i] + '</td>';
                          }
                          totalCartItems += '</tr>';
                        }
                        totalCartItems += '<tr class="footer_cart"><td style="border-left: 1px solid #888;"></td><td></td><td></td><td class="itogo"> Итого: </td><td class="itogo_cena" id="itogo_cena">'+ amountPrice +' руб. </td><td class="clear_cart"><!--<a href="?clear_cart=ok" title="Очистить корзину" id="clear_cart"> Очистить корзину </a>--><button id="clear_cart" class="clear_cart_btn">Очистить корзину</button></td></tr>';
                        totalCartItems += '</table>';
                        my_cart.innerHTML = totalCartItems;
                      } else {
                      	my_cart.innerHTML = '<p style="font-size:18px;"><br> В настоящей момент Ваша корзина пуста. <a href="../catalog.php"> Перейти в каталог.</a></p>';
                      }
               
               
               // функция для нахождения необходимого ближайшего родительского элемента
                    function closest(el, sel) {
                        if (el !== null)
                        return el.matches(sel) ? el : (el.querySelector(sel) || closest(el.parentNode, sel));
                    }

                /* Удалить товар из корзины */
                 /*  addEvent(d.getElementById('delete_item_cart[cartData[itemId]]'), 'click', function(e){
                       localStorage.removeItem('cartData[itemId]');
                   });*/
               
               addEvent(d.body, 'click', function(e){
                    if(e.target.className === 'del_item') {
                        var itemId = e.target.getAttribute('data-id'),
                        cartData = getCartData();
                        if(cartData.hasOwnProperty(itemId)){
                            var tr = closest(e.target, 'tr');
                            tr.parentNode.removeChild(tr); /* Удаляем строку товара из таблицы */
                            // пересчитываем общую сумму и цену
                            var amountPrice = d.getElementById('total_price'),
                            //amountValue = d.getElementById('total_amount_mobile'),    
                            amountValue = d.getElementById('total_amount'),
                            amountValueMobile = d.getElementById('total_amount_mobile'),    
                            amountPriceCart = d.getElementById('itogo_cena');
                          	//var amountValue = 0;
               				//var amountPrice = 0;
                            //amountValue += cartValue[items][2];
                            //amountPrice += cartValue[items][1] * cartValue[items][2];
                            amountPriceCart.textContent = +amountPrice.textContent - cartData[itemId][1] * cartData[itemId][2];
                            amountPrice.textContent = +amountPrice.textContent - cartData[itemId][1] * cartData[itemId][2];
                            amountValue.textContent = +amountValue.textContent - cartData[itemId][2];
                            amountValueMobile.textContent = +amountValue.textContent - cartData[itemId][2];
                            //d.document.getElementById('itogo_cena').innerHTML = amountPrice;
                            delete cartData[itemId]; // удаляем товар из объекта
                            //setCartData(cartData); // перезаписываем измененные данные в localStorage
                          
                            if(amountValue.textContent === '0') {
                              localStorage.clear();
                              my_cart.innerHTML = '<p style="font-size:18px;"><br> В настоящей момент Ваша корзина пуста. <a href="../catalog.php"> Перейти в каталог.</a></p>';
                              //setCartData(cartData); // перезаписываем измененные данные в localStorage
                              //localStorage.removeItem('cart');
                            }
                            setCartData(cartData); // перезаписываем измененные данные в localStorage
                        }
                    }
                }, false);
               
               
                                            
                /* Открыть корзину */
                       //addEvent(d.getElementById('checkout'), 'click', openCart);
                      
                /* Очистить корзину */
                   addEvent(d.getElementById('clear_cart'), 'click', function(e){
                       var amountPrice = d.getElementById('total_price'),   
                           amountValue = d.getElementById('total_amount');
                       amountPrice.textContent = 0;
                       amountValue.textContent = 0;
                       //localStorage.removeItem('cart');
                       localStorage.clear();
                       //setCartData(cartData);
                       my_cart.innerHTML = '<p style="font-size:18px;"><br> В настоящей момент Ваша корзина пуста. <a href="../catalog.php"> Перейти в каталог.</a></p>';
                   }, false);
               
               
               /* Пересчет количества товара и цены при уведичении/уменьшении товара */
               
             /*  addEvent(d.body, 'click', function(e){
                    if(e.target.className === 'amount_minus') {
                        var itemId = e.target.getAttribute('data-minus-id'),
                        cartData = getCartData();
                        if(cartData.hasOwnProperty(itemId)){
                            // пересчитываем общую сумму и цену
                            //var amountValueNow = d.getElementById('amount_text_' + this.getAttribute('data-minus-id') +''),
                            var amountValueNow = 2;
                            amountPrice = d.getElementById('total_price'),    
                            amountValue = d.getElementById('total_amount'),
                            amountValue = d.getElementById('total_amount_mobile'),    
                            amountPriceCart = d.getElementById('itogo_cena');
                           
                            //var amountValueNow = document.getElementById('amount['+ this.getAttribute('data-minus-id') +']').value;
                            //amountValueNow = parseInt(amountValueNow, 10);
                            amountPriceCart = 0;
                            //amountPriceCart.textContent = +amountPrice.textContent - cartData[itemId][1] * amountValueNow;
                            //amountPrice.textContent = +amountPrice.textContent - cartData[itemId][1] * cartData[itemId][2];
                            //amountValue.textContent = +amountValue.textContent - amountValueNow;
                            //d.document.getElementById('itogo_cena').innerHTML = amountPrice;
                            setCartData(cartData); // перезаписываем измененные данные в localStorage
                          
                        }
                    }
                }, false);*/
               
               /*function minus(n) {
                 var cena=document.getElementById("cena_"+n);
                 var col=document.getElementById("col_"+n);
                 var cenap=document.getElementById("cenap_"+n);
                 var itog=document.getElementById("itog");

                 if(col.innerHTML!="0") {
                  col.innerHTML=Number(col.innerHTML)-1;
                  cenap.innerHTML=Number(cenap.innerHTML)-Number(cena.innerHTML);
                  itog.innerHTML=Number(itog.innerHTML)-Number(cena.innerHTML);
                 }
                }*/
               
             </script>

