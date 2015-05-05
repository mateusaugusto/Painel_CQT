<?php

include("./includes/topo.php");

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
    <h1>Cadastro <small>// de festas</small></h1>
  </div>
  <div class="tbl">
    <div class="col-md-11">
      <div class="wdgt">
        <div class="wdgt-header">Cadastre sua festa no CQT.</div>
        <div class="wdgt-body" style="padding-bottom:10px;">
          <form id="defaultForm" method="post" action="acao.php" class="form-horizontal" enctype="multipart/form-data">
            <input type="hidden" name="operacao" value="cadastrar">
            <input type="hidden" name="login" value="<?php echo $logado; ?>">
            <div class="form-group">
              <label class="col-lg-3 control-label">Nome:</label>
              <div class="col-lg-7">
                <input type="text" class="form-control" name="nome" required />
              </div>
            </div>
            <div id="datetimepicker2" class="form-group">
              <label class="col-lg-3 control-label">Data Início:</label>
              <div class="col-lg-7">
                <input type="text" class="form-control" name="date_start" required />
              </div>
              <span class="add-on"> <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i> </span> </div>
            <div id="datetimepicker" class="form-group">
              <label class="col-lg-3 control-label">Data Fim:</label>
              <div class="col-lg-7">
                <input type="text" class="form-control" name="date_end" required />
              </div>
              <span class="add-on"> <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i> </span> </div>
            <div class="form-group">
              <label class="col-lg-3 control-label">Local:</label>
              <div class="col-lg-7">
                <input type="text" class="form-control" name="local" required />
              </div>
            </div>
            <div class="form-group" >
              <label class="col-lg-3 control-label">Rua:</label>
              <div class="col-lg-5">
                <input type="text" class="form-control" name="rua" required  />
              </div>
              <label class="col-lg-3 control-label" style="float: left; width: 25px; position: relative;" >N:</label>
              <div class="col-lg-7" style="width:141px;">
                <input type="text" class="form-control" name="num" required />
              </div>
            </div>
            <div class="form-group" >
              <label class="col-lg-3 control-label">Bairro:</label>
              <div class="col-lg-5">
                <input type="text" class="form-control" name="bairro" required  />
              </div>
              <label class="col-lg-3 control-label" style="float: left; width: 25px; position: relative;"  >UF:</label>
              <div class="col-lg-7" style="width:141px;">
                <select name="uf" id="uf" class="form-control">
                <option value="MG">MG</option>
                 <option value="SP">SP</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-3 control-label">Descrição:</label>
              <div class="col-lg-7">
                <input type="text" class="form-control" name="descricao" required />
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-3 control-label">Imagem:</label>
              <a href="index.php"></a>
              <div class="col-lg-7">
                <input type="file" class="form-control" name="arquivo" required />
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-9 col-lg-offset-3">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
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