<?php
include("../config.php");
if(isset($_GET['num'])){
   $num = $_GET['num'];
   $res = $db->query("SELECT * FROM tovary WHERE tovar_week='1' AND product_availability='1' LIMIT $num, 4");
            
   //if(mysql_num_rows($res) > 0){          
     
     while($tovar_week = mysqli_fetch_assoc($res)){
       if ($tovar_week['cena_sale']==0) 
				{        
					$bonus=$tovar_week['cena']*2/100;
					$bonus=ceil($bonus);  
				} else if ($tovar_week['cena_sale']!==0) 
				{
					$bonus=$tovar_week['cena_sale']*2/100;
					$bonus=ceil($bonus); 
				} 
  
			if ($tovar_week['mass']=='0') $tovar_week['mass']='';  
			$preference = explode(",", $tovar_week[preference]);
            foreach($preference as $tovar_week[preference]) {}
       
       echo "<div class='col-12 col-sm-4 col-md-4 col-xl-3'>
          
            <div class='container-fluid'> 
             <div class='tovar-week' style='margin-bottom:25px;'>
              <!--<form action='' method='post' class='tovary_week_form'>-->
              <div class='item_box'> 
                <div class='item'>
                 <div class='item-cont'>
                   <span class='vendor'> $tovar_week[manuf] </span>
                   <div class='picture'>
                   	 <a href='../catalog.php?product_eng=$tovar_week[product_eng]&category_eng=$tovar_week[category_eng]&manuf_eng=$tovar_week[manuf]&nazv=$tovar_week[nazv]&mass=$tovar_week[mass]&id=$tovar_week[id]'>
                     	<img src='../photos/$tovar_week[photo]' style='height: 100px; margin-left:5px;' />
                     </a>
                   </div>
                   <div class='title_tovar'>
                    <p>
                     <a href='../catalog.php?product_eng=$tovar_week[product_eng]&category_eng=$tovar_week[category_eng]&manuf_eng=$tovar_week[manuf]&nazv=$tovar_week[nazv]&mass=$tovar_week[mass]&id=$tovar_week[id]'>$tovar_week[nazv] </a>
                    </p> 
                   </div>
                   <div class='price'>
                   <br/>";
                      if ($tovar_week[cena_sale]!=0) {

                        echo "<br/><span class='price_tovar'> $tovar_week[cena_sale] руб. </span>
                        <br/><span class='old_price_tovar' > $tovar_week[cena] руб. </span>
                        <br/><span class='bonus_price_tovar' > + $bonus бонусов </span>";

                      } else { 

                        echo "<br/><span class='price_tovar_standart' > $tovar_week[cena] руб. </span>
                        <br/><span class='bonus_price_tovar' > + $bonus бонусов </span>";  

                      }                  
                echo "</div>
                   <div>
                    <span class='summary'> $tovar_week[category], $tovar_week[mass] $tovar_week[unit]. </span>
                   </div>  
                 </div>
                 <div class='buy_tovar'>";
                  echo "<select name='preference[$tovar_week[id]]' id='item_preference[$tovar_week[id]]'>";
	  
						foreach($preference as $tovar_week[preference])
    						{
        						echo "<option value='$tovar_week[preference]'>$tovar_week[preference]</option>";
    						}
				  echo "</select>";
                 echo "</div>  
                 <div class='buy_tovar'>  
                   <div class='amount'>
                    <span class='minus'>
                     <div class='amount_minus amount_minus_right'>
                       <a href='#' class='icon icon-minuss'>–</a>
                     </div>
                    </span>
                 <div class='amount_text'>
                  <input type='text' value='1' name='kol[$tovar_week[id]]' class='amount' id='kol[$tovar_week[id]]' size='5'>
                 </div>
                  <span class='plus'>
                    <div class='amount_plus amount_plus_right'>
                     <a href='#' class='icon icon-pluss'>+</a>
                    </div>
                  </span>
                 </div>";
                 /*<div class='buy' id='btn-click'>
	               <a href='?submit_buy=$tovar_week[id]'>
                    <button name='submit_buy' value='$tovar_week[id]' class='btn btn-7 btn-3 btn-icon-only icon-cart add_item' data-id='$tovar_week[id]' data-price='$tovar_week[cena_sale]' data-title='$tovar_week[nazv], $tovar_week[mass] $tovar_week[unit]' data-img='$tovar_week[photo]'></button>
                   </a>      
                 </div>*/
                 
                 if ($tovar_week[cena_sale]!=0) {
                 echo "<div class='buy' id='btn-click'>
                    <button name='submit_buy' value='$tovar_week[id]' class='btn btn-7 btn-3 btn-icon-only icon-cart add_item' data-id='$tovar_week[id]' data-price='$tovar_week[cena_sale]' data-old-price='$tovar_week[cena]' data-title='$tovar_week[nazv], $tovar_week[mass] $tovar_week[unit]' data-img='$tovar_week[photo]'></button>
                 </div>";
                 } else {
                 echo "<div class='buy' id='btn-click'>
                    <button name='submit_buy' value='$tovar_week[id]' class='btn btn-7 btn-3 btn-icon-only icon-cart add_item' data-id='$tovar_week[id]' data-price='$tovar_week[cena]' data-old-price='0' data-title='$tovar_week[nazv], $tovar_week[mass] $tovar_week[unit]' data-img='$tovar_week[photo]'></button>
                 </div>";
                 }
                 
               echo "</div>
               </div>
              <!--</form>-->
             </div>        
            </div>
          </div>
          
          </div>";
       
     }
     
 //  } 
}  
  /*    if(isset($_GET['num'])){
   $num = $_GET['num'];
   //$result = $db->query("SELECT * FROM tovary WHERE tovar_week='1' AND product_availability='1' LIMIT $num, 4"); //Вытаскиваем из таблицы 5 комментариев начиная с $num
   $result = mysql_query("SELECT * FROM tovary LIMIT $num, 5",$db);
   if(mysql_num_rows($result) > 0){          
       $comment = mysqli_fetch_assoc($result);          
       do{
          $num++;
          printf("<div class='commentBlock'>
          <div class='name'>%s. %s</div>
          <div class='text'>%s</div>
          </div>",$num,$comment['id'],$comment['nazv']);
}while($comment = mysqli_fetch_assoc($result));
          sleep(1); //Сделана задержка в 1 секунду чтобы можно проследить выполнение запроса
     }else{
           echo 0; //Если записи закончились
     }
}*/
?>