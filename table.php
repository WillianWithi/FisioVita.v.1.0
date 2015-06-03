
<?php 
  session_start();
  $nomeFisio = $_SESSION['nome'];
  include('funcoes.php');
  $t= $_SESSION['M'];
  $c= $_SESSION['leito'];
  $setor = "uti1";
  $sql= mysql_query("SELECT * FROM paciente WHERE status = 1 ORDER BY leito ",$con) or die (mysql_error()) ;
  $linha = mysql_fetch_assoc($sql);
  $total = mysql_num_rows($sql);
  $nome = $_SESSION['nome'];
  
  if(isset($_GET['id_obito'])){
	$id= $_GET['id_obito'];
	mStatus($id);	
	$óbito = 1;
	$t = 3;
	
  }

  if(isset($_GET['id_tra'])){
    $id = $_GET['id_tra'];
	mStatus($id);
    $trans = 1;	
    $t = 3;
  }
  
  if(isset($_GET['setor'])){
    $setor = $_GET['setor'];
  }
  
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>fisioVita</title>
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css"> <!--Incons do font awesome-->
	
	<!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- Morris Chart Styles-->
   
        <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

	<script>
		// alta pega o numero do leito do paciente;
		function alta(l){
		  var leito = l;
		  var div = document.getElementById("m").innerHTML ="Você deseja da alta ao paciente do leito "+l+" ?";
		}
		// pega o indice do paciente;
		function altar(id){
		  var id_pac = document.getElementById("f").href = "table.php?id_obito="+id;
		  var id_trans = document.getElementById("g").href = "table.php?id_tra="+id;
		
		}	
		
		function selecionar(setor){
		   location.href="table.php?setor="+setor;
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
                <a class="navbar-brand" href="index.php"><img src="img/logofisioVita.png" width="150" align ="center"/></a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
               
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="modal"  data-target="#myModal">
                        <i class="fa fa-bed"></i> 
                    </a>
				  
                </li>

				<!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" href="index.php" aria-expanded="false">
                       <i class="fa fa-power-off"></i>
                    </a>
                </li>
                
				
				
			   <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="z-index:99999999999;">
					<div class="modal-dialog">
						<div class="modal-content " >
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								 <h4 class="modal-title" id="myModalLabel">Cadastro de paciente</h4>
							</div>
							<div class="modal-body">
											
								<form action="cadastro.php" method="post" style="align:'center'">	
									<input class="form-control&#32;input-lg" id="pesquisa" name="leito" placeholder="Leito" type="number" required="required" max="10" min="1" title="Preencha o campo com um valor entre 1 e 10." style="width:550px;height:40px;font-size:14px;margin-bottom:15px;"  />
									<input class="form-control&#32;input-lg" id="pesquisa" name="pront" placeholder="Prontuario" type="text" required="required" pattern="[0-9]+$"style="width:550px;height:40px;font-size:14px;margin-bottom:15px;"/>
									<input class="form-control&#32;input-lg" id="pesquisa" name="nome" placeholder="Nome" type="text" required="required"  pattern="[a-z\s]+$" style="width:550px;height:40px;font-size:14px;margin-bottom:15px;"/>
									<input class="form-control&#32;input-lg" id="pesquisa" name="diagnostico" placeholder="Diagnostico" type="text" required="required"  pattern="[a-z\s]+$" style="width:550px;height:40px;font-size:14px;margin-bottom:15px;"/><br>
								    <select class="form-control" name="clinica" required>        
										<option value="uti1">UTI 01</option>
										<option value="uti2">UTI 02</option>
                                   
                                    </select>
									<div class="modal-footer">
										  <button type="reset" class="btn btn-default" data-dismiss="modal">Limpar</button>
										  <button type="submit" class="btn btn-primary">cadastrar</button>
									</div>
								</form>	
						  </div>
							
						</div>
					</div>
				</div>
                 
			   <!-- modal da alta-->
			   <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
					
			
					
					
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <!--<div id="m"></div-->
								
	
							</div>
							 
							 <h4 class="modal-body" id="m"></h4>
							 
							<div class="modal-footer">
								<a id='f' href="table.php?id_obito=''"  class="btn btn-default" >Óbito</a>
								<a id='g' href="table.php?id_tra=''" class="btn btn-primary" >Transferência</a>
								<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
							</div>
						</div>
					</div>
                </div>
                 
                
            </ul>
        </nav
       
        
        
		<!--TABELAS-->
        <div id="page-wrapper" style="margin-left:-15px" >
            <div id="page-inner">
				
                 <!-- /. ROW  -->
             <div id="aki"></div>
            <div class="row">
                <div class="col-md-12">
                    <!-- mensagem de cadastro efetuado com sucesso-->
					
					<?php
					
						if(($t==2)&&($c==0)){
						 echo" 
						  <div class='alert alert-success alert-dismissable' style='display:block'>
							   <button type='button' class='close' data-dismiss='alert' 
								  aria-hidden='true'>
								  &times;
							   </button>
								Paciente admitido com sucesso.
							</div>";
						  $_SESSION["M"]= 1;
						  
						}else if($t==3){
							   echo" 
								  <div class='alert alert-success alert-danger' style='display:block'>
									   <button type='button' class='close' data-dismiss='alert' 
										  aria-hidden='true'>
										  &times;
									   </button>
										Paciente recebeu alta.
									</div>";
	                                echo "<meta HTTP-EQUIV='refresh' CONTENT='1;URL=table.php'>";
							      
								     $_SESSION["M"]= 1;
						   
						}else if($c!=0){
						  echo" 
								  <div class='alert alert-success alert-danger' style='display:block'>
									   <button type='button' class='close' data-dismiss='alert' 
										  aria-hidden='true'>
										  &times;
									   </button>
										OPS, você cadastrou um leito existente por favor preencha um leito que está vazio
									</div>";
						  $_SESSION['leito']=0;
						}
					?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Pacientes
							 <div align="right" width="20px;">
							  <!--formulario para selecionar uma clinica-->
							
							   <select name="clinic" required>        
									<option value="uti1" onclick="selecionar('uti1');"<?php if (isset($_GET['setor'])) if ($_GET['setor'] == "uti1" ) echo 'selected="selected"'; ?>>UTI 01</option>
									<option value="uti2" onclick="selecionar('uti2');"<?php if (isset($_GET['setor'])) if ( $_GET['setor'] == "uti2" ) echo 'selected="selected"'; ?>>UTI 02</option>
                                   
                                </select>
							  
							 </div>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Leito</th>
                                            <th>Prontuário</th>
											<th>Nome</th>
                                            <th>Diagnóstico</th>
											<th>Atender</th>
											<th>Alta</th><br>
											
                                        </tr>
                                    </thead>
                                    <tbody>
									   <?php
									      do{
										    if($linha['status']==1){
											   if($linha['clinica'] == $setor){
													echo"<tr> <td>".$linha['leito']."</td> <td>". $linha['pront'] . "</td> <td>".MString($linha['nome'])."</td> <td>" . $linha['diagnostico'] . 
														"</td><td width='30px' align='right'><form action='atendimento1.php' method='post'><input type=\"hidden\" name=\"id_paciente\" value='"
														.$linha['id']."'><button type='submit' class='btn btn-lg'title='Atender Paciente'><i class='fa fa-user-md fa-x' style='color:#0f83e2'></i></button></form></td>
														
														
														<td width='30px' align='right'><a class='btn btn-lg' onclick='alta(".$linha['leito'].");altar(".$linha['id'].");' data-toggle='modal'data-target='#basicModal'><i class='fa fa-user-times fa-x' style='color:#0f83e2'></i></a></form></td>";
										        }
											}
										  }while($linha= mysql_fetch_assoc($sql));
									   ?>
									
                                     
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>

        </div>
               <div align="center"><footer><p>Develop by: <a href="https://www.facebook.com/willianwithi">Willian Withi</p></h4></footer></div>
               <div id="aki"></div>   
   </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function() {
				$('#dataTables-example').dataTable( {
					"search":   false,
					"paging":   false,
					"ordering": false,
					"info":     true,
					"lengthChange": true,
				} );
			} );
			
    </script>
         <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
    
   
</body>
</html>
