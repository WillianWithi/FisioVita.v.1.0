<?php

	if(isset($_GET["inicial"])){
		include ("estatistic.php");
	   $data1 = $_GET['inicial'];
	   $data2 = $_GET['final'];
	   $clinica = $_GET['clinica'];
	   $i = 0;
	   $mediaTotal = 0;
	   $mediaTotTotal = 0;
	   $mediaTqtTotal =0;
	   $dataFinal = date('d-m-Y', strtotime("+1 days",strtotime($data2)));
		do{
			
			$dataTeste = date("Y-m-d",strtotime(str_replace('/','-',$data1)));
			$media = med(vm($dataTeste,$clinica),ocupados($dataTeste,$clinica)); // media de pacientes em vm
			$mediaTot = med(tot($dataTeste,$clinica),ocupados($dataTeste,$clinica)); // media de pacientes com tot
			$mediaTqt = med(tqt($dataTeste,$clinica),ocupados($dataTeste,$clinica)); // media de pacientes com tqt
			echo " media: $media";
			echo " tot: $mediaTot";
			echo " tqt: $mediaTqt";
			echo "<br>";
			$data1 = date('d-m-Y', strtotime("+1 days",strtotime($data1)));
			$mediaTotal = $mediaTotal + $media;
			$mediaTotTotal = $mediaTotTotal + $mediaTot;
			$mediaTqtTotal = $mediaTqtTotal + $mediaTqt;
			$i= $i+1;
			
		}while($data1 != $dataFinal );
		
		$mediaTotal = $mediaTotal/$i; // media total no mês
		$mediaTotTotal = $mediaTotTotal/$i; // media do tot total no mes
		$mediaTqtTotal = $mediaTqtTotal/$i; // media do tqt total no mes
		
		$tot = round(($mediaTotTotal*100),2);
		$vm = round(($mediaTotal*100),2);
		$tqt = round (($mediaTqtTotal*100),2);
	
    }else{
	   $tot = 30;
	   $vm = 50;
	   $tqt = 20;
	}
	
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>fisioVita</title>
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
	 <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
	
	<link rel="stylesheet" href="picker/jquery-ui.css" />
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
		<script src="picker/jquery-1.8.2.js"></script>
		<script src="picker/jquery-ui.js"></script>
		<meta charset="utf-8" />
		<title>Calendário jQuery</title>
	
		<script>
			$(function() {
				
				$("#inicial").datepicker({
					dateFormat: 'dd/mm/yy', 
					dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'], 
					dayNamesMin: ['D','S','T','Q','Q','S','S','D'], 
					dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'], 
					monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'], monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'] 
				});	
			});
				
			$(function() {
				$("#final").datepicker({
					dateFormat: 'dd/mm/yy', 
					dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'], 
					dayNamesMin: ['D','S','T','Q','Q','S','S','D'], 
					dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'], 
					monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'], monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'] 
				});	
			}); 
			
		</script>

</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><img src="img/logofisioVita.png" width="150" align ="center"/></a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    
			
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <br><br>
					
                    <li>
                         <a href="cadastrar_fisio.php" style="color:#fff">Cadastrar Fisioterapeuta</a><br>
                    </li>
					<li>
                         <a href="#" style="color:#fff">Tempo de ventilação</a><br>
                    </li>
                    <li>
                         <a href="#" style="color:#fff">Óbito/Transferência</a><br>
                    </li>
                    
                    <li>
                        <a href="#" style="color:#fff">Extubações</a><br>
                    </li>
                </ul>

            </div>

        </nav>
       
		
        <div id="page-wrapper" >
            <div id="page-inner" >
                <div class="row" >
					<div class="container-fluid">
						<div>
							<form action="donut.php" method="GET">
								
								<input class="col-md-3" type="text" id="inicial" name="inicial"/>
								<input class="col-md-3" type="text" id="final" name="final"/>
								
								
								<select class="col-md-3" name="clinica"  required>        
									<option value="uti1">UTI 01</option>
									<option value="uti2">UTI 02</option>
                                </select>
								
								<input type="submit" value="Consultar">
                                
							</form>
							<br>
						</div>
						<div class="col-md-12" align="right">
						    
						    <div id="donut-example" style="height: 350px;"></div>
						</div>
					</div>
				</div>	
            </div>
		</div>
                
    
         </div>
            
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    
    <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- Morris Chart Js -->
    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
    <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
	
	<script type="text/javascript">
	    var tot = <?php echo"$tot"; ?>;
		var tqt = <?php echo"$tqt"; ?>;
		var vm = <?php echo"$vm"; ?>;
	</script>
	<script src="assets/js/morris/graph.js"></script>
	

	


</body>

</html>