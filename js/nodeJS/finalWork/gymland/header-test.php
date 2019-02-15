	<header itemscope itemtype="https://gymland.ru/WPHeader" class="header">
   <!--<nav class="navbar navbar-default backgroung-color-navbar navbar-link">-->
      <div class="container-fluid" style="border:1px solid #222">
        <div class="row" style="background-color: #3E3E3F;">
         <!--<div class="navbar-header">
            <button type="button" class="navbar-toggle navbar-collapse navbar-button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
         </div>-->
         <!-- Обычное меню -->  
         <div class="col-md-6 d-none d-xl-block">
            <ul class="nav navbar-nav menu" id="navi">
               <li>
                  <a href="">
                     <span><!--noindex-->Главная<!--/noindex--></span>
                  </a>
               </li>
               <li>
                  <a href="">
                     <span><!--noindex-->Каталог<!--/noindex--></span>
                  </a>
               </li>
               <li>
                  <a href="">
                     <span><!--noindex-->Доставка<!--/noindex--></span>
                  </a>
               </li>
               <li>
                  <a href="">
                     <span><!--noindex-->Оплата<!--/noindex--></span>
                  </a>
               </li>
               <li>
                  <a href="">
                     <span><!--noindex-->Акции<!--/noindex--></span>
                  </a>
               </li>
               <li>
                  <a href="">
                     <span><!--noindex-->Бонусы<!--/noindex--></span>
                  </a>
               </li>
               <li>
                  <a href="">
                     <span><!--noindex-->Контакты<!--/noindex--></span>
                  </a>
               </li>
            </ul>
         </div>
         <!-- Мобильное меню --> 
         <div class="col-4 d-block d-xl-none" style="position: inherit;text-align: center;">
           
           <nav class="navbar navbar-expand-xl navbar-dark" style="padding: .25rem 0rem !important;">
  	<!--<a class="navbar-brand" href="#">Navbar</a>-->
  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar1" aria-controls="navbar1" aria-expanded="false" aria-label="Toggle navigation" style="border: 2px solid #00B4F0 !important; padding: 1px 4px;">
    	<!--<span class="navbar-toggler-icon" style="width: 1.2em !important; height: 1.2em !important;"></span>-->
<svg class="ham hamRotate ham8" viewBox="0 0 100 100" width="35" onclick="this.classList.toggle('active')">
  <path
        class="line top"
        d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20" />
  <path
        class="line middle"
        d="m 30,50 h 40" />
  <path
        class="line bottom"
        d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20" />
</svg>
  	</button>

  	<!--<div class="collapse navbar-collapse" id="navbar1">
    	<ul class="navbar-nav mr-auto">
      		<li class="nav-item">
        		<a class="nav-link" href="#"></a>
      		</li>
		    <li class="nav-item">
		    	<a class="nav-link" href="#"><span></span></a>
		    </li>
            <li class="nav-item">
		    	<a class="nav-link" href="#"><span></span></a>
		    </li>
            <li class="nav-item">
		    	<a class="nav-link" href="#"></a>
		    </li>
            <li class="nav-item">
		    	<a class="nav-link" href="#"></a>
		    </li>
            <li class="nav-item">
		    	<a class="nav-link" href="#"></a>
		    </li>
            <li class="nav-item">
		    	<a class="nav-link" href="#"></a>
		    </li>      		
    	</ul>
  	</div>-->
</nav>
           
         </div>
         <!-- Поиск декстоп --> 
         <div class="col-3 d-none d-xl-block" id="search-element">
           <form method="post" action="../search.php" name="search">
	          <input value="Поиск..." type="search" name="query" onfocus="if (this.value == 'Поиск...') this.value = '';" onblur="if (this.value == '') this.value = 'Поиск...';" />
            </form>
         </div>
         <!-- Логотип мобильный --> 
         <div class="col-4 d-block d-xl-none">
           <div class="gymland_ru-mobile">
              <a class="logo_a" href=""><span class="gym-mobile"> Gymland </span><!--<img src="../img/logo.png" alt="" width="25" height="25" />--></a>
           </div>
         </div>
         <!-- Личный кабинет декстоп -->  
         <div class="col-3 d-none d-xl-block">
          <div class="lk">
            <img src="../img/original Size/key.png" alt="" width="18" height="18" />
            <a href='' rel="popup_login" class="show_popup">
              <span>Вход</span>
            </a>
            
            <div class="popup popup_login">
              <a class="close" href="#">Close</a>
	          <h5>Авторизация</h5>
              <form method="post" action="" class="login form_style">
               <p class="rline">
                <label for="login">Логин:</label>
                <input type="text" name="login" id="login" value="" required="" />
               </p>
                
               <p class="rline">
                <label for="password">Пароль:</label>
                <input type="password" name="password" class="password" value="" required="" />
               </p>

               <p class="login-submit">
                <button type="submit" class="login-button btnsubmit">Войти</button>
               </p>

               <p class="forgot-password"><a href="#">Забыли пароль?</a></p>
             </form>
            </div>
            
            / 
            <img src="../img/original Size/lock.png" alt="" width="14" height="18" />
            <a href='' rel="popup_reg" class="show_popup">
              <span>Регистрация</span>
            </a>
            
            <div class="popup popup_reg">
             <a class="close" href="#">Close</a>
	         <h5>Регистрация</h5> 
              <form method="post" action="" class="reg form_style">
                <p class="rline">
                 <label for="login">Логин:</label>
                 <input id="username" name="email" value="" required="" type="text" />
                </p>

                <p class="rline">
                 <label for="password">Пароль:</label>
                 <input type="password" name="password" class="password" value="" required="" />
                </p>
    
                <p class="rline">
                 <label for="password">Повторите пароль:</label>
                 <input type="password" name="repeat_password" class="password" value="" required="" />
                </p>
    
                <p class="rline">
                 <label for="text">Ваше имя:</label>
                 <input type="text" name="fio" value="" required="" />
                </p>
    
                <p class="reg-submit">
                 <button type="submit" class="reg-button btnsubmit">Регистрация</button>
                </p>
              </form>
           </div>            
          </div>   
         </div>
          <!-- Личный кабинет мобильный --> 
           <!--<div class="col-2 d-block d-sm-none">
            <div class="lk-mobile">
             <img src="" alt="" width="18" height="18" />
               <a href='' rel="popup_login" class="show_popup">
                <img src="../img/lk-mobile.jpeg" alt="" width="30" height="30" />
               </a>
             </div> 
           </div>-->
           <!-- Корзина мобильная --> 
           <div class="col-4 d-block d-xl-none">
            <div class="lk-mobile">
               <a href='' rel="popup_login" class="show_popup">
                <img src="../img/auth.png" alt="" width="20" height="20" />
               </a>
             </div> 
            <div class="cart-mobile">
               <a href='' >
                <img src="../img/b4.png" alt="" width="28" height="28" />
               </a>
              <sup style="color: #fff; font-size: 14px;">0</sup>
             </div>
             <!--<div class="lk-mobile">
               <a href='' rel="popup_login" class="show_popup">
                <img src="../img/auth.png" alt="" width="23" height="23" />
               </a>
             </div>--> 
           </div>
          <div class="collapse navbar-collapse" id="navbar1" style="text-align:center;">
    	<ul class="navbar-nav mr-auto">
      		<li class="nav-item">
        		<a class="nav-link" href="#"><!--noindex-->Главная<!--/noindex--></a>
      		</li>
		    <li class="nav-item">
		    	<a class="nav-link" href="#"><span><!--noindex-->Каталог<!--/noindex--></span></a>
		    </li>
            <li class="nav-item">
		    	<a class="nav-link" href="#"><span><!--noindex-->Доставка<!--/noindex--></span></a>
		    </li>
            <li class="nav-item">
		    	<a class="nav-link" href="#"><!--noindex-->Оплата<!--/noindex--></a>
		    </li>
            <li class="nav-item">
		    	<a class="nav-link" href="#"><!--noindex-->Акции<!--/noindex--></a>
		    </li>
            <li class="nav-item">
		    	<a class="nav-link" href="#"><!--noindex-->Бонусы<!--/noindex--></a>
		    </li>
            <li class="nav-item">
		    	<a class="nav-link" href="#"><!--noindex-->Контакты<!--/noindex--></a>
		    </li>      		
    	</ul>
  	</div>
       </div> 
     </div>
  
     <div class="container-fluid" style="border:0px solid #222">  
       <div class="row" style="background-color: #F5F5F5;">
         <!-- Телефон мобильная -->
         <div class="col-12 d-block d-xl-none">
           <div class="row">
             <div class="contact-mobile">
               <!--<span class="contact_tel" style="font-weight: bold; color: #000 !important;">--><a href="tel:88129721612">8 (812) 972-16-12 </a> <!--</span>-->
             </div>  
           </div>
         </div>
         <!-- Каталог и поиск мобильная -->
         <div class="col-12 d-block d-xl-none" style="background-color: #00B4F0;">
           <div class="row">
             <div class="col-4 col-sm-3 col-md-3">
               <div class="catalog-mobile">
                 <p><span style="margin-right: 5px;" class="cd-nav-trigger">Каталог</span><img src="../img/sort2.png" alt="" width="15" height="15" /></p>
                  
                 
                 <nav class="cd-main-nav-wrapper">
			<ul class="cd-main-nav">
				<!--<li><a href="#0">О нас</a></li>
				<li><a href="#0">Проекты</a></li>
				<li><a href="#0">Блог</a></li>
				<li><a href="#0">Контакты</a></li>-->
              
              	<li> <a class="cd-subnav-trigger" href="#0"><span>Производители</span></a> 
              		<ul>  
                        <li class="go-back"><a href="#0">Каталог</a></li>
               			<li> <a href="../brands.php?manuf_eng=Optimum Nutrition">Optimum Nutrition</a> </li>
               			<li> <a href="../brands.php?manuf_eng=BSN">BSN</a> </li>
               			<li> <a href="../brands.php?manuf_eng=Power System">Power System</a> </li>
               			<li> <a href="../brands.php?manuf_eng=Weider">Weider</a> </li>
               			<li> <a href="../brands.php?manuf_eng=Multipower">Multipower</a> </li>
               			<li> <a href="../brands.php?manuf_eng=QNT">QNT</a> </li>
               			<li> <a href="../brands.php?manuf_eng=Ultimate Nutrition">Ultimate Nutrition</a> </li>
               			<li> <a href="../brands.php?manuf_eng=MuscleTech">MuscleTech</a> </li>
               			<li> <a href="../brands.php?manuf_eng=SAN">SAN</a> </li>
               			<li> <a href="../brands.php?manuf_eng=VP Lab">VP Lab</a> </li>
               			<li> <a href="../brands.php">Все производители</a> </li>
                        <li><a href="#0" class="placeholder">Placeholder</a></li>
              		 </ul>
             	</li>
                <li> <a class="cd-subnav-trigger" href="#0"><span>Спортивное питание</span></a> 
              		<ul>  
                        <li class="go-back"><a href="#0">Каталог</a></li>
               			<li> <a href="../sport_eat/geiner.php?category=Гейнер">Гейнеры</a> </li>
               			<li> <a href="../sport_eat/protein.php?category=Протеин">Протеин</a> </li>
               			<li> <a href="../sport_eat/amino.php?category=Аминокислоты">Аминокислоты</a> </li>
               			<li> <a href="../sport_eat/bcaa.php?category=ВСАА">ВСАА</a> </li>
               			<li> <a href="../sport_eat/creatin.php?category=Креатин">Креатин</a> </li>
               			<li> <a href="../sport_eat/fat_burners.php?category=Жиросжигатели">Жиросжигатели</a> </li>
               			<li> <a href="../sport_eat/candy_bar.php?category=Батончики">Батончики</a> </li>
               			<li> <a href="../sport_eat/vitamin.php?category=Витамины">Витамины</a> </li>
               			<li> <a href="../sport_eat/kit.php?category=Наборы">Наборы</a> </li>
               			<li> <a href="../sport_eat/new.php?category=Новинки">Новинки</a> </li>
                        <li><a href="#0" class="placeholder">Placeholder</a></li>
              		 </ul>
             	</li>
                <li> <a class="cd-subnav-trigger" href="#0"><span>Одежда мужская</span></a> 
              		<ul>  
                        <li class="go-back"><a href="#0">Каталог</a></li>
               			<li> <a href="../clothes/leggings.php?category=Штаны для зала">Штаны для зала</a> </li>
               			<li> <a href="../clothes/cap.php?category=Кепки и шапки">Кепки и шапки</a> </li>
               			<li> <a href="../clothes/tee_shirt.php?category=Футболки">Футболки</a> </li>
               			<li> <a href="../clothes/short.php?category=Шорты">Шорты</a> </li>
               			<li> <a href="../clothes/jackets.php?category=Майки и безрукавки">Майки и безрукавки</a> </li> 
                        <li><a href="#0" class="placeholder">Placeholder</a></li>
              		 </ul>
             	</li>
                <li> <a class="cd-subnav-trigger" href="#0"><span>Одежда женская</span></a> 
              		<ul>  
                        <li class="go-back"><a href="#0">Каталог</a></li>
               			<li> <a href="../clothes/leggings.php?category=Штаны для зала">Штаны для зала</a> </li>
               			<li> <a href="../clothes/cap.php?category=Кепки и шапки">Кепки и шапки</a> </li>
               			<li> <a href="../clothes/tee_shirt.php?category=Футболки">Футболки</a> </li>
               			<li> <a href="../clothes/short.php?category=Шорты">Шорты</a> </li>
               			<li> <a href="../clothes/jackets.php?category=Майки и безрукавки">Майки и безрукавки</a> </li>
                        <li><a href="#0" class="placeholder">Placeholder</a></li>
              		 </ul>
             	</li>
                <li> <a class="cd-subnav-trigger" href="#0"><span>Экипировка</span></a> 
              		<ul>  
                        <li class="go-back"><a href="#0">Каталог</a></li>
                        <li> <a href="../equipments/bandage.php?category=Бандажи">Бандажи</a> </li>
               			<li> <a href="../equipments/bint.php?category=Бинты">Бинты</a> </li>
               			<li> <a href="../equipments/traction.php?category=Тяги и крюки">Тяги и крюки</a> </li>
               			<li> <a href="../equipments/gloves_m.php?category=Перчатки мужские">Перчатки мужские</a> </li>
               			<li> <a href="../equipments/gloves_w.php?category=Перчатки женские">Перчатки женские</a> </li>
               			<li> <a href="../equipments/belt.php?category=Ремни и пояса">Ремни и пояса</a> </li>
               			<li> <a href="../equipments/grip.php?category=Хваты">Хваты</a> </li>     
                        <li><a href="#0" class="placeholder">Placeholder</a></li>
              		 </ul>
             	</li>
                <li> <a class="cd-subnav-trigger" href="#0"><span>Разное</span></a> 
              		<ul>  
                        <li class="go-back"><a href="#0">Каталог</a></li>
               			<li> <a href="../other/boutle.php?category=Бутылки">Бутылки</a> </li>
               			<li> <a href="../other/container.php?category=Контейнеры">Контейнеры</a> </li>
               			<li> <a href="../other/cup.php?category=Стаканы">Стаканы</a> </li>
               			<li> <a href="../other/bag.php?category=Сумки">Сумки</a> </li>
               			<li> <a href="../other/shakes.php?category=Шейкеры">Шейкеры</a> </li>
               			<li> <a href="../other/gel.php?category=Крема,гели,спреи">Крема, гели, спреи</a> </li> 
                        <li><a href="#0" class="placeholder">Placeholder</a></li>
              		 </ul>
             	</li>
                <li> <a href="../special-offer.php"> Спецпредложения </a> </li>
                <li> <a href="../new.php"> Новинки </a> </li> 
              
               
				<!--<li>
					<a href="#0" class="cd-subnav-trigger"><span>Категории</span></a>
					<ul>
						<li class="go-back"><a href="#0">Меню</a></li>
						<li><a href="#0">Категория 1</a></li>
						<li><a href="#0">Категория 2</a></li>
						<li><a href="#0">Категория 3</a></li>
						<li><a href="#0">Категория 4</a></li>
						<li><a href="#0">Категория 5</a></li>
						<li><a href="#0" class="placeholder">Placeholder</a></li>
					</ul>
				</li>-->
			</ul> <!-- .cd-main-nav -->
		</nav> <!-- .cd-main-nav-wrapper -->
		<!--<a href="#0" class="cd-nav-trigger">Menu<span></span></a>-->
                 
               </div> 
             </div>
             
             <div class="col-8 col-sm-9 col-md-9" id="search-element">
               <form method="post" action="../search.php" name="search">
	             <input value="Поиск..." type="search" name="query" onfocus="if (this.value == 'Поиск...') this.value = '';" onblur="if (this.value == '') this.value = 'Поиск...';" />
               </form>
             </div>  
           </div>
         </div>
         
         <!-- Декстоп лого, контакты, режим работы,корзина -->
         <div class="col-9 d-none d-xl-block">
           <div class="row"> 
             <div class="col-md-4">
               
                 <div class="gymland_ru">
                   <a class="logo_a" href=""><span class="gym"> Gym<!--<img src="../img/Icon-Muscles-Bicep-Strength-Libido.jpg" alt="" width="40" height="40" style="margin-top:-10px;" />-->land </span><!--<img src="../img/logo.png" alt="" width="50" height="50" />--></a>
                 </div>
             
             </div>
             <div class="col-md-4">
               <div class="regime">
                  <h6 style="font-weight:bold;"><img src="../img/original Size/clock.png" alt="" width="16" height="22" style="margin-right: 5px;" /> Режим работы </h6>
                    <div class="work_regime">
                     <span> пн - пт: с 9:00 - 22:00 </span>
                     <br><span> cб - вс: с 11:00 - 18:00 </span>
                     <br><span> без обеда и выходных </span>
                     <br><img src="../img/original Size/location.png" alt="" width="16" height="22" /> <a href="" title="Карта пунктов самовывоза товара" style="margin-right: 5px;">Адреса пунктов самовывоза </a>
                    </div>
                </div>
             </div>  
             <div class="col-md-4">
              <div class="contact">
                <h6 style="font-weight:bold;"><img src="../img/32iphone.png" alt="" width="12" height="20" style="margin-right: 5px;" />Контакты</h6>
                 <div class="contact-us">
                   <span class="contact_tel"><a href="tel:88129721612">8 (812) 972-16-12 </a> </span>
                   <br><span> Скайп: <a href="skype:Gymland?call" title="Позвонить по Скайп!">gymland-shop</a> </span>
                   <br><span>Почта: <a href="mailto:gymland@shop.ru" title="Почта для связи">gymland@shop.ru</a> </span>
                   <br><span class="callback_us"><img src="../img/original Size/user.png" alt="" width="18" height="20" style="margin-right: 5px;" /><a href="" rel="popup_callback" class="vtip show_popup" title="Обратный звонок">Обратный звонок</a></span>
                   
                    <div class="popup popup_callback">
                     <a class="close" href="#">Close</a>
                     <h5>Обратный звонок</h5>
                     <form method="post" action="" class="callback form_style">
                       <p>
                        <label for="login">Номер телефона:</label>
                        <input type="text" name="login" id="login" value="" required="" />
                       </p>

                       <p>
                        <label for="text">Ваше имя:</label>
                        <input type="text" name="fio" value="" required="" />
                       </p>
     
                       <p class="callback-submit">
                        <button type="submit" class="callback-button btnsubmit">Отправить</button>
                       </p>
                     </form>
                   </div> 
                 </div>
               </div>
             </div>
           </div> 
         </div>
         <div class="col-3 d-none d-xl-block">
           <div class="cart">
             <h6 style="font-weight:bold;"> <img src="../img/80shoppingcart.png" alt="" width="20" height="20" style="margin-right: 5px;">  Корзина </h6>
              <div class="total">
                Товаров: <span style="">0</span> шт.<br>
                Сумма: <span style="">0</span> руб.
              </div>
            <a href="" class="checkout"><input type="submit" name="buy" value="Моя корзина" /></a>	  
            </div>
          </div>
      </div>
      <div class="row" style="">
          <!--<div class="col-md-12" id="search-element">
            <form method="post" action="../search.php" name="search">
	          <input value="Поиск..." type="search" name="query" onfocus="if (this.value == 'Поиск...') this.value = '';" onblur="if (this.value == '') this.value = 'Поиск...';">
            </form>
          </div>-->
          <div class="col-md-12 d-none d-xl-block" style="background-color: #00B4F0;">
            <ul class="nav-catalog">
              
             <li> <a class="hsubs" href="../brands.php"> Производители <img src="../img/arrow_sans_down_1.png"> </a> 
              <ul class="subs">      
               <li> <a href="../brands.php?manuf_eng=Optimum Nutrition">Optimum Nutrition</a> </li>
               <li> <a href="../brands.php?manuf_eng=BSN">BSN</a> </li>
               <li> <a href="../brands.php?manuf_eng=Power System">Power System</a> </li>
               <li> <a href="../brands.php?manuf_eng=Weider">Weider</a> </li>
               <li> <a href="../brands.php?manuf_eng=Multipower">Multipower</a> </li>
               <li> <a href="../brands.php?manuf_eng=QNT">QNT</a> </li>
               <li> <a href="../brands.php?manuf_eng=Ultimate Nutrition">Ultimate Nutrition</a> </li>
               <li> <a href="../brands.php?manuf_eng=MuscleTech">MuscleTech</a> </li>
               <li> <a href="../brands.php?manuf_eng=SAN">SAN</a> </li>
               <li> <a href="../brands.php?manuf_eng=VP Lab">VP Lab</a> </li>
               <li> <a href="../brands.php">Все производители</a> </li>                
              </ul>
             </li>   
              
             <li> <a class="hsubs" href="../sport_eat.php"> Спортивное питание  <img src="../img/arrow_sans_down_1.png" /> </a> 
              <ul class="subs">
               <li> <a href="../sport_eat/geiner.php?category=Гейнер">Гейнеры</a> </li>
               <li> <a href="../sport_eat/protein.php?category=Протеин">Протеин</a> </li>
               <li> <a href="../sport_eat/amino.php?category=Аминокислоты">Аминокислоты</a> </li>
               <li> <a href="../sport_eat/bcaa.php?category=ВСАА">ВСАА</a> </li>
               <li> <a href="../sport_eat/creatin.php?category=Креатин">Креатин</a> </li>
               <li> <a href="../sport_eat/fat_burners.php?category=Жиросжигатели">Жиросжигатели</a> </li>
               <li> <a href="../sport_eat/candy_bar.php?category=Батончики">Батончики</a> </li>
               <li> <a href="../sport_eat/vitamin.php?category=Витамины">Витамины</a> </li>
               <li> <a href="../sport_eat/kit.php?category=Наборы">Наборы</a> </li>
               <li> <a href="../sport_eat/new.php?category=Новинки">Новинки</a> </li>                
              </ul>
             </li>
      
             <li> <a class="hsubs" href="../man-clothes.php"> Одежда мужская <img src="../img/arrow_sans_down_1.png" /> </a>     
              <ul class="subs">      
               <li> <a href="../clothes/leggings.php?category=Штаны для зала">Штаны для зала</a> </li>
               <li> <a href="../clothes/cap.php?category=Кепки и шапки">Кепки и шапки</a> </li>
               <li> <a href="../clothes/tee_shirt.php?category=Футболки">Футболки</a> </li>
               <li> <a href="../clothes/short.php?category=Шорты">Шорты</a> </li>
               <li> <a href="../clothes/jackets.php?category=Майки и безрукавки">Майки и безрукавки</a> </li>               
              </ul>
             </li>
              
             <li> <a class="hsubs" href="../woman-clothes.php"> Одежда женская <img src="../img/arrow_sans_down_1.png" /> </a>     
              <ul class="subs">      
               <li> <a href="../clothes/leggings.php?category=Штаны для зала">Штаны для зала</a> </li>
               <li> <a href="../clothes/cap.php?category=Кепки и шапки">Кепки и шапки</a> </li>
               <li> <a href="../clothes/tee_shirt.php?category=Футболки">Футболки</a> </li>
               <li> <a href="../clothes/short.php?category=Шорты">Шорты</a> </li>
               <li> <a href="../clothes/jackets.php?category=Майки и безрукавки">Майки и безрукавки</a> </li>               
              </ul>
             </li>
      
             <li> <a class="hsubs" href="../equipments.php"> Экипировка <img src="../img/arrow_sans_down_1.png" /> </a> 
              <ul class="subs">
               <li> <a href="../equipments/bandage.php?category=Бандажи">Бандажи</a> </li>
               <li> <a href="../equipments/bint.php?category=Бинты">Бинты</a> </li>
               <li> <a href="../equipments/traction.php?category=Тяги и крюки">Тяги и крюки</a> </li>
               <li> <a href="../equipments/gloves_m.php?category=Перчатки мужские">Перчатки мужские</a> </li>
               <li> <a href="../equipments/gloves_w.php?category=Перчатки женские">Перчатки женские</a> </li>
               <li> <a href="../equipments/belt.php?category=Ремни и пояса">Ремни и пояса</a> </li>
               <li> <a href="../equipments/grip.php?category=Хваты">Хваты</a> </li>        
              </ul>
             </li>
      
             <li> <a class="hsubs" href="../other.php"> Разное <img src="../img/arrow_sans_down_1.png" /> </a> 
              <ul class="subs">
               <li> <a href="../other/boutle.php?category=Бутылки">Бутылки</a> </li>
               <li> <a href="../other/container.php?category=Контейнеры">Контейнеры</a> </li>
               <li> <a href="../other/cup.php?category=Стаканы">Стаканы</a> </li>
               <li> <a href="../other/bag.php?category=Сумки">Сумки</a> </li>
               <li> <a href="../other/shakes.php?category=Шейкеры">Шейкеры</a> </li>
               <li> <a href="../other/gel.php?category=Крема,гели,спреи">Крема, гели, спреи</a> </li>     
              </ul>
             </li>
              
             <li> <a class="hsubs" href="../special-offer.php"> Спецпредложения </a> </li>
              
             <!--<li id="last-element"> <a class="hsubs" href="../other.php"> Новинки </a> </li>--> 
             <li> <a class="hsubs" href="../new.php"> Новинки </a> </li>
              
              
      <!--<li id="last-element">      
      <form method="post" action="../search.php" name="search">
	     <input value="Поиск..." type="search" name="query" onfocus="if (this.value == 'Поиск...') this.value = '';" onblur="if (this.value == '') this.value = 'Поиск...';">
      </form>          
      </li>-->
           </ul>
          </div>
        <!--<div class="container">
          <div class="col-md-12" id="search-element">
            <form method="post" action="../search.php" name="search">
	          <input value="Поиск..." type="search" name="query" onfocus="if (this.value == 'Поиск...') this.value = '';" onblur="if (this.value == '') this.value = 'Поиск...';">
            </form>
          </div>
        </div>--> 
      </div>
  </div>
</header> 
	
	<!--<main class="cd-main-content">-->
		<!-- main content here -->
	<!--</main>-->
<script src="js/jquery-2.1.1.js"></script>
<script src="js/main.js"></script>







