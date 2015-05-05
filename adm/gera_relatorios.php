<?php
// chama o FPDF 
define('FPDF_FONTPATH','fpdf/font/');   
$id = $_GET['id'];
 
// INSTALA AS FONTES DO FPDF  
require('fpdf/fpdf.php');   

function contaLinhas($text, $maxwidth){   
    $lines=0;  
    if($text==''){  
        $cont = 1;  
    }else{  
        $cont = strlen($text);  
    }  
    if($cont < $maxwidth){  
        $lines = 1;  
    }else{  
        if($cont % $maxwidth > 0){  
            $lines = ($cont / $maxwidth) + 1;   
        }else{  
            $lines = ($cont / $maxwidth);   
        }  
    }   
    $lines = $lines + substr_count(nl2br($text),'<br>');  
    return $lines;  
} 
  
// INSTALA A CLASSE FPDF  
class PDF extends FPDF {  
 
    function Header(){  
	$name = $_GET['name'];
	$inicio = $_GET['inicio'];
	$local = $_GET['local'];
	$fim = $_GET['fim'];
	
	    $logo = $_GET['logo'];
        global $codigo; // EXEMPLO DE UMA VARIAVEL QUE TERÁ O MESMO VALOR EM QUALQUER ÁREA DO PDF.  
        $l=6; // DEFINI ESTA VARIAVEL PARA ALTURA DA LINHA  
        $this->SetXY(10,10); // SetXY - DEFINE O X E O Y NA PAGINA  
        $this->Rect(10,10,190,280); // CRIA UM RETÂNGULO QUE COMEÇA NO X = 10, Y = 10 E   
                                   
        $this->Image('./fotos/'.$logo,11,11,20); // INSERE UMA LOGOMARCA NO PONTO X = 11, Y = 11, E DE TAMANHO 40.  
          $this->Image('../img/logo.png',170,15,30);
		$this->SetFont('Arial','B',10); // DEFINE A FONTE ARIAL, NEGRITO (B), DE TAMANHO 8  
    
  
        $this->Ln(); // QUEBRA DE LINHA  
  
        $this->Cell(190,10,'',0,0,'L');  
        $this->Ln();  
        $l = 17;  
        $this->SetFont('Arial','B',12);  
        $this->SetXY(10,15);  
        $this->Cell(190,$l,'Relatorios Postagens','B',1,'C');  
        $l=5;  
        $this->SetFont('Arial','B',10);  
        $this->Cell(20,$l,'Festa:',0,0,'L');  
        $this->Cell(100,$l, $name,'B',0,'L');  
        $this->Cell(35,$l,'',0,0,'L');  
        $this->Cell(15,$l,'Hoje:',0,0,'L');  
        $this->Cell(20,$l,date('d/m/Y'),'B',0,'L'); // INSIRO A DATA CORRENTE NA CELULA  
  
        $this->Ln();  
        $this->Cell(20,$l,'Local:',0,0,'L');  
        $this->Cell(100,$l,$local,'B',0,'L');  
        $this->Ln();  
        $this->Cell(20,$l,'Data Inicial: ',0,0,'L');  
        $this->Cell(100,$l,' '. $inicio,'B',0,'L');  
        $this->Cell(5,$l,'',0,0,'L');  
        $this->Cell(21,$l,'Data Final:',0,0,'L');  
        $this->Cell(35,$l, $fim,'B',0,'L');  
        $this->Ln();  
  
        //FINAL DO CABECALHO COM DADOS  
        //ABAIXO É CRIADO O TITULO DA TABELA DE DADOS  
  
        $this->Cell(190,2,'',0,0,'C');   
        //ESPAÇAMENTO DO CABECALHO PARA A TABELA  
        $this->Ln();  
  
        $this->SetTextColor(255,255,255);  
        $this->Cell(190,$l,$name,1,0,'C',1);  
        $this->Ln();  
  
        //TITULO DA TABELA DE SERVIÇOS  
        $this->SetFillColor(232,232,232);  
        $this->SetTextColor(0,0,0);  
        $this->SetFont('Arial','B',8);  
        $this->Cell(95,$l,'Nome',1,0,'L',1);  
        $this->Cell(95,$l,'Postagem',1,0,'l',1);  
 
        $this->Ln();  
  
    }  
  
    function Footer(){ // CRIANDO UM RODAPE  
  
        $this->SetXY(15,280);  
        $this->Rect(10,270,190,20);  
       // $this->SetFont('Arial','',10);  
       // $this->Cell(70,8,'Assinatura ','T',0,'L');  
      //  $this->Cell(40,8,' ',0,0,'L');  
      //  $this->Cell(70,8,'Assinatura','T',0,'L');   
        $this->Ln();  
        $this->SetFont('Arial','',7);  
        $this->Cell(190,7,'Página '.$this->PageNo().' de {nb}',0,0,'C');  
    
    }  
  
  
}  
  
//CONECTE SE AO BANCO DE DADOS SE PRECISAR   
include("../includes/header.php"); // A MINHA CONEXÃO FICOU EM CONFIG.PHP  
  
$pdf=new PDF('P','mm','A4'); //CRIA UM NOVO ARQUIVO PDF NO TAMANHO A4  
$pdf->AddPage(); // ADICIONA UMA PAGINA  
$pdf->AliasNbPages(); // SELECIONA O NUMERO TOTAL DE PAGINAS, USADO NO RODAPE  
$pdf->SetFont('Arial','',8);  
$y = 59; // AQUI EU COLOCO O Y INICIAL DOS DADOS   
  
$sql = "select * from mensagens WHERE party_id = '$id'"; //SELECAO DOS DADOS QUE IRÃO PRO PDF  
$result = mysql_query($sql);  
$l=5; // ALTURA DA LINHA  
while($row = mysql_fetch_array($result)) {  
// ENQUANTO OS DADOS VÃO PASSANDO, O FPDF VAI INSERINDO OS DADOS NA PAGINA  
  
    $dados1 = $row["1"];  
    $dados2 = $row["2"]; // NESTE CASO, EU DECODIFIQUEI OS DADOS, POIS É UM CAMPO DE     TEXTO.  
     
	 
 
  
    $l = 5 * contaLinhas($dados2,48);   
    // Eu criei a função "contaLinhas" para contar quantas linhas um campo pode conter se tiver largura = 48  
  
  
    if($y + $l >= 230){           // 230 É O TAMANHO MAXIMO ANTES DO RODAPE  
  
        $pdf->AddPage();   // SE ULTRAPASSADO, É ADICIONADO UMA PÁGINA  
        $y=59;             // E O Y INICIAL É RESETADO  
  
    }  
  
    //DADOS 
	$pdf->SetFont('Arial','',11); 
	
	 
    $pdf->SetY($y);  
    $pdf->SetX(10);  
    $pdf->Rect(10,$y,95,$l);  
    $pdf->MultiCell(70,6,$dados1,0,2); // ESTA É A CELULA QUE PODE TER DADOS EM MAIS DE UMA LINHA  
    
	 
	  
    
    $pdf->SetY($y);  
    $pdf->SetX(105);  
    $pdf->Rect(105,$y,95,$l);  
    $pdf->MultiCell(95,5,$dados2,0,2);  
 

    
	$pdf->Ln();  
    $y += $l; 
	 
  
  
}  
  
mysql_close(); // FECHA A CONEXÃO COM MYSQL  
$pdf->Output(); // IMPRIME O PDF NA TELA  
Header('Pragma: public'); // ESTA FUNÇÃO É USADA PELO FPDF PARA PUBLICAR NO IE  
 
 	




?>

