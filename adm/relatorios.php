<?php
include("./includes/topo.php");
$result = mysql_query("SELECT * FROM promoters WHERE login='$logado'");
$idUser = mysql_result($result, 0, 0);
$result2 = mysql_query("SELECT * FROM party WHERE promoters_id='$idUser'");
?>
<link rel="stylesheet" type="text/css" media="screen" href="lib/css/bootstrap-datetimepicker.min.css">

<!-- BREADCRUMBS -->
<div class="crumbs">
    <ol class="breadcrumb hidden-xs">
        <li><i class="fa fa-home"></i> <a href="#">Home</a></li>
        <li class="active">Relatórios</li>
    </ol>
</div>

<!-- BEGIN PAGE CONTENT -->
<div class="content">
    <div class="page-h1">
        <h1>Relatórios <small>// postagens</small></h1>
    </div>
    <div class="tbl">
        <div class="col-md-12">
            <div class="wdgt wdgt-primary" hide-btn="true">
                <div class="wdgt-header">Relatórios</div>
                <div class="wdgt-body wdgt-table">
                   <table class="table">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Local</th>
                                    <th>Descrição</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
								
                                while ($row = mysql_fetch_array($result2)) {
                                    $idParty = $row['id'];
									$name = $row['name'];
									$local = $row['local'];
									$inicio = $row['date_start'];
									$fim = $row['date_end'];
									$logo = $row['picture'];
									echo "<form action=\"acao.php\" method=\"post\">";
                                    echo "<tr>";
                                    echo "<td>" . $row['name'] . "</td>";
                                    echo "<td>" . $row['local'] . "</td>";
                                    echo "<td>" . $row['description'] . "</td>";
                                    echo "<td>";
                                    echo "<a href=\"gera_relatorios.php?id=$idParty&logo=$logo&name=$name&local=$local&inicio=$inicio&fim=$fim\" target=\"new\"> <button type=\"button\" class=\"btn btn-soft btn-xs\"><i class=\"icon icon-download\"></i></button></a> &nbsp";

                                }
                                ?>


                            </tbody>
                        </table>

                </div>
            </div>
           
        </div>

    </div>

</div>

<script type="text/javascript"  src="lib/js/bootstrap-datetimepicker.min.js"></script> 
<script type="text/javascript"  src="lib/js/bootstrap-datetimepicker.pt-BR.js"></script> 
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