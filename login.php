
<?php
//acesso ao banco
include("includes/header.php");
/*
  if (!$conexao) {
		  echo "Não foi possível conectar ao banco MySQL."; exit;
		  }else {
			  echo "Parabéns!! A conexão ao banco de dados ocorreu normalmente!.";} 
			  
			  */

//recupera os dados 

$po = 'block';

$login = $_POST['login'];
$pass = $_POST['pass'];

$sql = mysql_query("SELECT * FROM promoters WHERE login = '$login' and password ='$pass'");
$row = mysql_num_rows($sql);

if($row > 0){ //testa se a consulta retornou um registro
	session_start();
	$_SESSION['login']= $login;
	$_SESSION['pass']= $pass;
	
	mysql_close($conexao);	
	header('location: adm/index.php');
	
}else{
	mysql_close($conexao);
	header('Location: index.php?name=errorLogin');	 
    
}


?>


