<?php

include("includes/header.php");

	$name = $_POST["name"];
	$lastname = $_POST["lastname"];
	$email = $_POST["email"];
	$pass = $_POST["pass"];
	$login = $_POST["login"];	
	$validaLogin = mysql_query("SELECT * FROM promoters WHERE login='$login'");
	$contar = mysql_num_rows($validaLogin);
	
    if($contar == 0){	
				
	$sql = "INSERT INTO promoters (name,last_name,email,login,password) VALUES";
	$sql .= "('$name','$lastname','$email','$login','$pass')";
	$resultado = mysql_query($sql);
	}else{	
	   header('Location: index.php?name=errorCadastrar');
	}		
	if(isset($resultado)){
		
		header('Location: index.php?name=sucesso');
	}else{
		if(empty($flash)){
			
		header('Location: index.php?name=falha'); 
	}
	
	}	
		
	mysql_close($conexao);
?>