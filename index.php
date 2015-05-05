<?php

include("includes/header.php");

if (empty($_GET['name'])){
	$color="info";
	$n = "none";		
	
}else if (!empty($_GET['name']) and ($_GET['name'] == "errorLogin") ){
   	$color="danger";
	$n="block";
	$texto = "Erro! Login ou Senha inválidos";
	
}else if (!empty($_GET['name']) and ($_GET['name'] == "sucesso") ){
   	$color="success";
	$n="block";
	$texto = "Usuário Cadastrado com sucesso!";
	
}else if (!empty($_GET['name']) and ($_GET['name'] == "falha") ){
   	$color="danger";
	$n="block";
	$texto = "Usuário já Cadastrado!";
	
}	




?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>::: CQT Painel Web :::</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/preview.css" rel="stylesheet" />
<link href="css/bootstrap.icon-large.min.css" rel="stylesheet">
<script src="js/modernizr.js"></script>
<link href='http://fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
</head>
<body class="eternity-form">
   <nav class="main-nav">
        <ul>
         
            <li><a href="#log" data-title="Login" data-panel="fourth"></a></li>
            <li><a href="#cad" data-title="Cadastro de Usuários" data-panel="fifth"></a></li>
            <li><a href="#rec" data-title="Recuperação de senha" data-panel="sixth"></a></li>
        </ul>
    </nav>

<section class="colorBg3 colorBg" id="log" data-panel="third">
  <div class=" container">
    <div class="login-form-section">
      <div class="login-content " data-animation="bounceIn">
       <form action="login.php" method="post">
        <div class="alert alert-<?php echo $color ?>" style="display:<?php echo $n ?>"><a href="#" class="close" data-dismiss="alert">&times;</a> <?php echo $texto ?> </div>
        
           <div class="section-title" >
           <h3>Login Web CQT</h3>
         <img src="img/logo.png" width="40%" height="50px" style="margin:-50px 0 0 55%" />             
          </div>
          <div class="textbox-wrap">
            <div class="input-group"> <span class="input-group-addon "><i class="glyphicon glyphicon-user"></i></span>
              <input type="text" required class="form-control" placeholder="Username" name="login" />
            </div>
          </div>
          <div class="textbox-wrap">
            <div class="input-group"> <span class="input-group-addon "><i class="glyphicon glyphicon-asterisk"></i></span>
              <input type="password" required class="form-control " placeholder="Password" name="pass" />
            </div>
          </div>
          <div class="login-form-action clearfix">
            <div class="checkbox pull-left">
              <div class="custom-checkbox">
                <input type="checkbox" checked name="iCheck">
              </div>
              <span class="checkbox-text pull-left">&nbsp;</span> </div>
            <button type="submit" class="btn btn-success pull-right blue-btn">LogIn &nbsp; <i class="glyphicon glyphicon-ok"></i></button>
          </div>
          
        </form>
      </div>
      <div class="login-form-links link1 " data-animation="fadeInRightBig" data-animation-delay=".2s">
        <h4 class="blue">Não tem uma conta?</h4>
        <span>Não se preocupe</span> <a href="#cad" class="blue">Click Aqui</a> <span>para Criar</span> </div>
      <div class="login-form-links link2 " data-animation="fadeInLeftBig" data-animation-delay=".4s">
        <h4 class="green">Esqueceu sua senha?</h4>
        <span>Sem problemas</span> <a href="#rec" class="green">Click Aqui</a> <span>e recupere</span> </div>
    </div>
  </div>
</section>
<section class="colorBg form-seprator i3">
</section>
<section class="colorBg5 colorBg dark" id="cad" data-panel="fifth">
  <div class=" container"> <br />
    <br />
    <div class="registration-form-section">
      <form action="cadastrar.php" method="post">
      <div class="alert alert-<?php echo $color ?>" style="display:<?php echo $n ?>"><a href="#" class="close" data-dismiss="alert">&times;</a> <?php echo $texto ?> </div>
        <div class="section-title reg-header " data-animation="fadeInDown">
          <h3>Crie uma conta Agora</h3>
        </div>
        <div class="clearfix">
          <div class="col-sm-6 registration-left-section  " data-animation="fadeInUp">
            <div class="reg-content">
              <div class="textbox-wrap">
                <div class="input-group"> <span class="input-group-addon "><i class="glyphicon glyphicon-user"></i></span>
                  <input type="text" class="form-control " placeholder="Nome" name="name" required />
                </div>
              </div>
              <div class="textbox-wrap">
                <div class="input-group"> <span class="input-group-addon "><i class="glyphicon glyphicon-user"></i></span>
                  <input type="text" class="form-control " placeholder="Sobrenome" name="lastname" required />
                </div>
              </div>
              <div class="textbox-wrap">
                <div class="input-group"> <span class="input-group-addon "><i class="glyphicon glyphicon-envelope"></i></span>
                  <input type="email" class="form-control " placeholder="Email" name="email" required />
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 registration-right-section " data-animation="fadeInUp">
            <div class="reg-content">
              <div class="textbox-wrap">
                <div class="input-group"> <span class="input-group-addon "><i class="glyphicon glyphicon-user"></i></span>
                  <input type="text" class="form-control " placeholder="usuário" name="login" required />
                </div>
              </div>
              <div class="textbox-wrap">
                <div class="input-group"> <span class="input-group-addon "><i class="glyphicon glyphicon-asterisk"></i></span>
                  <input type="password" class="form-control " placeholder="senha" name="pass" required />
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="registration-form-action clearfix " data-animation="fadeInUp" data-animation-delay=".15s"> <a href="#demo3" class="btn btn-success pull-left blue-btn "> <i class="glyphicon glyphicon-chevron-left"></i>&nbsp; &nbsp;Login </a>
          <button type="submit" class="btn btn-success pull-right green-btn ">Cadastrar <i class="glyphicon glyphicon-ok"></i></button>
        </div>
      </form>
    </div>
  </div>
</section>
<section class="colorBg form-seprator"> </section>
<section class="colorBg6 colorBg dark" id="rec" data-panel="sixth">
  <div class=" container"> <br />
    <br />
    <br />
    <div class="forgot-password-section" data-animation="bounceInLeft">
      <div class="section-title">
        <h3>Recuperar senha</h3>
      </div>
      <div class="forgot-content">
        <form>
          <div class="textbox-wrap">
            <div class="input-group"> <span class="input-group-addon "><i class="glyphicon glyphicon-user"></i></span>
              <input type="text" class="form-control " placeholder="Username" required />
            </div>
          </div>
          <div class="textbox-wrap">
            <div class="input-group"> <span class="input-group-addon "><i class="glyphicon glyphicon-envelope"></i></span>
              <input type="email" class="form-control " placeholder="Email Id" required />
            </div>
          </div>
          <div class="forget-form-action clearfix"> <a href="#demo3" class="btn btn-success pull-left blue-btn"><i class="glyphicon glyphicon-chevron-left"></i>&nbsp;&nbsp;Back </a>
            <button type="submit" class="btn btn-success pull-right green-btn">Enviar &nbsp;&nbsp; <i class="glyphicon glyphicon-ok"></i></button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<script src="js/jquery-1.9.1.js"></script> 
<script src="js/bootstrap.js"></script> 
<script src="js/respond.src.js"></script>
<script src="js/jquery.icheck.js"></script> 
<script src="js/placeholders.min.js"></script> 
<script src="js/waypoints.min.js"></script> 
<script src="js/jquery.panelSnap.js"></script> 
    <script type="text/javascript">
        $(function () {
            $("input").iCheck({
                checkboxClass: 'icheckbox_square-blue',
                increaseArea: '20%' // optional
            });
            $(".dark input").iCheck({
                checkboxClass: 'icheckbox_polaris',
                increaseArea: '20%' // optional
            });
            $(".form-control").focus(function () {
                $(this).closest(".textbox-wrap").addClass("focused");
            }).blur(function () {
                $(this).closest(".textbox-wrap").removeClass("focused");
            });

            //On Scroll Animations


            if ($(window).width() >= 968 && !Modernizr.touch && Modernizr.cssanimations) {

                $("body").addClass("scroll-animations-activated");
                $('[data-animation-delay]').each(function () {
                    var animationDelay = $(this).data("animation-delay");
                    $(this).css({
                        "-webkit-animation-delay": animationDelay,
                        "-moz-animation-delay": animationDelay,
                        "-o-animation-delay": animationDelay,
                        "-ms-animation-delay": animationDelay,
                        "animation-delay": animationDelay
                    });

                });
                $('[data-animation]').waypoint(function (direction) {
                    if (direction == "down") {
                        $(this).addClass("animated " + $(this).data("animation"));

                    }
                }, {
                    offset: '90%'
                }).waypoint(function (direction) {
                    if (direction == "up") {
                        $(this).removeClass("animated " + $(this).data("animation"));

                    }
                }, {
                    offset: $(window).height() + 1
                });
            }

            //End On Scroll Animations


            $(".main-nav a[href]").click(function () {
                var scrollElm = $(this).attr("href");

                $("html,body").animate({ scrollTop: $(scrollElm).offset().top }, 500);

                $(".main-nav a[href]").removeClass("active");
                $(this).addClass("active");
            });




            if ($(window).width() > 1000 && !Modernizr.touch) {
                var options = {
                    $menu: ".main-nav",
                    menuSelector: 'a',
                    panelSelector: 'section',
                    namespace: '.panelSnap',
                    onSnapStart: function () { },
                    onSnapFinish: function ($target) {
                        $target.find('input:first').focus();
                    },
                    directionThreshold: 50,
                    slideSpeed: 200
                };
                $('body').panelSnap(options);

            }

            $(".colorBg a[href]").click(function () {
                var scrollElm = $(this).attr("href");

                $("html,body").animate({ scrollTop: $(scrollElm).offset().top }, 500);

                return false;
            });


           

        });
    </script>

</body>

</html>
