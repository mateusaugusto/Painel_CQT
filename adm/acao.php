<?php

include("../includes/header.php");


$operacao = $_POST["operacao"];

if ($operacao == "cadastrar") {

    $log = $_POST["login"];
    $idUser;

//selecionando id do usuario para cadastrar a festa
    $sql = "SELECT * FROM promoters WHERE login = '$log'";
    $resultado = mysql_query($sql);
    $linhas = mysql_num_rows($resultado);

    for ($i = 0; $i < $linhas; $i++) {
        $idUser = mysql_result($resultado, $i, "id");
    }

// Recupera os dados dos campos
    $nome = $_POST['nome'];
    $date_start = $_POST['date_start'];
    $date_end = $_POST['date_end'];
    $local = $_POST['local'];
    $descricao = $_POST['descricao'];
    $rua = $_POST['rua'];
    $bairro = $_POST['bairro'];
    $num = $_POST['num'];
    $uf = $_POST['uf'];
    $date_start = date('Y-m-d h:i:s');
    $date_end = date('Y-m-d h:i:s');


//se existir o arquivo
    if (isset($_FILES["arquivo"])) {

        $foto = $_FILES["arquivo"] ['name'];
        //coloca nome em minusculo
        $foto = strtolower($foto);

        $tipo = array("image/pjpeg", "image/jpeg", "image/pjpeg", "image/jpeg", "image/gif", "image/png");
        $arqType = $_FILES['arquivo'] ['type'];
        if (array_search($arqType, $tipo) === false) {
            echo "<meta http-equiv='refresh' content='0; url=index.php'>
	<script type='text/javascript'> alert('Formto invalido')</script>";
        } else {

            if (file_exists("fotos/$foto")) {
                $a = 1;
                while (file_exists("fotos/[$a] $foto")) {
                    $a++;
                }
                $foto = "[" . $a . "]$foto";
            }

//insere na pasta do servidor
            if (!move_uploaded_file($_FILES['arquivo'] ['tmp_name'], "fotos/" . $foto)) {
                echo "<meta http-equiv='refresh' content='0; url=cad_festas.php'>
	<script type='text/javascript'> alert('Falha no upload')</script>";
            }

            //insere no banco de dados
            $sql = "Insert into party (name,local,date_start,date_end,description,promoters_id,picture) values";
            $sql .="('$nome','$local','$date_start','$date_end','$descricao','$idUser','$foto')";
            $resultado = mysql_query($sql);
            $idParty = mysql_insert_id();
            //insere endereço no banco de dados
            $sql = "Insert into address (party_id,street,number,neighborhood,city) values";
            $sql .="('$idParty','$rua','$bairro','$num','$uf')";
			echo "<script language=javascript>alert( 'Cadastro realizado com sucesso!' );window.location.href = 'index.php';</script>";
            $resultado = mysql_query($sql);
            mysql_close();
	        
        }
    }
} else if ($operacao == "edtPromoters") {

    $login = $_POST["login"];
// Recupera os dados dos campos
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $email = $_POST['email'];
    $user = $_POST['user'];
    $senha = $_POST['senha'];

    //atualiza no banco de dados
    $sql = "UPDATE promoters SET name = '$nome', last_name = '$sobrenome', email = '$email', login = '$user',
		password = '$senha' where login = '$login'";
    $resultado = mysql_query($sql);	
	echo "<script language=javascript>alert( 'Dados alterados!' );window.location.href = 'index.php';</script>";
	 mysql_close();
	
	 
}else if ($operacao == "editar_festas"){
	
	    $id = $_POST["id"];
		
		
		// Recupera os dados dos campos
    $nome = $_POST['nome'];
    $date_start = $_POST['date_start'];
    $date_end = $_POST['date_end'];
    $local = $_POST['local'];
    $descricao = $_POST['descricao'];
    $rua = $_POST['rua'];
    $bairro = $_POST['bairro'];
    $num = $_POST['num'];
    $uf = $_POST['uf'];
    $date_start = date('Y-m-d h:i:s');
    $date_end = date('Y-m-d h:i:s');
	
	
	
	   //atualiza no banco de dados
    $sql = "UPDATE party SET name = '$nome', local = '$local', date_start = '$date_start', date_end = '$date_end',
		description = '$descricao' where id = '$id'";
    $resultado = mysql_query($sql);
	
	$sql2 = "UPDATE address  SET street ='$rua', number = '$num', neighborhood = '$bairro', city = '$uf' where party_id	= '$id'";
	$resultado2 = mysql_query($sql2);	
	echo "<script language=javascript>alert( 'Dados alterados!' );window.location.href = 'index.php';</script>";
	
	mysql_close();
	
	
		
		
	
	
}else if ($operacao == "excluir"){
	  $id = $_POST["id"];
	  
		echo "$id";
		
   //deketa a festa bi no banco de dados
    $sql = "DELETE FROM party where id = '$id'";
    $resultado = mysql_query($sql);
	mysql_close();
	header('Location: index.php');
		
		
	
	
}


?>
