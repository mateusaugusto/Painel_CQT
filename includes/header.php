<?php
header('Content-Type: text/html; charset=utf-8');

//include("classes/DB.class.php");
//$conectar=new DB;
//$conectar=$conectar->conectar();

	 // $host="54.68.30.72";
	  //$user="cqt";
	  //$pass="admast122.";
	  //$dbname="cqt";
	  
	  $host="localhost";
	  $user="root";
	  $pass="";
	  $dbname="cqt";	  

     mysql_query("SET NAMES 'utf8'");
	 mysql_query('SET character_set_connection=utf8');
	 mysql_query('SET character_set_client=utf8');
	 mysql_query('SET character_set_results=utf8');
	  
	  $conexao = mysql_connect($host,$user,$pass) or die(mysql_errno());
	  mysql_select_db($dbname);
	  
	  
	

?>