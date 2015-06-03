<?php 
   session_start();
   include("funcoes.php");
  $id = (isset($_POST['id_paciente']))?$_POST['id_paciente']:$_GET['id'];
  $_SESSION['id'] = $id;
 if($id!=NULL){
	include ('php/conexao.php');                                                                                    
	$sql= mysql_query("SELECT * FROM paciente WHERE id='$id'",$con) or die(mysql_error());
	$dados = mysql_fetch_assoc($sql);
 }
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FisioVita</title>
	<!-- Bootstrap Styles-->
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css"> <!--Incons do font awesome-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- Morris Chart Styles-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="css/login.css">
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    
	<script type="text/javascript" src="js/calc.js"></script>
	
	<!-- código em javascript  para  usar o arquivo calc.js-->
	
	<script type="text/javascript">
		function calcular(){
			var paciente = 
			{
				peso:form.peso.value,
				idade:form.idade.value,
				fr_atual: form.fr_atual.value,
				pco2_atual:form.pcO2_A.value,
				pco2_ideal:form.pco2_i.value,
				fio2: form.fio2.value,
				pao2_atual: form.paO2.value,
				altura: form.altura.value,
				hco3: form.hco3.value,
				pressao_plato: form.p_plato.value,
				peep: form.peep.value,
				pressao_pico: form.p_pico.value,
		
			}
			
			
			var peso_m = peso_p_mulher(paciente);
			var peso_h = peso_p_homem(paciente);
			var vol_corrente = v_corrente(paciente);
			var pao2_id = pao2_ideal(paciente);
			var pco2_ac = pco2_ideal_ac(paciente);
			var pco2_alc = pco2_ideal_alc(paciente);
			var vol_correntel = v_correntel(paciente);
			var flux= fluxo(paciente);
			var fr_id = fr_ideal(paciente);
			var fio2_ideal = fio_ideal(paciente);
			var i_oxigenacao = ind_oxigenacao(paciente);
			var vol_minuto = v_minuto(paciente);
			var comp= complacencia(paciente);
			var p_dintensao = pressao_distensao(paciente);
			var resist = resistencia(paciente);
			var i_tobin = ind_tobin(paciente);
	
            document.getElementById("peso_m").innerHTML = peso_m;
			document.getElementById("peso_h").innerHTML = peso_h;
			document.getElementById("vol_c").innerHTML = vol_corrente;
			document.getElementById("pao2").innerHTML = pao2_id;
			document.getElementById("pco2_ac").innerHTML = pco2_ac;
			document.getElementById("pco2_alc").innerHTML = pco2_alc;
			document.getElementById("vol_cl").innerHTML = vol_correntel;
			document.getElementById("fluxo").innerHTML = flux;
			document.getElementById("fr").innerHTML = fr_id;
			document.getElementById("fio_2").innerHTML = fio2_ideal;
			document.getElementById("i_oxi").innerHTML = i_oxigenacao;
			document.getElementById("vol_m").innerHTML = vol_minuto;
			document.getElementById("compla").innerHTML = comp;
			document.getElementById("p_d").innerHTML = p_dintensao;
			document.getElementById("resist").innerHTML = resist;
			document.getElementById("i_tobin").innerHTML = i_tobin;
			
			return false;
		
		}
		
	 
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
                <a class="navbar-brand" href="table.php"><img src="img/logofisioVita.png" width="150" align ="center"/></a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
               
           
                <li class="dropdown">
                    <a class="dropdown-toggle"  href="index.php" aria-expanded="false">
                        <i class="fa fa-sign-out fa-fw"></i>sair
                    </a>
                    
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a href="table.php"> </a>
                    </li>
                    <li>
                        <a href="anotacoes.php"><i class="fa fa-edit"></i>Anotações</a>
                    </li>
					<li>
                        <a href="atendimento.php" class="active-menu"><i class="fa fa-calculator"></i>Calculos</a>
                    </li>
                    <li>
                        <a href="prontuario.php"><i class="fa fa-qrcode"></i>Histórico</a>
                    </li>
                   
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
			
                 <!-- /. ROW  -->
             
                <div class="row"> 
                    
                      
                       <div class="col-md-5 col-sm-10 col-xs-10">                     
						  <div class="panel panel-default">
                        <div align ="center"><img src="img/calc.png" width="100" /></div>
						<br>
					    <div>
							<form id="form" method="post"><br><br>	
							
								<input  id="peso" name="peso" placeholder="  Peso" type="text" style="width:90px;height:30px;font-size:14px;margin-bottom:15px;margin-left:15px;"/>
								<input  id="idade" name="idade" placeholder="  Idade" type="text" style="width:90px;height:30px;font-size:14px;margin-bottom:15px;margin-left:15px;"/>
								<input  id="fr_atual" name="fr_atual" placeholder="  FR Atual" type="text" style="width:90px;height:30px;font-size:14px;margin-bottom:15px;margin-left:15px;"/>
							
								<input  id="fio2" name="fio2_atual" placeholder="  fio2 Atual" type="text" style="width:90px;height:30px;font-size:14px;margin-bottom:15px;margin-left:15px;"/>
								<input  id="pcO2_A" name="pco2_atual" placeholder="  pcO2 Atual" type="text" style="width:90px;height:30px;font-size:14px;margin-bottom:15px;margin-left:15px;"/>
								<input  id="paO2" name="paO2_atual" placeholder="  paO2 Atual" type="text" style="width:90px;height:30px;font-size:14px;margin-bottom:15px;margin-left:15px;"/>
								
								<input  id="hco3" name="hco3" placeholder="  HcO3" type="text" style="width:90px;height:30px;font-size:14px;margin-bottom:15px;margin-left:15px;"/>
								<input  id="pco2_i" name="pcO2_ideal" placeholder="  pcO2 Ideal" type="text" style="width:90px;height:30px;font-size:14px;margin-bottom:15px;margin-left:15px;"/>
								<input  id="altura" name="altura" placeholder="  Altura" type="text" style="width:90px;height:30px;font-size:14px;margin-bottom:15px;margin-left:15px;"/>
								
								<input  id="peep" name="peep" placeholder="  PEEP" type="text" style="width:90px;height:30px;font-size:14px;margin-bottom:15px;margin-left:15px;"/>
								<input  id="p_plato" name="pressao_plato" placeholder="  P. Platô" type="text" style="width:90px;height:30px;font-size:14px;margin-bottom:15px;margin-left:15px;"/>
								<input  id="p_pico" name="pressao_pico" placeholder="  P. Pico" type="text" style="width:90px;height:30px;font-size:14px;margin-bottom:15px;margin-left:15px;"/>
							
								<br><br>
								
								<input type="submit"  value="Calcular" onclick= "return calcular()"   style="border-radius:3px;color:#fff;background: #0f83e2; border:4px solid #0f83e2;height:40px;margin-left:15px;"/>
								<input type="reset"  value="   Limpar   " style="border-radius:3px; color:#fff; height:40px; background:#cbe719; border:10px; solid: #000;"/>
							</form>
							<br>
							
                        </div>						
                    </div>            
                </div>
                
				<div class="col-md-6 col-sm-12 col-xs-12" style="padding-left:100px;">                    
					<div class="panel panel-default" style="width:400px">
                        <div class="panel-heading">
							
							<div align="left" width="100" class="col-md-3"><img src="img/f.jpg" width="60" height="60" /></div>
							<div class="col-md-9">
								<h3>
									<?php
											echo "Leito ".$dados['leito']."<br> ".qString(ucfirst($dados['nome']));
									?>
								</h3>
							</div>
							<br><br><br><br>
							<table style="font-family:'calibri';font-size:'14px'">
										     <tr><td>Peso predito Mulher:  </td><td id="peso_m"></td></tr>
											 <tr><td>Peso predito Homem: </td><td id="peso_h"></td></tr>
											 <tr><td>Volume Corrente: </td><td id="vol_c"></td></tr>
											 <tr><td>paO2 ideal: </td><td id="pao2"></td></tr>
											 <tr><td>pcO2 ideal ac: </td><td id="pco2_ac"><td></tr>
											 <tr><td>pcO2 ideal alc:</td><td id="pco2_alc"><td></tr>
											 <tr><td>Volume Corrente ml</td><td id="vol_cl"></td></tr>
											 <tr><td>Fluxo:</td><td id="fluxo"></td></tr>
											 <tr><td>Fr Ideal:</td><td id="fr" ></td></tr>
											 <tr><td>Fio2 ideal:</td><td id="fio_2"></td></tr>
											 <tr><td>Volume Minuto:</td><td id= "vol_m"></td></tr>
											 <tr><td>Complacencia:</td><td id="compla" ></td></tr>
											 <tr><td>Pressao Distensão</td><td id="p_d"></td></tr>
									         <tr><td>Resistencia:</td><td id="resist"></td></tr>
											 <tr><td>Indice de oxigenação:</td><td id="i_oxi"></td></tr>
											 <tr><td>Indice de Tobin: </td><td id="i_tobin"></td></tr>
										     
							</table>
							
                  
					   
					       
							
							</div>
                        <div class="panel-body">
                            <div id="morris-area-chart"></div>
                        </div>
                    </div>            
                </div> 
                
           </div>
                
                
          
                 
				</div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- Morris Chart Js -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
    
   
</body>
</html>
