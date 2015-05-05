<?php

include("./includes/topo.php");
$result = mysql_query("SELECT * FROM promoters WHERE login='$logado'");
$nome = mysql_result($result ,0,1);
$sobrenome =  mysql_result($result ,0,2);
$email =  mysql_result($result ,0,3);
$user =   mysql_result($result ,0,5); 
$senha =   mysql_result($result ,0,4);

?>
<link href="lib/css/bootstrap-combined.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" media="screen" href="lib/css/bootstrap-datetimepicker.min.css">

<!-- BREADCRUMBS -->
<div class="crumbs">
  <ol class="breadcrumb hidden-xs">
    <li><i class="fa fa-home"></i> <a href="#">Home</a></li>
    <li class="active">Cadastro Festas</li>
  </ol>
</div>

<!-- BEGIN PAGE CONTENT -->
<div class="content">
  <div class="page-h1">
    <h1>Editar <small>// dados</small></h1>
  </div>
  <div class="tbl">
    <div class="col-md-11">
      <div class="wdgt">
        <div class="wdgt-header">Edição de dados.</div>
        <div class="wdgt-body" style="padding-bottom:10px;">
          <form id="defaultForm" method="post" action="acao.php" class="form-horizontal" enctype="multipart/form-data">
            <input type="hidden" name="operacao" value="edtPromoters">
            <input type="hidden" name="login" value="<?php echo $logado; ?>">
            <div class="form-group">
              <label class="col-lg-3 control-label">Nome:</label>
              <div class="col-lg-7">
                <input type="text" class="form-control" name="nome" value="<?php echo "$nome"; ?>" required />
              </div>
            </div>
                    
             <div class="form-group">
              <label class="col-lg-3 control-label">Sobrenome:</label>
              <div class="col-lg-7">
                <input type="text" class="form-control" name="sobrenome" value="<?php echo "$sobrenome"; ?>" required />
              </div>
            </div>
            
             <div class="form-group">
              <label class="col-lg-3 control-label">Email:</label>
              <div class="col-lg-7">
                <input type="text" class="form-control" name="email" value="<?php echo "$email"; ?>" required />
              </div>
            </div>            
             <div class="form-group">
              <label class="col-lg-3 control-label">Usuário:</label>
              <div class="col-lg-7">
                <input type="text" class="form-control" name="user" value="<?php echo "$user"; ?>"  readonly="readonly" required />
              </div>
            </div>
            
             <div class="form-group">
              <label class="col-lg-3 control-label">Senha:</label>
              <div class="col-lg-7">
                <input type="text" class="form-control" name="senha" value="<?php echo "$senha"; ?>" required />
              </div>
            </div>
            
            <div class="form-group">
              <div class="col-lg-9 col-lg-offset-3">
                <button type="submit" class="btn btn-primary">Editar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript"  src="lib/js/bootstrap-datetimepicker.min.js"> </script> 
<script type="text/javascript"  src="lib/js/bootstrap-datetimepicker.pt-BR.js"> </script> 
<script type="text/javascript">
      $('#datetimepicker2').datetimepicker({
        format: 'dd/MM/yyyy hh:mm:ss',
        language: 'pt-BR'
      });
    </script> 
<script type="text/javascript">
      $('#datetimepicker').datetimepicker({
        format: 'dd/MM/yyyy hh:mm:ss',
        language: 'pt-BR'
      });
    </script>
</body>
</html>