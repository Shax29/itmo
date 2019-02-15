<?php
/*mysql_connect()������������� ���������� � �������� MySQL � ������������ � ���� ������*/

$db=mysql_connect("localhost","cs04501_gymland","ilyashax") or die("�� ������� ������������ � ��".mysql_error()); 
mysql_select_db("cs04501_gymland",$db) or die("�� ������� ������� ��".mysql_error());

/*  ���������� ����������� ��������� ��� ������ */
define("SALT","lexus");

/* mysql_query() �������� ������ �������� ���� ������ �������, �� ������� ��������� ���������� ��������� � ������ ������� �����*/

mysql_query("SET NAMES 'utf-8'"); 
session_start();
?> 