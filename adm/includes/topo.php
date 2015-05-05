<?php

include("../includes/header.php");

session_start();
if(!isset($_SESSION['login']) || !isset($_SESSION['pass'])){
	header("Location: ../index.php");
	exit;
	
 }else{
	$logado = $_SESSION['login'];

 }
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>::: CQT Painel Web :::</title>

<script type="text/javascript"  src="lib/js/jquery.min.js"> </script> 
<script type="text/javascript"  src="lib/js/bootstrap.min.js"> </script> 



<!-- Default Styles (DO NOT TOUCH) -->
<link rel="stylesheet" href="lib/css/font-awesome.min.css">
<link rel="stylesheet" href="lib/css/bootstrap.min.css">
<link rel="stylesheet" href="lib/css/fonts.css">
<link rel="stylesheet" href="lib/css/soft-admin.css"/>

<!-- Adjustable Styles -->
<link type="text/css" rel="stylesheet" href="lib/css/morris.css"/>
<link type="text/css" rel="stylesheet" href="lib/css/colorbox.css"/>
<link type="text/css" rel="stylesheet" href="lib/css/icheck.css">
</head>
<body>
<div class="cntnr"> 
  <!-- RESPONSIVE LEFT SIDEBAR & LOGO -->
  <div class="left hidden-xs">
    <div class="logo"><img id="logo" src="lib/img/logo3.png" style="width:170px !important; height:80px !important"></div>
    
  
<?php
include("./includes/menu.php");
include("./includes/menu_responsive.php");
?> 
  
  <div class="right">
    <div class="nav">
      <div class="bar"> 
        
        <!-- RESPONSIVE SMALL LOGO (HIDDEN BY DEFAULT) -->
        <div class="logo-small visible-xs"><img src="lib/img/logo3.png"></div>
        
          <!-- NAV PILLS -->
      <ul class="nav nav-pills hidden-xs">
        <li class="active"><a href="#"><span class="fa fa-dashboard"></span>Painel Administrativo</a></li>
        <li><a href="#"><span class="icon icon-barcode"></span>CQT <span class="label label-primary">2.0</span></a></li>
        <li><a href="edt_promoters.php"><span class="icon icon-cog"></span>Admin</a></li>
      </ul>
        
        <!-- NAV PILLS --><!-- ICON DROPDOWNS -->
        <div class="hov">
          <div class="btn-group"> <a class="con" href="" data-toggle="dropdown"><span class="icon icon-user"></span><span class="label label-primary">Olá</span></a>
            <ul class="dropdown-menu pull-right dropdown-profile" role="menu">
              <li class="title" style="margin-top:-15px"><span class="icon icon-user" style="margin-top:0px"></span>&nbsp;&nbsp;<?php echo" Bem vindo: $logado";	?>
                </p>
              </li>
              <li><a href="../logout.php"><span class="fa fa-power-off"></span>Sair</a></li>
            </ul>
          </div>
        </div>
      </div>
      
   
    
   