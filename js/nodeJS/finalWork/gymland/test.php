<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>

<style type="text/css">
body{
	font: 12px/150% Helvetica, 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
}
.commentBlock{
	width:500px;
	margin: 10px auto;
	border-bottom:1px solid #999;
}
.name{
	font-weight:700;
}
#load{
	width:120px;
	height:30px;
	text-align:center;
	margin: 10px auto;
	
}
#load div{
	margin: 5px;
	cursor:pointer;
	background: #6483aa;
	color:#fff;
	padding: 4px 10px 4px 10px;
	border:1px solid #2f4561;
	-webkit-border-radius: 2px;
	-moz-border-radius: 2px;
	border-radius: 2px;
}
</style>
<script type="text/javascript" src="js/jquery-1.5.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#imgLoad").hide(); // �������� ���������
});

var num = 5; //����� ����� � ����� ������ ����������� ������

$(function() {
	$("#load div").click(function(){ // ��������� ���� �� ������ ��������
		
		$("#imgLoad").show(); // ���������� ���������
		
		$.ajax({
			url: "../php/load_more.php", // ����������
			type: "GET",       // ���������� ������� GET
			data: {"num": num},
			cache: false,			
			success: function(response){
				if(response == 0){ // ������� ����� �� ������� � ��������� ��������������� ��������
					alert("������ ��� �������");
					$("#imgLoad").hide();
				}else{
					$("#content").append(response);
					num = num + 5;
					$("#imgLoad").hide();
				}
			}
		});
	});
});
</script>
 
<title>��������� ������������ AJAX</title>
</head>
<body>

<div id="content">
<?php
include("../config.php");

$result = mysql_query("SELECT * FROM tovary LIMIT 5",$db);
$comment = mysql_fetch_array($result);
$i = 1;
do{
	printf("<div class='commentBlock'>
				<div class='name'>%s. %s</div>
				<div class='text'>%s</div>
			</div>",$i,$comment['id'],$comment['nazv']);
	
	$i++;
	
}while($comment = mysql_fetch_array($result));
?>

</div>


<div id="load">
<div>��������� ���</div>
<img src="img/loading.gif" id="imgLoad">
</div>

</body>
</html>
