<?php include("../config.php");
//header("Content-type: text/html; charset=utf-8");

//**********************************************
if(empty($_POST['btn_dekstop'])){
	if($_POST['user_mail_dekstop'] != ''){

		$to = 'admin@gymland.ru'; 
        $subject = 'Подписка на акции клиентом'.$user_mail_dekstop; 
        $message = '<strong>Поступил запрос на отправку новостей</strong>';
        $headers  = "Content-type: text/html; charset=utf-8 \r\n"; 
        $headers .= "From: Отправитель <from@gymland.ru>\r\n"; 
  //mail($to, $subject, $message, $headers); //???????? ?????? ? ??????? ??????? mail
  mail($to, $subject, $message, $headers);
  $mailto=mail($to, $subject, $message, $headers);
		if($mailto == true){
			echo 0; //Ваше сообшение успешно отправлено
          
           if (!preg_match("|^[-0-9a-z_\.]+@[-0-9a-z_^\.]+\.[a-z]{2,6}$|i",$_POST['user_mail_dekstop'])){
           echo 2;
           }
		}else{
			echo 1; //Сообщение не отправлено. Ошибка базы данных
		}
	}else{
		echo 2; //Не заполнено поле Email
	}
 
}  

//****************************************************************************************************************

if($_POST['btn_dekstop'] == 'no'){
	if($_POST['user_mail_dekstop'] != ''){

		$to = 'admin@gymland.ru';
        $subject = 'Подписка на акции клиентом'.$user_mail_dekstop;
        $message = '<strong>Поступил запрос на отправку новостей</strong>';
        $headers  = "Content-type: text/html; charset=utf-8 \r\n";
        $headers .= "From: Отправитель <from@gymland.ru>\r\n";
  //mail($to, $subject, $message, $headers); //???????? ?????? ? ??????? ??????? mail
  mail($to, $subject, $message, $headers);
  $mailto=mail($to, $subject, $message, $headers);
		if($mailto == true){
			echo "Ваше сообшение отправлено!"; //Ваше сообшение успешно отправлено
          
          if (!preg_match("|^[-0-9a-z_\.]+@[-0-9a-z_^\.]+\.[a-z]{2,6}$|i",$_POST['user_mail_dekstop'])){
           echo "Не заполнено поле e-mail";
           }
		}else{
			echo "Сообщение не отправлено. Ошибка базы данных"; //Сообщение не отправлено. Ошибка базы данных
		}
	}else{
		echo "Не заполнено поле e-mail"; //Не заполнено поле Email
	}

}

?>