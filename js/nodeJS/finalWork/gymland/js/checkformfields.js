// Проверка формы "Подпишись на акции" в подвале сайте.
 
$(function() {
	$("#sign_up_footer_mobile").click(function(){
		var user_mail_mobile = $("#user_mail_mobile").val();      
		$.ajax({
			type: "POST",
            url: "../php/send_mobile.php",
			data: {"user_mail_mobile": user_mail_mobile},
			cache: false,						
			success: function(response){
				var messageResp = new Array('Вы подписались на акции магазина','Сообщение не отправлено Ошибка базы данных!','Не заполнено поле e-mail');
				var resultStat = messageResp[Number(response)];
				if(response == 0){				
				   $("#user_mail_mobile").val("");
                   $("#success_mobile").addClass("messege_complete");
                  //$("#success").removeClass("messege_complete");
				}
              
              /*-----------Убрать проверку,если не будет что-то работать-----------*/
                else if(response != 0){
                  
                  var user_mail_mobile = $("#user_mail_mobile").val();
                   $("#success_mobile").removeClass("messege_complete");
                  
                  if(user_mail_mobile!='|^[-0-9a-z_\.]+@[-0-9a-z_^\.]+\.[a-z]{2,6}$|i') {
                    $("#error_mail_mobile").text(resultStat).show().delay(1500).fadeOut(800, function() {
                    $("#user_mail_mobile").removeClass("error_mail_mobile");
                  });
                    
                    $("#user_mail_mobile").addClass("error_mail_mobile");
                    $("#success_mobile").text(resultStat).show().delay(1500).fadeOut(800);
                    
                  } 
                  
				}
                  
              /*-------------------------------------------------------------------*/    
                  $("#success_mobile").text(resultStat).show().delay(1500).fadeOut(800);
			}
		});
		return false;
				
	});
});


$(function() {
	$("#sign_up_footer_dekstop").click(function(){
		var user_mail_dekstop = $("#user_mail_dekstop").val();      
		$.ajax({
			type: "POST",
            url: "../php/send_dekstop.php",
			data: {"user_mail_dekstop": user_mail_dekstop},
			cache: false,						
			success: function(response){
				var messageResp = new Array('Вы подписались на акции магазина','Сообщение не отправлено Ошибка базы данных!','Не заполнено поле e-mail');
				var resultStat = messageResp[Number(response)];
				if(response == 0){				
				   $("#user_mail_dekstop").val("");
                   $("#success_dekstop").addClass("messege_complete");
                  //$("#success").removeClass("messege_complete");
				}
              
              /*-----------Убрать проверку,если не будет что-то работать-----------*/
                else if(response != 0){
                  
                  var user_mail_mobile = $("#user_mail_dekstop").val();
                   $("#success_dekstop").removeClass("messege_complete");
                  
                  if(user_mail_dekstop!='|^[-0-9a-z_\.]+@[-0-9a-z_^\.]+\.[a-z]{2,6}$|i') {
                    
                    $("#error_mail_dekstop").text(resultStat).show().delay(1500).fadeOut(800, function() {
                    $("#user_mail_dekstop").removeClass("error_mail_dekstop");
                  });
                    
                    $("#user_mail_dekstop").addClass("error_mail_dekstop");
                    $("#success_dekstop").text(resultStat).show().delay(1500).fadeOut(800);
                    
                  } 
                  
				}
                  
              /*-------------------------------------------------------------------*/    
                  $("#success_dekstop").text(resultStat).show().delay(1500).fadeOut(800);
			}
		});
		return false;
				
	});
});


// Проверка формы "Обратный звонок" в шапке сайта.  
  
$(function() {
	$("#sign_up_callback").click(function(){
		var phone = $("#phone").val();
		var fio = $("#fio").val();						
		$.ajax({
			type: "POST",
			url: "../php/callback.php",
			data: {"phone": phone, "fio": fio},
			cache: false,						
			success: function(response){
				var messageResp = new Array('Ваше сообщение получено. Оператор свяжется с Вами в течение 15 минут','Сообщение не отправлено Ошибка базы данных','Не заполнены обязательные поля');
				var resultStat = messageResp[Number(response)];
				if(response == 0){
					$("#phone").val("");
					$("#fio").val("");
                  $("#success_callback").addClass("messege_complete");
				}
              
              else if(response != 0){
                
              var phone= $("#phone").val();
              var fio= $("#fio").val();
                $("#success_callback").removeClass("messege_complete");
                
                if(fio=='') {
					$("#error_callback_fio").text(resultStat).show().delay(1500).fadeOut(800, function() {
                      $("#fio").removeClass("error_fio");
                    });
                  
                    $("#fio").addClass("error_fio");
                    
                  } 
                  //$("#user_name_footer").removeClass("error_mail").delay(1500).fadeOut(800);
                  
                  if(phone!='\+7\s?[\(]{0,1}9[0-9]{2}[\)]{0,1}\s?\d{3}[-]{0,1}\d{2}[-]{0,1}\d{2}') {
                  //if (phone!='!^\+7 \(\d{3}\) \d{3}(-\d{2}){2}$!') {
                  //if (phone!='^\+\d{1,3}\s?\(\d{3}\)\s?\d{3}(-\d{2}){2}$') {
                  //if (phone!='/^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/') {
                 
                  //if (phone=='') {
					$("#error_callback_phone").text(resultStat).show().delay(1500).fadeOut(800, function() {
                      $("#phone").removeClass("error_phone");
                    });
                    
                    $("#phone").addClass("error_phone");
                  } 
                
              }
              
				$("#success_callback").text(resultStat).show().delay(1500).fadeOut(800);
			}
		});
		return false;
				
	});
});
  

  
