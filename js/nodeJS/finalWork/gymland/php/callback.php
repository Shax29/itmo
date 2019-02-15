<?php include("../config.php");
//header("Content-type: text/html; charset=utf-8");

//**********************************************
if(empty($_POST['btn_callback'])){
	if($_POST['fio'] != '' && $_POST['phone'] != ''){

		$to = 'admin@gymland.ru';
        $subject = 'Клиент'.$fio.'просит с ним связаться';
        $message = '<strong>Свяжитесь со мной по телефону</strong>'.$phone;
        $headers  = "Content-type: text/html; charset=utf-8 \r\n"; 
        $headers .= "From: Отправитель <from@gymland.ru>\r\n";

  mail($to, $subject, $message, $headers);
  $mailto=mail($to, $subject, $message, $headers);
		if($mailto == true){
			echo 0; //Ваше сообшение успешно отправлено
          
          //if (!preg_match("/^[\d]{1}\ \([\d]{2,3}\)\ [\d]{2,3}-[\d]{2,3}-[\d]{2,3}$/",$_POST['phone'])){
          if ($_POST['phone']==''){
           echo 2; 
          }
          
          /* if ($_POST['user_phone_footer']==0){
           echo 2; 
          } */
          
          if ($_POST['fio']==''){
           echo 2; 
          }
          
		}else{
			echo 1; //Сообщение не отправлено. Ошибка базы данных
		}
	}else{
		echo 2; //Нельзя отправлять пустые сообщения
	}
 
}

//******************************************************************************************************************************

if($_POST['btn_callback'] == 'no'){
	if($_POST['fio'] != '' && $_POST['phone'] != ''){

		$to = 'admin@gymland.ru';
        $subject = 'Клиент'.$fio.'просит с ним связаться';
        $message = '<strong>Свяжитесь со мной по телефону</strong>'.$phone;
        $headers  = "Content-type: text/html; charset=utf-8 \r\n";
        $headers .= "From: Отправитель <from@gymland.ru>\r\n";
  mail($to, $subject, $message, $headers);
  $mailto=mail($to, $subject, $message, $headers);
		if($mailto == true){
			echo "Ваше сообшение успешно отправлено"; //Ваше сообшение успешно отправлено
          
          //if (!preg_match("\+7\s?[\(]{0,1}9[0-9]{2}[\)]{0,1}\s?\d{3}[-]{0,1}\d{2}[-]{0,1}\d{2}",$_POST['phone'])){
          //if (!preg_match("^((8|\+7)[\- ]?)?(\(?\d{3,4}\)?[\- ]?)?[\d\- ]{5,10}$",$_POST['phone'])){
          //if(!preg_match('!^\+7 \(\d{3}\) \d{3}(-\d{2}){2}$!', $_POST['phone'])){
          //if(!preg_match('^\+\d{1,3}\s?\(\d{3}\)\s?\d{3}(-\d{2}){2}$', $_POST['phone'])){
          
          //if(!preg_match("/^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/", $_POST['phone'])){
          if ($_POST['phone']==''){
           echo "Не заполнены обязательные поля";
          }
          
          /* if ($_POST['user_phone_footer']==''){
           echo "Не заполнены обязательные поля";
          } */
          
          if ($_POST['fio']==''){
           echo "Не заполнены обязательные поля"; 
          }
          
          
		}else{
			echo "Сообщение не отправлено. Ошибка базы данных"; //Сообщение не отправлено. Ошибка базы данных
		}
	}else{
		echo "Не заполнены обязательные поля"; //Нельзя отправлять пустые сообщения
	}

}
?>    

