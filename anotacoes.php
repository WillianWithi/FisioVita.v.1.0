<?php
    session_start();
	$id_pac = $_SESSION['id'];

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
     <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>anotações</title>
	<!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   
  
   
  <script type="text/javascript">
	// função para esconder ou mostrar a div
		function Mudarestado(el,op) {
			if(op==1)
					document.getElementById(el).style.display = 'block';
			else
					document.getElementById(el).style.display = 'none';
		}
	//------------------------------------------------------------------
	// função para validar form
    
      function validar(){
		
	     
	  
	  }
    //--------------------------------------------------------------------
	
	
   
  </script>

  
  
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" rule="navigation">
          <a class="navbar-brand" href="table.php"><img src="img/logofisioVita.png" width="200" align ="center"/></a>
		  <div>
		<!--	<h2 style="color:#fff"align="center">Avaliação do Fisioterapeuta</h2--> 
			<ul class="nav navbar-top-links navbar-right">
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
						<i class="fa fa-envelope fa-fw fa-2x"></i>
					</a>
				</li>
			</ul>
			<br>
            <h2 style="color:#fff;"align="center" >Avaliação do Fisioterapeuta</h2>
		  </div>
		 
	
		  
         </nav>
         <nav class="navbar-default navbar-side" role="navigation">
		  <div class="navbar-header" style="padding-right:10%">
		       
				
						</br></br>
				
						<p style="font-size:12px;color:#fff;margin-left:10%">	
							LEITO: 01<BR>
							PRONTUÁRIO: 11751<BR>
							NOME: willian withi<br>
							DIAGNÓSTICO: TUBERCULOSE<br>
							Data Admissão: 23/05/2015<br>
							
						</p>
			  
			
		  </div>
         </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
		
            <div id="page-inner" >
                 <!-- /. ROW  -->
              <div class="row">
                <div class="col-lg-12" >
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
								<form role="form" action="C_anotacoes.php" method="POST">
									<div class="col-lg-6">
			                          
											<label>Modo ventilatório: </label>
											<input class="form-control" type="text" name="m-vent"></br>
											<div>
												
												</div><br>
												
												<label>Ventilação Mecânica: </label>
												<label>
													<input type="radio" name="opcao" onchange="Mudarestado('minhaDiv',1)" id="optionsRadios1" value="1" >Sim
												</label>
										
												<label>
													<input type="radio" name="opcao" onchange="Mudarestado('minhaDiv',0)" id="optionsRadios2" value="0" checked>Não
												</label><br><br>
												
												 <div id="minhaDiv" style="display:none">
														<label>Tipo de ventilação mecânica:  </label>
														
														<label>
															<input type="radio" name="op" id="op" value="1">TOT
														</label>
														<label>
															<input type="radio" name="op" id="op2" value="2">TQT
														</label>
														<br><br>
														
														<label>Tamanho:</label><input type="text" name="tamanho" style="width:50px;height:20px;" />
														<label>Pressao cuff:</label><input type="text" name="p_cuff" style="width:50px;height:20px;" />
														<label>Posição:</label><input type="text" name="posicao" style="width:50px;height:20px;"/>
												 
												 </div>
											    
												<br>
												<label>Diagnóstico: </label>
												<input name="diagnostico" class="form-control" ></br>
										   </div>
                                
                                <div class="col-lg-6">
                        
                                        <div class="form-group">
                                            <label>Avaliação: </label>
                                            <textarea name="aval" class="form-control" rows="3"></textarea>
                                        </div> 
										
                                  
									
								
                                        <div class="form-group">
                                            <label>Informações adicionais: </label>
                                            <textarea name="inf" class="form-control" rows="3"></textarea>
                                        </div> 
								
									
                                      
										
                                    <div align="right">
										<button type="submit" class="btn btn-default">Salvar</button>
										<button type="reset" class="btn btn-default">Limpar</button>
									</div>
								</div>
                               
								</form>
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
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
      <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
    
   
</body>
</html>
